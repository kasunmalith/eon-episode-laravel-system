<!DOCTYPE html>
<html lang="en">
 <head>
 	@section('title', 'About Us')
   @include('layout.partials.head')
 </head>
 <body class="bodyloading">
 	<div class="about_us container-fluid">
@include('layout.partials.nav')


<div id="enjoy-day-1" class="row justify-content-md-center align-items-center">
	<div class="outer-bg lazy" data-src="img/enjoy-1.jpg"></div>
	<div class="col-7">
		<div  id="desc-logo1">
		<img class="lazy" data-src="img/eon-web-logo-white.png" />
	</div>
	
		<h3> The Eon Episode ~ Fineart Wedding Photographer, Cinematographer based in Colombo, Sri Lanka. </h3>
		
		
	</div>
</div>

<div class="row section-1-h  justify-content-md-center">
	
	
	<p>
		The Eon Episode is here to eternalize the biggest day of your life. Each and every photo and video we take speak a thousand words; timeless, speechless, and frozen in time.<br><br><span style="    font-style: italic;">SRI LANKA - QATAR - NEW ZEALAND - AUSTRALIA</span>
		<br>
		<img style="    width: 100px;
		margin-top: 29px;" class="lazy" data-src="img/page-end.png" />
	</p>
</div>



<?php require 'modules/two_hearts_beat_as_one.php'; ?>


<?php require 'modules/testemonials.php'; ?>



<div class="container fb-pages">
	<div class="row justify-content-md-center">
		
    <div class="d-flex justify-content-center">    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Feonepisode%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=287861587920885" width="500" height="500" style="overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>

	

    
	</div>
</div>



@include('layout.partials.footer')

@include('layout.partials.footer-scripts')
</div>

<style>
	
.section-3-h{
	    margin-bottom: 70px;
}

.about_us .outer-bg{
	      background-position: 50% 31%;
}
.about_us .row.k-title{
	margin-top: 30px;
}

</style>



 </body>
</html>