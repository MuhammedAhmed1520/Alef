@extends('admin.layouts.master')
@section('title')
    Edit Portfolio
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Portfolio
            <small></small>
        </h1>

    </section>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Site</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('admin/site/'.$site->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="patch">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-1 control-label">Title</label>
                                <div class="col-sm-5 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" id="title" placeholder="name" value="{{$site->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-1 control-label">Category</label>
                                <div class="col-sm-5 {{ $errors->has('category') ? ' has-error' : '' }}">
                                    <select class="form-control" name="cat_id">
                                        <option disabled>Choose Category</option>
                                            @foreach($cats as $cat)
                                            <option value="{{$cat->id}}"
                                            @if($cat->id == $site->category_id) selected @endif>{{$cat->name}}</option>
                                            @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">

                                <label for="description" class="col-sm-1 control-label">Description</label>
                                <div class="col-sm-11 {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <div class="box-body pad">
                                        <textarea name="description" class="form-control" placeholder="Description" id="editor1">{{$site->desc}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info center-block">Save <i class="fa fa-save" style="margin-left: 5px"></i></button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
                <!-- general form elements disabled -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('css')

@endsection

@section('js')
    <script src="{{ asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
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