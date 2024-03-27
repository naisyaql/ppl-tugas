<title>{{ Auth::user()->name }}</title>
@extends('layouts.app') 
@section('body')
    <div class="d-flex align-items-center justify-content-between">
      <h1> Welcome, {{ Auth::user()->name }}</h1>
      <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
        @csrf
        @method('DELETE')
        <div class="btn-group">
          <a href="/edit" class="btn btn-primary">Edit Profile</a>
          <button class="btn btn-danger" type="submit">Logout</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection