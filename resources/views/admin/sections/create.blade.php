@extends('admin.layouts.main')

@section('title')
  Add Section
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 col-12 mx-auto">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Sections</h5>
            <p class="card-category">Add new section </p>
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" accept-charset="utf-8" method="POST" id="sectionAdd">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Title</label>
                  <input type="text" class="form-control section-main" name="title" placeholder="Title">
                  <small class="text-danger errorClass font-weight-bold" id="titleErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Unit</label>
                  <select name="unit" class="form-control" id="">
                    @php
                      $nameunit = App\Models\units::select('u_id','u_name')->get();
                      @endphp
                      @foreach ($nameunit as $value)
                        <option value='{{$value->u_id}}'>{{$value->u_name}}</option>
                      @endforeach
                  </select>
                  <small class="text-danger errorClass font-weight-bold" id="sectionErrors"></small>
                </div>


                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Image</label>
                  <input type="file" name="file" id="file" class="input-file unit-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">Choose a file</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
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
