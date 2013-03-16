<head>
<title>PHP - Buttongenerator</title>

</head>
<body>
<strong>Buttongenerator</strong><br /><br />
<?php

require  'buttons_classes.php';


$name = $_POST["name"];
$fontsize = $_POST["size"];
$X_padding = $_POST["padx"];
$Y_padding = $_POST["pady"];
$fontstyle = $_POST["schriftart"];
$border = $_POST["border"];

if($border == 'nein')
{
	$left = 0;
	$right = 0;
	$top = 0;
	$bottom = 0;
}else{
	$left = 1;
	$right = 2;
	$top = 1;
	$bottom = 2;
}

$color = $_POST["bg_color"];
     $r_bg = base_convert(substr($color, 1, 2), 16, 10);
     $g_bg = base_convert(substr($color, 3, 2), 16, 10);
     $b_bg = base_convert(substr($color, 5, 2), 16, 10);

$txt_color = $_POST["txt_color"];
	$r_txt = base_convert(substr($txt_color, 1, 2), 16, 10);
    $g_txt = base_convert(substr($txt_color, 3, 2), 16, 10);
    $b_txt = base_convert(substr($txt_color, 5, 2), 16, 10);

    
	$button = new button;
	$button->setAttributes($name, $fontsize, $X_padding, $Y_padding, $fontstyle, $left, $right, $top, $bottom);
	
	$button->preCreationDefault($r_bg, $g_bg, $b_bg, $r_txt, $g_txt, $b_txt);
	$button->generate_button();

?>
</body>