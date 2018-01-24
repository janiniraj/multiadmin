@extends ('backend.layouts.app')

@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Single Item Quote Setting</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Single Item Quote Setting</h1>
<!-- end page-header -->
<div class="row">
    {{ Form::model(null, ['class' => 'form-horizontal', 'role' => 'form']) }}
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Time Threshold Information</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('timing[threshold_distance]', 'Threshold Distance :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('timing[threshold_distance]', null, ['class' => 'form-control', 'placeholder' => 'Threshold Distance', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('timing[threshold_price]', 'Threshold Price :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('timing[threshold_price]', null, ['class' => 'form-control', 'placeholder' => 'Threshold Price', 'required' => 'required']) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Time Rules</h4>
            </div>
            <div class="panel-body">
                @if(empty($settings['timing']['rules']))
                    <div class="form-group timing-rule-container">
                        {{ Form::label('', 'From :', ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::number('timing[rules][0][from]', null, ['class' => 'form-control', 'placeholder' => 'From', 'required' => 'required']) }}
                        </div>
                        {{ Form::label('', 'To :', ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::number('timing[rules][0][to]', null, ['class' => 'form-control', 'placeholder' => 'To', 'required' => 'required']) }}
                        </div>
                        {{ Form::label('', 'Price(per miles) :', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::number('timing[rules][0][price]', null, ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required']) }}
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox checkbox-css">
                                {{ Form::checkbox('timing[rules][0][is_fixed]',1,false) }}
                                <label for="checkbox_css_1" style="padding-left: 0;">
                                    Fixed
                                </label>
                            </div>

                        </div>
                    </div>
                @endif
                <button class="btn btn-success add-rule"><i class="fa fa-plus"></i> Add Rule</button>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
    {{ Form::close() }}
</div>
@endsection
@section('after-scripts')
<script>
    $(document).ready(function(){
        var newRuleHtml = $('.timing-rule-container')[0].outerHTML;
        $(".add-rule").on('click', function (e) {
            e.preventDefault();
            $(newRuleHtml).insertBefore($(".add-rule"));
            $('.timing-rule-container:last').find('input[type=text]').each(function(){
                $(this).val("");
            });
        })
    });
</script>
@endsection