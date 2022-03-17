@extends('admin.layouts.main')

@section('title')
Levels
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Levels</h5>
        <p class="card-category">Show all Levels </p>
      </div>
      <div class="float-right">
        <a href="{{route('level.create')}}">
          <button class="btn btn-primary">add new Levels</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($levels) < 1)
      <div class="">
        <div class="alert alert-danger" role="alert">
          No Levels added
        </div>
      </div>
      @endif
    <div class="">
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
        <table class="table table-hover table-striped table-bordered" id="level-table">
          <thead class=" text-primary">
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Title </th>
              <th> Section </th>
              <th> Unit </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($levels as $key=>$item)
            <tr class="" id="{{$item->l_id}}">
              <td> {{++$i}} </td>
              <td> <img width="50px" src="{{asset(($item->l_img))}}" alt=""> </td>
              <td> {{$item->l_name}} </td>
              <td>
                @php
                   $sections = \Illuminate\Support\Facades\DB::table('sections')
                         ->where('s_id', '=', $item->l_section??1)
                         ->get();
                  foreach ($sections as $object){
                      echo $object->s_name;
                      $unitId = $object->s_unit;
                  }

                @endphp

              </td>
              <td>
                @php
                   $units = \Illuminate\Support\Facades\DB::table('units')
                         ->where('u_id', '=', $unitId??17)
                         ->get();
                  foreach ($units as $object){
                      echo $object->u_name;
                  }
                @endphp

              </td>
              <td>
                <a href="{{route('level.edit',$item->l_id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a>
                
                <form action="{{route('lev.del')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$item->l_id}}">
                    <button type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-danger"><span class="lnr lnr-trash"></span> Delete</button>
                </form>



                {{--<a href="javascript:;" data-id="{{$item->l_id}}" data-token="{{csrf_token()}}" class="btn btn-danger deleteLevel"><span class="lnr lnr-trash"></span> Delete</a>--}}
              </td>
            </tr>
            @endforeach
        </table>
        {{-- {{$levels->links()}} --}}
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
