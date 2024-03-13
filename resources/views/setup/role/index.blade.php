@extends('main.app')
@section('title')
Role Management
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header page-header-left">
                    <h3>Role Management</h3>
                </div>
                <div class="page-header-right">
                    <a class="btn btn-prime btn-sm shadow-sm" href="{{route('setup.role.create')}}">Add New Role</a>
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
                            <h5 class="mb-0">Available Role List <small class="text-prime fs16">(Active : {{count($roles)}})</small></h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <table class="content-table table table-hover mb-0">
                            <thead class="bg-light-1">
                                <tr>
                                    <th>Role Name</th>
                                    <th>Status</th>
                                    <th class="text-center">Score</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <!-- Example row -->
                                @foreach ($roles as $role)
                                    <tr>
                                        <th>{{$role->name}}</th>
                                        <td><span class="badge text-bg-success px-3 py-2 lh100">ACTIVE</span></td>
                                        <td class="text-center">
                                            <span>
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined11" autocomplete="off">
                                                <a href={{route('setup.role.edit', $role->id)}}
                                                    <label class="px-3 py-2 btn btn-outline-info" for="btn-check-outlined11">
                                                        <i class="fs18 fa fa-edit"></i>
                                                    </label>
                                                </a>
                                            </span>
                                            <span>
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined12" autocomplete="off">
                                                <label class="px-3 py-2 btn btn-outline-warning" for="btn-check-outlined12">
                                                    <i class="fs18 fa-regular fa-circle-pause"></i>
                                                </label>
                                            </span>
                                            <span>
                                                <input type="checkbox" class="btn-check" id="btn-check-outlined13" autocomplete="off">
                                                <label class="px-3 py-2 btn btn-outline-danger" for="btn-check-outlined13">
                                                    <i class="fs18 fa-solid fa-ban"></i>
                                                </label>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection