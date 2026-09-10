@section('title', 'Admin - Panel')
<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layout.partials.head')
	</head>
	<body class="">
		<div class="container-fluid" style="padding-top: 30px;    max-width: 95%;">
			<div class="row" style="">
				<div class="col-sm">
					Hello, Welcome <?php
					$user = Auth::user();

					echo $username = $user -> username;
					?>
				</div>
				<div class="col-sm">
					<h3>Admin Panel</h3>
				</div>
				<div class="col-sm">
					<form method="get"  action="<?php echo Request::root();?>/admin-panel/logout">
						<input type="submit" value="log out" />
					</form>
				</div>
			</div>
			<div class="row" id="main-slider-section">
				<div class="col">
					<div class=" alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-main-slider" aria-expanded="false" aria-controls="collapse-main-slider">
						Main slider<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					
					<div class="collapse" id="collapse-main-slider">
					<div class="card card-body">
						
				
						<div class="row">
							<div class="col-s">
								Slider #
							</div>
							<div class="col">
								Large Title
							</div>
							<div class="col">
							Small Title
							</div>
							<div class="col">
								Read More Link
							</div>
							<div class="col">
								Image Link
							</div>
							<div class="col">
								Text Colour (dark/light)
							</div>
							<div class="col">
								image from left (bg position) ( mobile affective)
							</div>
						</div>
						
					
						
						
						
					<?php
					
$slides = DB::table('main_slider')->get();
$value=1;
function usortTest($a, $b) {
  
    return -1;
}

usort($slides, "usortTest");

foreach ($slides as $slide ){
    $title=$slide->title;
$small_title= $slide->small_title;
 $read_more_link=$slide->read_more_link;
 $image_link=$slide->image_link;
  $text_colour=$slide->colour;
  $bg_position_from_left=$slide->bg_position_from_left;
					?>

					<form id="sliderform{{$value}}" class="slider" method="post" action="<?php echo Request::root();?>/admin-panel/submit1">
						<div class="row">
							<div class="col-s">
								Slider <?php  echo $value;?>
							</div>
							<div class="col">
								<input name="_title" type="text" class="form-control" placeholder="title" value="{{$title}}">
							</div>
							<div class="col">
								<input name="_small_title" type="text" class="form-control" placeholder="small title" value="{{$small_title}}">
							</div>
							<div class="col">
								<input name="_read_more_link" type="text" class="form-control" placeholder="read more link" value="{{$read_more_link}}">
							</div>
							<div class="col">
								<input name="_image_link" type="text" class="form-control" placeholder="image link" value="{{$image_link}}">
							</div>
							<div class="col">
								<input name="_colour" type="text" class="form-control" placeholder="Color" value="{{$text_colour}}">
							</div>
							<div class="col">
								<input name="bg_position_from_left" type="text" class="form-control" placeholder="bg position from left" value="{{$bg_position_from_left}}">
							</div>
							<div class="col-s">
								<input name="submit" id="slidersubmit{{$value}}" type="submit" class="btn btn-primary">
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="<?php  echo $value;?>">
					</form>
					<?php
					$value++;
}?>
</div>
</div>
				</div>
			</div>
		
			
			
			<div id="tempdata" style="display: none">
				<div style="" id="updated-alert" class="fixed-top">
				<div class="updatealert alert alert-warning alert-dismissible fade show" role="alert">
<center>Updated</center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
			</div>
			
		
		
			
			<div class="row" style="margin-top: 20px;" id="home-gallery-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-home-gallery" aria-expanded="false" aria-controls="collapse-home-gallery">
						Home gallery - Upload photos to gl1 folder in main root and photos will be automatically displayed here.<span class="badge badge-secondary km" >Click to edit</span>
					
					
					</div>
					<form id="refresh" method="post" action="{{Request::root()}}/admin-panel/submit8">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input value="Remove deleted images from database" type="submit" class="btn btn-primary" />
					</form>
					<div class="collapse" id="collapse-home-gallery">
					<div class="card card-body">
						
						<div class="row">
							<div class="col">Image</div>
								<div class="col">File Name</div>
									<div class="col">Couple Name</div>
										<div class="col">Event Type</div>
											<div class="col">Featured on Home?</div>
												<div class="col">Submit</div>
						</div>
					<?php
						$directory = "gl1";
