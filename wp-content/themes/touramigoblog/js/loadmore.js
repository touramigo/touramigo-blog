jQuery(function($){
	$(window).scroll(function(){
		var bottomOffset = 1000; 


		var data = {
			'action': 'loadmore',
			'query': true_posts,

			'page' : current_page
		};
		if( $(document).scrollTop() > ($(document).height() - bottomOffset) && !$('body').hasClass('loading')){

			$.ajax({
				url:ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr){
					$('body').addClass('loading');

				},
				success:function(data){
					if( data ) { 
	
						$('#true_loadmore').before(data);

						$('body').removeClass('loading');
				current_page++;
					}
				}
			});
		}
	});
});