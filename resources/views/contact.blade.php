<!DOCTYPE html>
<html lang="en">
 <head>
 	@section('title', 'Contact Us')
   @include('layout.partials.head')
 </head>
 <body class="bodyloading">
 	<div class="contact_us container-fluid">
@include('layout.partials.nav')

<div class="row">
	<div class=" container-fluid">
	
	<div class="row">
		

<iframe id="google_map" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=eon episode&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

	
	</div>
	</div>
	<div class=" container">
		<div  class="row k-title   justify-content-md-center">
		<h4>Contact Us</h4>
	</div>
	
	<div class="row">
		<div class="col contact_details">
			<div class="row">
				<div class="col"><?php
require 'modules/social_btns.php';
?></div>
			</div>
			
			<div class="row contact_row">
				<div class="col"><h4>Address :</h4><h5>The Eon Episode, <br>No. 369/1, <br>Pipe Rd, <br>Koswatta, Battaramulla</h5></div>
			</div>
			<div class="row contact_row">
				<div class="col"><h4>Call us : </h4><h5> 0719 33 53 67, 0117 20 25 25</h5></div>
			</div>
			<div class="row contact_row">
				<div class="col"><h4>Email :</h4><h5>  weddings@eonepisode.com</h5></div>
			</div>
		</div>
		<div class="col"><div class="section-5-h">

	
	<div  class="row">
		<?php
		require 'modules/quotation.php';
		?>
	</div>
</div></div>
	</div>
	
	
</div>
</div>

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


@include('layout.partials.footer')

@include('layout.partials.footer-scripts')
</div>
<style>


 .fixed-menu-started {
    margin-top: 100px !important;
}
</style>
 </body>
</html>