@extends ('backend.layouts.app')

@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Booking Information</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Booking Information</h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Booking Information</h4>
                </div>
                <div class="panel-body">
                            {{ Form::model($item, ['class' => 'form-horizontal', 'role' => 'form']) }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Name :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        <label class="control-label"> {{ $item->name }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        <label class="control-label"> {{ $item->email }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('message', 'Message :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        <label class="control-label"> {{ $item->message }}</label>
                                    </div>
                                </div>
                                @php
                                $extra = null;
                                if($item->extra && !empty(json_decode($item->extra, true)))
                                {
                                    $extra = json_decode($item->extra, true);
                                }
                                @endphp
                                @if($extra)
                                    @foreach($extra as $key => $value)
                                        <div class="form-group">
                                            {{ Form::label($key, $key.' :', ['class' => 'col-lg-3 control-label']) }}
                                            <div class="col-md-9">
                                                <label class="control-label"> {{ $value }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            {{ Form::close() }}
                        </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@endsection
@section('after-scripts')
    <script src="{{URL::to('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{URL::to('/')}}/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.page-content-editor').ckeditor();
    </script>
@endsection