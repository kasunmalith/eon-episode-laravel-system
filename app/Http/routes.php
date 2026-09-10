<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', function(){
 return view('demo');
});

Route::get('/portfolio/photography', 'PortfolioController@portfolio');
Route::get('/portfolio/cinematography', 'PortfolioController@cinematography');

Route::get('/proofing-gallery', 'ProofingGalleryController@home');
Route::post('/proofing-gallery/submit7', 'ProofingGalleryController@submit7');
//Route::get('/proofing-gallery/{id}', 'ProofingGalleryController@index')->where('id', '[0-9]+');;
//Route::get('/wedding-vendors', 'WelcomeController@portfolio');

Route::get('/contact-eon', 'PortfolioController@contactus');
Route::get('/about-eon', 'PortfolioController@aboutus');

Route::get('/admin-panel/login', 'adminController@login');
Route::post('/admin-panel/check', 'adminController@check');
Route::get('/admin-panel/', 'adminController@index');
Route::get('/admin-panel/logout', 'adminController@logout');
Route::post('/admin-panel/submit1', 'adminController@sliderStore');
Route::post('/admin-panel/submit2', 'adminController@homeGallery');
Route::post('/admin-panel/submit3', 'adminController@homeVideo');
Route::post('/admin-panel/submit4', 'adminController@addTestemonial');
Route::post('/admin-panel/submit5', 'adminController@changeInstaToken');
Route::post('/admin-panel/submit6', 'adminController@cinematography');
Route::post('/admin-panel/submit7', 'adminController@proofingGallery');
Route::post('/admin-panel/submit8', 'adminController@refreshGallery');
Route::post('/submit', 'adminController@quotation');


Route::get('/load_gallery1', 'PortfolioController@load_gallery1');
Route::get('/load_gallery2', 'ProofingGalleryController@load_gallery2');
Route::get('/load_gallery_couple_name', 'PortfolioController@load_gallery_couple_name');
Route::get('/load_gallery_couple_name', 'PortfolioController@load_gallery_couple_name');
Route::get('/load_gallery_couple_name2', 'PortfolioController@load_gallery_couple_name2');


$app = App::make('app'); // or just $app = app();

$app->bindShared('blade.compiler', function($app)
{
    $cache = $app['path.storage'].'/views';

    return new MyBladeCompiler($app['files'], $cache);
});

function laravel5ClearCash() {
	$path = "/home1/kmalith2/eonepisode/storage/framework/views";
	if ($handle = opendir($path)) {

		// echo "Directory handle: $handle\n";

		// echo "Files:\n";

		while (false !== ($file = readdir($handle))) {

			try {

				unlink($path . "/" . $file);
			} catch(Exception  $e) {

			}

		}
		closedir($handle);
	}
}

laravel5ClearCash();