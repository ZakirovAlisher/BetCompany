@extends('layouts.app')

@section('content')
<div class="row main"   >



    <div class="col-lg-12 col-xl-6 left no-gutters border border-secondary "  >

        <div  class=" p-4 border border-secondary" >
            
            <img src="{{$n->url}}" class="border border-secondary"style="width:100%; height:100%">
            
          </div>


        
        
       
        
          <div class="container ml-3">
            
              <h2 class="my-3 pb-3" style="border-bottom: 1px gray solid">{{$n->title}}</h2>
              
              <div class="mb-3">{{$n->content}}</div>
              <div class="mb-3 p-2" style="border-bottom: 1px gray dashed">{{$n->large_content}}</div>
                            <div class="mb-2">{{$n->created_at}}</div>
              <a class="btn btn-info" href="/" >ALL NEWS</a>
              
       </div>
       
        
        
        
 
    </div>




    <div class="col-lg-12 col-xl-6 bets no-gutters  "  >
        <div class="container-fluid mt-3 ml-5" >
           
            <form method="get" >
              <label class="checkbox-inline">
                  <input type="radio" name="type" value="Football">Football
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="Dota 2">Dota 2
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="UFC">UFC
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="Volleyball">Volleyball
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="Basketball">Basketball
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="Counter-Strike">Counter-Strike
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="MMA">MMA
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="type" value="Baseball">Baseball
              </label>
               
               
              <label class="checkbox-inline">
                  <input type="submit" class="btn" value="Filter" style="background-color: #272727; color: white;"> 
              </label>
            </form>
          </div>
          
        
         @foreach($matches as $m)  
         
       @if($m->winner ==0)
         <a href="user_bet/{{$m->id}}" style="text-decoration: none; color:black">
<div class="card mt-4"   style="margin: auto; max-width: 52rem; padding: 0 !important; background-color: #cacaca;" >
    <div class="card-header" style=" background-color: #272727; color: white;">
     <span class="float-left"> {{$m->start_time}} </span>
     <span class="float-right">{{$m->tournament}}</span>

    </div>
    <div class="card-body row font-weight-bold">

        <span class="col-12 col-md-3 text-center" style="margin: auto;">
            {{$m->member1->name}}<br>
            <span>x2.00</span>
        </span>
        <div class="col-12 col-md-2 text-center">
           
            <img  width="120" height="120" class="border border-secondary" 
  
                  style="
                  
                  <?php
                  
                  if($m->winner==1)
                  {                      echo 'border: 6px green solid !important;';}
               ?>
                  
                  border-radius: 100px;" src="{{$m->member1->url}}" alt="">
        </div>

        <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
        <div class="col-12 col-md-2 text-center">
           
            <img width="120" height="120" class="border border-secondary" style="
                   <?php
                  
                  if($m->winner==2)
                  {                      echo 'border: 6px green solid !important;';}
               ?>
                 border-radius: 100px; "src="{{$m->member2->url}}" alt="">
        </div>
        <span class="col-12 col-md-3 text-center" style="margin: auto;">
             {{$m->member2->name}}<br>
            <span>x1.67</span>
        </span>
 

      </div>
  </div>
</a>
 @endif
         
@endforeach
        
        
@foreach($matches as $m)  

     @if($m->winner !=0)
         <a href="user_bet/{{$m->id}}" style="text-decoration: none; color:black">
             <div class="card mt-4"   style="margin: auto; max-width: 52rem; padding: 0 !important; background-color: #999999;" >
    <div class="card-header" style=" background-color: #272727; color: white;">
     <span class="float-left"> {{$m->start_time}} </span>
     <span class="float-right">{{$m->tournament}}</span>

    </div>
    <div class="card-body row font-weight-bold">

        <span class="col-12 col-md-3 text-center" style="margin: auto;">
            {{$m->member1->name}}<br>
            <span>x2.00</span>
        </span>
        <div class="col-12 col-md-2 text-center">
           
            <img  width="120" height="120" class="border border-secondary" 
  
                  style="
                  
                  <?php
                  
                  if($m->winner==1)
                  {                      echo 'border: 6px green solid !important;';}
               ?>
                  
                  border-radius: 100px;" src="{{$m->member1->url}}" alt="">
        </div>

        <div class="col-2 text-center display-3" style="margin: auto;">  VS </div>
        <div class="col-12 col-md-2 text-center">
           
            <img width="120" height="120" class="border border-secondary" style="
                   <?php
                  
                  if($m->winner==2)
                  {                      echo 'border: 6px green solid !important;';}
               ?>
                 border-radius: 100px; "src="{{$m->member2->url}}" alt="">
        </div>
        <span class="col-12 col-md-3 text-center" style="margin: auto;">
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