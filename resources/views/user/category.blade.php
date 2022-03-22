@extends('user.template')
<?php $name = $list[0]['name_subject']; ?>
@section('title', $name)

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$list[0]['name_subject']}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">{{$list[0]['name_subject']}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @foreach ($list as $key => $value)
        <div class="col-lg-4 col-6">
          <div class="small-box bg-danger">
            <div class="inner" style="background-image: url('/user/dist/img/subject/{{$value['image']}}'); height:230px">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam" style="font-size: 25px;">{{$value['name']}}</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher" >Teacher: {{$value['name_user']}}</p>
                </div>
                <div class="col-6">
                  <p class="subject" >Subject: {{$value['name_subject']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade">Grade {{$value['name_grade']}}</p>
                </div>
                <div class="col-6">
                  <p class="chapter" >{{$value['name_chapter']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants">Participants: {{$value['people']}}</p>
                </div>
                <div class="col-6">
                  @for ($i = 1; $i <= $value['rate']; $i++)
                  <span class="fa fa-star checked text-warning"></span>
                  @endfor
                </div>
              </div>
            </div>
            <a href="/test/{{$value['id']}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection