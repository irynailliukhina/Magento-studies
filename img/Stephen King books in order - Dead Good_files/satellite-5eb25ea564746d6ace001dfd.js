_satellite.pushAsyncScript(function(event, target, $variables){
  if (!$(this).is('.dropdown-item, .ad-link')) {
	var href = $(this).attr('href');
	var retailers = {
		'Amazon': 'amazon', 
		'Audible': 'audible', 
		'Foyles': 'foyles', 
		'Google Play': 'play.google.com', 
		'Hive': 'hive', 
		'iBooks': 'ibooks', 
		'iTunes': 'itunes', 
		'Kobo': 'kobo', 
		'Penguin Shop': 'shop.penguin.co.uk', 
		'Waterstones': 'waterstones'
	};
	for (var retailer in retailers) {
	    if (retailers.hasOwnProperty(retailer)) {           
	        if(href.indexOf(retailers[retailer]) > -1) {
	        	ga('send', {
					hitType: 'event',
					eventCategory: 'Buy book',
					eventAction: 'Text link',
					eventLabel: retailer
				});
	    	}
		}
	};
}
});
