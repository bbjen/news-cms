


 
// DOM Loaded 
$(function(){ 
     
    //init js styles 
    $('body').addClass('hasJS'); 
     
	 
    // homepage cycles 
    $('#feature_gallery .bigimg').wrapAll('<div class="bigimgs">').parents('#feature_gallery').prepend('<ul class="menu" id="feature_gallery_pager">').cycle({ 
        fx:'scrollLeft', 
        easing: 'swing', 
        inDelay:    250, 
        drop:       40, 
        timeout:    5000, 
        pause:      true,
		before:  onBefore,
        slideExpr: '.bigimg', 
        pager:      '#feature_gallery_pager', 
        pagerAnchorBuilder: function(idx, slide) { 
          
            return '<li><a href="#"><img src="'+slide.title+'" class="thumb"><span></span></a></li>';  
        } 
		
    });
	
$(function() {
    jQuery('#feature_gallery_pager').jcarousel({
        scroll:1
    });
});

	
function onBefore() { 
    $('#output').html(this.id); 
} 	
     
}); 
 
/* Window load event (things that need to wait for images to finish loading) */ 
//equal heights 

 
