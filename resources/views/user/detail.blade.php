@extends('user.template')

@section('title', 'Detail Exam')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Exam</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Detail Exam</li>
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
        <form method="post" enctype="multipart/form-data">
          @csrf
          <div class="row text-center">
            <div class="col-11 text-center div-nameexam" style="background-image: url('/user/dist/img/subject/{{$nameExam['image']}}');">
              <p class="p-nameexam">Name of Exam:</p>
              <input id="" name="exam" class="" type="text" style="height: 45px;width: 400px" value="{{$nameExam['name']}}"><br><br>
              <div class="row">
                <div class="col-sm-6">
                    <!-- select -->
                  <div class="form-group">
                    <select class="form-control" name="grade" id="grade" required>
                      <option value="">Select Grade</option>
                      @foreach ($grade as $key => $value)
                        <option value="{{$value['id']}}" @if($nameExam['id_grade'] == $value['id']) selected @endif>Grade {{$value['name']}}</option>
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
                <div class="col-sm-6">
                    <!-- select -->
                  <div class="form-group">
                    <select class="form-control" name="subject" id="subject" required>
                      <option value="">Select Subject</option>
                      @foreach ($subject as $key => $value)
                        <option value="{{$value['id']}}" @if($nameExam['subject'] == $value['id']) selected @endif>{{$value['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                    <!-- select -->
                  <div class="form-group">
                    <select class="form-control" name="chapter" id="chapter" required>
                      <option value="">Select Chapter</option>
                      @foreach ($chapter as $key => $value)
                        <option value="{{$value['id']}}" @if($nameExam['id_chapter'] == $value['id']) selected @endif>{{$value['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row div-form">
            <?php
              $question = [] ;
              $val = 0;
              foreach ($exam as $key => $value) {
                if (!in_array($value['id'], $question)){
            ?>
                  <div class="col-12 mb-2" style="">
                    <textarea id="" name="q[{{$value['id']}}]" class="question-text" rows="4">{{$value['name']}}</textarea>
                  </div>
            <?php
                  array_push($question, $value['id']);
                }
                if (in_array($value['id'], $question)) {
                  if ($val == 4) {
                    $val = 1;
                  } else {
                    $val++;
                  }
            ?>
                  <div class="col-6 answer-div">
                    <input type="radio" id="" name="res[{{$value['id']}}]" value="{{$val}}" <?php echo $val == $value['answer'] ? ' checked' : ''; ?>>
                    <input id="" name="a[{{$value['answer_id']}}]" class="col-11 answer-text" type="text"  value="{{$value['answer_name']}}"><br><br>
                  </div>

            <?php
                }
              }
            ?>
          </div>
          <div class="col text-center mt-2 mb-2">
            <input class="btn btn-success" type="submit" value="SAVE">
          </div>
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // $('select').selectpicker();
    $("select#grade").change(function(){
      var valueGrade = $(this).children("option:selected").val();

      $.ajax({
        url: '/subject',
        data: {
            grade: valueGrade,
          },
        success: function(response) {
          $("#subject").empty();
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

      $.ajax({
        url: '/chapter',
        data: {
            subject: valueSubject,
          },
        success: function(response) {
          $.each(response, function (i, item) {
            $("#chapter").empty();
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
      console.log(img);
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