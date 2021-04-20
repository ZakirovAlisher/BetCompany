<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
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
        //   dd($request);
         $request->validate([
            
            'id' => 'required',
           
              'text' => 'required',
               
        ]);
  
        PartBet::create($request->all());
   
        return redirect()->route('admin');
                 
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
            
            'tournament' => 'required',
           
              'start_time' => 'required',
              'member1_id' => 'required',
             'member2_id' => 'required',
        ]);
  
        $id = Match::create($request->all()) ->id;
       $pb = new \App\Models\PartBet();
        $pb->match_id = $id;
        $pb->text = "WIN";
         $pb->coef_on_1 = $request['c1'];
        $pb->coef_on_2 = $request['c2'];
        $pb->save();
        return redirect()->route('admin');
                       
    }
    public function addpartbet(Request $request)
    {
           
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
