<?php 
	$home_video_row = DB::table('home_video')->where('id', 1)->first();
			$image_preview_url = $home_video_row->image_preview_url;
			$video_link = $home_video_row->video_link;
			?>





<div class="row section-1-h  justify-content-md-center">
	<div  id="desc-logo1">
		<img class="lazy" data-src="img/eon-web-logo-dark.png" />
	</div>
	<h1>The Eon Episode ~ Fineart Wedding Photographer, Cinematographer based in Colombo, Sri Lanka.</h1>
	<p>
		The Eon Episode is here to eternalize the biggest day of your life. Each and every photo and video we take speak a thousand words; timeless, speechless, and frozen in time.<br><br><span style="    font-style: italic;">SRI LANKA - QATAR - NEW ZEALAND - AUSTRALIA</span>
		<br>
		<img style="    width: 100px;
		margin-top: 29px;" class="lazy" data-src="img/page-end.png" />
	</p>
</div>
<div  class="row section-2-h  justify-content-md-center">
	<div class="lf-2"></div>
	<div class="video-1-h justify-content-md-center lazy" data-src="img/<?php echo $image_preview_url; ?>">
		<div id="video-1-h-play" class="borderwriter1 col-md-auto">
			<img src="img/play.png" />
			<input type="text" value="100" id="" class="dial2" data-width="100"
			data-displayInput=false>
		</div>
		<video id="video-1-h" width="400" controls>
			<source src="<?php echo Request::root(); ?>/videos/<?php echo $video_link;?>" type="video/mp4">

			Your browser does not support HTML5 video.
		</video>
	</div>
</div>