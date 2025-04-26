@extends('layouts.app')

@section('content')

<div class="container">
    <header>
        <h1>USER PROFILE</h1>
    </header>
    <div class="profile-card">
        <div class="profile-image">
            <img src="https://picsum.photos/150" alt="Profile Image" class="img-thumbnail" width="150">
        </div>
        <form class="user-info" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" id="id" class="form-control" value="{{ Auth::user()->id }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" id="username" name="username" class="form-control" value="{{ Auth::user()->username }}" {{ session('isEditing', false) ? '' : 'disabled' }} required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" {{ session('isEditing', false) ? '' : 'disabled' }} required>
                </div>
            </div>
            <a class="change-password" href="{{ route('password.change') }}">Change Password</a>
            @if(session('isEditing', false))
                <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
            @else
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            @endif
        </form>
    </div>
</div>

