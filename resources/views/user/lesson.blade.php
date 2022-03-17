@extends('user.layout')

@section('title')
Eaalim For free
@endsection

@section('content')
  @include('user.navbar')
  @php 
  // var_dump(Request()->parameter) ;
  $n = explode('/',Request::path());
  
  @endphp
  <div class="side-menu" style="padding-top:7px;z-index:55">
    @foreach ($lessons as $lesson) 
        
        <a href="{{route('lessonUi',['id'=>$lesson->l_id,'level'=>$lesson->l_level])}}" class="{{($n[1]==$lesson->l_id)?'active':''}} un-locked "> <i class="fa fa-unlock"></i> <?php echo $lesson->l_name?> </a>
    @endforeach
</div>
<div class="lock"> <i class="fa fa-chevron-right"></i> </div>
<div class="d-flex align-items-center justify-content-center bg-dark text-white" style="min-height:450px;height:auto;background-color:#000000!important;font-size:40px;font-weight:bold">
    <div class='text-center'>
    Eaalim |<small>For free</small>    
    
    
    <ul class="ul-cust">
        <li class="d-block text-center">
                    
                </li>
                  <li class="">
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
    <br>
    <br>
    <br>
    <div class="bord">
        <h4> <?php echo $lessono->l_name?>  
            <?php 
            
            if($lessono->l_live != ''){
                ?>
                    <div class="pull-right">
                        <a href="<?php echo $lessono->l_live?>" target="_blank" class="btn btn-primary"><i class="fa fa-television"></i> Go A live </a> 
                    </div>
                <?php
            }

            ?>
        </h4>
        
        <hr>
        <?php echo $lessono->l_video?>
        <br>
        
        
        <br>
        <h5> Lesson Notes : </h5>
        <hr>
        <?php echo $lessono->l_notes?>
        <hr>
        
        
        <br>
        <div class="row">
            
            <div class="col-md-12 text-center"> 
                <?php if($lessono->l_game != ''){
                ?>
                    <a href="{{asset('/'.$lessono->l_game)}}" target="_blank" class="btn btn-info"> Lesson Game </a>
                    <?php
                }?>
            <?php if($lessono->l_quiz != ''){
                ?>
                    <a href="{{asset('/'.$lessono->l_quiz)}}" target="_blank" class="mx-3 btn btn-danger"> IQ quizes </a>
                    <?php
            }?> 
            <?php if($lessono->l_file != ''){
                ?>
                    <a href="{{asset('/'.$lessono->l_file)}}" target="_blank" class="btn btn-success"> Sound quizes </a>
                    <?php
            }?> 
            <br>
            </div>
            
        </div>
        
    </div>
    <br>
    <br>
</div>



@endsection
