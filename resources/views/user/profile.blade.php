@extends('user.template')

@section('title', 'Your Profile')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Your Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Your Profile</li>
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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Your Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="" name="name" value="{{$list['name']}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="" name="email" value="{{$list['email']}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="" name="new_password" placeholder="Password">
                </div>
                <div class="row">
                  <div class="col-sm-4">
                      <!-- select -->
                    <div class="form-group">
                      <label>Subject 1</label>
                      <select class="form-control" name="subject_1" required>
                        <option value="">Select Your Subject 1</option>
                        @foreach ($subject as $key => $value)
                        <option value="{{$value['id']}}" <?php if($list['subject_1'] == $value['id']) { echo 'selected'; } ?>>{{$value['name']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <!-- select -->
                    <div class="form-group">
                      <label>Subject 2</label>
                      <select class="form-control" name="subject_2" required>
                        <option value="">Select Your Subject 2</option>
                        @foreach ($subject as $key => $value)
                        <option value="{{$value['id']}}" <?php if($list['subject_2'] == $value['id']) { echo 'selected'; } ?>>{{$value['name']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Subject 3</label>
                        <select class="form-control" name="subject_3" required>
                          <option value="">Select Your Subject 3</option>
                          @foreach ($subject as $key => $value)
                          <option value="{{$value['id']}}" <?php if($list['subject_3'] == $value['id']) { echo 'selected'; } ?>>{{$value['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row pt-1 bg-primary rounded">
                  <div class="col-6">
                    <p class="font-weight-bold text-light">Role: User</p>
                  </div>
                  <div class="col-6">
                    <p class="font-weight-bold text-light">Id: {{$list['id']}}</p>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">SAVE</button>
              </div>
            </form>
          </div>

          <!-- general form elements -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection