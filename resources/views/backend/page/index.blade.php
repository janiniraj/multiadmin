@extends ('backend.layouts.app')

@section ('title',  isset($repository->moduleTitle) ? $repository->moduleTitle. ' Management' : 'Management')
@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Page Management</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Page Management</h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    
                    <div class="panel-heading-btn">
                        <a class="btn btn-xs btn-warning text-right" href="{{route($repository->adminRoutePrefix .'.'. $repository->moduleRoutes['createRoute'])}}">Create Page</a>
                    </div>
                    <h4 class="panel-title">Page Management</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($repository->getAll() as $single)
                                    <tr class="odd gradeX">
                                        <td>{{ $single->name }}</td>
                                        <td>{{ date('d M Y H i A', strtotime($single->created_at)) }}</td>
                                        <td>{{ date('d M Y H i A', strtotime($single->updated_at)) }}</td>
                                        <td>
                                            <a href="{{route($repository->adminRoutePrefix .'.'. $repository->moduleRoutes['editRoute'], $single->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            

                                            <?php /*<a href="{{route($repository->adminRoutePrefix .'.'. $repository->moduleRoutes['deleteRoute'], $single->id)}}" onclick="confirm('Are You Sure?')" data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Do you want to Delete this Item ?" class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete"></i></a> */ ?>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
@endsection
@section('after-scripts')
    <script>
        $(document).ready(function() {
            if ($("#data-table").length !== 0) {
                $("#data-table").DataTable()
            }
        });
    </script>
@endsection