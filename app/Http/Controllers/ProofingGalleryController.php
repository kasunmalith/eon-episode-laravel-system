<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\admin;
use DB;
use Validator;
use Session;
class ProofingGalleryController extends Controller {

	

	
//	public function index(Request $Request){
	//	$id=$Request->route('id');
//	return view('ProofingGallery.index')->with('id',$id);;
		
//}
	
		public function home(){
	
	return view('ProofingGallery.home');
		
}

public function submit7(Request $request){
		 $username= $request->username;
	 $password= $request->pwd;
	
	$proofing_gallery_count = DB::table('proofing_gallery')->where('username', $username)->where('password', $password)->count();
	if($proofing_gallery_count==0){
		return back()->withInput();		
	}else{
		
		
			$proofing_gallerydb = DB::table('proofing_gallery')->where('username', $username)->first();
		$uid= $proofing_gallerydb->id;
		Session::put('clients', array($username,$uid));
		return redirect("/proofing-gallery/");
		
	}
}
	
	
public function load_gallery2(Request $request){
	 $datavalue= $request->datavalue;
		return view('ProofingGallery.load_gallery2',['datavalue' => $datavalue]);
	}
}
