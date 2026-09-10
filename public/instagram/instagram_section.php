
<?php

	
	
//https://www.instagram.com/oauth/authorize?client_id=2433834730050088&redirect_uri=https://content-xy.net/portfolio&scope=user_profile,user_media&response_type=code

// app id = 253819452670873
/*
$client_id = '2433834730050088';
    $client_secret ='';
        $redirect_uri = 'https://content-xy.net/portfolio';
    $code ='AQCzxkSfyF7hNo5Fhe9yApSdoOwC2J35U4fUQSDcq96fJb2w7dKTqI3Yt9PsmlPYSwh_6zYvBIeIvm0a1m4KTIFNB2F5Jhr49hbV9oxN08pdu-Tm7SXEKIA3hweYaB37lNKmKdTXPumAWB1v5yWh5MANSKa2vcgEdXVeMmuXlqkPgOVBw6jQ6BYQ2My7pUh-z6CcMK26WvHxdzjqyb6PfGA6DshupzOoRDd7CQzrNXCWPg';

    $url = "https://api.instagram.com/oauth/access_token";
    $access_token_parameters = array(
        'client_id'                =>     $client_id,
        'client_secret'            =>     $client_secret,
        'grant_type'               =>     'authorization_code',
        'redirect_uri'             =>     $redirect_uri,
        'code'                     =>     $code
    );

$curl = curl_init($url);    // we init curl by passing the url
    curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
    curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
    $result = curl_exec($curl);   // to perform the curl session
    curl_close($curl);   // to close the curl session

     var_dump($result);


*/	
/*
		$inst_token = DB::table('inst_token')->orderBy('id', 'asc')->get();
		foreach ($inst_token as $value) {
			
			$access_token = $value->token;
		}
	 	
 
    
try{
   	
	

 $app_id = 2433834730050088;
$user_id=17841408556692503; //eon episode
$fileds="id,media_url,media_type,permalink,shortcode,thumbnail_url,timestamp";



 $url="https://graph.instagram.com/{$user_id}?fields=media_count&access_token={$access_token}";
$curl = curl_init($url);    // we init curl by passing the url
    curl_setopt($curl,CURLOPT_HTTPGET,true);   // to send a POST request
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
    $result = curl_exec($curl);   // to perform the curl session
    curl_close($curl);   // to close the curl session

$data = json_decode($result, true);

$media_count=$data['media_count'];
$file = 'instagram/post_count.txt';

$myfile = fopen($file, "r") ;
$oldMedia_count = fgets($myfile);
fclose($myfile);


  //if(true){

if($media_count!=$oldMedia_count){
 	
 	
$data = $media_count;
file_put_contents($file, $data);

 	//save new media count to database
 	
 	
$url="https://graph.instagram.com/{$user_id}/media?fields={$fileds}&access_token={$access_token}";
	
	
   	$curl = curl_init($url);    // we init curl by passing the url
    curl_setopt($curl,CURLOPT_HTTPGET,true);   // to send a POST request
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
     $result = curl_exec($curl);  
	  curl_close($curl);   // to close the curl session
	  
$data = json_decode($result, true);
$z=0;
foreach ($data['data'] as $post) {
	
	 $id = $post['id'];
	 $media_type = $post['media_type'];
	if($media_type=="IMAGE"){
	$media_url= $post['media_url'];
	 $permalink= $post['permalink'];
	 $timestamp= $post['timestamp'];
	 
	?>
	
	 <?php
	 	 
$image_info = getimagesize($media_url); 
$imageWidth = $image_info[0];
$imageHeight = $image_info[1];
 $ratio= ($imageHeight/$imageWidth);
 
if(($ratio<=1.26)&&($ratio>=1.20)){
	
?>
	<div class="col insta-post" ><a style=""  href="<?php echo $permalink; ?>" target="_blank"><img class="lazy" data-src="<?php echo $media_url; ?>"   /></a> </div>
	 <?php
	 
	 $permalinkpart = str_replace("https://www.instagram.com/p/", "", $permalink);
	  $permalinkpart = str_replace("/", "", $permalinkpart);
	  
	 
	   $timestamppart = str_replace(":", "-", $timestamp);
	   
	$filename= "{$permalinkpart}__{$timestamppart}.jpg";

		$ch = curl_init($media_url);
$fp = fopen("instagram/{$filename}", 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

$src="instagram/{$filename}";
$img_url=Request::root()."/".$src;
$dst="instagram/resized/{$filename}";

 //$exists = file_exists($thumbdest);
// if(!$exists){
 
make_thumb($src, $dst, 650);
//}
if($z==3){
	 	break;
	 }
$z++;
}
}
	
}
 	
 }else{
 	///////////////////////////////////////////
require 'instagram/virtual_insta.php';	


	
	////////////////////////////////////////////
 }
}catch(Exception $e){
 require 'instagram/virtual_insta.php';	  	
   //	print_r($e);
 }
    
   
  


























*/










?>