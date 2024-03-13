@extends('main.app')
@section('title')
Create Department
@endsection
@section('content')
<section class="departments-section py-4">
    <div class="container container-custom">
        <div class="content-card card card-body mb-3">
            <form action="{{ route('master.department.store') }}" method="post" name="department_form">
                @csrf
                <div class="page-header pb-0">
                    <h4 class="fs22">Add New Department</h4>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="DepartmentName" class="form-label fw500 text-dark mb-1">Department Name</label>
                    <input type="text" name="name" class="form-control" id="DepartmentName"
                        placeholder="Enter Department name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror                
                </div>
                <div class="mb-3">
                    <label for="DepartmentDescription" class="form-label fw500 text-dark mb-1">Description</label>
                    <textarea name="description" class="form-control" id="DepartmentDescription" rows="3"
                        placeholder="Describe the Department">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="departmentManager" class="form-label fw500 text-dark mb-1">Department Manager</label>
                    <select class="form-select" id="departmentManager" name="user_id">
                        <option selected>Choose...</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="departmentActive">
                    <label class="form-check-label" for="departmentActive">Active</label>
                </div>
                <div class="text-end"><button type="submit" class="btn btn-prime btn-lg px-5">SUBMIT DEPARTMENT</button></div>
            </form>
            
        </div>
    </div>
</section>
@endsection