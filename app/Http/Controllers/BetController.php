<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'amount' => 'required',
            
             'part_bet_id' => 'required',
              'outcome' => 'required',
               
        ]);
        
        $user = Auth::user();
         $bet = \App\Models\PartBet::find($request['part_bet_id']);
         
        if($user->balance-$request['amount']<0){
            
          return redirect('user_bet/'.$bet->match_id."?balanceerror" );  
        }
        
  $request['user_id'] =  Auth::user()->id;
        
        Bet::create($request->all() );
      
        
        
        
        $user->balance = $user->balance-$request['amount'];
        $user->save();
        
        
       
                
    return redirect('user_bet/'.$bet->match_id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
