@extends('elumina.employee.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-6 col-sm-offset-3">
        <h3 class="text-center">Create Employee</h3>
        @include('elumina.employee.error-message')
        <form method="POST" action="{{route('employee.store')}}">
            @csrf
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" placeholder="Full Name" value="{{old('fullName')}}">
            </div>
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="profile">Profile</label>
                <textarea class="form-control @error('profile') is-invalid @enderror" id="profile" name="profile" placeholder="Profile">{{old('profile')}}</textarea>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address">{{old('address')}}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                </select>    
            </div>
            <div class="form-group text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{route('employee.index')}}"><button type="button" class="btn btn-light">Cancel</button></a>
            </div>
        </form>
        </div>
    </div>
</div>        
    
@endsection