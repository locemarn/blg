@extends('admin.layouts.app')

@section('headSection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('admin.layouts.pagehead')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Users</h3>
        <a href="{{ route('user.create') }}" class="col-lg-offset-5 btn btn-success">Add New</a>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
        @include('includes.messages')
      <div class="box-body">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Assigned Roles</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }},
                    @endforeach
                  </td>
                  <td><a href="{{ route('user.edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                      <td><a href="" onClick="if(confirm('Are you sure you want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$user->id}}').submit();
                      } else {
                        event.preventDefault();
                      }
                      "><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Assigned Roles</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
@endsection

@section('footerSection')
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  
@endsection