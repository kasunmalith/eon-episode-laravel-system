<!DOCTYPE html>
<html lang="en">
 <head>
 	
 	@section('title', 'Photography')
   @include('layout.partials.head')
 </head>
 <body class="bodyloading">
 	<div class="portfolio container-fluid">
@include('layout.partials.nav')


<div class="row k-title   justify-content-md-center">
		<h4>Portfolio - Photography</h4> 		 	
	</div>

<div class="select-search row  justify-content-md-center"><select id='selUser' style='width: 250px;'>
	<option value='all'>All</option> 
<?php 	$home_gallery_couple_names = DB::table('home_gallery') ->orderBy('couple_name', 'asc')
                    ->groupBy('couple_name')
                    
                    ->get();
	
foreach($home_gallery_couple_names as $home_gallery_couple_name){
	 $couple_name = $home_gallery_couple_name->couple_name;
	?>
	<option value='{{$couple_name}}'>{{$couple_name}}</option> 
	<?php
}

	
	
	?>
</select><input  class="submit-btn" type='button' value='Select Couple' id='but_read'></div>

<style>

</style>




<br/>
<div id='result'></div>

<?php
require 'modules/light_gallery_photography.php';
?>







@include('layout.partials.footer')

@include('layout.partials.footer-scripts')
</div>

<style>
	


</style>



 </body>
</html>