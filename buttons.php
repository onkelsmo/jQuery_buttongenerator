<head>
<title>PHP - Buttongenerator</title>

<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/farbtastic.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script src="js/languages/jquery.validationEngine-de.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="css/farbtastic.css" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/main.css" type="text/css" />

<script type="text/javascript">
$(document).ready(function() {
    $('#bg_colorpicker').farbtastic('#bg_color');
    $('#txt_colorpicker').farbtastic('#txt_color');
    $("#buttons").validationEngine();
});
</script>

</head>
<body>
<strong>Buttongenerator</strong>
<?php
$handle = opendir("ttf");

$fontname = array();

while ($datei = readdir ($handle)) 
{
	if(substr($datei, -3) == 'ttf')
	{
		$fontname[] = "<option>".$datei."</option>";
	}
}

closedir($handle);
?>
<br />
<br />
<form id="buttons" action="buttons_ini.php" method="post" enctype="multipart/form-data">
	<table border=0px cellpadding="5px">
		<tr>
			<td>
				Name:<br />
				<input class="validate[required] text-input" type="text" id="name" name="name" value="" size="10">
			</td>
		</tr>
		<tr>
			<td>
				Schriftart ausw&auml;hlen<br />
    			<select class="schriftart" name="schriftart" id="schriftart">
      			<?php print_r($fontname);?>
    			</select>
			</td>
		</tr>
		<tr>
			<td>
				Schriftgr&ouml;sse:<br />
				<input class="validate[required,custom[integer] text-input" id="size" type="text" name="size" value="20" size="10">
			</td>
			<td>
				Border? (schwarz)<br />
				<input type="radio" name="border" value="ja" checked="checked" />Ja<br />
				<input type="radio" name="border" value="nein" />Nein<br />
			</td>
		</tr>
		<tr>
			<td>
				Padding links und rechts:<br />
				<input class="validate[required,custom[integer] text-input" id="padx" type="text" name="padx" value="15" size="10">
			</td>
			<td>
				Padding oben und unten:<br />
				<input class="validate[required,custom[integer] text-input" id="pady" type="text" name="pady" value="5" size="10">
			</td>
		</tr>
		<tr>
			<td>
				<p>Hintergrundfarbe:</p>
				<div id="bg_colorpicker"></div><input id="bg_color" value="#000000" name="bg_color" type="text" class="bg_color"/>
			</td>
			<td>
				<p>Textfarbe:</p>
				<div id="txt_colorpicker"></div><input id="txt_color" value="#ffffff" name="txt_color" type="text" class="txt_color"/>
			</td>
		</tr>
		<tr>
			<td>
				<br /><input type="submit" value="erzeugen" />
			</td>
		</tr>
	</table>
</form>
<form class="uploads" id="uploads" action="" method="post" enctype="multipart/form-data">
	<table border=0px  cellpadding="5px">
		<tr>
			<td>
				<span>eigene TTF-Schriftart hochladen</span><br />
				<input type="file"  name="urfile" />
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Upload" /> 
				<?php 
				if(isset($_FILES['urfile']))
				{
					$file_parts = pathinfo($_FILES['urfile']['name']);
					$importFile = 'ttf/'.$_FILES['urfile']['name'];
					if($file_parts["extension"] == 'ttf')
					{
						$upLoaded = copy($_FILES['urfile']['tmp_name'], $importFile);
						echo "Upload erfolgreich!";
					}else{
						echo "Bitte nur True Type Fonts hochladen!";
					}
				}
				?>
			</td>
		</tr>
	</table>
</form>
<form class="userBG" id="userBG" action="" method="post" enctype="multipart/form-data">
	<table border=0px cellpadding="5px">
			<tr>
			<td>
				<?php
				$handle=opendir ("bgjpg");
				$jpgname = array();
				while ($datei = readdir ($handle)) 
				{
					if(substr($datei, -3) == 'ttf')
					{
						$jpgname[] = "<option>".$datei."</option>";
					}
				}
				closedir($handle);
				?>
				Schriftart ausw&auml;hlen<br />
    			<select class="schriftart" name="schriftart" id="schriftart">
      			<?php print_r($jpgname);?>
    			</select>
			</td>
		</tr>
		<tr>
			<td>
				<span>oder eigenes Hintergrundbild hochladen</span><br />
				<input type="file" name="urBG" />
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Upload" />
				<?php 
				if(isset($_FILES['urBG']))
				{
					$file_parts = pathinfo($_FILES['urBG']['name']);
					$importFile = 'bgjpg/'.$_FILES['urBG']['name'];
					if($file_parts["extension"] == 'jpeg' || $file_parts["extension"] == 'jpg')
					{
						$upLoaded = copy($_FILES['urBG']['tmp_name'], $importFile);
						echo "Upload erfolgreich!";
					}else{
						echo "Bitte nur JPG's hochladen!";
					}
				}
				?>
			</td>
		</tr>
	</table>

</form>
</body>


