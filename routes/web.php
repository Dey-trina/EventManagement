<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Auth::routes();

Auth::routes(['verify'=> true]);
Route::get('/dashboard',function()
{
	return view('admin.dashboard');
})->middleware('verified');

Route::get('/userdashboard',function()
{
	return view('user.userdashboard');
})->middleware('verified');
//Route::get('/login',function()
//{
	//return view('admin.login');
//})->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userr', 'UserController@index');
//Route::get('/dashboardd', 'UserController@dashboard');

Route::group(['middleware'=>['auth','admin']], function(){
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
});

Route::get('/userdashboard', function () {
    return view('user.userdashboard');
});

Route::get('/dashboardd', function () {
    return view('user.dashboard');
});

Route::get('/adminprofile/entry','AdminprofileController@index');
Route::post('/adminprofile/addadminprofile','AdminprofileController@save');
Route::get('/adminprofile/admin_manage','AdminprofileController@manage');
Route::get('/adminprofile/view/{user_id}/{companyName}','AdminprofileController@singleProduct');
Route::get('/adminprofile/edit/{companyName}','AdminprofileController@editProduct');
Route::post('/adminprofile/edit','AdminprofileController@updateProduct');
//save method is used for add 
// Route::get('/adminprofile/manage','AdminprofileController@updateProduct');
//I can see everything is ok
//

Route::get('/venue/addvenue','VenueController@index');
Route::post('/venue/addvenue','VenueController@save');
Route::get('/venue/venue_manage','VenueController@manage');
Route::get('/venue/view/{user_id}/{venueName}','VenueController@singleProduct');
Route::get('/venue/edit/{venueName}','VenueController@editProduct');
Route::post('/venue/edit','VenueController@updateProduct');
Route::get('/venue/delete/{id}','VenueController@delete');
//user
Route::get('/venue/user_venue_manage','VenueController@user_manage');
Route::get('/venue/user_view/{user_id}/{venueName}','VenueController@user_singleProduct');
//search
Route::get('/venue/search','VenueController@search');
//com
Route::get('/venue/com_venue_manage/{user_id}','VenueController@com_manage');
Route::get('/venue/com_view/{user_id}/{venueName}','VenueController@com_singleProduct');

Route::get('/food/addfood','FoodController@index');
Route::post('/food/addfood','FoodController@save');
Route::get('/food/food_manage','FoodController@manage');
Route::get('/food/view/{user_id}/{foodName}','FoodController@singleProduct');
Route::get('/food/edit/{foodName}','FoodController@editProduct');
Route::post('/food/edit','FoodController@updateProduct');
Route::get('/food/delete/{id}','FoodController@delete');
//user
Route::get('/food/user_food_manage','FoodController@user_manage');
Route::get('/food/user_view/{user_id}/{foodName}','FoodController@user_singleProduct');
//search
Route::get('/food/search','FoodController@search');
//com
Route::get('/food/com_food_manage/{user_id}','FoodController@com_manage');
Route::get('/food/com_view/{user_id}/{foodName}','FoodController@com_singleProduct');

Route::get('/decoration/adddecoration','DecorationController@index');
Route::post('/decoration/adddecoration','DecorationController@save');
Route::get('/decoration/decoration_manage','DecorationController@manage');
Route::get('/decoration/view/{user_id}/{decorationCode}','DecorationController@singleProduct');
Route::get('/decoration/edit/{decorationCode}','DecorationController@editProduct');
Route::post('/decoration/edit','DecorationController@updateProduct');
Route::get('/decoration/delete/{id}','DecorationController@delete');
//user
Route::get('/decoration/user_decoration_manage','DecorationController@user_manage');
Route::get('/decoration/user_view/{user_id}/{decorationCode}','DecorationController@user_singleProduct');
//search
Route::get('/decoration/search','DecorationController@search');
//com
Route::get('/decoration/com_decoration_manage/{user_id}','DecorationController@com_manage');
Route::get('/decoration/com_view/{user_id}/{decorationCode}','DecorationController@com_singleProduct');

