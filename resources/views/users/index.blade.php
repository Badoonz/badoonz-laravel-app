@extends('users.layout')

@section('content')
    <h2>Users List</h2>
    <a href="{{ route('users.create') }}">Create New User</a>
    <br /><br />

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.show',$user->id) }}">Show</a> |
                    <a href="{{ route('users.edit',$user->id) }}">Edit</a> |
                    <form action=" {{route('users.destroy',$user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $users->onEachSide(5)->links() }}

@endsection

