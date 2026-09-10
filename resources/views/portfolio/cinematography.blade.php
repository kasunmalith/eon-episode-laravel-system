<!DOCTYPE html>
<html lang="en">
 <head>
 		@section('title', 'Cinematography')
   @include('layout.partials.head')
 </head>
 <body class="bodyloading">
 	<div class="cinematography container-fluid">
@include('layout.partials.nav')


<div class="row k-title   justify-content-md-center">
		<h4>Portfolio - Cinematography</h4>
	</div>
		



<div id="video-gallery">
  
  
  <?php
  
 
				$cinematographys = DB::table('cinematographys')->orderBy('id', 'asc')->get();
$value=1;


	foreach ($cinematographys as $cinematography) {
			$id = $cinematography->id;
		$thumb_url = $cinematography->thumb_url;
		$youtube_link = $cinematography->youtube_link;
		
		$title = $cinematography->title;
		$t_couple_name = $cinematography->t_couple_name;
	

      
	  ?>
	  <a class="grid-item" href="<?php echo $youtube_link;?>" >
	  	
	  	<div class="text-holder-outer">
					<div class="text-holder">
						<h5><?php echo $title;?></h5>
						<div class="couple-name">
						<?php echo $t_couple_name;?></div>
						<div class="animation-line"></div>
					</div>
				</div>
	  	
	  	
	  	<div class="play-video"><img src="http://eonepisode.com/img/play.png"></div>
	  	  <img class="thumb" src="<?php echo $thumb_url;?>" />
    
     </a>
	  <?php
	  
  }
   ?>
  
  
  
 
</div>






@include('layout.partials.footer')

@include('layout.partials.footer-scripts')
</div>

<style>
	
	
	
	
	
	
	
	
	
	
	
	

</style>



 </body>
</html>