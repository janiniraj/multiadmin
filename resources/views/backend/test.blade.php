@extends('backend.layouts.app')

@section('content')
<div class="panel panel-inverse" data-sortable-id="index-4">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Quick Post</h4>
    </div>
    <textarea id="article-ckeditor" class="form-control no-rounded-corner bg-silver test-textarea" rows="14">Enter some comment.</textarea>
    <div class="panel-footer text-right">
        <a href="javascript:;" class="btn btn-white btn-sm">Cancel</a>
        <a href="javascript:;" class="btn btn-primary btn-sm m-l-5">Action</a>
    </div>
</div>
@endsection

@section('after-scripts')
<script src="{{URL::to('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection