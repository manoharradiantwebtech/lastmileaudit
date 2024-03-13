@extends('main.app')
@section('title')
    Create Location
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="content-card card card-body mb-3">
                <form action="{{ route('master.location.store') }}" method="post" name="location_form">
                    @csrf
                    <div class="page-header pb-0">
                        <h4 class="fs22">Add New Location</h4>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="locationName" class="form-label fw500 text-dark mb-1">Location Name</label>
                        <input type="text" name="name" class="form-control" id="locationName"
                            placeholder="Enter location name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="locationDescription" class="form-label fw500 text-dark mb-1">Description</label>
                        <textarea name="description" class="form-control" id="locationDescription" rows="3"
                            placeholder="Describe the location">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label fw500 text-dark mb-1">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Enter username" value="{{ old('username') }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw500 text-dark mb-1">Mobile No.</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Mobile No."
                            pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number"
                            value="{{ old('phone') }}">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw500 text-dark mb-1">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                            value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw500 text-dark mb-1">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter password" value="{{ old('password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="locationActive" name="active"
                            {{ old('active') ? 'checked' : '' }}>
                        <label class="form-check-label" for="locationActive">Active</label>
                    </div>
                    <div class="text-end"><button type="submit"
                            class="btn btn-prime btn-lg px-5">SUBMIT LOCATION</button></div>
                </form>

            </div>
        </div>
    </section>
@endsection
