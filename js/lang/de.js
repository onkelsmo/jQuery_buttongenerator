/*
---
script: formcheck.js

description:     A MooTools class that allows you to perform different tests on forms to validate them before submission.

authors:
  - fyrye (http://torntech.com)
  - weepaki
  - floor.ch (http://mootools.floor.ch)
  
copyright: Copyright (c) 2010-2011 

license:
  - MIT License

requires:
  core/1.2.4: '*'
  more/1.2.4.4:
      - Fx.Scroll

provides:
  - FormCheck
...
*/
formcheckLanguage = {
	required: "Dieses Feld ist obligatorisch.",
	alpha: "In diesem Feld sind nur Buchstaben zul&auml;ssig.",
	alphanum: "In diesem Feld sind nur Zahlen zul&auml;ssig.",
	nodigit: "Eingabe von Nummern nicht m&ouml;glich.",
	digit: "Nur Eingabe von Zahlen m&ouml;glich.",
	digitmin: "Die kleinstm&ouml;gliche Zahl ist %0.",
	digitltd: "Der Wert muss zwischen %0 und %1 liegen",
	number: "Geben Sie bitte eine g&uuml;ltige Zahl ein.",
	email: "Geben Sie bitte eine g&uuml;ltige E-mail ein.",
	phone: "Geben Sie bitte eine g&uuml;ltige Telefonnummer ein.",
	url: "Geben Sie bitte eine g&uuml;ltige Internetadresse ein.",
	
	confirm: "Das Feld ist verschieden von %0.",
	differs: "Der Wert muss unterschiedlich zu %0 sein.",
	length_str: "Das Feld ist verschieden von %0.",
	length_fix: "Falsche L�nge, es m�ssen exakt %0 Buchstaben sein.",
	lengthmax: "Der Wert ist nicht korrekt, maximale Anzahl Charakter %0.",
	lengthmin: "Der Wert ist nicht korrekt, minimale Anzahl Charakter %0.",
	checkbox: "Bitte aktivieren.",
	checkboxes_group : 'Bitte kreuzen Sie mindestens %0 Feld(er) an',
	radios: "Bitte einen Wert ausw&auml;hlen.",
	select: "Bitte einen Wert ausw&auml;hlen."
}