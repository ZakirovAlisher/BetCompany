<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            
        'balance' => 'required',
              
               
        ]);
        
        $user =  \App\Models\User::where('id', $id)->first();
        
        $user->balance =  $user->balance + $request->balance;
         
        $user->save(); //сохраняем
       
    {
      
        
  
         return redirect()->route('home')
                        ->with('success','Profile updated successfully.');
    }
    
    
    
    
    
}
    public function index()
    {
        return view('home');
    }
}
