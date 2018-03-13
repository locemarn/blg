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
              <h3 class="box-title">Update Admin</h3>
            </div>
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.update', $user->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="col-lg-offset-2 col-lg-8">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                  </div>

                  <div class="form-group">
                    <label for="confirm_passowrd">Status</label>
                    <div class="checkbox">
                      <label ><input type="checkbox" name="status" 
                        @if (old('status')==1 || $user->status == 1)
                          checked
                        @endif value="1">Status</label>
                    </div>
                  </div>
                    

                  <div class="form-group col-lg-12">
                    <label>Assign Role</label>
                    <div class="row">
                      @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label><input type="checkbox" name="role[]" value="{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
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