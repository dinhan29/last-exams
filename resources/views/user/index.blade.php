@extends('user.template')

@section('title', 'Index User')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <h1>{{$sub1Name}}</h1>
        </div>
        <div class="col-lg-4 col-6">
          <div class="small-box bg-danger">
            <div class="inner" style="background-image: url('/user/dist/img/subject/math3.jpeg');">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam" style="font-size: 25px;">SỐ PHỨC</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher" >Teacher: Lê Hoài Nam</p>
                </div>
                <div class="col-6">
                  <p class="subject" >Subject: Maths</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade">Grade 12</p>
                </div>
                <div class="col-6">
                  <p class="chapter" >Chapter III</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants">Participants: 38 people</p>
                </div>
                <div class="col-6">
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                </div>
              </div>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div class="small-box bg-success">
            <div class="inner" style="background-image: url('/user/dist/img/subject/math1.jpeg');">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam-2" style="font-size: 25px;">KHỐI ĐA DIỆN</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher-2" >Teacher: Đặng Hoài Tâm</p>
                </div>
                <div class="col-6">
                  <p class="subject-2" >Subject: Maths</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade-2">Grade 12</p>
                </div>
                <div class="col-6">
                  <p class="chapter-2" >Chapter III</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants-2">Participants: 25 people</p>
                </div>
                <div class="col-6">
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                </div>
              </div>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner" style="background-image: url('/user/dist/img/subject/math4.jpeg');">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam-3" style="font-size: 25px;">SỐ PHỨC</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher-3" >Teacher: Lê Văn Tuấn</p>
                </div>
                <div class="col-6">
                  <p class="subject-3" >Subject: Maths</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade-3">Grade 12</p>
                </div>
                <div class="col-6">
                  <p class="chapter-3" >Chapter III</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants-3">Participants: 17 people</p>
                </div>
                <div class="col-6">
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                  <span class="fa fa-star checked text-warning"></span>
                </div>
              </div>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        @foreach ($sub1 as $key => $sub1)
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner" style="background-image: url('/user/dist/img/subject/{{$sub1['image']}}'); height: 230px">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam-3" style="font-size: 25px;">{{$sub1['name']}}</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher-3" >Teacher: {{$sub1['name_user']}}</p>
                </div>
                <div class="col-6">
                  <p class="subject-3" >Subject: {{$sub1['name_subject']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade-3">Grade {{$sub1['name_grade']}}</p>
                </div>
                <div class="col-6">
                  <p class="chapter-3" >{{$sub1['name_chapter']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants-3">Participants: {{$sub1['people']}}</p>
                </div>
                <div class="col-6">
                  @for ($i = 1; $i <= $sub1['rate']; $i++)
                  <span class="fa fa-star checked text-warning"></span>
                  @endfor
                </div>
              </div>
            </div>
            <a href="/test/{{$sub1['id']}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
        <div class="col-12">
          @if ($sub[0]['subject_1'] == 'Information Technology')
            <a href="/category/it" type="button" class="btn btn-info float-right">More</a>
          @elseif ($sub[0]['subject_1'] == 'Fine Art')
            <a href="/category/fa" type="button" class="btn btn-info float-right">More</a>
          @else
            <a href="/category/{{$sub[0]['subject_1']}}" type="button" class="btn btn-info float-right">More</a>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h1>{{$sub2Name}}</h1>
        </div>

        @foreach ($sub2 as $key => $sub2)
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner" style="background-image: url('/user/dist/img/subject/{{$sub2['image']}}'); height: 230px">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam-3" style="font-size: 25px;">{{$sub2['name']}}</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher-3" >Teacher: {{$sub2['name_user']}}</p>
                </div>
                <div class="col-6">
                  <p class="subject-3" >Subject: {{$sub2['name_subject']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade-3">Grade {{$sub2['name_grade']}}</p>
                </div>
                <div class="col-6">
                  <p class="chapter-3" >{{$sub2['name_chapter']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants-3">Participants: {{$sub2['people']}}</p>
                </div>
                <div class="col-6">
                  @for ($i = 1; $i <= $sub2['rate']; $i++)
                  <span class="fa fa-star checked text-warning"></span>
                  @endfor
                </div>
              </div>
            </div>
            <a href="/test/{{$sub2['id']}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
        <div class="col-12">
          @if ($sub[0]['subject_1'] == 'Information Technology')
            <a href="/category/it" type="button" class="btn btn-info float-right">More</a>
          @elseif ($sub[0]['subject_1'] == 'Fine Art')
            <a href="/category/fa" type="button" class="btn btn-info float-right">More</a>
          @else
            <a href="/category/{{$sub[0]['subject_2']}}" type="button" class="btn btn-info float-right">More</a>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h1>{{$sub3Name}}</h1>
        </div>
        @foreach ($sub3 as $key => $sub3)
        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner" style="background-image: url('/user/dist/img/subject/{{$sub3['image']}}'); height: 230px">
              <div class="row">
                <div class="col-12" >
                  <h3 class="h3-nameexam-3" style="font-size: 25px;">{{$sub3['name']}}</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="teacher-3" >Teacher: {{$sub3['name_user']}}</p>
                </div>
                <div class="col-6">
                  <p class="subject-3" >Subject: {{$sub3['name_subject']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="grade-3">Grade {{$sub3['name_grade']}}</p>
                </div>
                <div class="col-6">
                  <p class="chapter-3" >{{$sub3['name_chapter']}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="participants-3">Participants: {{$sub3['people']}}</p>
                </div>
                <div class="col-6">
                  @for ($i = 1; $i <= $sub3['rate']; $i++)
                  <span class="fa fa-star checked text-warning"></span>
                  @endfor
                </div>
              </div>
            </div>
            <a href="/test/{{$sub3['id']}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
        <div class="col-12">
          <a href="/category/{{$sub[0]['subject_3']}}" type="button" class="btn btn-info float-right">More</a>
        </div>
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection