@extends('user.template')

@section('title', 'Add Class')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ADD CLASS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Add Class</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form method="POST">
        @csrf
        <div class="row">
          <div class="col-6 pt-1 pb-1" style="background-color: dodgerblue;border-radius: 5px;">
            <p style="color: white; font-size: 20px;">Name Class:</p>
            <input style="width: 100%; border-radius: 5px;" name="class"><br><br>
          </div>
          <div class="col-12">
            <input class="btn btn-success float-right" type="submit" value="SAVE">
          </div>
        </div>
      </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection