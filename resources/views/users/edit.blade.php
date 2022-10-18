@extends('users.layout')

@section('content')
    <h2>Edit User</h2>
    <a href="{{ route('users.index') }}">Back</a>
    <br /><br />

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
        <br />

        @error('name')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <br />

        <strong>Email:</strong>
        <input type="text" name="email" value="{{ $user->email }}" placeholder="Email" />
        <br />

        @error('email')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <br />

        <strong>Password:</strong>
        <input type="password" name="password" value="{{ $user->password }}" placeholder="Password" />
        <br />

        @error('password')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <br /><br />

        <button type="submit">Submit</button>
        <br /><br /><br />
    </form>
@endsection
