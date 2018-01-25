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
    {{ Form::model(null, ['url' => route('admin.quotesetting.singleitem.save-data'),'class' => 'form-horizontal', 'role' => 'form']) }}
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Distance Threshold Information</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('distance[threshold_distance]', 'Threshold Distance :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('distance[threshold_distance]', isset($settings['distance']['threshold_distance']) ? $settings['distance']['threshold_distance'] : null, ['class' => 'form-control', 'placeholder' => 'Threshold Distance', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('distance[threshold_price]', 'Threshold Price :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('distance[threshold_price]', isset($settings['distance']['threshold_price']) ? $settings['distance']['threshold_price'] : null, ['class' => 'form-control', 'placeholder' => 'Threshold Price', 'required' => 'required']) }}
                            <span class="input-group-addon">.00</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Distance Rules</h4>
            </div>
            <div id="aaa" class="panel-body">
                @if(empty($settings['distance']['rules']))
                    <div class="form-group distance-rule-container">
                        {{ Form::label('', 'From :', ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::number('distance[rules][0][from]', null, ['class' => 'form-control', 'placeholder' => 'From', 'required' => 'required']) }}
                        </div>
                        {{ Form::label('', 'To :', ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::number('distance[rules][0][to]', null, ['class' => 'form-control', 'placeholder' => 'To', 'required' => 'required']) }}
                        </div>
                        {{ Form::label('', 'Price(per miles) :', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-md-2">
                            <div class=" input-group">
                                <span class="input-group-addon">£</span>
                                {{ Form::number('distance[rules][0][price]', null, ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required', 'min' => 0]) }}
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="checkbox checkbox-css">
                                {{ Form::checkbox('distance[rules][0][is_fixed]',1,false) }}
                                <label for="checkbox_css_1" style="padding-left: 0;">
                                    Fixed
                                </label>
                            </div>

                        </div>
                    </div>
                @else
                    @foreach($settings['distance']['rules'] as $ruleKey => $ruleValue)
                        <div class="form-group distance-rule-container">
                            {{ Form::label('', 'From :', ['class' => 'col-lg-1 control-label']) }}
                            <div class="col-md-2">
                                {{ Form::number('distance[rules]['.$ruleKey.'][from]', $ruleValue['from'], ['class' => 'form-control', 'placeholder' => 'From', 'required' => 'required']) }}
                            </div>
                            {{ Form::label('', 'To :', ['class' => 'col-lg-1 control-label']) }}
                            <div class="col-md-2">
                                {{ Form::number('distance[rules]['.$ruleKey.'][to]', $ruleValue['to'], ['class' => 'form-control', 'placeholder' => 'To', 'required' => 'required']) }}
                            </div>
                            {{ Form::label('', 'Price(per miles) :', ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-md-2">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('distance[rules]['.$ruleKey.'][price]', $ruleValue['price'], ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required', 'min' => 0]) }}
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="checkbox checkbox-css">
                                    {{ Form::checkbox('distance[rules]['.$ruleKey.'][is_fixed]',1,isset($ruleValue['is_fixed']) ? $ruleValue['is_fixed'] : false) }}
                                    <label for="checkbox_css_1" style="padding-left: 0;">
                                        Fixed
                                    </label>
                                </div>

                            </div>
                            @if($ruleKey)
                                <div class='col-md-1'>
                                    <button class='btn btn-sm btn-warning delete-rule'>X</button>
                                </div>
                            @endif                            
                        </div>
                    @endforeach
                @endif
                <button class="btn btn-success distance-add-rule"><i class="fa fa-plus"></i> Add Rule</button>
            </div>
        </div>

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Other Settings</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('manpower', 'Per manpower Price :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('manpower', isset($settings['manpower']) ? $settings['manpower'] : null, ['class' => 'form-control', 'placeholder' => 'Per manpower Price', 'required' => 'required', 'min' => 0]) }}
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('flexibledatediscount', 'Flexible Date Discount :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            {{ Form::number('flexibledatediscount', isset($settings['flexibledatediscount']) ? $settings['flexibledatediscount'] : null, ['class' => 'form-control', 'placeholder' => 'Flexible Date Discount', 'required' => 'required', 'min' => 0]) }}
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success pull-right">Save</button>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
    {{ Form::close() }}
</div>
@endsection
@section('after-scripts')
<script>
    var ruleIndex = 0;
    var closeButtonHtml = "<div class='col-md-1'><button class='btn btn-sm btn-warning delete-rule'>X</button></div>";
    $(document).ready(function(){
        $(".distance-add-rule").on('click', function (e) {
            e.preventDefault();
            var clonedInput = $('.distance-rule-container').eq(0).clone();
            ruleIndex++;
            clonedInput.find('input').each(function() {
                this.name   = this.name.replace('[0]', '['+ruleIndex+']');
                if(this.type != 'checkbox')
                {
                    this.value  = "";
                }
                if(this.checked == true)
                {
                    this.checked = false;
                }
            });
            $(clonedInput).insertBefore(".distance-add-rule");
            $('.distance-rule-container:last').append(closeButtonHtml);
        });

        $(document).on('click', '.delete-rule', function(){
            $(this).closest('.distance-rule-container').remove();
        });
    });
</script>
@endsection