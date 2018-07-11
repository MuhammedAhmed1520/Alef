@extends('admin.layouts.master')
@section('title')
    Add Portfolio
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Book
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
                        <h3 class="box-title">Edit New Book</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('admin/book/'.$book->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                        <div class="box-body">
                            <div class="form-group">
                                <label for="fname" class="col-sm-1 control-label">First Name</label>
                                <div class="col-sm-5 {{ $errors->has('fname') ? ' has-error' : '' }}">
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" value="{{ $book->fname }}" required autofocus>
                                    @if ($errors->has('fname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="lname" class="col-sm-1 control-label">Last Name</label>
                                <div class="col-sm-5 {{ $errors->has('lname') ? ' has-error' : '' }}">
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" value="{{$book->lname  }}" required autofocus>
                                    @if ($errors->has('lname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-1 control-label">Phone Number</label>
                                <div class="col-sm-5 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="{{ $book->phone }}" required autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="email" class="col-sm-1 control-label">Email</label>
                                <div class="col-sm-5 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email Address" value="{{ $book->email }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address1" class="col-sm-1 control-label">Address 1</label>
                                <div class="col-sm-5 {{ $errors->has('address1') ? ' has-error' : '' }}">
                                    <input type="text" name="address1" class="form-control" id="address1" placeholder="Address 1" value="{{ $book->address1  }}" required autofocus>
                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="address2" class="col-sm-1 control-label">Address 2</label>
                                <div class="col-sm-5 {{ $errors->has('address2') ? ' has-error' : '' }}">
                                    <input type="text" name="address2" class="form-control" id="address2" placeholder="Address 2" value="{{ $book->address2  }}" required autofocus>
                                    @if ($errors->has('address2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-1 control-label">Country</label>
                                <div class="col-sm-5 {{ $errors->has('category') ? ' has-error' : '' }}">
                                    <select class="form-control" name="country">
                                        <option selected disabled>Choose Country</option>
                                        @include('admin.includes.country')
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="city" class="col-sm-1 control-label">City</label>
                                <div class="col-sm-5 {{ $errors->has('city') ? ' has-error' : '' }}">
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ $book->city  }}" required autofocus>
                                    @if ($errors->has('adress2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postcode" class="col-sm-1 control-label">postcode</label>
                                <div class="col-sm-5 {{ $errors->has('postcode') ? ' has-postcode' : '' }}">
                                    <input type="text" name="postcode" class="form-control" id="postcode" placeholder="postcode" value="{{ $book->postcode }}" required autofocus>
                                    @if ($errors->has('postcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="photo" class="col-sm-1 control-label">Photo</label>
                                <div class="col-sm-5 {{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <input type="file" name="photo" id="photo" class="form-control" multiple>
                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="col-sm-1 control-label">Notes</label>
                                <div class="col-sm-11 {{ $errors->has('notes') ? ' has-error' : '' }}">
                                    <div class="box-body pad">
                                        <textarea name="notes" class="form-control" placeholder="notes" id="editor1">{{ $book->notes  }}</textarea>
                                        @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
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