$images = glob($directory . "/*.jpg");
natsort($images);
$images=array_reverse($images);
//print_r($images);
$value=1;
foreach ($images as  $image) {
$home_gallery_count = DB::table('home_gallery')->where('image_url', $image)->count();

	if(!empty($home_gallery_count)){
		$home_gallery_row = DB::table('home_gallery')->where('image_url', $image)->first();
	$couple_name = $home_gallery_row->couple_name;
	$event_type = $home_gallery_row->event_type;
	$featured = $home_gallery_row->featured;
	
	}else{
		$couple_name="";
		$event_type="";
		$featured=0;
	}

	?>
		<div class="row homegallery ">
			<form id="homegalleryform{{$value}}" class="homegalleryform" method="post" action="{{Request::root()}}/admin-panel/submit2">
						<div class="row">
							<div class="col">
								image {{$value}} 				</div>
							<div class="col">
								<div class="img_name <?php if($featured){ echo "featured_row"; }?>">{{$image}}</div>
								<input name="image_url" value="{{$image}}" type="hidden" class="form-control" placeholder="image url" value="">
							</div>
							<div class="col">
								<input name="couple_name" type="text" class="form-control" placeholder="couple name" value="{{$couple_name}}">
							</div>
							<div class="col">
								<input name="event_type" type="text" class="form-control" placeholder="event type" value="{{$event_type}}">
							</div>
							<div class="col">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input value="0" type="radio" name="options" id="option_{{$value}}_1" autocomplete="off" <?php if(!$featured){ echo "checked"; }?>> No
  </label>
  <label class="btn btn-secondary">
    <input value="1" type="radio" name="options" id="option_{{$value}}_2" autocomplete="off" <?php if($featured){ echo "checked"; }?>> Yes
  </label>

</div>
							</div>
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{$value}}">
					</form>
		</div>
	<?php
	$value++;
}
					 ?>
					
					
					
				</div>
				  </div>
				  </div>
			</div>
		
		
		<div class="row" id="home-video-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-home-video" aria-expanded="false" aria-controls="collapse-home-video">
						Home Video<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					
		
		<?php
			$home_video_row = DB::table('home_video')->where('id', 1)->first();
			$image_preview_url = $home_video_row->image_preview_url;
			$video_link = $home_video_row->video_link;
		 ?>
		 <div class="collapse" id="collapse-home-video">
  <div class="card card-body">
				<form id="homevideoform" class="homevideoform" method="post" action="{{Request::root()}}/admin-panel/submit3">
				<div class="row homevideo">
					<div class="col-s">Folder - img/</div>
			<div class="col">
								<input name="image_preview_url" type="text" class="form-control" placeholder="image preview url" value="{{$image_preview_url}}">
							</div>
								<div class="col-s">Folder - videos/</div>
							<div class="col">
								<input name="video_link" type="text" class="form-control" placeholder="video link" value="{{$video_link}}">
							</div>
							
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					
		</div></form>  </div>
</div>
					</div>
		</div>
					
				<div class="row" id="testemonials-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-testemonials" aria-expanded="false" aria-controls="collapse-testemonials">
						Testemonials<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					</div>
		</div>	
				<div class="collapse" id="collapse-testemonials">
  <div class="card card-body">
			<div class="row">
			<div class="col" id="testemonials">
				
			
	<?php 
	$testemonials = DB::table('testemonials')->orderBy('id', 'asc')->get();
