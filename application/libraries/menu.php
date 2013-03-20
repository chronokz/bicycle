<?php

class Menu {

	public static function link($path, $text){

		$class= '';
		if(URI::segment(1)==$path)
			$class=' class="active"';
		
		return '<li'.$class.'>'.HTML::link($path, $text).'<li>';
		 
	}

}