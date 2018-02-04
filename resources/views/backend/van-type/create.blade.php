@extends ('backend.layouts.app')

@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Create Van Type</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Create Van Type</h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Create Van Type</h4>
                </div>
                <div class="panel-body">
                            {{ Form::model(null, ['route' => [$repository->getActionRoute('storeRoute')], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
                                <div class="form-group">
                                    {{ Form::label('type', 'Van Type :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Van Type', 'required' => 'required']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 text-center">
                                        {{ Form::submit('Create', ['class' => 'btn btn-sm btn-success']) }}
                                    </div>
                                </div>
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