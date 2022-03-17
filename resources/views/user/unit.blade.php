@extends('user.layout')

@section('title')
Eaalim for free
@endsection

@section('content')
@include('user.navbar')
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
    <div style='margin-top:90px;font-size:12px'> 
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb bg-white" style='padding-bottom:0;margin-bottom:0'>
        <li class="breadcrumb-item"><a href="https://eaalim.com">Eaalim</a></li>
            
        <li class="breadcrumb-item" ><a href="https://eaalim.com/teachers">Teachers</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo $units[0]->u_name;?></li>
      </ul>
    </nav>
  </div>
  
  <hr style='margin-top:0'>
  

  <?php 
    if($units->count() != 0){
        foreach ($units as $unit) {
            ?>
  <!-- unit -->
  <div class="col-12 text-center">
    <img src="{{asset('/'.$unit->u_img??"assets/images/newIcon.png")}}" style="width:200px;height:200px;"
      class="rounded-circle img-fluid mx-auto d-block">
    <h4>
      <?php echo $unit->u_name?>
    </h4>
    <br>
  </div>
  <div class="row">
    <?php 
    $sections = \Illuminate\Support\Facades\DB::table('sections')
                         ->where('s_unit', '=', $unit->u_id)
                         ->get();

    if($sections->count() != 0){
        foreach ($sections as $section) {
            ?>
    <!-- section -->
    <div class="col-md-4 text-center">
         <a href="{{route('sectionUi',$section->s_id)}}">
      <div class="bord" style='background:#f1f1f1!important;border-radius:7px'>
        <br>
        <img src="{{asset('/'.$section->s_img??"assets/images/newIcon.png")}}"
          style="width:100px;height:100px;" class="rounded-circle img-fluid mx-auto d-block">
        <h5>
          
          <p style='font-weight:bold;font-size:14px;margin-top:7px;color:#8a0500'>
           
              <?php echo $section->s_name?>
            
          </p>
          <small style="color:green"><i class="fa fa-unlock"></i> UnLocked </small>
          
        </h5>
      </div>
      </a>
      <br>
    </div>
    <!-- section -->
    <?php
        }
    }
?>



  </div>
  <br>
  <br>
  <!-- unit -->
  <?php
        }
    }
?>


</div>
@endsection