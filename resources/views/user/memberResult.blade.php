@extends('user.template')

@section('title', 'Member Result')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <h2 class="text-center display-4">Search</h2>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                  <form action="/addmember/{{$id}}" method="POST">
                      @csrf
                      <div class="input-group input-group-lg">
                          <input type="search" name="member" class="form-control form-control-lg" placeholder="By ID" >
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-lg btn-default">
                                  <i class="fa fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-md-10 offset-md-1">
                  <div class="list-group">
                    @foreach ($list as $key => $value)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                <img class="img-fluid" src="/user/dist/img/photo1.png" alt="Photo" style="max-height: 160px;">
                            </div>
                            <div class="col px-4">
                              <div>
                                <div class="float-right">ID: {{$value['id']}}</div>
                                <h3>{{$value['name']}}</h3>
                                <p class="mb-0">{{$value['email']}}</p>
                              </div>
                              <a type="button" class="btn btn-primary float-right" style="margin-top: 50px" href="/addmember/{{$id}}/member/{{$value['id']}}">Add</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection