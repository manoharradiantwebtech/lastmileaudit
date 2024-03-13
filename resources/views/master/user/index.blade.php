@extends('main.app')
@section('title')
Users
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header page-header-left">
                    <h3>Users</h3>
                </div>
                <div class="page-header-right">
                    <a class="btn btn-prime btn-sm shadow-sm" href="{{route('master.user.create')}}">Add New User</a>
                </div>
            </div>
            <div class="content-card card">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show mx-4 mb-0 mt-3" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <h5 class="mb-0">All Users <small class="text-prime fs16">(163)</small></h5>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control form-control-sm search" placeholder="Search User by Name/Location">
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
                                    <th><input type="checkbox"></th>
                                    <th>Contact Name</th>
                                    <th>Mobile No.</th>
                                    <th>Role</th>
                                    <th>Sub Locations</th>
                                    <th>Audit Assigned</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <!-- Example row -->
                                @foreach ($users as $user)                                    
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <th>{{$user->name}}</th>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->roles[0]->name ?? ''}}</td>
                                        <td></td>
                                        <td>Jan 20, 2024</td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-dark btn-sm" href="user-details.html"><i class="me-2 fas fa-eye"></i> View</a>
                                            <a href="{{ route('master.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
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
                    <p class="small text-muted mb-0">Showing <span class="text-dark fw600">1</span> of 6</p>
                    <nav class="pagination-wrap" aria-label="Page navigation example">
                        <ul class="pagination shadow-sm mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection