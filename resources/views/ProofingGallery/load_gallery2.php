<?php ini_set("memory_limit","512M"); ?><?php
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
		
		

		
 $client = Session::get('clients');
 $cilent_username = $client[0];
 $s_uid = $client[1];		
		
		
		
 $directory = "proofing_gallery/{$cilent_username}";
 // $directory = "proofing_gallery/test1";
$images = glob($directory . "/*.{jpg,JPG,jpeg,JPEG,png,PNG}",GLOB_BRACE);
natsort($images);
//$images=array_reverse($images);

$ArrayImageCount = count($images);

$splitlevel = $datavalue*10;
$outputImages = array_slice($images, $splitlevel); 


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

	
	
	
		?>
		<div class="grid-item" style="max-width: 400px;width: 25%;min-height: 300px;" >
			<div class="inside-item" data-src="<?php echo Request::root();?>/<?php  echo $image;?>">
				
				<img class="lazy" src="<?php echo Request::root();?>/<?php  echo $thumbdest;?>" width="400" />
				<div class="filename">
						<?php  echo $filename;?>
						</div>
			</div>
		</div>
		<?php
		$acount++;
		}
$datavalue++;
		?>
<?php if(count($outputImages)!=0){ ?>
	<script>
		var btn = '<div id="load_more2" class="read-more " data-value="<?php echo $datavalue; ?>"><div class="moreinfo-animationline lftln"></div><div class="moreinfo-animationline rghttln"></div><div class="moreinfo-animationline toptln"></div><div class="moreinfo-animationline btmtln"></div>Load More</div>';
		
	
				var $grid = $('.grid').masonry({
		// options...
		itemSelector : '.grid-item',

		percentPosition : true

	});
   $grid.masonry('layout');
			$(".proofing_galley .morephotography").html(btn);

		
	</script>

	<?php	} ?>