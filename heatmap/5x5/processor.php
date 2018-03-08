<?php
	#Color mapping
	$mapping = array();
	$mapping['b3ced7'] = '26748b';
	$mapping['7bbbcd'] = '429eb8';
	$mapping['86cbdf'] = '52b5d1';
	$mapping['91dbf0'] = '61cbe9';
	$mapping['97d0c9'] = '6abbb2';
	$mapping['9ec4a3'] = '74aa7b';
	$mapping['bfdba6'] = 'a4cb80';
	$mapping['e4b67f'] = 'd89748';
	$mapping['f19a81'] = 'eb6f4a';
	$mapping['eb7775'] = 'e23c39';

	#$unique = array();
	$img = imagecreatefrompng('heatmap.png');
	$w = imagesx($img);
	$h = imagesy($img);

	#Start from x = 1, y = 1 and move 5 pixels at a turn
	for ($yIndex = 0, $y = 1; $y < $h; $y += 5, $yIndex++) {
		for ($xIndex = 0, $x = 1; $x < $w; $x += 5, $xIndex++) {
			#Get RGB values
			$rgb = imagecolorat($img, $x, $y);
			$r = $rgb >> 16;
			$g = $rgb >> 8 & 255;
			$b = $rgb & 255;

			#Get HEX color
			$color = dechex($r) . dechex($g) . dechex($b);

			#Output div with data attribute
			echo '<div id="c' . $xIndex . 'x' . $yIndex . '" data-max="#' . $mapping[$color] . '"></div>';
			#$unique[] = $color;
		}
		echo '<br/>';
	}
	#$unique = array_unique($unique);
	#print_r($unique);
?>