$(function(){
		
$('.lazy').Lazy(
	{
		effect: 'fadeIn',
		scrollDirection: 'vertical',
		visibleOnly: true
	}
);	

	var screenWidth = $(window).width();
	// returns width of browser viewport
	var screenHeight = $(window).height();
	// returns height of browser viewport
var sliderHeight = 0.5017391304347826*screenWidth;
	$('.adjusttoscreen').height(sliderHeight);

	if(screenWidth >= 992) {
		$('#carouselExampleCaptions .carousel-inner').addClass("adjusttoscreen");

	} else {
		$('#carouselExampleCaptions .carousel-inner').addClass("adjusttoscreen");
	}

	$(".menu-btn").click(function() {
		$('#navbarSupportedContent').collapse('toggle');
		$('#navbarSupportedContent .collapse').collapse('hide');
	});

	$(".collapse-toggle").hover(function() {
		$(this).children(".collapse").collapse('toggle');
	});

	$('.carousel').carousel({
		interval : 700000,
		touch : true
	})

	var cccc = '"char"';
	var ssss = '""';
	$(".image1 h5, .image2 h5, .image3 h5, .image4 h5 , .image5 h5 ").html(function(index, html) {
		return html.replace(/\S/g, '<span class=' + cccc + ' style=' + ssss + '>$&</span>');
	});
	var x = 0;
	var inc = 20;
	$(".image1 .char").each(function() {
		$(this).attr("style", "animation-delay:" + x + "ms");
		x = x + 50;
	})
	var x = 0;
	var inc = 20;
	$(".image2 .char").each(function() {
		$(this).attr("style", "animation-delay:" + x + "ms");
		x = x + 50;
	})
	var x = 0;
	var inc = 20;
	$(".image3 .char").each(function() {
		$(this).attr("style", "animation-delay:" + x + "ms");
		x = x + 50;
	})
	var x = 0;
	var inc = 20;
	$(".image4 .char").each(function() {
		$(this).attr("style", "animation-delay:" + x + "ms");
		x = x + 50;
	})
	var x = 0;
	var inc = 20;
	$(".image5 .char").each(function() {
		$(this).attr("style", "animation-delay:" + x + "ms");
		x = x + 50;
	})

	$("#video-1-h-play").click(function() {
		$(this).hide();
		$("#video-1-h").fadeIn();
		$("#video-1-h").get(0).play()

	});

	$(".dial2").knob({
		'release' : function(v) { /*make something*/
		},
		"fgColor" : "#fff",
		"thickness" : 0.05,
		"width" : 150,
		"height" : 150,
		"fgColor" : "rgba(0,0,0,0.5)"
	});
	var type = "decrement";
	setInterval(function() {

		var n = $(".dial2").val();

		if(type == "decrement") {
			$(".dial2").val(n--);
			$('.dial2').val(n).trigger('change');

			if(n == 0) {
				type = "increment";
			}

		}
		if(type == "increment") {
			$(".dial2").val(n++);
			$('.dial2').val(n).trigger('change');

			if(n == 100) {
				type = "decrement";
			}

		}

	}, 20);
	setInterval(function() {
		var screenWidth = $(window).width();
		// returns width of browser viewport
		var screenHeight = $(window).height();
		// returns height of browser viewport

		$(".fortesting").html(screenHeight);

		if(screenHeight <= 400) {
			$("body").addClass("small-screen-height");
		} else {
			$("body").removeClass("small-screen-height");
		}
var sliderHeight = 0.5017391304347826*screenWidth;
		$('.adjusttoscreen').height(sliderHeight);

		if(screenWidth >= 992) {
			$('#carouselExampleCaptions .carousel-inner').addClass("adjusttoscreen");

		} else {
			$('#carouselExampleCaptions .carousel-inner').addClass("adjusttoscreen");
		}

if($('#video-1-h').length){
	//alert("div has");
	
	if($("#video-1-h").get(0).paused) {

			$("#video-1-h").fadeOut(function() {
				$("#video-1-h-play").show();
			});
		}
		
		
}else{
	//alert("nodiv");
}
		
		

		var vwidth = $(".video-1-h").width();
		var vheight = $(".video-1-h").height();

		var ratio = 1.775480059084195;
		var newHeight = vwidth / ratio;

		$(".video-1-h").height(newHeight)

 var enjoyd = screenHeight/1.542345276872964;
$("#enjoy-day-1").height(enjoyd);

	}, 300);
	var $grid = $('.grid').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});
	//$grid.layout();

	// layout Masonry after each image loads
	$grid.imagesLoaded().progress(function() {
		$grid.masonry('layout');
	});

	$("#clickme").click(function() {

		$grid.masonry('layout');

	});

	$(document).on('click','#load_more', function() {
$("#loading-icon1").show();
var dataValue=$(this).attr("data-value");
$(this).remove();
		// append new item elements
		//var $items = $('<div class="grid-item"><img src="9.jpg" /></div>');
		// append items to grid
		// $grid.append( $items ).masonry( 'appended', $items );
		// append new item elements end

		//ajax
		 $.get( '../load_gallery1?datavalue='+dataValue, function( content ) {
		// wrap content in jQuery object
	 var $content = $( content );
		// add jQuery object
		$grid.append( $content ).masonry( 'appended', $content );
		
		
		$grid.masonry('layout');
		$("#loading-icon1").hide();
		
		$("#masonryGrid .grid").data('lightGallery').destroy(true);
		
			$("#masonryGrid .grid").lightGallery({
		selector : '.inside-item'
	});
		
		});
		//ajax end

	});
	$(document).on('click','#load_more2', function() {
$("#loading-icon1").show();
var dataValue=$(this).attr("data-value");
$(this).remove();
		// append new item elements
		//var $items = $('<div class="grid-item"><img src="9.jpg" /></div>');
		// append items to grid
		// $grid.append( $items ).masonry( 'appended', $items );
		// append new item elements end

		//ajax
		 $.get( '../load_gallery2?datavalue='+dataValue, function( content ) {
		// wrap content in jQuery object
	 var $content = $( content );
		// add jQuery object
		$grid.append( $content ).masonry( 'appended', $content );
		
		
		$grid.masonry('layout');
		$("#loading-icon1").hide();
		
		$("#masonryGrid .grid").data('lightGallery').destroy(true);
		
			$("#masonryGrid .grid").lightGallery({
		selector : '.inside-item'
	});
		
		});
		//ajax end

	});
	
		$(document).on('click','#load_more_couplename', function() {
$("#loading-icon1").show();
var dataValue=$(this).attr("data-value");
var couplename=$('#selUser').val();
var couplename = encodeURIComponent(couplename);
$(this).remove();
		// append new item elements
		//var $items = $('<div class="grid-item"><img src="9.jpg" /></div>');
		// append items to grid
		// $grid.append( $items ).masonry( 'appended', $items );
		// append new item elements end

		//ajax
		 $.get( '../load_gallery_couple_name2?datavalue='+dataValue+'&couplename='+couplename, function( content ) {
		// wrap content in jQuery object
	 var $content = $( content );
		// add jQuery object
		$grid.append( $content ).masonry( 'appended', $content );
		
		
		$grid.masonry('layout');
		$("#loading-icon1").hide();
		
		$("#masonryGrid .grid").data('lightGallery').destroy(true);
		
			$("#masonryGrid .grid").lightGallery({
		selector : '.inside-item'
	});
		
		});
		//ajax end

	});
	
	  	$(document).on('click','#but_read', function() {
	  		$("#load_more").remove();
$("#loading-icon1").show();
var couplename=$('#selUser').val();
 $grid.masonry( 'remove', $grid.find('.grid-item') );
		// append new item elements
		//var $items = $('<div class="grid-item"><img src="9.jpg" /></div>');
		// append items to grid
		// $grid.append( $items ).masonry( 'appended', $items );
		// append new item elements end

		//ajax
		var couplename = encodeURIComponent(couplename);
		 $.get( '../load_gallery_couple_name?couplename='+couplename, function( content ) {
		// wrap content in jQuery object
	 var $content = $( content );
		// add jQuery object
		$grid.append( $content ).masonry( 'appended', $content );
		
		
		$grid.masonry('layout');
		$("#loading-icon1").hide();
		
		$("#masonryGrid .grid").data('lightGallery').destroy(true);
		
			$("#masonryGrid .grid").lightGallery({
		selector : '.inside-item'
	});
		
		
		});
		//ajax end

	});
	
	$("#masonryGrid .grid").lightGallery({
		selector : '.inside-item'
	});
	$('#video-gallery').lightGallery(); 
	
	
		var screenWidth = $(window).height();
	$(window).scroll(function(){
		 screenHeight = $(window).height();
    var scrollPos = $(document).scrollTop();
   var masonryGridHeight =  $("#masonryGrid").height();
   var main_header =  $(".main-header").height();
   var k_title =  $(".k-title").height();
   
   var pagebottom = screenHeight+scrollPos;
   var gridbottom = masonryGridHeight+main_header+k_title;
   
 if(gridbottom<=pagebottom){
    	$("#load_more").click();
    	$("#load_more2").click();
    	$("#load_more_couplename").click();
    };
    

         if(200<scrollPos){
     	$(".row.main-header").addClass("fixed-menu");
     	$("body").addClass("fixed-menu-started");
     }else{
     	$(".row.main-header").removeClass("fixed-menu");
     	$("body").removeClass("fixed-menu-started");
     }
    
    if(screenHeight+250<scrollPos){
    	$(".row.main-header").addClass("fixed-menu-show");
    	$(".row.main-header").addClass("addtrans");
    	
    }else{
    	$(".row.main-header").removeClass("fixed-menu-show");
    	
    	
    }
    
      if((300)>scrollPos){
    	$(".row.main-header").removeClass("addtrans");}
    
    
  //  console.log(scrollPos);
});
	
	$('#quotation1 .datepicker1').datepicker({
		 format: "yyyy-mm-dd"
});
	
	$("#quotation1").ajaxForm({
	
		type : "POST",
		dataType : 'html',
		success(data){
			$("#temp-div").append(data);
		}
		});
	

});
$(window).on('load', function () {
	var $grid = $('.grid').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});
   $grid.masonry('layout');
 
 });

setInterval(function() {
	
	var $grid = $('.grid').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});
   $grid.masonry('layout');
},1200)


$(window).on('scroll', function() {

 var visible1 = $(".row.section-1-h.justify-content-md-center").visible(true);
 
 if(visible1){
$(".row.section-1-h.justify-content-md-center").addClass('add_test1animation');

 
 }else{

 }
 
});

$(function(){
	
	
setInterval(function(){
	var $grid2 = $('#video-gallery').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});

},2000)
})
$(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();


  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
});
