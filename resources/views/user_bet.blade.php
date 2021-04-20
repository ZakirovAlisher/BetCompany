   <?php 
  $matches1 = App\Models\Match::where('member1_id',$match->member1->id)->orWhere('member2_id',  $match->member1->id)->get();
   $matches1F = array(); 
  foreach ($matches1 as $mm){
      
      foreach ($mm->partbets as $mm2){
      if($mm2->text =='WIN' && $mm2->finished != 0){
          
     
            if($mm2->finished == 1 && $mm->member1->id == $match->member1->id )
          $mm['ishod'] = 'Victory';
      else if($mm2->finished == 2 && $mm->member2->id == $match->member1->id){
          $mm['ishod'] = 'Victory';
      }
      else {
         $mm['ishod'] = 'Lose'; 
      }
          $matches1F[] = $mm;
          
      
       }    
          
      }
  }

    $matches2 = App\Models\Match::where('member2_id',$match->member2->id)->orWhere('member1_id',  $match->member2->id)->get();
   $matches2F = array(); 
  foreach ($matches2 as $mm){
      
      foreach ($mm->partbets as $mm2){
      if($mm2->text =='WIN' && $mm2->finished != 0){
          
    
            if($mm2->finished == 1 && $mm->member1->id == $match->member2->id )
          $mm['ishod'] = 'Victory';
      else if($mm2->finished == 2 && $mm->member2->id == $match->member2->id){
          $mm['ishod'] = 'Victory';
      }
      else {
         $mm['ishod'] = 'Lose'; 
      }
          $matches2F[] = $mm;
          
      }
          
          
      }
  }
  
 
    ?>
@extends('layouts.app')

@section('content')

<div class="row main"   >




    <div class="col-12 bets no-gutters  "   style="   height: 100%;">
     
          
          
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
      <?php
        if(isset($_GET['balanceerror'])){
        ?>
    <div class="jumbotron bg-danger text-center" style="color:white"><h1>NOT ENOUGH BALANCE TO PLACE BET</h1></div>
 <?php
        }
        ?>
  </div>


<div class="container-fluid">
    <table class="table">
  <thead>
    <tr>
     
    </tr>
  </thead>
  @if($match->winner == 0)
  @foreach($parts as $p) 
    
 
  
  
  
   <?php 
    $heh = dechex(rand(0,10000000));
    ?>
 <?php 

if(Auth::check()){
$est  = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  1)->exists();

 $est2  = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  2)->exists();
}

?>
   

  <tr style="background-color: #<?=$heh?> ; 
            text-shadow: white 1px 1px 0, white -1px -1px 0, 
                 white -1px 1px 0, white 1px -1px 0; 
                 font-size:30px;
                 font-weight:bold;">
      
    
          
        <td class=" ">x{{$p->coef_on_1}}</td>
        <td class="text-center ">
            
            <form action="{{ route('bets.store') }}" method="post">
                @csrf
                
            <?php if(isset($est))if($est){  $e = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  1)->first();  ?>    <input type="number" value="<?=$e->amount?>" name="amount" readonly>
                
            <?php } else {?>
             <input type="number"  name="amount">
                <?php } ?>
                <input type="hidden" name="part_bet_id" value="{{$p->id}}">
                
                 <input type="hidden" name="outcome" value="1">
                 
                 <?php if(isset($est2))if(!$est2){ ?>
               <?php if(isset($est))if(!$est){ ?>   <button class="btn btn-primary"  type="submit" >PLACE</button> <?php } else{ ?> 
               <input class="btn btn-success"  value="ALREADY PLACED" >
               <?php } ?> 
               <?php } ?> 
               
            </form>
        </td>
      <td class="col-6 text-center">{{$p->text}}</td>
       
          <td class="text-center ">
            
            <form action="{{ route('bets.store') }}" method="post">
                @csrf
                
            <?php if(isset($est2))if($est2){  $e = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  2)->first();  ?>    <input type="number" value="<?=$e->amount?>" name="amount" readonly>
                
            <?php } else {?>
             <input type="number"  name="amount">
                <?php } ?>
                <input type="hidden" name="part_bet_id" value="{{$p->id}}">
                
                 <input type="hidden" name="outcome" value="2">
                  <?php if(isset($est)) if(!$est){ ?>
               <?php if(!$est2){ ?>   <button class="btn btn-primary"  type="submit" >PLACE</button> <?php } else{ ?> 
               <input class="btn btn-success"  value="ALREADY PLACED" >
                  <?php }} ?> 
               
                
               
               
            </form>
        </td>
      
      
      <td class="col-3"> x{{$p->coef_on_2}}</td>
      
      
    </tr>
    

 
 

    @endforeach
    @endif
    
    
    
    @if($match->winner != 0)
  @foreach($parts as $p) 
    
 
  
  
  
   <?php 
    $heh = dechex(rand(0,10000000));
    ?>
 <?php 


