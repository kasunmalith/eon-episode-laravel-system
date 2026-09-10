<div id="page-header" class="row">
	
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
		<div id="slider-top" style="width: 100%;
    height: 263px;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 2;
    background-image: url(img/slider-top2.png);
    background-repeat: repeat;
    opacity: 0.6;"></div>
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active ">
				<div class="spin">
					<div class="bullet-li"></div>
				</div>
			</li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1" class="">
				<div class="spin">
					<div class="bullet-li"></div>
				</div>
			</li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2" class="">
				<div class="spin">
					<div class="bullet-li"></div>
				</div>
			</li>
			<li data-target="#carouselExampleCaptions" data-slide-to="3" class="">
				<div class="spin">
					<div class="bullet-li"></div>
				</div>
			</li>
			<li data-target="#carouselExampleCaptions" data-slide-to="4" class="">
				<div class="spin">
					<div class="bullet-li"></div>
				</div>
			</li>
		</ol>
		<div class="carousel-inner">
			
			
			<?php
			
			$slides = DB::table('main_slider')->get();
$i=1;
function usortTest($a, $b) {
  
    return -1;
}

usort($slides, "usortTest");

foreach ($slides as $slide ){
    $title=$slide->title;
	
$small_title= $slide->small_title;
 $read_more_link=$slide->read_more_link;
 $image_link=$slide->image_link;
  $text_colour=$slide->colour;
  $bg_position_from_left=$slide->bg_position_from_left;
  if($text_colour=="dark"){
  	$colour="3e3e3e";
  	  	$filter = "filter: brightness(0.3);";
  	
  }else if($text_colour=="light"){
  	$colour="ffffff";
$filter = "filter: brightness(1);";
  }

 $image_info = getimagesize($image_link); 
$imageWidth = $image_info[0];
$imageHeight = $image_info[1]; 
  
  if($imageWidth>$imageHeight){
  	$imageStyle = "landscape";
  }else{
  	$imageStyle = "portrait";
  }

 ?>
 <div class="{{$imageStyle}} carousel-item  custom-csskm <?php if($i==1){ echo "active";} ?> " style="background-image: url(<?php echo  $slide->image_link; ?>);background-position: {{$bg_position_from_left}}% 35%;">
				<div class="carousel-caption  d-md-block">
					<div class="inside_caption" style="color: #{{$colour}}">
						<img class="love" src="{{ asset('img/love-1.png') }}" style="{{$filter}}" />
						<h5>{{$title}}</h5>
						<p>
							{{$small_title}}
						</p>
						<div class="read-more" onclick="window.open('//{{$read_more_link}}');" style="border-color: #{{$colour}}">
							<div class="moreinfo-animationline lftln" style="background-color: #{{$colour}}"></div>
							<div class="moreinfo-animationline rghttln" style="background-color: #{{$colour}}"></div>
							<div class="moreinfo-animationline toptln" style="background-color: #{{$colour}}"></div>
							<div class="moreinfo-animationline btmtln" style="background-color: #{{$colour}}"></div>
							read more
						</div>
					</div>
				</div>
			</div>
 <?php
 $i++;
}

			 ?>
</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div> 
</div>


