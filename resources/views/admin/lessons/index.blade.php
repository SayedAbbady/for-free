@extends('admin.layouts.main')

@section('title')
Lessons
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Lessons</h5>
        <p class="card-category">Show all Lessons </p>
      </div>
      <div class="float-right">
        <a href="{{route('lesson.create')}}">
          <button class="btn btn-primary">add new Lessons</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($lessons) < 1)
      <div class="">
        <div class="alert alert-danger" role="alert">
          No Lessons added
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
        <table class="table table-hover table-striped table-bordered" id="lessons-table">
          <thead class=" text-primary">
            <tr>
              <th> # </th>
              <th> Title </th>
              <th> Level </th>
              <th> Section </th>
              <th> Unit </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($lessons as $key=>$item)
            <tr id="{{$item->l_id}}">
              <td> {{++$i}} </td>
              <td> {{$item->l_name}} </td>
              <td>
                @php
                  $sections = \Illuminate\Support\Facades\DB::table('levels')
                        ->where('l_id', '=', $item->l_level??1)
                        ->get();
                 foreach ($sections as $object){
                     echo $object->l_name;
                     $sectionId = $object->l_section;
                 }

                @endphp

              </td>
              <td>
                @php
                  $sections = \Illuminate\Support\Facades\DB::table('sections')
                        ->where('s_id', '=', $sectionId??1)
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
                <a href="{{route('lesson.edit',$item->l_id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a>

                <!--<a href="javascript:;" data-id="{{$item->l_id}}" data-token="{{csrf_token()}}" class="btn btn-danger deleteLesson"><span class="lnr lnr-trash"></span> Delete</a>-->
                <form action="{{route('les.dele')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$item->l_id}}">
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
