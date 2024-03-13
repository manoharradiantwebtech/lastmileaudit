@extends('main.app')
@section('title')
Location
@endsection
@section('content')
<section class="locations-section py-4">
                <div class="container container-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="page-header page-header-left">
                            <h3>Locations</h3>
                        </div>
                        <div class="page-header-right">
                            <a class="btn btn-prime btn-sm shadow-sm" href="{{route('master.location.create')}}">Add New Location</a>
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
                                    <h5 class="mb-0">All Locations <small class="text-prime fs16">({{count($locations)}})</small></h5>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <form action="{{ route('master.location.index') }}" method="get">
                                                <input type="text" class="form-control form-control-sm search" name="search" placeholder="Search Location by Name">
                                                <i class="fa fa-search"></i>
                                            </form>

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
                                            <th>Location</th>
                                            <th>Sub Locations</th>
                                            <th>Contact Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email ID</th>
                                            <th class="text-center">Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <!-- Example row -->
                                        @foreach($locations as $loc)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <th>{{$loc->location->name}}</th>
                                                <td>20</td>
                                                <td>{{$loc->user->name}}</td>
                                                <td>{{$loc->user->phone}}</td>
                                                <td>{{$loc->user->email}}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('master.location.edit', $loc->location->id) }}" class="btn btn-primary btn-sm">
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
                            {{$locations->links('pagination::bootstrap-5')}}
                        </div>
                    </div>
                </div>
            </section>
@endsection