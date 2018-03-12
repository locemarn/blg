@extends('admin.layouts.app')

@section('headSection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection

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
            <h3 class="box-title">Titles</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('post.update', $post->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $post->subtitle }}">
                </div>
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="pull-right">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="image" id="image">{{ $post->image }}
                  </div>
                </div>

                <div class="checkbox pull-left">
                  <label>
                    <input type="checkbox" name="status"
                    @if ($post->status == 1) 
                      {{'checked'}}    
                    @endif value="1"> Publish
                  </label>
                </div>
                <br>
                <hr>
                <div class="form-group">
                    <label>Select Tags</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                      @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>  
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Post Body
                  <small>Write your post body here</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body pad">
                  <textarea id="editor1" name="body" rows="10" cols="80">
                    {{ $post->body }}
                  </textarea>
              </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('post.index') }}' class="btn btn-warning">Back</a>
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
<!-- jQuery 3 -->
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

@endsection

@section('footerSection')
  <script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $(".select2").select2();
    });
  </script>
@endsection

