@extends('admin.layouts.main')

@section('title')
Units
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Unit</h5>
        <p class="card-category">Show all units </p>
      </div>
      <div class="float-right">
        <a href="{{route('unit.create')}}">
          <button class="btn btn-primary">add new unit</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($units) < 1) 
      <div class="">
        <div class="alert alert-danger" role="alert">
          No units added
        </div>
      </div>
      @endif
    <div class="">
      @if (session()->has('msg'))
                  <div class="col-12">
                    <div class="alert alert-success">
                      {{ session()->get('msg') }}
                    </div>
                  </div>
                @endif
                @if (session()->has('error'))
                  <div class="col-12">
                    <div class="alert alert-danger">
                      {{ session()->get('error') }}
                    </div>
                  </div>
                @endif
      <div class="">
        <table class="table table-hover table-striped table-bordered" id="unit-table">
          <thead class=" text-primary">
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Title </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($units as $key=>$item)
            <tr class="" id="{{$item->u_id}}">
              <td> {{++$i}} </td>
              <td> <img width="50px" src="{{asset(($item->u_img)?:'assets/images/newIcon.png')}}" alt=""> </td>
              <td> {{$item->u_name}} </td>
              <td> 
                <a href="{{route('unit.edit',$item->u_id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a> 
              
               <form action="{{route('uni.delete')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$item->u_id}}">
                    <button type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-danger"><span class="lnr lnr-trash"></span> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
        </table>
        
      </div>
    </div>
  </div>
  <div class="card-footer ">
    <hr>
    <div class="stats"></div>
  </div>
</div>
</div>
@endsection