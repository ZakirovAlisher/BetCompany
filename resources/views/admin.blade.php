@extends('layouts.app')

@section('content')


<div class="container text-center"   >
<span class=" w-100 display-1 font-weight-bold"> ADMIN PANEL</span><br>
<a href="members" class="btn btn-success">MEMBER CRUD</a>
<a href="news" class="btn btn-success">NEWS CRUD</a>
 <form action="{{ route('matches.store') }}" method="post">
    <div class="card mt-4"   style="margin: auto; max-width: 100%; padding: 0 !important; background-color: #cacaca;" >
       
             @csrf
        <div class="card-header" style=" background-color: #272727; color: white;">
            <span class="float-left   ">Date of begining: <input type="datetime-local" name="start_time"> </span>
            <span class="float-right  ">Tournament: <input type="text" name="tournament"> </span>
               <span class="float-right  ">Sport type: <input type="text" name="sport_type"> </span>
                  <span class="float-right  ml-3">Coef on 2: <input type="text" name="c2"> </span>
    <span class="float-right  ">Coef on 1: <input type="text" name="c1"> </span>
    
        </div>
        <div class="card-body row font-weight-bold">
    
            <span class="col-3 text-center" style="margin: auto;">

<div class="form-group">
    <select class="form-control" id="sel1" onchange = "swap1()" name="member1_id" >
        @foreach($members as $mem)
        <option   value="{{$mem->id}}">{{$mem->name}}</option>
 
 @endforeach
                </select>
</div>
            </span>
            <div class="col-2 text-center">
               
                <img id="s1" width="120" height="120" class="border border-secondary" style="border-radius: 100px;" src="https://www.kindpng.com/picc/m/421-4212275_transparent-default-avatar-png-avatar-img-png-download.png" alt="">
            </div>
    
            <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
            <div class="col-2 text-center">
               
                <img id="s2"width="120" height="120"class="border border-secondary" style="border-radius: 100px; "src="https://www.kindpng.com/picc/m/421-4212275_transparent-default-avatar-png-avatar-img-png-download.png" alt="">
            </div>
            <span class="col-3 text-center" style="margin: auto;">
                <div class="form-group">
                    <select class="form-control" id="sel2" onchange = "swap2()" name="member2_id" >
     @foreach($members as $mem)
     <option  value="{{$mem->id}}">{{$mem->name}}</option>
 
 @endforeach
                    </select>
    </div>
            </span>
     
    
          </div>
          <button class="btn w-100"style="background-color: black; color:white;">ADD BET</button>
       
      </div>
     </form>


 @foreach($members as $mem)
 <div id="dif{{$mem->id}}" style="display:none">{{$mem->url}} </div>
 
 @endforeach
 
<script>
function swap1(a){
    var id = "dif" + document.getElementById('sel1').value;
    document.getElementById('s1').src = document.getElementById(id).innerHTML;
    
}
function swap2(a){
    var id = "dif" + document.getElementById('sel2').value;
    document.getElementById('s2').src = document.getElementById(id).innerHTML;
    
}

</script>

        
          





   @foreach($matches as $m)  
   @if($m->winner == 0)
 <a href="admin_bet/{{$m->id}}" style="text-decoration: none; color:black">
      <div class="card mt-4"   style="margin: auto; max-width: 100%; padding: 0 !important; background-color: #cacaca;" >
        <div class="card-header" style=" background-color: #272727; color: white;">
         <span class="float-left"> {{$m->start_time}} </span>
         <span class="float-right">{{$m->tournament}}</span>
    
        </div>
        <div class="card-body row font-weight-bold">
    
            <span class="col-3 text-center" style="margin: auto;">
                 {{$m->member1->name}}<br>
                <span>x2.00</span>
            </span>
            <div class="col-2 text-center">
               
                <img  width="120" height="120" class="border border-secondary" style="border-radius: 100px;" src="{{$m->member1->url}}" alt="">
            </div>
    
            <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
            <div class="col-2 text-center">
               
                <img width="120" height="120"class="border border-secondary" style="border-radius: 100px; "src="{{$m->member2->url}}" alt="">
            </div>
            <span class="col-3 text-center" style="margin: auto;">
                 {{$m->member2->name}}<br>
                <span>x1.67</span>
            </span>
     
    
          </div>


  





      </div>

</a>
   @endif
@endforeach

   @foreach($matches as $m)  
   @if($m->winner != 0)
 <a href="admin_bet/{{$m->id}}" style="text-decoration: none; color:black">
     <div class="card mt-4"   style="margin: auto; max-width: 100%; padding: 0 !important; background-color: #999999" >
        <div class="card-header" style=" background-color: #272727; color: white;">
         <span class="float-left"> {{$m->start_time}} </span>
         <span class="float-right">{{$m->tournament}}</span>
    
        </div>
        <div class="card-body row font-weight-bold">
    
            <span class="col-3 text-center" style="margin: auto;">
                 {{$m->member1->name}}<br>
                <span>x2.00</span>
            </span>
            <div class="col-2 text-center">
               
                <img  width="120" height="120" class="border border-secondary" style="border-radius: 100px;" src="{{$m->member1->url}}" alt="">
            </div>
    
            <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
            <div class="col-2 text-center">
               
                <img width="120" height="120"class="border border-secondary" style="border-radius: 100px; "src="{{$m->member2->url}}" alt="">
            </div>
            <span class="col-3 text-center" style="margin: auto;">
                 {{$m->member2->name}}<br>
                <span>x1.67</span>
            </span>
     
    
          </div>


  





      </div>

</a>
   @endif
@endforeach
    




 


    </div>



</div>



@endsection










 