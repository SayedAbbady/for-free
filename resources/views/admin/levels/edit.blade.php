@extends('admin.layouts.main')

@section('title')
  Edit Level
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 col-12 mx-auto">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Level</h5>
            <p class="card-category">Edit levels </p>
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" accept-charset="utf-8" method="POST" id="levelEdit">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{ $level[0]->l_id }}">
              <input type="hidden" name="bg" value="{{ $level[0]->l_img }}">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Title</label>
                  <input type="text" class="form-control section-main" name="title" placeholder="Title" value="{{$level[0]->l_name}}">
                  <small class="text-danger errorClass font-weight-bold" id="titleErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Section</label>
                  <select name="section" class="form-control" id="">
                    @php
                      $nameseaction = App\Models\sections::select('s_id','s_name')->get();
                      @endphp
                      @foreach ($nameseaction as $value)
                        <option value="{{$value->s_id}}" {{($value->s_id==$level[0]->l_section)?"selected":""}}>{{$value->s_name}}</option>
                      @endforeach
                  </select>
                  <small class="text-danger errorClass font-weight-bold" id="sectionErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Level type</label>
                  <select name="type" class="form-control" id="">
                    <option value='0' {{($level[0]->l_is_free=='0')?"selected":""}}>Paid</option>
                    <option value='1' {{($level[0]->l_is_free=='1')?"selected":""}}>free</option>
                  </select>
                  <small class="text-danger errorClass font-weight-bold" id="typeErrors"></small>
                </div>

                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Image</label>
                  <input type="file" name="file" id="file" class="input-file unit-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">Choose a file</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                  <img src="{{asset($level[0]->l_img)}}" width="100%" alt="">

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
