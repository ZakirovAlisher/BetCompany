@extends('layouts.app')

@section('content')
<div class="row main"   >




    <div class="col-12 bets no-gutters  "   style="   height: 100%;">
     
          
          <a href="bet.html" style="text-decoration: none; color:black">
<div class="card mt-4"   style="margin: auto; max-width: 100%; padding: 0 !important; background-color: #cacaca;" >
    <div class="card-header" style=" background-color: #272727; color: white;">
     <span class="float-left"> {{$match->start_time}} </span>
     <span class="float-right">{{$match->tournament}}</span>

    </div>
    <div class="card-body row font-weight-bold">

        <span class="col-3 text-center" style="margin: auto;">
            {{$match->member1->name}}<br>
            <span>x2.00</span>
        </span>
        <div class="col-2 text-center">
           
            <img  width="120" height="120" class="border border-secondary" style="border-radius: 100px;" src=" {{$match->member1->url}}" alt="">
        </div>

        <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
        <div class="col-2 text-center">
           
            <img width="120" height="120"class="border border-secondary" style="border-radius: 100px; "src=" {{$match->member2->url}}" alt="">
        </div>
        <span class="col-3 text-center" style="margin: auto;">
            {{$match->member2->name}}<br>
            <span>x1.67</span>
        </span>
 

      </div>
  </div>
</a>

<div class="container-fluid">
    <table class="table">
  <thead>
    <tr>
     
    </tr>
  </thead>
  @foreach($parts as $p) 
    
   <?php 
    $heh = dechex(rand(0,10000000));
    ?>
 
   

  <tr style="background-color: #<?=$heh?> ; 
            text-shadow: white 1px 1px 0, white -1px -1px 0, 
                 white -1px 1px 0, white 1px -1px 0; 
                 font-size:30px;
                 font-weight:bold;">
      
      <h1>
        <td class=" ">x{{$p->coef_on_1}}</td>
       <td class=" ">  
           <form action="{{ route('partbets.update',$p->id) }}" method="post" class="col-12">
      @csrf
      @method('PUT')
      <input type="hidden" name="part_bet_id" value="{{$p->id}}">
       <input type="hidden" name="winner" value="1">
      @if($p->finished != 1 && $p->finished != 2)
      <button class="btn btn-success">MAKE WINNER</button>
      
      @endif
        @if($p->finished == 1 )
      <span class="btn btn-success">WINNER</span>
      
      @endif
      
         </form></td>
        
      <td class="col-6 text-center">{{$p->text}}</td>
      
       <td class=" ">   <form action="{{ route('partbets.update',$p->id) }}" method="post" class="col-12">
      @csrf
      @method('PUT')
       <input type="hidden" name="part_bet_id" value="{{$p->id}}">
       <input type="hidden" name="winner" value="2">
       @if($p->finished != 2 && $p->finished != 1 )
      <button class="btn btn-success">MAKE WINNER</button>
      @endif
      @if($p->finished == 2)
      <span class="btn btn-success">WINNER</span>
      
      @endif
         </form></td>
      <td class="col-3"> x{{$p->coef_on_2}}</td>
      </h1>
    </tr>
    
 @endforeach
 
 

   
    </table> @if($match->winner==0)
    <form action="{{ route('partbets.store') }}" method="post" class="col-12">
      @csrf
    <input type="hidden" name="match_id" value="{{$match->id}}">
   <div class="container"> 
       
    Text   <input type="text" name="text"  class="form-control">
    
     Coef on  {{$match->member1->name}} <input type="text" name="coef_on_1"  class="form-control">
    Coef on  {{$match->member2->name}} <input type="text" name="coef_on_2"  class="form-control">
    </div>
     <div class="text-center"> 
    <button class="mt-3 col-7 btn btn-success">ADD PARTICULAR BET</button>
     </div>
</form>
    
    @endif

</div>

        <div class="card-header mt-2" style=" background-color: #272727; color: white; height: 60px "></div>












    </div>



</div>



@endsection
 
 