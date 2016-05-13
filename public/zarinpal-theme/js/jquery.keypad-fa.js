/* http://keith-wood.name/keypad.html
   Turkish localisation for the jQuery keypad extension
   Written by Yücel Kandemir(yucel{at}21bilisim.com) September 2010. */
(function($) { // hide the namespace
	$.keypad.regionalOptions['fa'] = {
		buttonText: '...', buttonStatus: 'باز کن',
		closeText: 'ببند', closeStatus: 'صفحه کلید را ببند',
		clearText: 'پاک کن', clearStatus: 'تمیز کن',
		backText: 'تصحیح', backStatus: 'قبلی رو پاک کن',
		shiftText: 'بزرگ کن', shiftStatus: 'با حروف بزرگ بنویس',
		spacebarText: '&nbsp;', spacebarStatus: '',
		enterText: 'وارد کن', enterStatus: '',
		tabText: '→', tabStatus: '',
    	alphabeticLayout: $.keypad.qwertyAlphabetic,
	    fullLayout: $.keypad.qwertyLayout,
    	isAlphabetic: $.keypad.isAlphabetic,
	    isNumeric: $.keypad.isNumeric,
		toUpper: $.keypad.toUpper,
    	isRTL: false};
	$.keypad.setDefaults($.keypad.regionalOptions['fa']);
})(jQuery);
