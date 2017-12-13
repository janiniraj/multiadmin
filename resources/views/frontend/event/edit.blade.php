@extends ('frontend.layouts.app')

@section ('title', isset($title) ? $title : 'Edit Event')

@section('page-header')
    <h1>
        {{ isset($repository->moduleTitle) ? $repository->moduleTitle : '' }}
        <small>Edit</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($item, ['route' => [$repository->getActionRoute('updateRoute'), $item], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ isset($repository->moduleTitle) ? $repository->moduleTitle : '' }}</h3>
                    <div class="box-tools pull-right">
                        @include('common.event.event-header-buttons', [
                            'listRoute' => $repository->getActionRoute('listRoute'),
                            'createRoute' => $repository->getActionRoute('createRoute')
                        ])
                    </div>
            </div>

            @include('common.event.form')
            
        </div>
        
        @include('addins.edit-history')

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route($repository->getActionRoute('listRoute'), 'Cancel', [], ['class' => 'btn btn-danger btn-xs']) }}
                </div>

                <div class="pull-right">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-xs']) }}
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    {{ Form::close() }}
@endsection