@extends('admin.template')

@section('title', 'List Subject')

@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Grade {{$name[0]['name']}} - Subject</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_content">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Subject</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list as $key => $list)
                <tr>
                  <th scope="row"><a href="/admin/listsubject/{{$list['id']}}">{{$list['id']}}</a></th>
                  <td><a href="/admin/chapter/{{$list['id']}}">{{$list['name']}}</a></td>
                  <td><a type="button" class="btn btn-danger" href="/admin/listsubject/delete/{{$list['id']}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a type="button" class="btn btn-success float-right" href="/admin/listsubject/add/{{$grade}}">Add</a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection