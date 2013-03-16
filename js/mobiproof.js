/*
---

name: Elements.multiFade

description: Sets full opacity to element that is moused over while dimming all other elements of same class.

license: MIT-style

requires: 
  - Core/Elements
  - Core/Fx.Tween

provides: Elements.multiFade

authors: [Michael Russell]

...
*/

Elements.implement({
	multiFade: function(opacity){
		var elems = this;
		if(!opacity) opacity = 0.4;
		this.addEvents({
			'mouseenter':	function(){
				elems.filter(function(item){
					if(item != this) return item;
				}.bind(this)).tween('opacity', opacity);
			},
			'mouseleave':	function(){
				elems.tween('opacity', 1);
			}
		});
	}
});



/*
name: mobiproofjs
description: Border effects and value management
license: Internet-mit-IQ GmBH
requires: Mootools core
authors: Yannic Beckmann
*/

function mobiproofjs()
{
	//Hovereffekte bei Screenshots setzen
	var screenlink = $$('#screens a');
	screenlink.multiFade();
	screenlink.addEvents({
		'mouseenter' : function(){
	    	$(this).morph({'border-color': '#999'});
		},'mouseleave' : function(){
	    	$(this).morph({'border-color': '#d0d0d0'});
		},
	});
	
	//Beim Focus und Blur Values setzen
	$$('#getProofForm input[type=text], #getProofForm textarea').addEvents({
    	'focus' : function(){
    		if (this.get('value') == this.defaultValue){this.set('value', '');}
    	},'blur' : function(){
    	 	if (this.get('value') == ''){this.set('value', (this.defaultValue));}
    	}
	});
//	$('submit').addEvent('click', function(evt){
//	    // Stops the submission of the form.
//	    new Event(evt).stop();
//	    
//	    // Sends the form to the action path,
//	    // which is 'script.php'
//	    //$('getProofForm').send();
//	});
}




