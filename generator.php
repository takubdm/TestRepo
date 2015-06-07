<?php
	set_time_limit(0);
	//
	$base_image = $_POST['base_image'];
	$text = $_POST['text'];
	$src = $_POST['src'];
	//
	$im = imagecreatefrompng($base_image);
	$TEXT_COLOR = imagecolorallocate($im, 0, 0, 0);
	$FONT_PATH = "FONT01.ttf";
	//
	$text_lines = explode("\n", $text);
	switch (count($text_lines))
	{
		case 1:
			$text_top = 235;
			$text_size = 40;
			break;
		case 2:
			$text_top = 210;
			$text_size = 40;
			break;
		default:
			$text_top = 190;
			$text_size = 30;
			$text = implode("\n", array_slice($text_lines, 0, 3));
			break;
	}
	imagettftext($im, $text_size, 0, 160, $text_top, $TEXT_COLOR, $FONT_PATH, $text);
	//
	imagesavealpha($im, TRUE);
	imagepng($im, $src);
?>