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
                    {{ Form::model(null, ['route' => [$repository->getActionRoute('storeRoute')], 'class' => 'form-horizontal booking-form', 'role' => 'form', 'method' => 'POST']) }}
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

                                $h = 0;
                                while ($h < 24) {
                                    $key = date('H:i', strtotime(date('Y-m-d') . ' + ' . $h . ' hours'));
                                    $timeArray[$key] = $key;
                                    $h++;
                                }

                                $howYouKnowArray = [
                                    'Google'            => 'Google',
                                    'Yell'              => 'Yell',
                                    'Gumtree'           => 'Gumtree',
                                    'Recommendation'    => 'Recommendation',
                                    'Used us before'    => 'Used us before',
                                    'One of our vans'   => 'One of our vans',
                                    'Business cards'    => 'Business cards'
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

                            <div class="company-container postcode-container">

                                <hr/>

                                <h4>Company Details</h4>

                                <div class="form-group">
                                    {{ Form::label('company_postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('company_postcode', null, ['class' => 'form-control postcode-input', 'placeholder' => 'PostCode']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning postcode-submit">Search</button>
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
                                        {{ Form::select('company_address', [],null, ['class' => 'form-control postcode-address', 'placeholder' => 'Company Address']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('company_country', 'Country :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('company_country', null, ['class' => 'form-control', 'placeholder' => 'Company Country']) }}
                                    </div>
                                </div>

                            </div>

                            <div class="pickup-container address-container postcode-container">
                                <hr/>
                                <h4 class="col-md-11">Pickup address</h4>

                                {{ Form::hidden('booking_addresses[0][postcode]', 'pickup') }}

                                <div class="form-group">
                                    {{ Form::label('postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('booking_addresses[0][postcode]', null, ['class' => 'form-control postcode-input', 'placeholder' => 'PostCode', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning postcode-submit">Search</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('address', 'Address :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[0][address]', [],null, ['class' => 'form-control postcode-address', 'placeholder' => 'Address', 'required' => 'required']) }}
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

                            <div class="dropoff-container address-container postcode-container">
                                <hr/>
                                <h4 class="col-md-11">Dropoff address</h4>

                                {{ Form::hidden('booking_addresses[1][postcode]', 'dropoff') }}

                                <div class="form-group">
                                    {{ Form::label('postcode', 'Post Code :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-7">
                                        {{ Form::text('booking_addresses[1][postcode]', null, ['class' => 'form-control postcode-input', 'placeholder' => 'PostCode', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-warning postcode-submit">Search</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('address', 'Address :', ['class' => 'col-lg-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('booking_addresses[1][address]', [],null, ['class' => 'form-control postcode-address', 'placeholder' => 'Address', 'required' => 'required']) }}
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

                            <hr>
                            <h4>Booking Details</h4>

                            <div class="form-group">
                                {{ Form::label('date', 'Date :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::text('date', null, ['class' => 'form-control datepicker get-price', 'placeholder' => 'mm/dd/YYYY', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('time', 'Time :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('time', $timeArray, null, ['class' => 'form-control get-price', 'placeholder' => 'Time', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('van_type_id', 'Van Type :', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('van_type_id', $vanTypes, null, ['class' => 'form-control van-type-select', 'placeholder' => 'Van Type', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('van_type_setting_id', 'Service Type:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('van_type_setting_id', [], null, ['class' => 'form-control van-type-setting-select get-price', 'placeholder' => 'Service Type', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('how_you_know', 'How You know About Us:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::select('how_you_know', $howYouKnowArray, null, ['class' => 'form-control', 'placeholder' => 'How You know About Us', 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('inventory', 'Inventory:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::textarea('inventory', null, ['class' => 'form-control', 'placeholder' => 'Inventory', 'rows' => 3 , 'required' => 'required']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('special_remark', 'Special Remark:', ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-md-9">
                                    {{ Form::textarea('special_remark', null, ['class' => 'form-control', 'placeholder' => 'Special Remark', 'rows' => 3]) }}
                                </div>
                            </div>

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
        var addressKey = '5551e-ab7a1-02f0d-00bbc';
        var distance = 0;
        $(document).ready(function(){
            $(".company-container").hide();
            var addressIndex = 1;
            var closeButtonHtml = "<div class='col-md-1'><button class='btn btn-sm btn-danger delete-address'>X</button></div>";
            $(".datepicker").datepicker({ minDate: 0 });

            $(".get-price").change(function(){

                var sendRequest = 1;

                $(".get-price").each(function(){
                    if($(this).val() == '')
                    {
                        sendRequest = 0;
                        return false;
                    }
                });

                if(sendRequest)
                {
                    $.ajax({
                        url: "<?php echo route('admin.booking_new.get-price'); ?>",
                        type: 'POST',
                        data: $(".booking-form").serialize(),
                        success: function(data){
                            console.log(data);
                        }
                    });
                }
            });

            $(".van-type-select").on('change', function(){
                var vanTypeId = $(this).val();
                $(".van-type-setting-select").find('option').remove();
                $(".van-type-setting-select").append($('<option>', {
                    value: "",
                    text : "select"
                }));
                if(vanTypeId)
                {
                    $.ajax({
                        url: "<?php echo route('admin.booking_new.get-service-types'); ?>/"+vanTypeId,
                        type: "GET",
                        dataType: "JSON",
                        data: {
                            van_type_id:vanTypeId
                        },
                        success: function(data)
                        {
                            $.each(data, function(i,v){
                                $(".van-type-setting-select").append($('<option>', {
                                    value: i,
                                    text : v
                                }));
                            });
                        }
                    });
                }

            });
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

            $(document).on('click', '.postcode-submit' , function(e) {
                e.preventDefault();
                var postCode = $(this).closest('.postcode-container').find('.postcode-input').val();
                var addressTarget = $(this).closest('.postcode-container').find('.postcode-address');
                addressTarget.find('option').remove();

                var postCodeFilled = $('.postcode-input[value!=""]').length;

                $.ajax({
                    url: "<?php echo route('admin.booking_new.get-address'); ?>/"+postCode,
                    type: 'GET',
                    beforeSend: function(){
                        $('#page-loader').removeClass('hide');
                        $('#page-container').removeClass('in');
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#page-loader').addClass('hide');
                        $('#page-container').addClass('in');
                        if (data.error_code !== undefined)
                        {
                            alert(data.error_msg);
                        }
                        else
                        {
                            var clear_data = new Array();
                            var as = -1;
                            var address_list = [];
                            jQuery.each(data.delivery_points, function (index, item) {
                                as++;
                                var fullLabel = item.department_name;

                                if (fullLabel !== '' && item.organisation_name !== '')
                                    fullLabel = fullLabel + ', ' + item.organisation_name;
                                else
                                    fullLabel = fullLabel + item.organisation_name;

                                if (fullLabel !== '' && item.line_1 !== '')
                                    fullLabel = fullLabel + ', ' + item.line_1;
                                else
                                    fullLabel = fullLabel + item.line_1;

                                if (fullLabel !== '' && item.line_2 !== '')
                                    fullLabel = fullLabel + ', ' + item.line_2;
                                else
                                    fullLabel = fullLabel + item.line_2;

                                clear_data.push({
                                    id: as,
                                    town: data.town,
                                    postcode: data.postcode,
                                    pcounty: data.postal_county,
                                    tcounty: data.traditional_county,
                                    dep_name: item.department_name,
                                    line_1: item.line_1,
                                    line_2: item.line_2,
                                    org: item.organisation_name,
                                    udprn: item.udprn,
                                    label: fullLabel,
                                    value: data.postcode
                                });

                                var organisation_name = '';

                                if (item.organisation_name.length > 0)
                                {
                                    organisation_name = item.organisation_name + ', ';
                                }

                                var small_address_info = {
                                    name: organisation_name + item.line_1 + ', ' + item.line_2 + ', ' + data.town,
                                    value: String(as)
                                };

                                address_list.push(small_address_info);
                                addressTarget.append($('<option>', {
                                    value: small_address_info.value,
                                    text : small_address_info.name
                                }));
                            });

                            if(postCodeFilled >= 2)
                            {
                                manageDistanceCalculation();
                            }

                        }
                    }
                });
            });
        });

        function manageDistanceCalculation(){
            
        }

        function calculateDistances(origin, destination) {
            var service = new google.maps.DistanceMatrixService(); //initialize the distance service
            return service.getDistanceMatrix(
                {
                    origins: [origin], //set origin, you can specify multiple sources here
                    destinations: [destination],//set destination, you can specify multiple destinations here
                    travelMode: google.maps.TravelMode.DRIVING, //set the travelmode
                    unitSystem: google.maps.UnitSystem.IMPERIAL,//The unit system to use when displaying distance
                    avoidHighways: false,
                    avoidTolls: false
                }, calcDistance); // here calcDistance is the call back function
        }

        function calcDistance(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) { // check if there is valid result
                distance =  0;
            } else {
                var origins = response.originAddresses;
                var destinations = response.destinationAddresses;

                for (var i = 0; i < origins.length; i++) {
                    var results = response.rows[i].elements;

                    for (var j = 0; j < results.length; j++) {

                        if(results[j].status == 'OK')
                        {
                            distance =  results[j].distance.text.replace(' mi','');
                        }
                        else
                        {
                            distance = 0;
                        }
                        $(".distance-display").text(distance+' miles');
                    }
                }
            }
        }
    </script>
@endsection