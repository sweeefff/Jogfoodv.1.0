@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
@endphp

@php
    $user = Auth::user();
    $isEditing = session('isEditing', false);
@endphp

<div class="container">
    <header>
        <h1>USER PROFILE</h1>
    </header>
    <div class="profile-card">
        <div class="profile-image">
            @if(!empty($user->profile_picture))
                <img src="{{ asset('uploads/' . $user->profile_picture) }}" alt="Profile Image" class="img-thumbnail" width="150">
            @else
                <img src="https://picsum.photos/150" alt="Profile Image" class="img-thumbnail" width="150">
            @endif
        </div>
        <form class="user-info" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" id="id" class="form-control" value="{{ $user->id }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" {{ $isEditing ? '' : 'disabled' }} required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" {{ $isEditing ? '' : 'disabled' }} required>
                </div>
            </div>
            <a class="change-password" href="{{ route('password.change') }}">Change Password</a>
            @if($isEditing)
                <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
            @else
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            @endif
        </form>
    </div>
</div>

<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
