@extends ('backend.layouts.app')
@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Create Man and Van Booking</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Create Man and Van Booking</h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Create Man and Van Booking</h4>
                </div>
                <div class="panel-body">
                    {{ Form::model(null, ['route' => [$repository->getActionRoute('storeRoute')], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
                        <div class="col-md-6">
                            @php
                                $statusArray = [
                                    '1' => 'Confirmed Status',
                                    '2' => 'Pending status',
                                    '3' => 'Cancelled',
                                    '4' => 'Complete'
                                ];
                                $titleArray = [
                                    'Mr.' => 'Mr.',
                                    'Mrs.' => 'Mrs.',
                                    'Ms.' => 'Ms.',
                                    'Miss.' => 'Miss.',
                                    'Dr.' => 'Dr.',
                                    'Prof.' => 'Prof.'
                                ];
                                $type = [
                                    'Personal'  => 'Personal',
                                    'Company'   => 'Company'
                                ];
                                $floor = [
                                    'I have lift'   => 'I have lift',
                                     '0'            => 'Ground floor'
                                ];
                                for($i=0; $i<=17; $i++)
                                {
                                    $floor[$i] = $i;
                                }

                                $parking = [
                                    'Free'          => 'Free',
                                    'Meter'         => 'Meter',
                                    'Permit Holder' => 'Permit Holder',
                                    'Single Yellow' => 'Single Yellow'
                                ];
                            @endphp

                            <div class="form-group">
                                {{ Form::label('status', 'Status :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('status', $statusArray, null, ['class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>

                            <hr/>
                            <h4>Personal Details</h4>
                            <div class="form-group">
                                {{ Form::label('email', 'Email :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('title', 'Title :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('title', $titleArray, null, ['class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('first_name', 'First Name :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('last_name', 'Last Name :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('mobile_number', 'Mobile Number :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::text('mobile_number', null, ['class' => 'form-control', 'placeholder' => 'Mobile Number', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('type', 'Type :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('type', $type, null, ['class' => 'form-control booking_type', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="company-container">

                                <hr/>

                                <h4>Company Details</h4>

                                <div class="form-group">
                                    {{ Form::label('company_postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('company_postcode', null, ['class' => 'form-control', 'placeholder' => 'PostCode']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning">Search</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_name', 'Name :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_address', 'Address :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('company_address', [],null, ['class' => 'form-control', 'placeholder' => 'Company Address']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_country', 'Country :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('company_country', null, ['class' => 'form-control', 'placeholder' => 'Company Country']) }}
                                    </div>
                                </div>

                            </div>

                            <div class="pickup-container address-container">
                                <hr/>
                                <h4 class="col-md-11">Pickup address</h4>

                                {{ Form::hidden('booking_addresses[0][postcode]', 'pickup') }}

                                <div class="form-group">
                                    {{ Form::label('postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('booking_addresses[0][postcode]', null, ['class' => 'form-control', 'placeholder' => 'PostCode', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning">Search</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('address', 'Address :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[0][address]', [],null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => 'required']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('floor', 'Floor :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[0][floor]', $floor,null, ['class' => 'form-control', 'placeholder' => 'Floor', 'required' => 'required']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('parking', 'Parking :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[0][parking]', $parking,null, ['class' => 'form-control', 'placeholder' => 'Parking', 'required' => 'required']) }}
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success add-new-pickup">Add New Pickup Address</button>

                            <div class="dropoff-container address-container">
                                <hr/>
                                <h4 class="col-md-11">Dropoff address</h4>

                                {{ Form::hidden('booking_addresses[1][postcode]', 'dropoff') }}

                                <div class="form-group">
                                    {{ Form::label('postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('booking_addresses[1][postcode]', null, ['class' => 'form-control', 'placeholder' => 'PostCode', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning">Search</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('address', 'Address :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[1][address]', [],null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => 'required']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('floor', 'Floor :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[1][floor]', $floor,null, ['class' => 'form-control', 'placeholder' => 'Floor', 'required' => 'required']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('parking', 'Parking :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[1][parking]', $parking,null, ['class' => 'form-control', 'placeholder' => 'Parking', 'required' => 'required']) }}
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success add-new-dropoff">Add New Dropoff Address</button>
                        </div>
                        <div class="col-md-6">

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
    <script>
        $(document).ready(function(){
            $(".company-container").hide();
            var addressIndex = 1;
            var closeButtonHtml = "<div class='col-md-1'><button class='btn btn-sm btn-danger delete-address'>X</button></div>";
            $('.add-new-pickup').on('click', function(e){
                e.preventDefault();
                var clonedInput = $('.pickup-container').eq(0).clone();
                addressIndex++;
                clonedInput.find('input').each(function() {
                    this.name   = this.name.replace('[0]', '['+addressIndex+']');
                    this.value  = "";
                });
                $(clonedInput).insertAfter(".pickup-container:last");
                //$('.pickup-container:last').find('h4').insertAfter(closeButtonHtml);
                $(closeButtonHtml).insertAfter($('.pickup-container:last').find('h4'));
            });

            $('.add-new-dropoff').on('click', function(e){
                e.preventDefault();
                var clonedInput = $('.dropoff-container').eq(0).clone();
                addressIndex++;
                clonedInput.find('input').each(function() {
                    this.name   = this.name.replace('[1]', '['+addressIndex+']');
                    this.value  = "";
                });
                $(clonedInput).insertAfter(".dropoff-container:last");
                $(closeButtonHtml).insertAfter($('.dropoff-container:last').find('h4'));
            });

            $(document).on('click', '.delete-address', function(e){
                e.preventDefault();
                $(this).closest('.address-container').remove();
            });

            $(".booking_type").on('change', function () {
                if($(this).val() == 'Company')
                {
                    $(".company-container").show("fold", 1000);
                    $(".company-container").find("input,select").each(function(){
                        $(this).prop('required',true);
                    });
                }
                else
                {
                    $(".company-container").find("input,select").each(function(){
                        $(this).removeAttr('required');
                    });
                    $(".company-container").hide("fold", 1000);
                }
            });
        });
    </script>
@endsection