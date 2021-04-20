@extends('layouts.app')

@section('content')
<div class="row main"   >



    <div class="col-lg-12 col-xl-6 left no-gutters border border-secondary"  >

        <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active  ">
                <img class="d-block w-100" src="static/int.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="static/ufc.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="static/maxresdefault.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


        
        
       @foreach($news as $n) 
        
          <div class="topic container">
            <div class="topic_photo ">

           <img class="ml-5"src="{{$n->url}}">
           
       </div>
            <div class="topic_text ">
                
                <div class="topic_name"><a style="color:black" href="/news_details/{{$n->id}}">{{$n->title}}</a></div>
                
                 <div class="topic_date"><span class="grey">Posted by </span>{{$n->user->name}} <span class="grey"> </span></div>
            <div class="topic_content"> {{$n->content}}
                <div class="mt-2 text-muted">{{$n->created_at}}</div>
            </div>
       </div>
       </div>
       
        @endforeach
        
        
      
 


<div class="str_bar ml-5">
    {{$news->links('vendor/pagination/default')}}
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
            <?php 
           $pb = App\Models\PartBet::where('text','WIN')->where('match_id', $m->id)->first();
           $c1 = $pb->coef_on_1;$c2 = $pb->coef_on_2;
            ?>
            
            <span>x{{$c1}}</span>
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
            
            
            <span>x{{$c2}}</span>
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
                <?php 
           $pb = App\Models\PartBet::where('text','WIN')->where('match_id', $m->id)->first();
           $c1 = $pb->coef_on_1;$c2 = $pb->coef_on_2;
            ?>
            <span>  <span>x{{$c1}}</span></span>
        </span>
        <div class="col-12 col-md-2 text-center">
           
            <img  width="120" height="120" class="border border-secondary" 
  
                  style="
                  
                  <?php
                  
                  if($m->winner==1)
                  { echo 'border: 6px green solid !important;';}
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
              <span>x{{$c2}}</span>
        </span>
 

      </div>
  </div>
</a>
         @endif
         
@endforeach



 



    </div>



</div>






 @endsection