@extends('layouts.app')

@section('content')
<div class="login-container" id="loginform">
    <img src="{{ asset('assets/icon/selamat-datang.png') }}" alt="Jogfood">
    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf
        <div class="flex-column align-items-center">
            <label for="username">Username</label>
        </div>
        <div class="inputForm">
            <i class="fa-solid fa-user"></i>
            <input placeholder="Enter your Username" class="input" type="text" name="username" id="username" value="{{ old('username') }}">
        </div>
        <div class="flex-column">
            <label for="password">Password</label>
        </div>
        <div class="inputForm">
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Enter your Password" class="input" type="password" name="password" id="password">
            <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
        <div class="flex-row">
            <div>
                <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember-me">Remember me</label>
            </div>
        </div>
        <button class="button-submit" type="submit">Sign In</button>
        Tidak Punya Akun?<span class="span"><a href="{{ route('register') }}" style="text-decoration: none;">Daftar Disini!</a></span>
    </form>
</div>

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: {!! json_encode(session('error')) !!},
        toast: true,
        position: 'top-end',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
</script>
@endif

@if(session('login_success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil',
        text: 'Selamat Datang!',
        toast: true,
        position: 'top-end',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    }).then(() => {
        let role = {!! json_encode(session('role')) !!};
        if (role === 'admin') {
            window.location.href = "{{ url('pbl/dashboard/dashboard') }}";
        } else {
            window.location.href = "{{ url('/') }}";
        }
    });
</script>
@endif
@endsection
