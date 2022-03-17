@extends('admin.layouts.main')

@section('title')
  Add Lessons
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 mx-auto col-12">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Lessons</h5>
            <p class="card-category">Add new lesson </p>
            
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" action="{{route('lesson.store')}}" accept-charset="utf-8" method="POST">
              

              <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <div class="form-row">
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
                <div class="form-group col-md-12">
                  <label for="">Lesson title</label>
                  <input type="text" class="form-control lesson-main" name="title" placeholder="Title">
                  <small class="text-danger errorClass font-weight-bold" id="titleErrors"></small>
                </div>
                
                <div class="form-group col-md-12">
                  <label for="">lesson Video</label>
                  <textarea style='min-height:100px!important;' class="form-control lesson-main" name="lesson_video" placeholder="lesson Video"></textarea>
                  <small class="text-danger errorClass font-weight-bold" id="lesson_videoErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Notes</label>
                  <textarea id="summernote" style='min-height:100px!important;' class="summernote form-control lesson-main" name="lesson_notes" placeholder="lesson Notes"></textarea>
                  <small class="text-danger errorClass font-weight-bold" id="lesson_notesErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Level</label>
                  <select name="level" class="form-control" id="">
                    @php
                      $nameunit = App\Models\units::select('u_id','u_name')->get();
                    foreach ($nameunit as $value){
                      echo "<optgroup label='$value->u_name'>";

                      $namesection = App\Models\sections::where('s_unit','=',$value->u_id)->select('s_id','s_name')->get();
                      foreach ($namesection as $sectionvalue){
                          echo "<optgroup label='-- $sectionvalue->s_name'>";
                          $namelevel = App\Models\levels::where('l_section','=',$sectionvalue->s_id)->select('l_id','l_name')->get();
                          foreach ($namelevel as $levelvalue) {
                              echo "<option value='$levelvalue->l_id'>$levelvalue->l_name</option>";
                          }
                          echo "</optgroup>";
                      }
                      echo "</optgroup>
                      <optgroup label='====================================='> </optgroup>";
                    }
                    @endphp

                  </select>
                  <small class="text-danger errorClass font-weight-bold" id="levelErrors"></small>
                </div>
                

                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Game</label>
                  <input type="file" name="game" class="input-file lesson-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a game file</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                </div>
                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select IQ quizes</label>
                  <input type="file" name="quiz" class="input-file lesson-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">Choose IQ quizes</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                </div>
                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Sound quizes</label>
                  <input type="file" name="new_file" class="input-file lesson-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">Choose Sound quizes</span>
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
