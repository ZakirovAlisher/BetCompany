<?php

namespace App\Http\Controllers;

use App\Models\PartBet;
use App\Models\Bet;
use Illuminate\Http\Request;

class PartBetController extends Controller
{

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
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
     //   dd($request);
         $request->validate([
            
            'match_id' => 'required',
           'coef_on_1' => 'required',
             'coef_on_2' => 'required',
              'text' => 'required',
               
        ]);
  
        PartBet::create($request->all());
        
    return redirect('admin_bet/'.$request['match_id']);
       
                       
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartBet  $partBet
     * @return \Illuminate\Http\Response
     */
    public function show(PartBet $partBet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartBet  $partBet
     * @return \Illuminate\Http\Response
     */
    public function edit(PartBet $partBet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartBet  $partBet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartBet $partBet)
    {
               $request->validate([
            
            'part_bet_id' => 'required',
           'winner' => 'required',
             
               
        ]);
  
       $bet = PartBet::find($request['part_bet_id']);
         $match = \App\Models\Match::find($bet->match_id);
       $bet->finished = $request['winner'];
       $bet->save();
       
       $bets = Bet::where('part_bet_id', $request['part_bet_id'] )->get();
       
     if($request['winner'] == 1){
                   
                    if($bet->text == "WIN"){
                   $match->winner = 1;
                    $match->save();}
                    
               }
               if($request['winner'] == 2){
                    
                        if($bet->text == "WIN"){
                   $match->winner = 2;
                    $match->save();}
               }
               
               
       foreach ($bets as $b){
           if($request['winner'] == $b->outcome){
               $user = \App\Models\User::find($b->user_id);
               
               if($request['winner'] == 1){
                    $profit = $bet->coef_on_1 * $b->amount;
                    if($bet->text == "WIN"){
                   $match->winner = 1;
                    $match->save();}
                    
               }
               if($request['winner'] == 2){
                    $profit = $bet->coef_on_2 * $b->amount;
                        if($bet->text == "WIN"){
                   $match->winner = 2;
                    $match->save();}
               }
               
               $user->balance =  $user->balance + $profit;
               $user->save();
           }
           
       }
       
    return redirect('admin_bet/'.$bet->match_id);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartBet  $partBet
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartBet $partBet)
    {
        //
    }
}
