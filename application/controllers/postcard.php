<?php
class Postcard_Controller extends Base_Controller
{

	public $restful = true;
	public $path = '/uploads/generate/';

	public function __construct()
	{
		$this->path = 'http://'.$_SERVER['HTTP_HOST'].$this->path;
	}

	/**
	 * This method checks to see if a view exists and if it does loads it along with any
	 * associated data from the database. It then checks to see if a function exists for
	 * the passed in page name (substituting dashes for underscores and runs that) if it exists.
	 * @param  string  $page            The page name
	 * @param  string  $variable        Allows us to pass a second variable to things
	 * @return view                     Ideally a view of some kind
	 */
	public function get_index()
	{
		return Layout::view('postcard.index',
			array(
				'images' => Image::order_by('order')->get(),
				'categories' => Gallery::order_by('title')->get()
				),
			'Создание откртыки шаг 1'
		);

	}

	public function get_create($image_id)
	{
		return Layout::view('postcard.create',
			array(
				'image' => Image::find($image_id)->upload,
				'frames'=> FrameGallery::order_by('id')->get(),
				'texts' => Text::order_by('text')->get()
			),
			'Создание откртыки шаг 2'
		);
	}

	public function get_link($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::view('postcard.finished',
			array(
				'method' => 'link',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename
				),
			'Ваша открытка готова'
		);
	}

	public function get_social($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::view('postcard.finished',
			array(
				'method' => 'social',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename
				),
			'Ваша открытка готова'
		);
	}

	public function get_email($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::view('postcard.finished',
			array(
				'method' => 'email',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename,
				'recipients' => explode(',', $card->emails)
				),
			'Ваша открытка готова'
		);
	}

	public function post_create()
	{
		if(!Input::get('image')) exit;
		if(!Input::get('title')) exit;
		if(!Input::get('text')) exit;
		if(!Input::get('to')) exit;
		if(!Input::get('from')) exit;
		if(!Input::get('method')) exit;
		if(!Input::get('frame')) exit;

		$card = new Cardslog;

		$card->card_id = Input::get('image');
		$card->title = Input::get('title');
		$card->text = Input::get('text');
		$card->to 	= Input::get('to');
		$card->from = Input::get('from');
		$card->method = Input::get('method');
		$card->emails = Input::get('emails');
		$card->save();

		$card->filename = $card->id.'.'.md5($card->created_at->format("Y.m.d H:i:s")).'.jpg';
		$card->save();		
		
		$frame_model = Frame::find(Input::get('frame'))->upload;
		$image_model = Image::find(Input::get('image'))->upload;
		$image_path = $_SERVER['DOCUMENT_ROOT'].'/'.Image::$upload.$image_model->cards_filename;
		$frame_path = $_SERVER['DOCUMENT_ROOT'].'/'.Frame::$upload.$frame_model->filename;
		$font_file = $_SERVER['DOCUMENT_ROOT'].'/font/arial.ttf';
		$font_italic = $_SERVER['DOCUMENT_ROOT'].'/font/ariali.ttf';
		$font_semibold = $_SERVER['DOCUMENT_ROOT'].'/font/arialbd.ttf';
		$generate = $_SERVER['DOCUMENT_ROOT'].'/uploads/generate/'.$card->filename;
		
		@unlink($generate);
		//$znak_hw = getimagesize($this->mark);
		//$znak = imagecreatefrompng ($this->mark);
		$frame = imagecreatefromjpeg($frame_path);
		$image_hw = getimagesize($image_path);
		$image = imagecreatefromjpeg($image_path);

		$text_color = imagecolorallocate($frame, 51, 51, 51);
		$label_color = imagecolorallocate($frame, 100, 100, 100);

		$text_margin_left = 660; //40;
		//title
		imagettftext($frame, 18, 0, $text_margin_left, 50, $text_color, $font_file , $this->wordwrap(Input::get('title'), 35, 14));

		//text
		imagettftext($frame, 11, 0, $text_margin_left, 134, $text_color, $font_italic , $this->wordwrap(Input::get('text'), 60, 20));

		//to
		imagettftext($frame, 9, 0, $text_margin_left, 364,  $label_color, $font_semibold , 'Кому:');
		imagettftext($frame, 13, 0, $text_margin_left, 384,  $text_color, $font_file , Input::get('to'));

		//from
		imagettftext($frame, 9, 0, $text_margin_left, 425,  $label_color, $font_semibold , 'От:');
		imagettftext($frame, 13, 0, $text_margin_left, 445, $text_color, $font_file , Input::get('from'));

		//if(!$this->done) $this->done=$this->pica;
		imagecopy($frame,$image,30,30,0,0,$image_hw[0],$image_hw[1]);
		imagejpeg($frame, $generate, 90);

		//imagedestroy ($znak);
		imagedestroy($image);
		//echo '<img src="/uploads/generate/'.$card->filename.'">';
		//Koki::echoPre(Input::all());
		//exit;
		//$link = $_SERVER['HTTP_HOST'].'/uploads/generate/'.$card->filename;
		$from = Input::get('from');
		$to = Input::get('to');
		$title = Input::get('title');

		if(Input::get('render')=='fb')
			$controller ='fb/cards';
		else
			$controller = Request::route()->controller;
		
		$filename = $card->filename;

		switch ($card->method) {
			case 'link':
				return Redirect::to($controller.'/link/'.$filename);
			break;
			case 'social':
				return Redirect::to($controller.'/social/'.$filename);
			break;
			case 'email':
				/* for smtp 
				$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 25)
				   ->setUsername('login')
				   ->setPassword('password')
				   ;
				$mailer = Swift_Mailer::newInstance($transport);

				$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'tls')
				   ->setUsername('login')
				   ->setPassword('password')
				   ;
				*/

				$emails = explode(',',Input::get('emails'));
				$mailer = IoC::resolve('mailer');

				$attach = Swift_Attachment::fromPath($generate, 'image/jpeg');

				foreach ($emails as $email) {
					$message = Swift_Message::newInstance('Вам пришла открытка: '.$title)
						->setFrom(array('site@photocard.kz'=>'Photocard.kz'))
						->setTo(array($email))
						->setBody('Здравствуйте, '.$to.'!<br>'.$from.' отправил вам открытку' ,'text/html')
						->attach($attach);
					$mailer->send($message);
				}


				return Redirect::to($controller.'/email/'.$filename);
			break;
		}

		//return $card;
	}

	protected function wordwrap($text, $width, $max_lenght)
	{
		/*
		$result = '';
		$words = explode(' ', $text);
		foreach ($words as $word) {
			if(strlen($word)>$max_lenght)

			$result = $word.' ';
		}
		*/
		setlocale(LC_CTYPE, 'ru_RU.utf-8'); 
		$text = preg_replace('/([^\s]{'.$max_lenght.'})/u' , "$1 ", $text);
		return wordwrap($text, $width);
	}

}