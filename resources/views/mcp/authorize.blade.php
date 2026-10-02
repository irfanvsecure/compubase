@extends('auth.admin')

@section('title', 'Allow access')

@section('content')
<h1>Allow {{ $client->name }}?</h1>
<p>Signed in as <b>{{ $user->email }}</b>. If you allow it, {{ $client->name }} can:</p>
<ul>
  <li>Read, add, edit and delete courses and categories</li>
  <li>Write, publish and delete blog posts</li>
  <li>Upload and delete images</li>
  <li>Change SEO settings for every page</li>
</ul>
<div class="actions">
  <form method="POST" action="{{ route('passport.authorizations.deny') }}">
    @csrf
    @method('DELETE')
    <input type="hidden" name="state" value="">
    <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
    <input type="hidden" name="auth_token" value="{{ $authToken }}">
    <button class="btn btn-outline" type="submit">Deny</button>
  </form>
  <form method="POST" action="{{ route('passport.authorizations.approve') }}">
    @csrf
    <input type="hidden" name="state" value="">
    <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
    <input type="hidden" name="auth_token" value="{{ $authToken }}">
    <button class="btn btn-navy" type="submit">Allow</button>
  </form>
</div>
@endsection
