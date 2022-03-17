$(function () {

  'use strict';

  // function to add Forms to DB---------------------------------------
  function saveWithAjax(route,form,element,input) {

    var formData = new FormData($('#'+form)[0]);
    $.ajax({
      url:route,
      method:'post',
      enctype: 'multipart/form-data',
      data: formData,
      processData:false,
      contentType:false,
      cache:false,

      success:function (data) {
        if(data.status == "1") {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#d4edda",
            textColor: '#155724',
          })
          $(element).html('');
          $(input).val('');
        } else {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#dc3545",
            textColor: '#fff',
          })

        }
      },

      error:function (data) {
        var response = JSON.parse(data.responseText);

        $.each(response.errors, function (key, val) {
          $("#"+key+"Errors").text(val);
        })
      }


    })

    return true;
  }

  // function to add Forms to DB LESSON---------------------------------------
  function saveLesson(route,form,element,input) {

    var formData = new FormData($('#'+form)[0]);
    
    for (instance in CKEDITOR.instances) {
      CKEDITOR.instances['lesson_notes'].updateElement();
    }
    
    $.ajax({
      url:route,
      method:'post',
      enctype: 'multipart/form-data',
      data: formData,
      processData:false,
      contentType:false,
      cache:false,

      success:function (data) {
        if(data.status == "1") {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#d4edda",
            textColor: '#155724',
          })
          $(element).html('');
          $(input).val('');
        } else {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#dc3545",
            textColor: '#fff',
          })

        }
      },

      error:function (data) {
        var response = JSON.parse(data.responseText);

        $.each(response.errors, function (key, val) {
          $("#"+key+"Errors").text(val);
        })
      }


    })

    return true;
  }
  // End function to add form ---------------------------------------------

  // function to Edit Slider ---------------------------------------
  function editWithAjax(route,form) {

    var formData = new FormData($('#'+form)[0]);
    $.ajax({
      url:route,
      method:'post',
      enctype: 'multipart/form-data',
      data: formData,
      processData:false,
      contentType:false,
      cache:false,

      success:function (data) {
        if(data.status == "1") {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#d4edda",
            textColor: '#155724',
          })

        } else {
          Snackbar.show({
            pos: "top-center",
            text: data.msg,
            showAction: true,
            duration: 20000,
            actionTextColor: 'blue',
            backgroundColor: "#dc3545",
            textColor: "#fff",
          })

        }
      },

      error:function (data) {
        var response = JSON.parse(data.responseText);

        $.each(response.errors, function (key, val) {
          $("#"+key+"Errors").text(val);
        })
      }


    })

    return true;
  }
  // End function to Edit Slider  ---------------------------------------------

  // start function to delete items with ajax ------------------------------------
  function deleteWithAjax(route,id,token) {

    bootbox.confirm("Are you sure?", function(result){
      if (result === true) {
          $.ajax({
            url: route,
            type: 'post',
            dataType: "JSON",
            data: {
            "id": id,
            "_token": token,
            },
            success: function (data)
            {
              if(data.status == "1") {
                Snackbar.show({
                pos: "top-center",
                text: data.msg,
                showAction: true,
                duration: 20000,
                actionTextColor: 'blue',
                backgroundColor: "#d4edda",
                textColor: '#155724',
                })
                $("#" + id).fadeOut(1500);
              } else {
                Snackbar.show({
                pos: "top-center",
                text: data.msg,
                showAction: true,
                duration: 20000,
                actionTextColor: 'blue',
                backgroundColor: "##dc3545",
                textColor: '#155724',
                })
              }
            }

          });
        }
      });


  }
  // End function to delete items with ajax ------------------------------------

  //****************************************************************************** */

  //unit
  // add
  $("#unitAdd").on('submit',function (e) {
    e.preventDefault();
    saveWithAjax('/admin/unit','unitAdd','.errorClass','.unit-main') ;
  });
  //edit unit
  $("#unitEdit").on('submit',function (e) {
    e.preventDefault();
    editWithAjax('/admin/unit/edit','unitEdit');
  })
  //delete unit
  $(".deleteUnit").on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var token = $(this).data("token");
    deleteWithAjax("/admin/unit/delete",id,token);
  })

  /********************************************************** */

  //section
  // add
  $("#sectionAdd").on('submit',function (e) {
    e.preventDefault();
    saveWithAjax('/admin/section','sectionAdd','.errorClass','.section-main') ;
  });
  //edit section
  $("#sectionEdit").on('submit',function (e) {
    e.preventDefault();
    editWithAjax('/admin/section/edit','sectionEdit');
  })
  //delete section
  $(".deleteSection").on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var token = $(this).data("token");
    deleteWithAjax("/admin/section/delete",id,token);
  })

  /********************************************************** */

 //Level
  // add
  $("#levelAdd").on('submit',function (e) {
    e.preventDefault();
    saveWithAjax('/admin/level','levelAdd','.errorClass','.level-main') ;
  });

  //edit section
  $("#levelEdit").on('submit',function (e) {
    e.preventDefault();
    editWithAjax('/admin/level/edit','levelEdit');
  })

  //delete section
  $(".deleteLevel").on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var token = $(this).data("token");
    deleteWithAjax("/admin/level/delete",id,token);
  })

  /********************************************************** */ /********************************************************** */

 //lesson
  // add
  // $("#lessonAdd").on('submit',function (e) {
  //   e.preventDefault();
  //   saveLesson('/admin/lesson','lessonAdd','.errorClass','.lesson-main') ;
  // });

  //edit section
  $("#lessonEdit").on('submit',function (e) {
    e.preventDefault();
    editWithAjax('/admin/lesson/edit','lessonEdit');
  })

  //delete section
  $(".deleteLesson").on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var token = $(this).data("token");
    deleteWithAjax("/admin/lesson/delete",id,token);
  })

  /********************************************************** */

  // staff member

  $("#staffAdd").on('submit',function (e) {
    e.preventDefault();
    saveWithAjax('/admin/staff/addNew','staffAdd','.errorClass','.staff-main') ;
  })

  //edit staff
  $("#staffEdit").on('submit',function (e) {
    e.preventDefault();
    editWithAjax('/admin/staff/editOne','staffEdit');
  })

  // delete staff
  $(".deleteMember").on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var token = $(this).data("token");
    deleteWithAjax("/admin/staff/staffDelete",id,token);
  })

});
