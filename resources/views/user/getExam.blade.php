@extends('user.template')

@section('title', 'Test Exam')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Test</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Test Exam</li>
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
        <form method="post">
          @csrf
          <h1 class="text-center h1-nameexam">{{$nameExam['name']}}</h1>
          <div class="row">
            <div class="col-12">
              <div class="rate float-right">
                @for ($i = 5; $i >= 1; $i--)
                  @if ($i == $nameExam['rate'])
                    <input type="radio" id="star{{$i}}" name="rate" value="{{$i}}" checked/>
                    <label for="star{{$i}}" title="text">{{$i}} stars</label>
                  @else
                    <input type="radio" id="star{{$i}}" name="rate" value="{{$i}}" />
                    <label for="star{{$i}}" title="text">{{$i}} stars</label>
                  @endif
                @endfor
                <!-- <input type="radio" id="star5" name="rate" value="5"/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label> -->
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              $question = [] ;
              $val = 0;
              foreach ($exam as $key => $value) {
                if (!in_array($value['id'], $question)){
            ?>
                  <div class="col-12 mb-2 content-question" style="">
                    <p class="p-question">{{$value['name']}}</p>
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
                  <div class="col-6 div-answer">
                    <input type="radio" id="" name="res[{{$value['id']}}]" value="{{$val}}" <?php echo $val == 1 ? ' checked' : ''; ?>>
                    <p class="col-11" style="display: inline-block;color: #ff6994;">{{$value['answer_name']}}</p><br><br>
                  </div>
            <?php
                }
              }
            ?>
          </div>
          <div class="col text-center mt-2 mb-2">
            <input class="btn btn-primary" type="submit" value="SUBMIT">
            <!-- <input class="btn btn-success" type="submit" value="SAVE"> -->
          </div>
          <!-- <input class="btn btn-success float-right" type="submit" value="SUBMIT"> -->
          <!-- <button type="button" class="btn btn-success " type="submit">SAVE</button> -->
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection