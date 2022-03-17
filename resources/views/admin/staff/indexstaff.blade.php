@extends('admin.layouts.main')

@section('title')
Staff
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Staff</h5>
        <p class="card-category">Show all staff member </p>
      </div>
      <div class="float-right">
        <a href="{{route('staff.add')}}">
          <button class="btn btn-primary">add new staff member</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($users) < 1) 
      <div class="">
        <div class="alert alert-danger" role="alert">
          No staff member yet
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
        <table class="table table-hover">
          <thead class=" text-primary">
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Email </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($users as $key=>$item)
            <tr class="{{$key%2=='0'?"table-active":""}}" id="{{$item->id}}">
              <td> {{++$i}} </td>
              <td> {{$item->name}} </td>
              <td> {{$item->email}} </td>
              <td> 
                <a href="{{route('staff.edit',$item->id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a> 
              </td>
              <td>
                <form action="{{route('del.staff.ss')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
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