$value=1;


	foreach ($testemonials as $testemonial) {
		$id = $testemonial->id;
		$t_date = $testemonial->t_date;
		$t_img_url = $testemonial->t_img_url;
		$t_date = $testemonial->t_date;
		$t_para = $testemonial->t_para;
		$t_couple_name = $testemonial->t_couple_name;
		
		 ?>
	
		
		<form id="testemonialform{{$value}}" class="testemonialform" method="post" action="{{Request::root()}}/admin-panel/submit4">
				<div class="row testemonial">
					
			<div class="col">
								<input name="t_img_url" type="text" class="form-control" placeholder="testemonials image url" value="{{$t_img_url}}">
							</div>
							
							<div class="col">
								<input name="t_date" type="text" class="form-control" placeholder="Client added date" value="{{$t_date}}">
							</div>
							
							<div class="col">
								<input name="t_para" type="text" class="form-control" placeholder="Paragraph" value="{{$t_para}}">
							</div>
							<div class="col">
								<input name="t_couple_name" type="text" class="form-control" placeholder="Couple name" value="{{$t_couple_name}}">
							</div>
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" class="db_id" name="db_id" value="{{$id}}">
					
					<input type="hidden" class="formid" name="formid" value="testemonialform{{$value}}">
		</div></form>
		<?php
		$value++;
		 } ?>
	
		
		</div>
		</div>
		   <div class="row">
			<div class="col">
				<div class="col-s">
								<input name="submit" id="add-testemonial"  type="button" class="btn btn-primary" value="Add Testemonial">
							</div>
			</div>
		</div>
  </div>
</div>
		
		<div class="row" id="quotation-requests-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-quotation-requests" aria-expanded="false" aria-controls="collapse-quotation-requests">
						Quotation Requests<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					</div>
		</div>	
		<div class="collapse" id="collapse-quotation-requests">
  <div class="card card-body">
		<div class="row">
			<div class="col">
							<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">date</th>
        <th scope="col">location</th>
         <th scope="col">contact number</th>
          <th scope="col">tell us more</th>
           
    </tr>
  </thead>
  <tbody>
				<?php
				$quotations = DB::table('quotations')->orderBy('id', 'asc')->get();
$value=1;
foreach ($quotations as $quotation ){
    $quotation->name;
	$quotation->email;
	$quotation->date;
	$quotation->location;
	$quotation->tell_us_more;
	$quotation->contact_no;
	 ?>
	 
	 <tr>
      <th scope="row">{{$value}}</th>
      <td>{{$quotation->name}}</td>
      <td>{{$quotation->email}}</td>
      <td>{{$quotation->date}}</td>
       <td>{{$quotation->location}}</td>
        <td>{{$quotation->contact_no}}</td>
        <td>{{$quotation->tell_us_more}}</td>
        
         
    </tr>
	 
	 
	 
	 <?php
	 $value++;
}
 ?>
</tbody>
								</table>

								</div>

								</div>
								</div> </div>
		
		<?php
		$inst_token = DB::table('inst_token')->orderBy('id', 'asc')->get();
		foreach ($inst_token as $value) {
			
			
		}
		 ?>
<div class="row" id="instagram-tokenupdate-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-instagram-tokenupdate" aria-expanded="false" aria-controls="collapse-instagram-tokenupdate">
						Instagram access token update<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					
					<div class="collapse" id="collapse-instagram-tokenupdate">
						<div class="card card-body">
							
								<form id="" class="" method="post" action="{{Request::root()}}/admin-panel/submit5">
									<div class="col">
								<input name="token" type="text" class="form-control" placeholder="token" value="{{$value->token}}">
							</div>
							<div class="col">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							
						</div>
					</div>
				</div>
			</div>
		
		
		
		
	<div class="row" id="test-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-test" aria-expanded="false" aria-controls="collapse-test">
						Test<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					
					<div class="collapse" id="collapse-test">
						<div class="card card-body">test</div>
					</div>
				</div>
			</div>		
			
				<div class="row" id="cinematographys-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-cinematographys" aria-expanded="false" aria-controls="collapse-cinematographys">
						Cinematography<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					</div>
		</div>	
				<div class="collapse" id="collapse-cinematographys">
  <div class="card card-body">
			<div class="row">
			<div class="col" id="cinematographys">
				
			
	<?php 
	$cinematographys = DB::table('cinematographys')->orderBy('id', 'asc')->get();
