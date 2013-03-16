<?PHP
/**
 * 
 * Klasse, die alle benötigten Attribute bekommt, ein vorab GIF erstellt und dann den Button generiert (Ausgabe als GIF)
 * @author jsmolka
 * @since 2011	
 *
 */
class button{
	
	var $titel;
	var $font;
	var $size;
	var $padding_x;
	var $padding_y;
	var $bbox;
	var $width;
	var $height;
	var $x;
	var $y;
	var $image;
	var $bg_color;
	var $txt_color; 
	var $file_name;
	var $left;
	var $right;
	var $top;
	var $bottom;
	
	/**
	 * 
	 * Methode setzt die benötigten Attribute und berechnet geforderte Attribute
	 * @param string $name
	 * @param float $fontsize
	 * @param integer $X_padding
	 * @param integer $Y_padding
	 * @param string $fontstyle
	 * @param integer $left
	 * @param integer $right
	 * @param integer $top
	 * @param integer $bottom
	 */
	public function setAttributes($name, $fontsize, $X_padding, $Y_padding, $fontstyle, $left, $right, $top, $bottom)
	{
		$this->titel = $name;
		$this->font = "ttf/".$fontstyle."";
		$this->size = $fontsize;
		$this->padding_x = $X_padding;
		$this->padding_y = $Y_padding;
		$this->bbox = imagettfbbox($this->size, 0, $this->font, $this->titel);
		$this->width = abs($this->bbox[2]) + 2*$this->padding_x;
		$this->height = $this->size + 2*$this->padding_y;
		$this->x = $this->height - $this->padding_y;
		$this->y = $this->padding_x;
		$this->left = $left;
		$this->right = $right;
		$this->top = $top;
		$this->bottom = $bottom;
	}
	
	/**
	 * 
	 * Methode zur Erstellung des Grundbildes und Festlegung der Farben für Text und Hintergrund
	 * @param integer $r_bg
	 * @param integer $g_bg
	 * @param integer $b_bg
	 * @param integer $r_txt
	 * @param integer $g_txt
	 * @param integer $b_txt
	 */
	public function preCreationDefault($r_bg, $g_bg, $b_bg, $r_txt, $g_txt, $b_txt)
	{
		$this->image = imagecreatetruecolor ( $this->width+$this->right, $this->height+$this->bottom );
		$this->bg_color = ImageColorAllocate ($this->image, $r_bg, $g_bg, $b_bg);
		$this->txt_color = ImageColorAllocate ($this->image, $r_txt, $g_txt, $b_txt); 
		//$this->file_name = $name;
	}

	public function preCreationUserBG($userBG)
	{
		//TODO
		$this->image = imagecreatetruecolor ($this->width+$this->right, $this->height+$this->bottom);
		$this->bg_color = imagecreatefromjpeg($userBG);
	}
	
	/**
	 * 
	 * Methode zum Erzeugen und Ausgeben des GIF-Files + Download Möglichkeit 
	 */
	public function generate_button()
	{
		imagefilledrectangle ($this->image, $this->left, $this->top, $this->width, $this->height, $this->bg_color);
		ImageTtfText($this->image, $this->size, 0, $this->y, $this->x, $this->txt_color, $this->font, $this->titel);	
		imagegif ( $this->image, "gif/".$this->file_name.".gif" );	
		echo "<img src='gif/".$this->file_name.".gif' /><br /><br />";
		echo "Klicken Sie <a href='gif/".$this->file_name.".gif'>hier</a> um den Button als GIF herunterzuladen.";
		echo "<br /><br /><a href='buttons.php'>Zur&uuml;ck</a>";
	}
}
		

?>