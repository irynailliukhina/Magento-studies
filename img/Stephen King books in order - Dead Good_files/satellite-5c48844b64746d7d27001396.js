_satellite.pushAsyncScript(function(event, target, $variables){
  var list = document.getElementsByTagName('iframe');

for (var i=0; i<list.length; i++) {

	if (list[i].src.includes('w.soundcloud.com/player')) {

		var frameSrc = list[i].src.split('&')[0];

		console.log(frameSrc);

		var widget = SC.Widget(list[i]);

		/* -- Tracking Starts -- */

		widget.bind(SC.Widget.Events.READY, function() {
			
			/* Play */

      		widget.bind(SC.Widget.Events.PLAY, function() {
				ga('send', {
				  hitType: 'event',
				  eventCategory: 'Audio',
				  eventAction: 'Play',
				  eventLabel: frameSrc
				});
        	});

      		/* Finish playing */

      		widget.bind(SC.Widget.Events.FINISH, function() {
				ga('send', {
				  hitType: 'event',
				  eventCategory: 'Audio',
				  eventAction: 'Finish',
				  eventLabel: frameSrc
				});
       		});
       		
      	});

      	/* -- Tracking Ends -- */

	}
	
}
});
