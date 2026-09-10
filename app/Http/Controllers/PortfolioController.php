<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
class portfolioController extends Controller {

	public function portfolio(){
		return view('portfolio.portfolio');
	}
	
	
	public function cinematography(){
		return view('portfolio.cinematography');
	}
	
	public function contactus(){
		return view('contact');
	}
	
public function aboutus(){
		return view('aboutus');
	}

public function load_gallery1(Request $request){
	 $datavalue= $request->datavalue;
		return view('portfolio.load_gallery1',['datavalue' => $datavalue]);
	}


public function load_gallery_couple_name(Request $request){
	 $couplename= $request->couplename;
	 
		return view('portfolio.load_gallery_couple_name',['couplename' => $couplename]);
	}

public function load_gallery_couple_name2(Request $request){
	 $datavalue= $request->datavalue;
	 	 $couplename= $request->couplename;
		return view('portfolio.load_gallery_couple_name2',['datavalue' => $datavalue,'couplename' => $couplename]);
	}

}
