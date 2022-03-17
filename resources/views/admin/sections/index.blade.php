@extends('admin.layouts.main')

@section('title')
Sections
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Sections</h5>
        <p class="card-category">Show all Sections </p>
      </div>
      <div class="float-right">
        <a href="{{route('section.create')}}">
          <button class="btn btn-primary">add new section</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($sections) < 1)
      <div class="">
        <div class="alert alert-danger" role="alert">
          No sections added
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
        <table class="table table-hover table-striped table-bordered" id="section-table">
          <thead class="text-primary">
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Title </th>
              <th> Unit </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($sections as $key=>$item)
            <tr id="{{$item->s_id}}">
              <td> {{++$i}} </td>
              <td> <img width="50px" src="{{asset(($item->s_img))}}" alt=""> </td>
              <td> {{$item->s_name}} </td>
              <td>
                @php
                  $nameunit = App\Models\units::where('u_id',$item->s_unit)->select('u_name')->get();
                  echo $nameunit[0]->u_name;
                @endphp
              </td>
              <td>
                <a href="{{route('section.edit',$item->s_id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a>
                
                <form action="{{route('se.del')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$item->s_id}}">
                    <button type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-danger"><span class="lnr lnr-trash"></span> Delete</button>
                </form>


                {{--<a href="javascript:;" data-id="{{$item->s_id}}" data-token="{{csrf_token()}}" class="btn btn-danger deleteSection"><span class="lnr lnr-trash"></span> Delete</a>--}}
              </td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>
  <div class="card-footer ">
    <hr>
    <div class="stats">

    </div>
  </div>
</div>
</div>
@endsection
