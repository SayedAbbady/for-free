@extends('admin.layouts.main')

@section('title')
Staff
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Users</h5>
        <p class="card-category">Show all Users </p>
      </div>
      
    </div>
    <div class="card-body">
      @if (COUNT($users) < 1) 
      <div class="">
        <div class="alert alert-danger" role="alert">
          No Users yet
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
              <th> Phone number </th>
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
                <form action="{{route('del.user.de')}}" method="post">
                    
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