$est  = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  1)->exists();

 $est2  = App\Models\Bet::where('user_id', Auth::user()->id)->where('part_bet_id',  $p->id)->where('outcome',  2)->exists();


?>
   

  <tr style="background-color: #<?=$heh?> ; 
            text-shadow: white 1px 1px 0, white -1px -1px 0, 
                 white -1px 1px 0, white 1px -1px 0; 
                 font-size:30px;
                 font-weight:bold;">
      
    
          
        <td class=" ">x{{$p->coef_on_1}}</td>
        <td class="text-center ">
            
            @if($p->finished ==1)
            <button class="btn btn-success"  type="submit" >WINNER</button>
            @endif
            
        </td>
      <td class="col-6 text-center">{{$p->text}}</td>
       
          <td class="text-center ">
              @if($p->finished ==2)
            <button class="btn btn-success"  type="submit" >WINNER</button>
            @endif
            
        </td>
      
      
      <td class="col-3"> x{{$p->coef_on_2}}</td>
      
      
    </tr>
    

 
 

    @endforeach
    @endif
  </table>   
    
    

</div>




<div class="row">
<div class="col-6 pl-4">
    <table class="table border border-secondary">
         
        <tbody>
            
            
            @foreach($matches1F as $mm)
          
            <tr>
                
              
                <td>{{$mm->member1->name}}</td>
                 <td>VS</td>
                <td>{{$mm->member2->name}}</td>
                  
                <?php if ($mm['ishod'] == "Lose") {?>
                <td style="color: red; font-weight: bold;"><a style="color: red;" href="/user_bet/{{$mm->id}}">{{$mm['ishod']}}</a></td>
                <?php } else {?>
                <td style="color: green; font-weight: bold;"><a style="color: green;" href="/user_bet/{{$mm->id}}">{{$mm['ishod']}}</a></td>
                <?php } ?>  
              </tr>
            
               @endforeach
              
              
              
              
          </tbody>    
    </table>
              
              </div>
    
    <div class="col-6 pl-4">
    <table class="table border border-secondary">
         
        <tbody>
            
            
            @foreach($matches2F as $mm)
            
            <tr>
       
              
                <td>{{$mm->member1->name}}</td>
                 <td>VS</td>
                <td>{{$mm->member2->name}}</td>
                <a href="/user_bet/{{$mm->id}}">
                <?php if ($mm['ishod'] == "Lose") {?>
                <td style="color: red; font-weight: bold;"><a style="color: red;" href="/user_bet/{{$mm->id}}">{{$mm['ishod']}}</a></td>
                <?php } else {?>
                <td style="color: green; font-weight: bold;"><a style="color: green;" href="/user_bet/{{$mm->id}}">{{$mm['ishod']}}</a></td>
                <?php } ?>
              </tr>
             
               @endforeach
              
              
              
              
          </tbody>    
    </table>
              
              </div>
    
    
    
    
    
 </div>


 <div class="card-header mt-1" style=" background-color: #272727; color: white; height: 55px "></div>



    </div>



</div>



@endsection
 
 