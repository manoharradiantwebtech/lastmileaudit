@extends('main.app')
@section('title')
Sub-department
@endsection
@section('content')
<section class="locations-section py-4">
        <div class="container container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header page-header-left">
                    <h3>Departments</h3>
                </div>
                <div class="page-header-right">
                    <a class="btn btn-prime btn-sm shadow-sm" href="{{route('master.department.create')}}">Add New Department</a>
                </div>
            </div>
            <div class="content-card card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <h5 class="mb-0">All Department <small class="text-prime fs16">({{count($departments)}})</small></h5>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control form-control-sm search" placeholder="Search Department by Name">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="content-table table table-hover mb-0">
                            <thead class="bg-light-1">
                                <tr>
                                        
                                    <th>Department Name</th>
                                    <th> Added Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <!-- Example row -->
                                @foreach ($departments as $department)                                    
                                    <tr>
                                        
                                        <th>{{$department->name}}</th>
                                        <td>{{$department->created_at}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('master.department.edit', $department->id) }}" class="btn btn-primary btn-sm">
                                                <i class="me-2 fas fa-edit"></i> Edit
                                            </a>  
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light-1 py-3 d-flex justify-content-between align-items-center border-top-0">
                    {{$departments->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </section>
@endsection