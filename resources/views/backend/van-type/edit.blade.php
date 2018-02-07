@extends ('backend.layouts.app')

@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Edit Van Type</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Van Type</h1>
    <!-- end page-header -->
    {{ Form::model(isset($item) ? $item : null, ['route' => [$repository->getActionRoute('updateRoute'), $item], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}
        @include('backend.van-type.form')
    {{ Form::close() }}
@endsection
@section('after-scripts')
<script>
    var ruleIndex = 0;
    var closeButtonHtml = "<div class='col-md-1'><button class='btn btn-sm btn-warning delete-rule'>X</button></div>";
    $(document).ready(function(){
        $(".days-add-rule").on('click', function (e) {
            e.preventDefault();
            var clonedInput = $('.days-rule-container').eq(0).clone();
            ruleIndex++;
            clonedInput.find('input,select').each(function() {
                this.name   = this.name.replace('[0]', '['+ruleIndex+']');
                if(this.classList.contains('select'))
                {
                    $(this).find('option').each(function(){
                        this.selected = false;
                    });
                    $(this).find('option:first').selected = true;
                }
                else
                {
                    this.value  = "";
                }
            });
            $(clonedInput).insertBefore(".days-add-rule");
            $('.days-rule-container:last').append(closeButtonHtml);
        });

        $(document).on('click', '.delete-rule', function(e){
            e.preventDefault();
            $(this).closest('.days-rule-container').remove();
        });
    });
</script>
@endsection