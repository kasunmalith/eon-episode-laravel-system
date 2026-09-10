<?php 
$x=0;
	$directory = "instagram/resized";
$images = glob($directory . "/*.jpg");
sort($images);
foreach($images as $image){
 
    $filename = str_replace($directory."/", "", $image);
   
   $timestampNpermarlinkpart = explode("__",$filename);
    $permalinkpart=$timestampNpermarlinkpart[0];
	$permalink = "https://www.instagram.com/p/".$permalinkpart;
   $timestamppart=$timestampNpermarlinkpart[1];
   $timestamppart = str_replace(".jpg", "", $timestamppart);
   $timestamppartArray = explode("T",$timestamppart);
   $date=$timestamppartArray[0];
    $timepart = $timestamppartArray[1];
	$time = str_replace("-", ":", $timepart);
    $media_url=$image;
     $timestamp=$date." ".$time;
    $timestamp =explode("+", $timestamp);
	 $timestamp= $timestamp[0];
   $timeasval =  strtotime($timestamp);
   $timeasvals[$x]['timeval']=$timeasval;
    $timeasvals[$x]['media_url']=$media_url;
	 $timeasvals[$x]['permalink']=$permalink;
  //$permalink=$image;
 
  
	  $x++;
}
rsort($timeasvals);
$y=0;
foreach($timeasvals as $timeasval){
	
	$timeval = $timeasval['timeval'];
	$media_url = $timeasval['media_url'];
	$permalink=$timeasval['permalink'];
	
	?>
	<div class="col insta-post" ><a style=""  href="<?php echo $permalink; ?>" target="_blank"><img class="lazy" data-src="<?php echo $media_url; ?>"   /></a> </div>
	 <?php
	 if($y==3){
	 	break;
	 }
	 $y++;
}



?>