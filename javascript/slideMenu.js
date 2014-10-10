$(window).load(function(){
	$('click').on('click',function() {
	    if($('#slidemenu').css('left')=='0px'){
	        $('#slidemenu').animate({left: '-320px'}, 500);        
	    }else{
	        $('#slidemenu').animate({left:0}, 500); 
	    }
	});

	$('click2').on('click',function() {
	    if($('#slideright').css('right')=='0px'){
	        $('#slideright').animate({right: '-300px'}, 500);        
	    }else{
	        $('#slideright').animate({right:0}, 500); 
	    }
	});
}); 