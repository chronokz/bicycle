<?php

class Form_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public $view = 'form.';
	public $regions = array(
			'Алматы',
			'Астана',
			'Актау',
			'Актобе',
			'Атырау',
			'Казылорда',
			'Караганда',
			'Костанай',
			'Кокшетау',
			'Оскемен',
			'Павлодар',
			'Петропавловск',
			'Семей',
			'Талдыкорган',
			'Тараз-орда',
			'Шымкент-корган',
			'Уральск'
		);


	public function get_manager()
	{
		$this->layout_data['title'] = 'Вызов менежера';
		return Layout::site($this->view.'manager', $this->layout_data, array(
			'regions' => $this->regions
		));
	}

	public function post_manager()
	{
		$fields = array();		
		if(!empty($_POST)) {
			$post = $_POST;			
			if(!$post['lastname'] || !preg_match('/^[A-Za-zА-Яа-я]+$/u', $post['lastname'])) {
				$fields[] = 'lastname';
			}
			
			if(!$post['name'] || !preg_match('/^[A-Za-zА-Яа-я\s]+$/u', $post['name'])) {
				$fields[] = 'name';
			}
			
			if(!$post['region']) {
				$fields[] = 'region';
			}	
						
			if(!$post['cause']) {
				$fields[] = 'cause';
			}
			
			if(!$post['telephone'] || !preg_match('/^\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/', $post['telephone'])) {
				$fields[] = 'telephone';
			}

			if(!Session::get('security_code') || Session::get('security_code')!=$post['keystring']) {
				$fields[] = 'keystring';
			}		
			
			if(empty($fields)) {
				$query = $this->db->query("SELECT id FROM tbl_manager WHERE lastname='".$post['lastname']."' AND name='".$post['name']."'");
				$query->setFetchMode(PDO::FETCH_OBJ);
				if(($row = $query->fetch()) == null) {
					$query = $this->db->prepare("
						INSERT INTO tbl_manager 
							(lastname, name, middlename, region, cause, telephone)
							values
							(:lastname, :name, :middlename, :region, :cause, :telephone)");
					$data = array(
						':lastname' => $post['lastname'],
						':name' => $post['name'],
						':middlename' => $post['middlename'],
						':region' => $post['region'],
						':cause' => $post['cause'],
						':telephone' => $post['telephone'],						
					);
					
					$query->execute($data);
					
					$text = 'Фамилия: '.$post['lastname'].'<br/>
							Имя: '.$post['name'].'<br/>
							Отчество: '.$post['middlename'].'<br/>
							Регион: '.$post['region'].'<br/>
							Удобное время: '.$post['cause'].'<br/>
							Телефон: '.$post['telephone'].'<br/>';
					$headers="From: operator@stdi.kz\r\nReply-To: operator@stdi.kz\r\nContent-type: text/html\r\ncharset=utf-8";
					//mail('operator@stdi.kz','Вызов менеджера',$text);
					include '../inc/smtp.php';
					$mail = new PHPMailer();
					$mail->Subject = 'Вызов менеджера';
					$mail->MsgHTML($text);
					$mail->AddAddress('zhanna.shleifer@stdi.kz');
					$mail->AddAddress('operator@stdi.kz');
					$mail->AddAddress('yana.sv87@gmail.com');
					$mail->AddAddress('chronoxp@yandex.kz');
					$mail->IsHTML(true);
					$mail->IsSMTP();
					$mail->Send();
					
				}					
			}
		}		
		
		echo json_encode(array(
			'fields'=>$fields,			
		));
	}

}