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

	#Color tu number mapping
	$colorToNumber = array();
	$colorToNumber['26748b'] = 0;
	$colorToNumber['429eb8'] = 1;
	$colorToNumber['52b5d1'] = 2;
	$colorToNumber['61cbe9'] = 3;
	$colorToNumber['6abbb2'] = 4;
	$colorToNumber['74aa7b'] = 5;
	$colorToNumber['a4cb80'] = 6;
	$colorToNumber['d89748'] = 7;
	$colorToNumber['eb6f4a'] = 8;
	$colorToNumber['e23c39'] = 9;

	#Number to color mapping
	$numberToColor = array_flip($colorToNumber);

	$img = imagecreatefrompng('heatmap.png');
	$w = imagesx($img);
	$h = imagesy($img);

	#Start from x = 1, y = 1 and move 5 pixels at a turn (the original grid is 5x5)
	for ($y = 1; $y < $h; $y += 5) {
		#Output 5 vertical pixels per iteration
		for ($line1 = 0; $line1 < 5; $line1++) {
			for ($x = 1; $x < $w; $x += 5) {
				#Get RGB values
				$rgb = imagecolorat($img, $x, $y);
				$r = $rgb >> 16;
				$g = $rgb >> 8 & 255;
				$b = $rgb & 255;
				#Get HEX color
				$color = dechex($r) . dechex($g) . dechex($b);
				#Output 5 horizontal pixels per iteration
				for ($line2 = 0; $line2 < 5; $line2++) {
					#Each pixel has +/- 2 colors noise
					$colorIndex = $colorToNumber[$mapping[$color]];
					$finalColor = ($colorIndex == 0) ? 0 : ($colorIndex + rand(-2, 2));
					$finalColor = $numberToColor[max(0, min($finalColor, 9))];
					echo '<div style="background-color:#' . $finalColor . '"></div>';
				}
			}
			echo '<br/>';
		}
	}
?>