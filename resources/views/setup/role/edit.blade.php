@extends('main.app')
@section('title')
Edit role
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="content-card card card-body mb-3">
                <form action="{{ route('setup.role.update', $role->id) }}" method="post" name="role_form">
                    @csrf
                    @method('PUT')
                    <div class="page-header pb-0">
                        <h4 class="fs22">Edit Role</h4>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="roleName" class="form-label fw500 text-dark mb-1">Role Name</label>
                        <input type="text" value="{{ $role->name }}" class="form-control" id="roleName" placeholder="Enter role name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw500 text-dark mb-1">Description</label>
                        <input type="text" value="{{ $role->description }}" class="form-control" id="description" placeholder="Enter role description" name="description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="permissions" class="form-label fw500 text-dark mb-1">Permissions</label>
                        <select class="form-select" id="permissions">
                            <option selected>Choose...</option>
                            <!-- Populate this dropdown with permissions -->
                            <option value="1">Permission 1</option>
                            <option value="2">Permission 2</option>
                            <option value="3">Permission 3</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="adminAccess">
                        <label class="form-check-label" for="adminAccess">Admin Access</label>
                    </div>
                    <div class="mb-3">
                        <label for="assignUser" class="form-label fw500 text-dark mb-1">Assign User</label>
                        <select class="form-select" id="assignUser">
                            <option selected>Choose...</option>
                            <!-- Populate this dropdown with users -->
                            <option value="1">User 1</option>
                            <option value="2">User 2</option>
                            <option value="3">User 3</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="active">
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="text-end"><button type="submit" class="btn btn-prime btn-lg px-5">Edit ROLE</button></div>
                </form>
                
            </div>
        </div>
    </section>
@endsection