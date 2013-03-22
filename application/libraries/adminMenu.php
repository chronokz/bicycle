<?php

class AdminMenu{

	public static $items = array();
	public static $sub_items = array();
	public static $url_admin = 'admin/';
	protected static $index = 0;

	public static function addItem($icon, $text, $link = false)
	{
		++ static::$index;
		static::$items[static::$index] = array(
				'icon' => $icon,
				'text' => $text,
				'link' => $link
			);
	}

	public static function addSubItem($text, $link)
	{
		static::$sub_items[static::$index][] = array(
				'text' => $text,
				'link' => $link
			);
	}

	public static function getCurrentItem()
	{
		//array_search()
	}

	public static function compile($attributes=array())
	{
		$result = '<ul'.HTML::attributes($attributes).'>';
		foreach (static::$items as $i=>$item) {
			$link = '';
			$active = false;
			if($item['link'] !== false)
				$link = ' href="'.url(static::$url_admin.$item['link']).'"';
			if(URI::segment(2) == $item['link'] && $item['link'] !== false)
				$active = true;

			$sub_items = static::compile_submenu($i);

			if($sub_items['active'])
				$active = true;
			
			$result .= '<li'.($active?' class="active"':'').'>';
				$result .= '<a'.$link.'><i class="icon-'.$item['icon'].' icon-white"></i>
				<span>'.$item['text'].'</span></a>';
				$result .= $sub_items['result'];
			$result .= '</li>';			
		}
		$result .= '</ul>';

		return $result;
	}

	protected static function compile_submenu($item_id = 0)
	{
		$result = '';
		$active = false;
		
		if (isset(static::$sub_items[$item_id]))
		{
			$result .= '<ul class="subnav">';
			foreach (static::$sub_items[$item_id] as $sub_item) {
				if(URI::segment(2) == $sub_item['link'])
				{
					$active = true;
					$active_li = true;
				}
				else
				{
					$active_li = false;
				}

				$result .= '<li'.($active_li?' class"active"':'').'>
								<a href="'.url($sub_item['link']).'">'.$sub_item['text'].'</a>
							</li>';
			}
			$result .='</ul>';
		}

		return array('result' => $result, 'active' => $active);
	}

}