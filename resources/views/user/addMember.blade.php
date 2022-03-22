@extends('user.template')

@section('title', 'MY CLASS')

@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Member</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST">
                      @csrf
                      <div class="input-group">
                        <input type="search" name="member" class="form-control form-control-lg" placeholder="By Id">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection