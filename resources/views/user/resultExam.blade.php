@extends('user.template')

@section('title', 'Test Exam')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Result</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Result</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid" style="background-image: url('/user/dist/img/subject/{{$nameExam[0]['image']}}');">
      <div class="row">
        <div class="col-8 mt-2 mb-2 div-result" >
          <div class="row">
            <div class="col-12">
              <p class="text-center" style="text-transform: uppercase;font-size: 35px">{{$nameExam[0]['name']}}</p>
            </div>
          </div>
          <div class="row text-center text-danger">
            <div class="col-3">
              <p>Grade {{$grade[0]['name']}}</p>
            </div>
            <div class="col-3">
              <p>{{$subject[0]['name']}}</p>
            </div>
            <div class="col-6">
              <p>{{$chapter[0]['name']}}</p>
            </div>
            <!-- <div class="col-3">
              <p>30 minutes</p>
            </div> -->
          </div>
          <div class="row text-center text-info">
            <div class="col-6" style="font-size: 20px;">
              <p>Participant: {{$nameUser[0]['name']}}</p>
            </div>
            <div class="col-6" style="font-size: 20px;">
              <p>Result: {{$result}}/20</p>
            </div>
          </div>
          <div class="row mt-2 float-right">

            <div class="rate">
              <input type="radio" id="star5" name="rate" value="5" />
              <label for="star5" title="text">5 stars</label>
              <input type="radio" id="star4" name="rate" value="4" />
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star3" name="rate" value="3" />
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star2" name="rate" value="2" />
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star1" name="rate" value="1" />
              <label for="star1" title="text">1 star</label>
            </div>
          </div>
          <!-- <p class="p-result">Participant: {{Auth::user()->name}}</p>
          <p class="p-result">Result: {{$result}}/20</p> -->
        </div>
      </div>
      <!-- <div class="row mt-2">
        <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="text">1 star</label>
        </div>
      </div> -->

      <a type="button" class="btn btn-primary float-right"  href="/">Back</a>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  var url = window.location.pathname;
  var id = url.substring(url.lastIndexOf('/') + 1);
  $("[name='rate']").click(function(){
    var val = $(this).val();
    $.ajax({
      url: '/rate',
      data: {
        rate : val,
        id : id,
        },
      success: function(response) {
        alert('Thank You');
      }
    });
  });
})
</script>
@endsection