$value=1;


	foreach ($cinematographys as $cinematography) {
		$id = $cinematography->id;
		$thumb_url = $cinematography->thumb_url;
		$youtube_link = $cinematography->youtube_link;
		$title = $cinematography->title;
		$t_couple_name = $cinematography->t_couple_name;
	
		
		 ?>
	
		
		<form id="cinematographyform{{$value}}" class="cinematographyform" method="post" action="{{Request::root()}}/admin-panel/submit6">
				<div class="row cinematography">
					
			<div class="col">
								<input name="thumb_url" type="text" class="form-control" placeholder="Thumb URL" value="{{$thumb_url}}">
							</div>
							
							<div class="col">
								<input name="youtube_link" type="text" class="form-control" placeholder="Youtube link" value="{{$youtube_link}}">
							</div>
							
							<div class="col">
								<input name="title" type="text" class="form-control" placeholder="Title" value="{{$title}}">
							</div>
							<div class="col">
								<input name="t_couple_name" type="text" class="form-control" placeholder="Couple name" value="{{$t_couple_name}}">
							</div>
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" class="db_id" name="db_id" value="{{$id}}">
					
					<input type="hidden" class="formid" name="formid" value="cinematographyform{{$value}}">
		</div></form>
		<?php
		$value++;
		 } ?>
	
		
		</div>
		</div>
		   <div class="row">
			<div class="col">
				<div class="col-s">
								<input name="submit" id="add-cinematography"  type="button" class="btn btn-primary" value="Add cinematography">
							</div>
			</div>
		</div>
  </div>
</div>



<div id="cinematography_temp_row" style="display: none">
			<form id="" class="cinematographyform addednow" method="post" action="{{Request::root()}}/admin-panel/submit6">
				<div class="row cinematography">
					
				<div class="col">
								<input name="thumb_url" type="text" class="form-control" placeholder="Thumb URL" value="">
							</div>
							
							<div class="col">
								<input name="youtube_link" type="text" class="form-control" placeholder="Youtube link" value="">
							</div>
							
							<div class="col">
								<input name="title" type="text" class="form-control" placeholder="Title" value="{{$title}}">
							</div>
							<div class="col">
								<input name="t_couple_name" type="text" class="form-control" placeholder="Couple name" value="">
							</div>
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" class="db_id" name="db_id" value="0">
						<input type="hidden" class="formid" name="formid" value="">
		</div></form>
		</div>
		
			<div class="row" id="proofing-gallery-section">
				<div class="col">
					<div class="alert alert-primary" role="alert" data-toggle="collapse" data-target="#collapse-proofing-gallery" aria-expanded="false" aria-controls="collapse-proofing-gallery">
						Proofing Gallery<span class="badge badge-secondary km" >Click to edit</span>
					</div>
					
					<div class="collapse" id="collapse-proofing-gallery">
						<div class="card card-body">

<h4>Customer Proofing Gallery Accounts</h4>
<div class="row" style="font-weight: bold">
							<div class="col">
								ID					</div>
							<div class="col">
							Username/Folder name (inside proofing_gallery)
								
							</div>
							<div class="col">
								Password
							</div>
							
							
						</div>
<?php 
	$proofing_gallerys = DB::table('proofing_gallery')->orderBy('id', 'asc')->get();
$value=1;


	foreach ($proofing_gallerys as $proofing_gallery) {
		$id = $proofing_gallery->id;
		$username = $proofing_gallery->username;
	$password = $proofing_gallery->password;
		
		 ?>
	<div class="row">
							<div class="col">
								{{$id}}					</div>
							<div class="col">
							{{$username}}
								
							</div>
							<div class="col">
								{{$password}}
							</div>
							
							
						</div>
		
		<?php
		$value++;
		 } ?>



<h4>Create Account</h4>
<form class="proofinggalleryform" method="post" action="<?php echo Request::root();?>/admin-panel/submit7">
			<input class="text" type="text" name="username" placeholder="USERNAME" /><br>
			<input class="text" type="password" name="pwd" placeholder="PASSWORD" /><br>
			<div><input class="btn btn-primary" type="submit" value="Create" /></div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
</div>
					</div>
				</div>
			</div>	
		
		
		</div>
		
		<div id="testemonial_temp_row" style="display: none">
			<form id="" class="testemonialform addednow" method="post" action="{{Request::root()}}/admin-panel/submit4">
				<div class="row testemonial">
					
			<div class="col">
								<input name="t_img_url" type="text" class="form-control" placeholder="testemonials image url" value="">
							</div>
							
							<div class="col">
								<input name="t_date" type="text" class="form-control" placeholder="Client added date" value="">
							</div>
							
							<div class="col">
								<input name="t_para" type="text" class="form-control" placeholder="Paragraph" value="">
							</div>
							<div class="col">
								<input name="t_couple_name" type="text" class="form-control" placeholder="Couple name" value="">
							</div>
							<div class="col-s">
								<input name="submit"  type="submit" class="btn btn-primary">
							</div>
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" class="db_id" name="db_id" value="0">
						<input type="hidden" class="formid" name="formid" value="">
		</div></form>
		</div>
		
	
		
		
		
		@include('layout.partials.footer-scripts')
		
		
		<script>
		$(document).ready(function() {

$(".slider, .homegalleryform, .homevideoform").ajaxForm({
	
		type : "POST",
		dataType : 'html',
		success(data){
			if(data=="1"){
				var alert = $("#tempdata").html();
				$("body").append(alert);
			}else{
				
			}
		}
		});
		
		$(".testemonialform").ajaxForm({
			
	  delegation: true,
		type : "POST",
		dataType : 'html',
		success(data){
			
		var alert = $("#tempdata").html();
				$("body").append(alert);
			
			$("#temp-div").append(data);
			
				
			
		}
		});
		
			$(".cinematographyform").ajaxForm({
			
	  delegation: true,
		type : "POST",
		dataType : 'html',
		success(data){
			
		var alert = $("#tempdata").html();
				$("body").append(alert);
			
			$("#temp-div").append(data);
			
				
			
		}
		});
		
			$(".proofinggalleryform").ajaxForm({
			
	  delegation: true,
		type : "POST",
		dataType : 'html',
		success(data){
			
		var alert = $("#tempdata").html();
				$("body").append(alert);
			
			$("#temp-div").append(data);
			
				
			
		}
		});
				$("#refresh").ajaxForm({
			
	  delegation: true,
		type : "POST",
		dataType : 'html',
		success(data){
			
		var alert = $("#tempdata").html();
				$("body").append(alert);
			
			$("#temp-div").append(data);
			
				
			
		}
		});
		
		
		$("#add-cinematography").click(function(){
			var numItems = $('#cinematographys .testemonialform').length;
			
			var new_testemonial_row=$("#cinematography_temp_row").html();
			numItems++;
		
			var newID="cinematographyform"+numItems;
			
			$("#cinematographys .addednow").removeClass("addednow");
			$("#cinematographys").append(new_testemonial_row);
			$("#cinematographys .addednow").attr("id",newID);
			$("#cinematographys .addednow .formid").val(newID);
		})
		
		$('.collapse').collapse("hide");
});
		</script>
		
		<style>
			.homegallery .img_name {
				max-width: 150px;
			}
			.homegallery .row {
				padding-top: 10px
			}
			.homegallery .col {
				min-width: 300px;
			}
			.alert-primary {
				margin-top: 10px;
			}
			.badge.badge-secondary.km {
				padding: 10px;
				cursor: pointer;
				margin-left: 10px;
			}
.visiblehome{
	    font-size: 12px;
    font-style: italic;
}

.featured_row{
	background: #ffc74f;
}
		</style>
		
		
		
		
		
		
		 <div id="temp-div"></div>
	</body>
</html>
