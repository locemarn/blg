@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roles</h3>
            </div>
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('role.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="col-lg-offset-2 col-lg-8">
                  <div class="form-group">
                    <label for="name">Role Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tag Title">
                  </div>

                  <div class="row">

                    <div class="col-lg-4">
                      <label for="name">Posts Permissions</label>
                      @foreach ($permissions as $permission)
                      @if ($permission->for == 'post')
                      <div class="checkbox">
                        <label><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-lg-4">
                      <label for="name">Users Permissions</label>
                      @foreach ($permissions as $permission)
                      @if ($permission->for == 'user')
                      <div class="checkbox">
                        <label><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-lg-4">
                      <label for="name">Users Permissions</label>
                      @foreach ($permissions as $permission)
                      @if ($permission->for == 'other')
                      <div class="checkbox">
                        <label><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
@endsection