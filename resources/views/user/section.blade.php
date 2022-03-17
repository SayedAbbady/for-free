@extends('user.layout')

@section('title')
Eaalim For free
@endsection

@section('content')
@include('user.navbar')
<div class="d-flex align-items-center justify-content-center bg-dark text-white" style="min-height:450px;height:auto;background-color:#000000!important;font-size:40px;font-weight:bold">
    <div class='text-center'>
    Eaalim |<small>For free</small>    
    
    
    <ul class="ul-cust">
        <li class="d-block text-center">
                    
                </li>
                  <li class="" >
                      <a class="" style="font-family:arial" href="{{asset('/')}}">Home </a>
                  </li>
                 
                  @foreach($units as $uniti)
                             
                  <li class="">
                      <a class="" style="font-family:arial" href="{{route('show.unit',$uniti->u_id)}}">{{$uniti->u_name}}</a>
                  </li>
                  @endforeach         
                          
                
                  
                  
                  
              </ul>
              </div>
</div>

<div class="container">
<div style='margin-top:90px;font-size:12px'> 
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb bg-white" style='padding-bottom:0;margin-bottom:0'>
        <li class="breadcrumb-item"><a href="https://eaalim.com">Eaalim</a></li>
        
        <li class="breadcrumb-item" ><a href="https://eaalim.com/teachers">teachers</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo $sec[0]->s_name;?></li>
      </ul>
    </nav>
  </div>
  
  <hr style='margin-top:0'>
 

  
<!-- unit -->
<div class="col-12 text-center">
  <img src="{{asset('/'.$sec[0]->s_img)}}" style="width:200px;height:200px;" class="rounded-circle img-fluid mx-auto d-block">
  <h4> <?php echo $sec[0]->s_name?> </h4>
  <br>
</div>
<div class="row">
  <?php 
      $levels = \Illuminate\Support\Facades\DB::table('levels')
                      ->where('l_section', '=', $sec[0]->s_id??1)
                      ->get();
    

      if($levels->count() != 0){
          foreach ($levels as $level) {
              
              ?>
                  <!-- level -->
                  <div class="col-md-3 text-center">
                      <a href="{{route('levelUi',$level->l_id)}}">
                      <div class="bord" style='background:#f1f1f1!important;border-radius:7px'>
                      <br>
                      <h5> 
                          <?php 
                      
                              if($level->l_is_free == 1){
                                  ?>
                                  <img src="{{asset('/'.$level->l_img)}}" style="width:100px;height:100px;" class="rounded-circle img-fluid mx-auto d-block">
                                  <p style='font-weight:bold;font-size:14px;margin-top:7px;color:#8a0500'>
                                       <?php echo $level->l_name?> 
                                  </p>
                                  <small style="color:green;font-family:arial"><i class="fa fa-unlock"></i> UnLocked </small>
                                  <?php
                              }else{
                                  
                                ?>
                                <img src="{{asset('/'.$level->l_img)}}" style="width:100px;height:100px;filter: grayscale(100%);" class="rounded-circle img-fluid mx-auto d-block">
                                <p> <?php echo $level->l_name?> </p>
                                <small style="font-family:arial"><i class="fa fa-lock"></i> Locked </small>
                                <?php
                                  
                                  
                              }
                          ?>    
                      </h5>
                      </div> 
                      </a>
                  </div>
                  <!-- level -->
              <?php
          }
      }
  ?>
  


</div>
<br>
<br>
<!-- unit -->



</div>
@endsection