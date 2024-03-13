@extends('main.app')
@section('title')
Edit User
@endsection
@section('content')
<section class="users-section py-4">
    <div class="container container-custom">
        <div class="content-card card card-body mb-3">
            <form action="{{ route('master.user.store') }}" method="post" name="user_form">
                @csrf
                <div class="page-header pb-0"> <h4 class="fs22">Edit User</h4> </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <label for="name" class="form-label fw500 text-dark mb-1">Name</label>
                        <input type="text" value="{{old('name') ?? $user->name}}" class="form-control" name="name" id="name" placeholder="Enter your name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="email" class="form-label fw500 text-dark mb-1">Email ID</label>
                        <input type="email" class="form-control" value="{{old('email') ?? $user->email}}" name="email" id="email" placeholder="Enter your email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="mobile" class="form-label fw500 text-dark mb-1">Mobile No</label>
                        <input type="tel" value="{{old('phone') ?? $user->phone}}" class="form-control" name="phone" id="mobile" placeholder="Enter your mobile number">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="role" class="form-label fw500 text-dark mb-1">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option selected>Choose...</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" {{ $userRole->id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="location" class="form-label fw500 text-dark mb-1">Location</label>
                        <select class="form-select" id="location" name="location_id" onchange="setsublocation()">
                            <option selected>Choose...</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="sublocation" class="form-label fw500 text-dark mb-1">Sublocation</label>
                        <select class="form-select" id="sublocation" name="sub_location_id" disabled>
                            <option selected>Choose...</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="joiningDate" class="form-label fw500 text-dark mb-1">Date of Joining</label>
                        <input type="date" class="form-control" id="joiningDate" name="doj">
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="password" class="form-label fw500 text-dark mb-1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-end"><button type="submit" class="btn btn-prime btn-lg px-5">Update TEAM</button></div>
            </form>
        </div>
    </div>
</section>
<script>
    function setsublocation() {
        var location = document.getElementById('location').value;
        if (location !== 0) {
            fetch(`/getsublocations/${location}`)
                .then(response => response.json())
                .then(data => {
                    let sublocationSelect = document.getElementById('sublocation');
                    sublocationSelect.innerHTML = '<option selected>Choose...</option>';

                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.sub_location.id;
                        option.textContent = item.sub_location.name;
                        sublocationSelect.appendChild(option);
                    });
                    sublocationSelect.disabled = false;
                })
                .catch(error => console.error('Error fetching sublocations:', error));
        }

    }
</script>
@endsection