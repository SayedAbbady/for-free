@extends('admin.layouts.main')

@section('title')
  Edit staff member
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 col-12 mx-auto">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Staff</h5>
            <p class="card-category">Edit staff member </p>
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" accept-charset="utf-8" method="POST" id="staffEdit">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $user[0]->id }}">
              <div class="form-row">
                <div class="form-group col-md-12">

                  <label for="">Name</label>
                  <input type="text" class="form-control staff-main" name="name" placeholder="Name" value="{{$user[0]->name}}">
                  <small class="text-danger errorClass font-weight-bold" id="nameErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Email</label>
                  <input type="email" class="form-control staff-main" name="email" placeholder="Email" value="{{$user[0]->email}}">
                  <small class="text-danger errorClass font-weight-bold" id="emailErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">password</label>
                  <input type="text" class="form-control staff-main" name="password" placeholder="Password">
                  <input type="hidden"  name="oldpassword" value="{{$user[0]->password}}">
                  <small class="text-danger errorClass font-weight-bold" id="passwordErrors"></small>
                </div>

              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="card-footer ">
              <hr>
              <div class="stats">
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>

@endsection
