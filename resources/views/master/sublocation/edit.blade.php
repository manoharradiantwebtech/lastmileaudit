@extends('main.app')
@section('title')
    Edit Sub-location
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="content-card card card-body mb-3">
                <form action="{{ route('master.sublocation.update', $sublocation->id) }}" method="post" name="location_form">
                    @method('PUT')
                    @csrf
                    <div class="page-header pb-0">
                        <h4 class="fs22">Edit Sublocation</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="locationName" class="form-label fw500 text-dark mb-1">Location Name</label>
                            <select class="form-select" id="locationName" name="location_id">
                                <option selected disabled>Choose...</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" {{ $location->id == $sublocation->location_id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sublocationName" class="form-label fw500 text-dark mb-1">Sublocation Name</label>
                            <input type="text" class="form-control" id="sublocationName"
                                placeholder="Enter sublocation name" name="name" value="{{ old('name') ?? $sublocation->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sublocationDescription" class="form-label fw500 text-dark mb-1">Description</label>
                        <textarea name="description" class="form-control" id="sublocationDescription" rows="3"
                            placeholder="Describe the sublocation">{{ old('description') ?? $sublocation->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw500 text-dark mb-1">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Enter username" value="{{ old('username') ?? $sublocation->user->name }}">
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
                        value="{{ old('phone') ?? $sublocation->user->phone }}">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw500 text-dark mb-1">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                        value="{{ old('email') ?? $sublocation->user->email}}">
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
                    <input type="checkbox" class="form-check-input" id="sublocationActive">
                    <label class="form-check-label" for="sublocationActive">Active</label>
                </div>
                <div class="text-end"><button type="submit" class="btn btn-prime btn-lg px-5">SUBMIT Sub LOCATION</button></div>
            </form>
            
        </div>
    </div>
</section>
@endsection