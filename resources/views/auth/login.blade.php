@extends('auth.admin')

@section('title', 'Admin sign-in')

@section('content')
<h1>Admin sign-in</h1>
<p>Sign in to let Claude manage the website.</p>
@if ($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login') }}">
  @csrf
  <label for="email">Email</label>
  <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
  <label for="password">Password</label>
  <input id="password" type="password" name="password" required autocomplete="current-password">
  <label class="remember"><input type="checkbox" name="remember" value="1"> Keep me signed in</label>
  <button class="btn btn-navy" type="submit">Sign in</button>
</form>
@endsection