Route::get('/light/addlight','LightController@index');
Route::post('/light/addlight','LightController@save');
Route::get('/light/light_manage','LightController@manage');
Route::get('/light/view/{user_id}/{lightName}','LightController@singleProduct');
Route::get('/light/edit/{lightName}','LightController@editProduct');
Route::post('/light/edit','LightController@updateProduct');
Route::get('/light/delete/{id}','LightController@delete');
//user
Route::get('/light/user_light_manage','LightController@user_manage');
Route::get('/light/user_view/{user_id}/{lightName}','LightController@user_singleProduct');
//search
Route::get('/light/search','LightController@search');
//com
Route::get('/light/com_light_manage/{user_id}','LightController@com_manage');
Route::get('/light/com_view/{user_id}/{lightName}','LightController@com_singleProduct');


Route::get('/transport/addtransport','TransportController@index');
Route::post('/transport/addtransport','TransportController@save');
Route::get('/transport/transport_manage','TransportController@manage');
Route::get('/transport/view/{user_id}/{vehicleName}','TransportController@singleProduct');
Route::get('/transport/edit/{vehicleName}','TransportController@editProduct');
Route::post('/transport/edit','TransportController@updateProduct');
Route::get('/transport/delete/{id}','TransportController@delete');
//user
Route::get('/transport/user_transport_manage','TransportController@user_manage');
Route::get('/transport/user_view/{user_id}/{vehicleName}','TransportController@user_singleProduct');
//search
Route::get('/transport/search','TransportController@search');
//com
Route::get('/transport/com_transport_manage/{user_id}','TransportController@com_manage');
Route::get('/transport/com_view/{user_id}/{vehicleName}','TransportController@com_singleProduct');

Route::get('/sound/addsound','SoundController@index');
Route::post('/sound/addsound','SoundController@save');
Route::get('/sound/sound_manage','SoundController@manage');
Route::get('/sound/view/{user_id}/{soundCompanyName}','SoundController@singleProduct');
Route::get('/sound/edit/{soundCompanyName}','SoundController@editProduct');
Route::post('/sound/edit','SoundController@updateProduct');
Route::get('/sound/delete/{id}','SoundController@delete');
//user
Route::get('/sound/user_sound_manage','SoundController@user_manage');
Route::get('/sound/user_view/{user_id}/{soundCompanyName}','SoundController@user_singleProduct');
//search
Route::get('/sound/search','SoundController@search');
//com
Route::get('/sound/com_sound_manage/{user_id}','SoundController@com_manage');
Route::get('/sound/com_view/{user_id}/{soundCompanyName}','SoundController@com_singleProduct');

Route::get('/photography/addphotography','PhotographyController@index');
Route::post('/photography/addphotography','PhotographyController@save');
Route::get('/photography/photography_manage','PhotographyController@manage');
Route::get('/photography/view/{user_id}/{photographyCompanyName}','PhotographyController@singleProduct');
Route::get('/photo/edit/{photographyCompanyName}','PhotographyController@editProduct');
Route::post('/photo/edit','PhotographyController@updateProduct');
Route::get('/photo/delete/{id}','PhotographyController@delete');
//user
Route::get('/photography/user_photography_manage','PhotographyController@user_manage');
Route::get('/photography/user_view/{user_id}/{photographyCompanyName}','PhotographyController@user_singleProduct');
//search
Route::get('/photography/search','PhotographyController@search');
//com
Route::get('/photography/com_photography_manage/{user_id}','PhotographyController@com_manage');
Route::get('/photography/com_view/{user_id}/{photographyCompanyName}','PhotographyController@com_singleProduct');

Route::get('/videography/addvideography','VideographyController@index');
Route::post('/videography/addvideography','VideographyController@save');
Route::get('/videography/videography_manage','VideographyController@manage');
Route::get('/videography/view/{user_id}/{videographyCompanyName}','VideographyController@singleProduct');
Route::get('/videography/edit/{videographyCompanyName}','VideographyController@editProduct');
Route::post('/videography/edit','VideographyController@updateProduct');
Route::get('/videography/delete/{id}','VideographyController@delete');
//user
Route::get('/videography/user_videography_manage','VideographyController@user_manage');
Route::get('/videography/user_view/{user_id}/{videographyCompanyName}','VideographyController@user_singleProduct');
//search
Route::get('/videography/search','VideographyController@search');
//com
Route::get('/videography/com_videography_manage/{user_id}','VideographyController@com_manage');
Route::get('/videography/com_view/{user_id}/{videographyCompanyName}','VideographyController@com_singleProduct');




//Route::get('/venue/addvenue','VenueController@index');