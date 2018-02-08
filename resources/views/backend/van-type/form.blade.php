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
                    {{ Form::label('mileage', 'Mileage :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('mileage', null, ['class' => 'form-control', 'placeholder' => 'Mileage', 'required' => 'required', 'min' => 0]) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('cost', 'Cost per Mile :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        <div class=" input-group">
                            <span class="input-group-addon">£</span>
                            {{ Form::number('cost', null, ['class' => 'form-control', 'placeholder' => 'Cost', 'required' => 'required']) }}
                            <span class="input-group-addon">.00</span>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('cost', 'Current Amount of Free Miles :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::number('free_miles', null, ['class' => 'form-control', 'placeholder' => 'Current Amount of Free Miles', 'required' => 'required', 'min' => 0]) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('registration_numbers', 'Registration Numbers :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('registration_numbers', null, ['class' => 'form-control', 'placeholder' => 'Registration Numbers', 'required' => 'required']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description :', ['class' => 'col-lg-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required', 'rows' => 3]) }}
                    </div>
                </div>

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

        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Rule Setting</h4>
            </div>

            <div class="panel-body">

                <div class="panel panel-inverse col-md-6">
                    <div class="panel-heading">
                        <h4 class="panel-title">Self Loaded</h4>
                    </div>

                    <div class="panel-body panel-border">
                        <div class="form-group">
                            {{ Form::label('setting[0][sunday]', 'Sunday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][sunday]', 0, ['class' => 'form-control', 'placeholder' => 'Sunday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][monday]', 'Monday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][monday]', 0, ['class' => 'form-control', 'placeholder' => 'Monday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][tuesday]', 'Tuesday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][tuesday]', 0, ['class' => 'form-control', 'placeholder' => 'Tuesday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][wednesday]', 'Wednesday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][wednesday]', 0, ['class' => 'form-control', 'placeholder' => 'Wednesday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][thursday]', 'Thursday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][thursday]', 0, ['class' => 'form-control', 'placeholder' => 'Thursday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][friday]', 'Friday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][friday]', 0, ['class' => 'form-control', 'placeholder' => 'Friday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('setting[0][saturday]', 'Saturday :', ['class' => 'col-lg-3 control-label']) }}
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <span class="input-group-addon">£</span>
                                    {{ Form::number('setting[0][saturday]', 0, ['class' => 'form-control', 'placeholder' => 'Saturday', 'required' => 'required']) }}
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-inverse col-md-6">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New</h4>
                    </div>

                    <div class="panel-body panel-border">
                        <button class="btn btn-success days-add-rule"><i class="fa fa-plus"></i> Add Rule</button>
                    </div>
                </div>




            </div>
        </div>
        <!-- end panel -->


        {{ Form::submit('Save', ['class' => 'btn btn-sm btn-success pull-right']) }}

    </div>
    <!-- end col-12 -->
</div>
<style>
    .panel-border {
        border:1px solid #ccc;
    }
</style>