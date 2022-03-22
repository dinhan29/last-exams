@extends('user.template')

@section('title', 'Add Exam')
@section ('css')
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bs4 -->

@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ADD EXAM</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Add Exam</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row" style="display: block;">
        <form  enctype="multipart/form-data" method="post">
          @csrf
          <?php
            $q = [];
            $res = [];
            $a = [];
          ?>
          <div class="row text-center">
            <div class="col-11 text-center div-nameexam" style="background-image: url('/user/dist/img/history/chap3_2.png');">
              <p class="p-nameexam">Name of Exam:</p>
              <input id="" name="exam" class="" type="text" style="height: 45px;width: 400px; border-radius: 10px"  value="Exam test"><br><br>
              <div class="row">
                <div class="col-sm-6">
                    <!-- select -->
                  <div class="form-group">
                    <select class="form-control" name="grade" id="grade" required>
                      <option value="">Select Grade</option>
                      @foreach ($grade as $key => $grade)
                      <option value="{{$grade['id']}}" >Grade {{$grade['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left" style="width: 100%;">
                      <span>Background Image</span>
                      <input type="file" id="image" name="image" required>
                    </div>
                  </div>
                  <!-- <input type="file" name="filesTest" required="true"> -->
                </div>
                <div class="col-sm-6" >
                    <!-- select -->
                  <div class="form-group select-subject" >
                    <select class="form-control" name="subject" id="subject" required>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                    <!-- select -->
                  <div class="form-group select-chapter">
                    <select class="form-control" name="chapter" id="chapter" required>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- <div class="col-sm-4">
                  <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" name="status">
                </div> -->
                <!-- <div class="col-sm-4 ">
                  <div class="select_class">
                    <select class="js-example-basic-multiple" name="class[]" multiple="multiple">
                      @foreach ($list as $key => $value)
                      <option value="{{$value['id']}}">{{$value['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
          <!-- <input id="" name="exam" class="" type="text"  value="Exam test"><br><br> -->
          <?php for ($x = 0; $x < 20; $x++) { ?>
            <div class="row div-form-2">
              <div class="col-12 mb-2" style="">
                <textarea id="" name="q[{{$x}}]" class="question-text" rows="4">Question {{$x + 1}}</textarea>
              </div>
              <?php for ($i=1; $i < 5 ; $i++) { ?>
                <div class="col-6 answer-div">
                  <input type="radio" id="" name="res[{{$x}}]" value="{{$i}}" <?php if ($i == 1) { echo 'checked';} ?>>
                  <input id="" name="a[{{$x}}][{{$i}}]" class="col-11 answer-text" type="text"  value="answer {{$i}} - question {{$x + 1}}"><br><br>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
          <div class="col text-center mt-2 mb-2">
            <input class="btn btn-success" type="submit" value="SAVE">
          </div>
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@section ('js')
<!-- BS4 2 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<!-- BS4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Button -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Select Multi -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--  -->
<script>
  $(document).ready(function() {
    //
    $('.js-example-basic-multiple').select2();
    $('.select2-container--default').attr('style','width: 100%');
    //
    $(".select_class").hide();
    $(".toggle-on").text("Public");
    $(".toggle-off").text("Private");
    $('.toggle-on').click(function(){
      console.log('123');
      $(".select_class").show();
    });
    $('.toggle-off').click(function(){
      console.log('456');
      $(".select_class").hide();
    });
    $("select#grade").change(function(){
        var valueGrade = $(this).children("option:selected").val();
        $('.select-subject').css("display", "block");

        $.ajax({
          url: '/subject',
          data: {
              grade: valueGrade,
            },
          success: function(response) {
            $("#subject").empty();
            $('#subject').append($('<option>', {
              value: null,
              text : 'Select Subject'
            }));
            $.each(response, function (i, item) {
              $('#subject').append($('<option>', {
                value: item.id,
                text : item.name
              }));
            });
          }
        });

    });

    $("select#subject").change(function(){
      var valueSubject = $(this).children("option:selected").val();
      $('.select-chapter').css("display", "block");

      $.ajax({
        url: '/chapter',
        data: {
            subject: valueSubject,
          },
        success: function(response) {
          $("#chapter").empty();
          $('#chapter').append($('<option>', {
            value: null,
            text : 'Select Chapter'
          }));
          $.each(response, function (i, item) {
            $('#chapter').append($('<option>', {
              value: item.id,
              text : item.name
            }));
          });
        }
      });
    });


    $('#image').change(function(){
      var img = $('#image')[0].files[0];
      // console.log(img);
      var reader = new FileReader();
      reader.onloadend = function () {
        $('.div-nameexam').css('background-image', 'url("' + reader.result + '")');
      }
      if (img) {
          reader.readAsDataURL(img);
      } else {
      }
    });


  })
</script>

@endsection