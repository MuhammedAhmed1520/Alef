@extends('admin.layouts.master')
@section('title')
    Admin | Add New Category
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            PortfolioCategory
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
                        <h3 class="box-title">Add New PortfolioCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('/admin/category')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-offset-2 col-sm-2 control-label">Name</label>
                                <div class="col-sm-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
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

@endsection