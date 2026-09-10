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



		 if($couplename=="all"){
			$couplephotos = DB::table('home_gallery')->lists('image_url');
		 }else{
		 	$couplephotos = DB::table('home_gallery')->where('couple_name',$couplename)->lists('image_url');
		 }
			
		
	
$directory = "gl1";		
		
		
natsort($couplephotos);


$ArrayImageCount = count($couplephotos);
$splitlevel = $datavalue*10;
$outputImages = array_slice($couplephotos, $splitlevel); 




$acount=0;
foreach ($outputImages as  $image) {
	if($acount==10){break;}
	$filename = str_replace($directory."/", "", $image);
	
$thumbdest=$directory."/thumb/thumb_".$filename;
$desired_width=500;
 $exists = file_exists($thumbdest);
 if(!$exists){
 	
	
make_thumb($image, $thumbdest, $desired_width);	
 }


$home_gallery_count = DB::table('home_gallery')->where('image_url', $image)->count();

	if(!empty($home_gallery_count)){
		$home_gallery_row = DB::table('home_gallery')->where('image_url', $image)->first();
	$couple_name = $home_gallery_row->couple_name;
	$event_type = $home_gallery_row->event_type;
	}else{
		$couple_name="";
		$event_type="";
	}
	
	
		?>
		<div class="grid-item" style="max-width: 400px;width: 25%;min-height: 300px;" >
			<div class="inside-item" data-src="<?php echo Request::root();?>/<?php  echo $image;?>">
				<div class="text-holder-outer">
					<div class="text-holder">
						<h5><?php echo $event_type; ?></h5>
						<div class="couple-name">
						<?php echo $couple_name; ?>
						</div>
						<div class="animation-line"></div>
					</div>
				</div>
				<img class="lazy" src="<?php echo Request::root();?>/<?php  echo $thumbdest;?>" width="400" />
			</div>
		</div>
		<?php
		$acount++;
		}
$datavalue++;
if(count($outputImages)!=0){ 
	
	?>
	<script>
		var btn = '<div id="load_more_couplename" class="read-more " couple-name="<?php echo $couplename;?>" data-value="<?php echo $datavalue;?>"><div class="moreinfo-animationline lftln"></div><div class="moreinfo-animationline rghttln"></div><div class="moreinfo-animationline toptln"></div><div class="moreinfo-animationline btmtln"></div>Load More</div>';
		
	
				var $grid = $('.grid').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});
   $grid.masonry('layout');
			$(".portfolio .morephotography").html(btn);

		
	</script>
	<?php
	
	
}
		?>
