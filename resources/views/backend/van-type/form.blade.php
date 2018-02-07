<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Van Type Settings</h4>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    {{ Form::label('type', 'Van Type :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Van Type', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cost', 'Cost :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('cost', null, ['class' => 'form-control', 'placeholder' => 'Cost', 'required' => 'required']) }}
                            <span class="input-group-addon">.00</span>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('mileage', 'Mileage :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('mileage', null, ['class' => 'form-control', 'placeholder' => 'Mileage', 'required' => 'required', 'min' => 0]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('mileage_allowance', 'Mileage Allowance :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('mileage_allowance', null, ['class' => 'form-control', 'placeholder' => 'Mileage Allowance', 'required' => 'required', 'min' => 0]) }}
                            <span class="input-group-addon">.00</span>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- end panel -->

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Rule Setting</h4>
            </div>

            <div class="panel-body">
                @php
                $dayOptions = [
                'Whole Week'    => 'Whole Week',
                'Sunday'        => 'Sunday',
                'Monday'        => 'Monday',
                'Tuesday'       => 'Tuesday',
                'Wednesday'     => 'Wednesday',
                'Thursday'      => 'Thursday',
                'Friday'        => 'Friday',
                'Saturday'      => 'Saturday'
                ];
                @endphp
                @if(!isset($item))
                <div class="form-group days-rule-container">
                    {{ Form::label('', 'Day :', ['class' => 'col-lg-1 control-label']) }}
                    <div class="col-md-3">
                        {{ Form::select('day_rules[0][day]', $dayOptions, null, ['class' => 'form-control select', 'required' => 'required']) }}
                    </div>
                    {{ Form::label('', 'Man :', ['class' => 'col-lg-1 control-label']) }}
                    <div class="col-md-2">
                        {{ Form::number('day_rules[0][man]', null, ['class' => 'form-control', 'placeholder' => 'Man', 'required' => 'required']) }}
                    </div>
                    {{ Form::label('', 'Price :', ['class' => 'col-lg-1 control-label']) }}
                    <div class="col-md-3">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('day_rules[0][price]', null, ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required', 'min' => 0]) }}
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>
                @else
                    @php

                        $dayRules = json_decode($item->day_rules, true);
                    @endphp
                    @foreach($dayRules as $key => $value)
                        <div class="form-group days-rule-container">
                            {{ Form::label('', 'Day :', ['class' => 'col-lg-1 control-label']) }}
                            <div class="col-md-3">
                                {{ Form::select('day_rules['.$key.'][day]', $dayOptions, $value['day'], ['class' => 'form-control select', 'required' => 'required']) }}
                            </div>
                            {{ Form::label('', 'Man :', ['class' => 'col-lg-1 control-label']) }}
                            <div class="col-md-2">
                                {{ Form::number('day_rules['.$key.'][man]', $value['man'], ['class' => 'form-control', 'placeholder' => 'Man', 'required' => 'required']) }}
                            </div>
                            {{ Form::label('', 'Price :', ['class' => 'col-lg-1 control-label']) }}
                            <div class="col-md-3">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('day_rules['.$key.'][price]', $value['price'], ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'required', 'min' => 0]) }}
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                            @if($key != 0)
                                <div class='col-md-1'><button class='btn btn-sm btn-warning delete-rule'>X</button></div>
                            @endif
                        </div>
                    @endforeach
                @endif

                <button class="btn btn-success days-add-rule"><i class="fa fa-plus"></i> Add Rule</button>
            </div>
        </div>
        <!-- end panel -->

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Other Settings</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('discount', 'Flexible Date Discount :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            {{ Form::number('discount', null, ['class' => 'form-control', 'placeholder' => 'Flexible Date Discount', 'required' => 'required', 'min' => 0]) }}
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end panel -->
        {{ Form::submit('Save', ['class' => 'btn btn-sm btn-success pull-right']) }}

    </div>
    <!-- end col-12 -->
</div>