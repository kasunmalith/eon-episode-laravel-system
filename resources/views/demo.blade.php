@extends('layout.mainlayout')
@section('title', 'Home')
@section('content')
<div id="loading-content" style="display: block">
	<div class="d-flex justify-content-center">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
</div>
<?php
//require 'modules/social_btns.php';
?>
<?php
require 'modules/light_gallery_home.php';
?>
<div class="row justify-content-md-center morephotography">
	<div class="vertical-line"></div>
	<div class="read-more"  onclick="window.location = '{{Request::root()}}/portfolio/photography';">
		<div class="moreinfo-animationline lftln"></div>
		<div class="moreinfo-animationline rghttln"></div>
		<div class="moreinfo-animationline toptln"></div>
		<div class="moreinfo-animationline btmtln"></div>
		see more about photography
	</div>
</div>
<?php require 'modules/descriptionandintrovideo.php'; ?>
<div class="row justify-content-md-center morephotography" style="margin-top: 42px;">
	<div class="read-more cinematography"  onclick="window.location = '{{Request::root()}}/portfolio/cinematography';">
		<div class="moreinfo-animationline lftln"></div>
		<div class="moreinfo-animationline rghttln"></div>
		<div class="moreinfo-animationline toptln"></div>
		<div class="moreinfo-animationline btmtln"></div>
		see more about cinematography
	</div>
</div>
<?php
require 'modules/two_hearts_beat_as_one.php';
?>
<div id="enjoy-day-1" class="row justify-content-md-center align-items-center">
	<div class="outer-bg lazy" data-src="img/enjoy-1.jpg"></div>
	<div class="col-7">
		<h3> YOU JUST ENJOY YOUR DAY! </h3>
		<div class="desc1">
			We make sure you enjoy seeing it later! 
		</div>
		<div class="read-more">
			<div class="moreinfo-animationline lftln"></div>
			<div class="moreinfo-animationline rghttln"></div>
			<div class="moreinfo-animationline toptln"></div>
			<div class="moreinfo-animationline btmtln"></div>
			read more
		</div>
	</div>
</div>
<?php
	require 'modules/testemonials.php';
?>
<div class="section-4-h">
	<div  class="row k-title   justify-content-md-center">
		<h4>Follow us on instagram</h4>
	</div>
	<div  class="row  sub-title justify-content-md-center">
		<div>
			@eon.episode
		</div>
	</div>
	<div  class="row">
		<?php
		require 'instagram/instagram_section.php';
		?>
	</div>
</div>
<div class="section-5-h">
	<div  class="row k-title   justify-content-md-center">
		<h4>Request a quotation</h4>
	</div>
	<div  class="row  sub-title justify-content-md-center">
		<div>
			We will get back to you soon :)
		</div>
	</div>
	<div  class="row">
		<?php
		require 'modules/quotation.php';
		?>
	</div>
</div>
<style>
	
</style>

@endsection 