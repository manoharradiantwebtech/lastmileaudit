@extends('main.app')
@section('title')
Create role
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="content-card card card-body mb-3">
                <form action="{{ route('setup.role.store') }}" method="post" name="role_form">
                    @csrf
                    <div class="page-header pb-0">
                        <h4 class="fs22">Add New Role</h4>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="roleName" class="form-label fw500 text-dark mb-1">Role Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="roleName" placeholder="Enter role name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
						@enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw500 text-dark mb-1">Description</label> 
                        <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" id="description" placeholder="Enter role description">
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
                        <input type="checkbox" class="form-check-input" name="admin" id="adminAccess">
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
                    <div class="text-end"><button type="submit" class="btn btn-prime btn-lg px-5">ADD NEW ROLE</button></div>
                </form>
                
            </div>
        </div>
    </section>
@endsection