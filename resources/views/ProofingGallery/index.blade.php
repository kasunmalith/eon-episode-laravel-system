<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\admin;
use DB;
use Validator;
use Session;
use Illuminate\Contracts\Routing\ResponseFactory;


if (Session::has('clients')){
  $client = Session::get('clients');
$username = $client[0];
$s_id = $client[1];

if($s_id==$id){
	echo "correct";
}else{
	
}  
}else{
	 return redirect('/proofing-gallery/');
}





//posts

///////////

 //$path=storage_path()."/app/eon.jpg";

		   
?>
