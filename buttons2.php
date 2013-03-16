<?php
	
	$name = $_POST["name"];
	$color = $_POST["hintergrundfarbe"];
	
	//echo $name." ".$color."<br />";
	
	if ($color == "rot"){
		function generate_button(
						 $name,
						 $font = "/var/www/jsmolka/test/lesezeichen/arial.ttf",
						 $size = "15",
						 $padding_x = '15', 
						 $padding_y = '6'
						 )
		{
		$bbox = imagettfbbox($size, 0, $font, $name);
		$width = abs($bbox[2]) + 2*$padding_x;
		$height = $size + 2*$padding_y;
		$y = $height - $padding_y;
		$x = $padding_x;

			//echo $width." - ".$height."<br />";
		$image = imagecreatetruecolor ( $width+2, $height+2 );
		
		$bg_color  = ImageColorAllocate ($image, 255,0,0);
		$txt_color = ImageColorAllocate ($image, 0,0,0);
		imagefilledrectangle ($image, 1, 1, $width, $height, $bg_color);
		ImageTtfText($image, $size, 0, $x, $y, $txt_color, $font, $name);	
		
		imagegif ( $image, "gif/".$file_name.".gif" );
		
		echo "<img src='gif/".$file_name.".gif' /><br /><br />";
		}}
	if ($color == "grün"){
		function generate_button(
						 $name,
						 $font = "/var/www/jsmolka/test/lesezeichen/arial.ttf",
						 $size = "15",
						 $padding_x = '15', 
						 $padding_y = '6'
						 )
		{
		$bbox = imagettfbbox($size, 0, $font, $name);
		$width = abs($bbox[2]) + 2*$padding_x;
		$height = $size + 2*$padding_y;
		$y = $height - $padding_y;
		$x = $padding_x;
	
		$image = imagecreatetruecolor ( $width+2, $height+2 );
		
		$bg_color  = ImageColorAllocate ($image, 0,255,0);
		$txt_color = ImageColorAllocate ($image, 0,0,0);
		imagefilledrectangle ($image, 1, 1, $width, $height, $bg_color);
		ImageTtfText($image, $size, 0, $x, $y, $txt_color, $font, $name);	
		
		imagegif ( $image, "gif/".$file_name.".gif" );
		
		echo "<img src='gif/".$file_name.".gif' /><br /><br />";
		}}	
	if  ($color == "blau"){
		function generate_button(
						 $name,
						 $font = "/var/www/jsmolka/test/lesezeichen/arial.ttf",
						 $size = "15",
						 $padding_x = '15', 
						 $padding_y = '6'
						 )
		{
		$bbox = imagettfbbox($size, 0, $font, $name);
		$width = abs($bbox[2]) + 2*$padding_x;
		$height = $size + 2*$padding_y;
		$y = $height - $padding_y;
		$x = $padding_x;
	
		$image = imagecreatetruecolor ( $width+2, $height+2 );
		
		$bg_color  = ImageColorAllocate ($image, 0,0,255);
		$txt_color = ImageColorAllocate ($image, 255,255,255);
		imagefilledrectangle ($image, 1, 1, $width, $height, $bg_color);
		ImageTtfText($image, $size, 0, $x, $y, $txt_color, $font, $name);	
		
		imagegif ( $image, "gif/".$file_name.".gif" );
		
		echo "<img src='gif/".$file_name.".gif' /><br /><br />";
		}}
		
	if ($color == "abgerundet"){
		function generate_button(
						 $name,
						 $font = "/var/www/jsmolka/test/lesezeichen/arial.ttf",
						 $size = "15",
						 $padding_x = '15', 
						 $padding_y = '6'
						 
						 )
		{
		$bbox = imagettfbbox($size, 0, $font, $name);
		$width = abs($bbox[2]) + 2*$padding_x;
		$height = $size + 2*$padding_y;
		$y = $height - $padding_y;
		$x = $padding_x;

		
			//echo $width." - ".$height."<br />";
		
		$corner_left = imagecreatefromgif ('/var/www/jsmolka/test/buttongenerator/runde_ecken_links.gif');
		$oBreite_cl = imageSX($corner_left);
		$oHoehe_cl = imageSY($corner_left);
		$corner_left_trans = imagecreatetruecolor($oBreite_cl, $oHoehe_cl);
		$transparency = imagecolortransparent ($corner_left);
		List($r, $g, $b)= array_values (imagecolorsforindex($corner_left, $transparency));
		$transparency = imagecolorallocate ($corner_left_trans, $r, $g, $b);
		imagefill($corner_left_trans, 0, 0, $transparency);
		imagecolortransparent($corner_left_trans, $transparency);
		
		imagecopyresampled($corner_left_trans, $corner_left, 0, 0, 0, 0, $oBreite_cl, $oHoehe_cl, $oBreite_cl, $oHoehe_cl);
		imagegif($corner_left_trans, "gif/runde_ecken_links.gif");
		
		echo "<img src='gif/runde_ecken_links.gif'/>"; 
		
		$mittelteil = imagecreatefromgif ('/var/www/jsmolka/test/buttongenerator/mitte_blau.gif');
		$oBreite_mit = imageSX($mittelteil);
		$oHoehe_mit = imageSY($mittelteil);
		$mittelteil_neu = imagecreatetruecolor ($width, $oHoehe_mit);
		imageCopyResampled($mittelteil_neu, $mittelteil,
							0, 0,
							0, 0,
							$width, $oHoehe_mit,
							$oBreite_mit, $oHoehe_mit);
		imagegif($mittelteil_neu, "gif/".$file_name.".gif");
		
		echo "<img src='gif/".$file_name.".gif'/>";
		
		$corner_right = imagecreatefromgif ('/var/www/jsmolka/test/buttongenerator/runde_ecken_rechts.gif');
		$oBreite_cr = imageSX($corner_right);
		$oHoehe_cr = imageSY($corner_right);
		$corner_right_trans = imagecreatetruecolor($oBreite_cr, $oHoehe_cr);
		$transparency = imagecolortransparent ($corner_right);
		List($r, $g, $b)= array_values (imagecolorsforindex($corner_right, $transparency));
		$transparency = imagecolorallocate ($corner_right_trans, $r, $g, $b);
		imagefill($corner_right_trans, 0, 0, $transparency);
		imagecolortransparent($corner_right_trans, $transparency);
		
		imagecopyresampled($corner_right_trans, $corner_right, 0, 0, 0, 0, $oBreite_cr, $oHoehe_cr, $oBreite_cr, $oHoehe_cr);
		imagegif($corner_right_trans, "gif/runde_ecken_rechts.gif");
		
		echo "<img src='gif/runde_ecken_rechts.gif'/><br /><br />"; 
			
		$txt_color = ImageColorAllocate ($mittelteil, 8,8,121);
		ImageTtfText($mittelteil_neu, $size, 0, $x, $y, $txt_color, $font, $name);	
		imagegif ( $mittelteil_neu, "gif/".$file_name.".gif" ); 	
		
			
		$imgcompl = imagecreatetruecolor($oBreite_cl+$width+$oBreite_cr, $oHoehe_mit);
		imagefill($imgcompl, 0, 0, $transparency);
		imagecolortransparent($imgcompl, $transparency);
		imagecopy($imgcompl, $corner_left_trans, 0, 0, 0, 0, $oBreite_cl, $oHoehe_cl);
		imagecopy($imgcompl, $mittelteil_neu, $oBreite_cl, 0, 0, 0, $width, $oHoehe_mit);
		imagecopy($imgcompl, $corner_right_trans, $oBreite_cl+$width, 0, 0, 0, $oBreite_cr, $oHoehe_cr);
		
		imagegif($imgcompl, "gif/imgcompl.gif");
		echo "<img src='gif/imgcompl.gif'/><br /><br />";
		
		$imgcompl = imagecreatefromgif ('/var/www/jsmolka/test/buttongenerator/gif/imgcompl.gif');
		$oBreite = imageSX($imgcompl);
		$oHoehe = imageSY($imgcompl);
		
		$imgcomplresized = imagecreatetruecolor ($width, $height);
		imagefill($imgcomplresized, 0, 0, $transparency);
		imagecolortransparent($imgcomplresized, $transparency);
		imageCopyResampled($imgcomplresized, $imgcompl,
							0, 0,
							0, 0,
							$width, $height,
							$oBreite, $oHoehe);
							
										
							
		imagegif($imgcomplresized, "gif/imgcomplresized.gif");
	
	
	
		echo "<img src='gif/imgcomplresized.gif'/><br /><br />";
		
		}}
		
		if ($color == "verlauf"){
		function generate_button(
						 $name,
						 $font = "/var/www/jsmolka/test/lesezeichen/arial.ttf",
						 $size = "15",
						 $padding_x = '15', 
						 $padding_y = '6'
						 
						 )
		{
		$bbox = imagettfbbox($size, 0, $font, $name);
		$width = abs($bbox[2]) + 2*$padding_x;
		$height = $size + 2*$padding_y;
		$y = $height - $padding_y;
		$x = $padding_x;
		
		$im = imagecreatefromgif ('/var/www/jsmolka/test/buttongenerator/pfeil.gif');
		$oBreite_pf = imageSX($im);    
		$oHöhe_pf = imageSY($im); 
		$BILD2 = imagecreatetruecolor($oBreite_pf, $height);
		$transparency = ImageColorTransparent($im);
		List($r, $g, $b) = Array_Values (ImageColorsForIndex($im, $transparency));
		$transparency = ImageColorAllocate($BILD2, $r, $g, $b);
		Imagefill($BILD2, 0, 0, $transparency);
		ImageColorTransparent($BILD2, $transparency);

		
		imagecopyresized($BILD2, $im, 0, 0, 0, 0, $oBreite_pf, $height, $oBreite_pf, $oHöhe_pf);
		imagegif ( $BILD2, "gif/pfeil.gif" );
		
		
		$image = imagecreatefromjpeg ('/var/www/jsmolka/test/buttongenerator/bg.jpg');
		
		$oBreite_bg = imageSX($image);    
		$oHöhe_bg = imageSY($image);    

		
		$BILD = imageCreateTrueColor($width, $height);
				imageCopyResized($BILD, $image,
               0, 0,
               0, 0,
               $width, $height,
               $oBreite_bg, $oHöhe_bg);
		
		
		$txt_color = ImageColorAllocate ($image, 8,8,121);
		ImageTtfText($BILD, $size, 0, $x, $y, $txt_color, $font, $name);	
				
		imagegif ( $BILD, "gif/".$file_name.".gif" );
		
		echo "<img src='gif/pfeil.gif'/>"."<img src='gif/".$file_name.".gif' /><br /><br />";
		
		$imgcompl = imagecreatetruecolor($oBreite_pf+$width, $height);
		imagefill($imgcompl, 0, 0, $transparency);
		imagecolortransparent($imgcompl, $transparency);
		imagecopy($imgcompl, $BILD2, 0, 0, 0, 0, $oBreite_pf, $height);
		imagecopy($imgcompl, $BILD, $oBreite_pf, 0, 0, 0, $width, $height);
				
		imagegif($imgcompl, "gif/imgcompl.gif");
		
		
		//imagecopy ( $BILD2, $BILD, $x+$oBreite, 0, 0, 0, $width, $height);
				
		//imagegif ( $BILD2, "gif/test.gif" );
		echo "<img src='gif/imgcompl.gif'/>";
		}}
	
	
		
	if ($name == ""){
		echo "Bitte geben Sie Ihren Namen ein.<br />";
		} else {
		//echo $name."<br />";
		generate_button ($name);
		}
		

		
		
			
?>