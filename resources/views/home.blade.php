@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Personal profile of '.Auth::user()->name ) }} <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        <button>sad</button>
                                        @csrf
                                    </form> </div>
 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="jumbotron">
Email: {{Auth::user()->email }} <br>
Name: {{Auth::user()->name }} <br>

Your balance: {{Auth::user()->balance }} $<br>
<button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">INCREASE BALANCE</button>
                    </div>
                         <div >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                              
                                   
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                    <?php 
                  $allmatches = \App\Models\Match::with('partbets')->get();
                  $res = array(); 
                 
                  foreach($allmatches as $match){ 
                    
                      foreach($match->partbets as $partbet){
                          
                          foreach($partbet->bets as $bet){
                      if($bet->user_id == Auth::user()->id){
                          
                          if (!in_array($match, $res))
                          $res[] = $match;
                             
                      }
                      
                  }
                  
                      
                  }
                 
                  }  

                    
                    ?>
                    @foreach($res as $m)
                  
                    <div class="jumbotron">
                        <a  href="/user_bet/{{$m->id}}">  {{$m->member1->name}} vs {{$m->member2->name}} </a> <br>
                     @foreach($m->partbets as $bet2)
                    
                         
                         <?php 
                         
                        $b = \App\Models\Bet::where('part_bet_id',$bet2->id)->where('user_id',Auth::user()->id)->first();
                          
                        if($b != null){ 
                         $cvet;
                         if($bet2->finished == $b->outcome){    $cvet = "1";}
 else {$cvet = "2";}
                            
            if($cvet == "1"){
                        if($b->outcome==1){
                      $win = $b->amount * $bet2->coef_on_1;
                      $mem = $m->member1->name;
                      
                        }
                          if($b->outcome==2){
                          $win = $b->amount * $bet2->coef_on_2;
                           $mem = $m->member2->name;
                          
                          }
 }
            
 
 if($cvet == "2"){
 
 $win = $b->amount;
   if($b->outcome==1){$mem = $m->member1->name;}
 if($b->outcome==2){$mem = $m->member2->name;}
 }
     
 
                                
                                
                         ?>
                      <b> {{$bet2->text}}</b>
                         @if($cvet==1)
                         <span class="text-success">WON BET + {{$win}} </span> bet on {{$mem}}
                         @else
                           <span class="text-danger">LOST BET - {{$win}}</span> bet on {{$mem}}
                         @endif
                        <?php }?>
                     
                     <br>
                     @endforeach
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5 "></div>
    <div class="row mt-5 "></div><div class="row mt-5 "></div>
    <div class="row mt-5 "></div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Balance replenishment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <form  action="/user-update/{{ Auth::user()->id }}" method="post">
      <div class="modal-body">
         
                     @csrf 
                     <input name="balance" class="form-control" type="number">
          
                     
          
          
          
         
      </div>
      <div class="modal-footer">
        
        <button class="btn btn-success">INCREASE</button>
      </div>
         </form>
    </div>
  </div>
</div>

