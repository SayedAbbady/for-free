@extends('admin.layouts.main')

@section('title')
  Edit Unit
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 col-12 mx-auto">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Unit</h5>
            <p class="card-category">Edit unit </p>
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" accept-charset="utf-8" method="POST" id="unitEdit">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $unit[0]->u_id }}">
              <input type="hidden" name="bg" value="{{ $unit[0]->u_img }}">
              <div class="form-row">
                <div class="form-group col-md-12">

                  <label for="">Title</label>
                  <input type="text" class="form-control unit-main" name="title" placeholder="Title" value="{{$unit[0]->u_name}}">
                  <small class="text-danger errorClass font-weight-bold" id="unitErrors"></small>
                </div>

                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Image</label>
                  <input type="file" name="file" id="file" class="input-file unit-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">{{$unit[0]->u_img??'Choose a file'}}</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                  <img src="{{asset($unit[0]->u_img)}}" width="100%" alt="">
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
