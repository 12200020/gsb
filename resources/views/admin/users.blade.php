<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Adding a light gray background to header cells */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Adding a different background color to even rows */
        }
    </style>
</head>
<body style="background-color: #f5f5f5">
    @include('admin.nav')

    <div class="container" style="padding: 0rem 3rem 3rem 3rem">
        <h1>Users</h1>
        <table>
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.delete', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red; color: white; border: none; padding: 6px 12px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
