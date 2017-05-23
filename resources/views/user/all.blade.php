@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('user/' . $user->id) }}">
                            Show
                        </a>
                        <a href="{{ url('user/edit/' . $user->id) }}">
                            Edit
                        </a>
                        <a href="{{ url('user/delete/' . $user->id) }}">
                            Delete
                        </a>
                    </td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
