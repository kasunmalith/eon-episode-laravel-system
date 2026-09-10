<?php ini_set("memory_limit","512M"); ?>
<!DOCTYPE html>
<html lang="en">
 <head>
 	@section('title', 'Proofing Gallery')
   @include('layout.partials.head')
 </head>
 <body class="bodyloading">
 	<div class="proofing_galley container-fluid">
@include('layout.partials.nav')



<?php if(Session::has('clients')){
	 $client = Session::get('clients');
 $cilent_username = $client[0];
 $s_uid = $client[1];

 ?>

<div class="row k-title   justify-content-md-center">
		<h4>PROOFING GALLERY - {{$cilent_username}}</h4>
	</div>
<div id="masonryGrid" style="">
	<div class="grid">
		<!-- <div class="grid-sizer" style=""><img src="1 (2).jpg" width="400" />
		</div> -->
		<?php
function make_thumb($src, $dest, $desired_width) {

    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
    
    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}
		
		

		
		
		
		
		
 $directory = "proofing_gallery/{$cilent_username}";
$images = glob($directory . "/*.{jpg,JPG,jpeg,JPEG,png,PNG}",GLOB_BRACE);

natsort($images);
//$images=array_reverse($images);
$acount=0;
foreach ($images as  $image) {
	if($acount==10){break;}
	$filename = str_replace($directory."/", "", $image);
	
$thumbdest=$directory."/thumb/thumb_".$filename;
$desired_width=500;
 $exists = file_exists($thumbdest);
 
$folder="{$directory}/thumb";
$existsf = file_exists($folder);
 if(!$existsf){
mkdir($folder);
 }
 
 
 if(!$exists){
 	
	
make_thumb($image, $thumbdest, $desired_width);	
 }




	
	
	
		?>
		<div class="grid-item" style="max-width: 400px;width: 25%;min-height: 300px;" >
			<div class="inside-item" data-src="<?php echo Request::root();?>/<?php  echo $image;?>">
				
					
						
						
				
				
				<img class="lazy" data-src="<?php echo Request::root();?>/<?php  echo $thumbdest;?>" width="400" />
				
						<div class="filename">
						<?php  echo $filename;?>
						</div>
			</div>
		</div>
		<?php
		$acount++;
		}
		?>
	</div>
	<div class="row justify-content-md-center morephotography" style="margin-top: 42px;" >
	<div id="load_more2" class="read-more " data-value="1">
		<div class="moreinfo-animationline lftln"></div>
		<div class="moreinfo-animationline rghttln"></div>
		<div class="moreinfo-animationline toptln"></div>
		<div class="moreinfo-animationline btmtln"></div>
		Load More
	</div>
	
</div>
<div id="loading-icon1" class="row justify-content-md-center " style="margin-top: 10px;display: none" >
<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
		</div>
</div>


















<?php }else{
	?>
	<div id="enjoy-day-1" class="row justify-content-md-center align-items-center">
	<div class="outer-bg lazy" data-src="img/enjoy-1.jpg"></div>
	<div class="col-7">
		
	<h2 style="    letter-spacing: 9px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 39px;"> PROOFING GALLERY</h2>
		<h3> Select your photos for the wedding book</h3>
		
		<form method="post" action="<?php echo Request::root();?>/proofing-gallery/submit7">
			<input class="text" type="text" name="username" placeholder="USERNAME" /><br>
			<input class="text" type="password" name="pwd" placeholder="PASSWORD" /><br>
			<div><input class="submit" type="submit" value="Submit" /></div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
		
		
	</div>
</div>
	<?php
	
} ?>





@include('layout.partials.footer')

@include('layout.partials.footer-scripts')
</div>

<style>

.proofing_galley form .submit {    outline: none;
	background: none;
    color: #fff;
    border: 0px;
    text-transform: uppercase;
    font-size: 13px;
}


.proofing_galley form input.text{line-height: 30px;
	    width: 350px;
    outline: none;
    background: none;
    border: 0px;
    color: #fff;
    border-bottom: 1px solid #fff;
    margin-bottom: 20px;
    letter-spacing: 3px;
    font-size: 11px;
    opacity: 0.9;
	
}
.proofing_galley form input::placeholder {
  color: #fff;
 letter-spacing: 3px;
    font-size: 11px;
    opacity: 0.9;
}
.proofing_galley form input::selection {

}


.proofing_galley #enjoy-day-1 h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 26px;
    letter-spacing: 0px;
    margin-bottom: 50px;
}	


.proofing_galley .outer-bg{
	       background-position: 50% 130%;
}


 .fixed-menu-started {
    margin-top: 100px !important;
}

.proofing_galley .k-title h4{
	    margin-top: 45px;
    margin-bottom: 75px;
	}


.proofing_galley #menu-main .nav-link{
	color: #000;
    text-shadow: 4px 2px 7px #fff;
}
  .proofing_galley .nav-link:hover .animation-line{
    	    background: #666;
    }
       .proofing_galley .nav-link .animation-line{
    	    background: #666;
    }
.proofing_galley  .main-header .eon-logo {
  background: url(../img/eon-web-logo-dark.png) no-repeat;
    background-size: 100%;
    }

  .proofing_galley  .main-header{
    	position: relative;
    }
    
    .proofing_galley .inside-item:hover img, .proofing_galley .grid-item:hover thumb {
    transform: scale(1) !important;
    opacity: 0.8
}
    .filename{
    	   font-size: 12px;
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: Muli,sans-serif;
    color: #666;
    background: #eee;
    padding: 6px;
    }
    
</style>



 </body>
</html>