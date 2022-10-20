@extends('users.layout')

@section('content')
    <h2>Add New User</h2>
    <a href="{{ route('users.index') }}">Back</a>
    <br /><br />

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <strong>Name:</strong>
        <input type="text" name="name" placeholder="Name" />
        <br />

        @error('name')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <br />

        <strong>Email:</strong>
        <input type="text" name="email" placeholder="Email" />
        <br />

        @error('email')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <br />

        <strong>Password:</strong>
        <input type="text" name="password" placeholder="Password" />
        <br />

        @error('password')
        <span style="color: red">{{ $message }}</span>
        @enderror
        <br /><br />

        <button type="submit">Submit</button>
        <br /><br /><br />
    </form>

@endsection
