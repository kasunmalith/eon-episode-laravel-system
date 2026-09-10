<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\admin;
use DB;
use Validator;
class adminController extends Controller {
	

		public function refreshGallery(Request $request){
			
			$refreshGallery = DB::table('home_gallery')->lists('image_url');
			
foreach($refreshGallery as $image_url){
	
	if (!file_exists($image_url)) {
			DB::table('home_gallery')->where('image_url',$image_url)->delete();
	}
	
}
			
		}
		
	public function proofingGallery(Request $request){
		$proofing_gallerycount = DB::table('proofing_gallery')->where('username', $request->username)->count();

$stat=0;

if($proofing_gallerycount==0){
$filename="proofing_gallery/".$request->username;
	if (!file_exists($filename)) {
			mkdir($filename);
	}
 $stat=DB::table('proofing_gallery')->insert(
    [
    'username' => $request->username, 
    'password' => $request->pwd
    
    ]
);

$stat = "1";
?>

<script>
	$(".updatealert center").html("Updated");
</script>
<?php
}else{
?>
<script>
	$(".updatealert center").html("username exist");
</script>
<?php	
}
	}
	
	
public function login(){
		return view('admin.login');
	}	
public function check(Request $request){
	
	//print_r($request);
	$email= $request->email;
	$password= $request->password;
		//return view('admin.admin');				
 if (Auth::attempt(['email' => $email, 'password' => $password])){
        //   $user = Auth::user();
          return redirect('/admin-panel/');
        }else{
        	return back()->withInput();				  
        }
	
	}




	public function index(){
		
		if(Auth::check()){
			return view('admin.index');
		}else{			
			 return redirect('/admin-panel/login');
		}	
	}

public function logout(){
Auth::logout();
 return redirect('/admin-panel/');
}

public function sliderStore(Request $request){



/*
 DB::table('main_slider')->insert(
    [
    'title' => $request->_title, 
    'small_title' => $request->_small_title,
     'read_more_link' => $request->_read_more_link,
      'image_link' => $request->_image_link
    ]
);

 * */



	$stat=DB::table('main_slider')
            ->where('id', $request->id)
            ->update([
 'title' => $request->_title, 
    'small_title' => $request->_small_title,
     'read_more_link' => $request->_read_more_link,
      'image_link' => $request->_image_link,
      'colour' => $request->_colour,
      'bg_position_from_left' => $request->bg_position_from_left
            ]);
			
			return $stat;

}

public function homeGallery(Request $request){

$request->image_url;
$request->couple_name;
$request->event_type;
$request->options;
$home_gallerycount = DB::table('home_gallery')->where('image_url', $request->image_url)->count();

$stat=0;

if($home_gallerycount==0){
	
 $stat=DB::table('home_gallery')->insert(
    [
    'image_url' => $request->image_url, 
    'couple_name' => $request->couple_name,
     'event_type' => $request->event_type,
      'featured' => $request->options
    ]
);

$stat = "1";

}else{
	
$stat=DB::table('home_gallery')
            ->where('image_url', $request->image_url)
            ->update([
 'image_url' => $request->image_url, 
    'couple_name' => $request->couple_name,
     'event_type' => $request->event_type,
      'featured' => $request->options
    
            ]);

$stat = "1";
}

return $stat;

}

public function homeVideo(Request $request){
	
	$request->image_preview_url;
	$request->video_link;

	$stat=DB::table('home_video')
            ->where('id', 1)
            ->update([
 'image_preview_url' => $request->image_preview_url, 
    'video_link' => $request->video_link
     
            ]);
			
			return $stat;

}

public function addTestemonial(Request $request){
	$request->db_id;
	
	$request->t_img_url;
	$request->t_date;
	$request->t_para;
	$request->t_couple_name;
	
	$request->formid;
	if($request->db_id=="0"){
		
		  $getDbId=DB::table('testemonials')->insertGetId(
    [
    't_img_url' => $request->t_img_url, 
    't_date' => $request->t_date,
     't_para' => $request->t_para,
     't_couple_name' => $request->t_couple_name
    ]
);

?>
<script>
	
	$("#<?php echo $request->formid;?> .db_id").val("<?php echo $getDbId;?>");
	
	</script>

<?php

	}else{
	
		 $stat=DB::table('testemonials')
            ->where('id', $request->db_id)
            ->update([
 't_img_url' => $request->t_img_url, 
    't_date' => $request->t_date,
     't_para' => $request->t_para,
     't_couple_name' => $request->t_couple_name
    
            ]);
	}

}

public function quotation(Request $request){
	$request->name;
	$request->email;
	$request->date;
	$request->location;
	$request->tell_us_more;
	$request->contact_no;
	
	$getDbId=0;
	
$validator = Validator::make(
    [
        'name' => $request->name,
       'date'=> $request->date,
        'email' => $request->email,
        'location' => $request->location,
        'tell_more' => $request->tell_us_more,
        'contact_no' => $request->contact_no
    ],
    [
        'name' => 'required|min:3',
       'date'=> 'date|required|after:today',
        'email' => 'required|email',
        'location' => 'required|min:2',
        'tell_more' => 'string',
        'contact_no' => 'required|min:9|alpha_num'
    ]
);

	 $messages = $validator->messages();	
	if($validator->fails()){
		$messagesArray = json_decode($messages);
		
		if (property_exists($messagesArray, 'name')){
				?>
	<script>
	$(".valid-feedback.name").hide();
	$(".invalid-feedback.name").html('<?php  print_r($messagesArray->name[0]);?>');
	$(".invalid-feedback.name").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.name").fadeOut();
	},7000)	
	</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.name").fadeIn();
			</script> 			
			<?php
		}	
		if (property_exists($messagesArray, 'email')){
				?>
	<script>
	$(".valid-feedback.email").hide();
	$(".invalid-feedback.email").html('<?php  print_r($messagesArray->email[0]);?>');
	$(".invalid-feedback.email").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.email").fadeOut();
	},7000)	
	</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.email").fadeIn();
			</script> 			
			<?php
		}	
		if (property_exists($messagesArray, 'date')){
				?>
	<script>
	$(".valid-feedback.date").hide();
	$(".invalid-feedback.date").html('<?php  print_r($messagesArray->date[0]);?>');
	$(".invalid-feedback.date").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.date").fadeOut();
	},7000)	
	</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.date").fadeIn();
			</script> 			
			<?php
		}	
		if (property_exists($messagesArray, 'location')){
				?>
	<script>
	$(".valid-feedback.location").hide();
	$(".invalid-feedback.location").html('<?php  print_r($messagesArray->location[0]);?>');
	$(".invalid-feedback.location").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.location").fadeOut();
	},7000)	
</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.location").fadeIn();
			</script> 			
			<?php
		}	
		if (property_exists($messagesArray, 'tell_us_more')){
				?>
	<script>
	$(".valid-feedback.tell_us_more").hide();
	$(".invalid-feedback.tell_us_more").html('<?php  print_r($messagesArray->tell_us_more[0]);?>');
	$(".invalid-feedback.tell_us_more").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.tell_us_more").fadeOut();
	},7000)	
	</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.tell_us_more").fadeIn();
			</script> 			
			<?php
		}	
		if (property_exists($messagesArray, 'contact_no')){
				?>
	<script>
	$(".valid-feedback.contact_no").hide();
	$(".invalid-feedback.contact_no").html('<?php  print_r($messagesArray->contact_no[0]);?>');
	$(".invalid-feedback.contact_no").fadeIn();
	setTimeout(function(){
		$(".invalid-feedback.contact_no").fadeOut();
	},7000)
	</script>
	<?php
		}else{
			?>			
	<script>
			$(".valid-feedback.contact_no").fadeIn();
			</script> 
			<?php
		}
	}
	///////////////////////////////////////////////////////////////
	if(!$validator->fails()){		  $getDbId=DB::table('quotations')->insertGetId(
    [
    'name' => $request->name, 
    'email' => $request->email,
     'date' => $request->date,
     'location' => $request->location,
      'tell_us_more' => $request->tell_us_more,
       'contact_no' => $request->contact_no
    ]
);


///////////////////////////send email

function sendMail($to,$from,$subject,$htmlBody){
	//send mail


$headers = "From:" . $from;
$headers = "From: {$from}" . "\r\n" .
'X-Mailer: PHP/' . phpversion();
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message = "<html><head></head><body>
{$htmlBody}
</body>
</html>
";

//if($subject=="testnew"){return mail($to,$subject,$message,$headers);}
if(1){
return mail($to,$subject,$message,$headers);
}else{
	return false;
}
}


$name = $request->name;
$htmlBody="
 Name : {$request->name}<br> 
    Email : {$request->email}<br>
     Date : {$request->date}<br>
     Location : {$request->location}<br>
      Tell Us More : {$request->tell_us_more}<br>
       Contact No : {$request->contact_no}<br>
";
sendMail("@gmail.com","@eonepisode.com","New Wedding - {$name}",$htmlBody);
sendMail("eon.@gmail.com","@eonepisode.com","New Wedding - {$name}",$htmlBody);
//////////////////////////



}
	
	
	

if($getDbId>0){
?>
<script>
	
	
	$("#quotation1 .submit-btn").val("Sent!");
	$("#quotation1 .valid-feedback").hide();
	$("#quotation1 input[type='text']").val("");
	$("#quotation1 .submit_done").fadeIn();
	setTimeout(function(){
		$("#quotation1 .submit-btn").val("send");
	},5000)
	
	
	</script>

<?php
}
}



public function changeInstaToken(Request $request){
	$request->token;
	
	$stat=DB::table('inst_token')
          
            ->update([

      'token' => $request->token
            ]);
		echo $stat;	
}
public function cinematography(Request $request){
	$request->db_id;
	
	$request->thumb_url;
	$request->youtube_link;
	$request->title;
	$request->t_couple_name;
	
	$request->formid;
	if($request->db_id=="0"){
		
		  $getDbId=DB::table('cinematographys')->insertGetId(
    [
    'thumb_url' => $request->thumb_url, 
    'youtube_link' => $request->youtube_link,
     'title' => $request->title,
     't_couple_name' => $request->t_couple_name
    ]
);

?>
<script>
	
	$("#<?php echo $request->formid;?> .db_id").val("<?php echo $getDbId;?>");
	
	</script>

<?php

	}else{
	
		 $stat=DB::table('cinematographys')
            ->where('id', $request->db_id)
            ->update([
 'thumb_url' => $request->thumb_url, 
    'youtube_link' => $request->youtube_link,
     'title' => $request->title,
     't_couple_name' => $request->t_couple_name
    
            ]);
	}

}

}
