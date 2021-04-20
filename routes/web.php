<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/admin', function () {
    
      if (Auth::check()) {

        if (Auth::user()->role == "Admin" )
    {
    
     $matches = App\Models\Match::orderBy('id', 'DESC')->get();
      $members = App\Models\Member::all();
      
      
    return view('admin', compact('matches'), compact('members'));
    
    }
    else{
        
        return redirect("login");
    }
    
     return redirect("login");
      }
    
})->name('admin');

Route::get('/', function () {

     if(isset($_GET['type'])){
        
    
        $matches = App\Models\Match::where('sport_type',$_GET['type'] )->get();
 
    }
    else
   $matches = App\Models\Match::orderBy('start_time', 'DESC')->get();
    

     $news = App\Models\News::latest()->paginate(5);
    return view('index', compact('matches'),compact('news')  );
    
})->name('index');

Route::get('/reg', function () {
    return view('reg');
    
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/bet', function () {
    return view('bet');
});

Route::get('/admin_bet/{id}', function ($id) {
   
     $parts = App\Models\PartBet::where('match_id', $id)->get();
    $match= App\Models\Match::find($id);
    
    return view('admin_bet', compact('match'), compact('parts') );
})->name('admin_bet');

Route::get('/user_bet/{id}', function ($id) {
   
     $parts = App\Models\PartBet::where('match_id', $id)->get();
    $match= App\Models\Match::find($id);
    
    return view('user_bet', compact('match'), compact('parts') );
})->name('user_bet');

Route::get('/news_details/{id}', function ($id) {
    
   if(isset($_GET['type'])){
        
    
        $matches = App\Models\Match::where('sport_type',$_GET['type'] )->get();
 
    }
    else
   $matches = App\Models\Match::orderBy('start_time', 'DESC')->get();
    

    $n = \App\Models\News::find($id);
    
    return view('news_detail', compact('n'), compact('matches') );
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bets','BetController');
Route::resource('members','MemberController');
Route::resource('partbets','PartBetController');
Route::resource('matches','MatchController');
Route::resource('news','NewsController');

Route::post('/user-update/{userId}', 'HomeController@update');