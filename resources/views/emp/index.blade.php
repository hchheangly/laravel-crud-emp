<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="{{ route('search') }}" method="POST">
    {{ csrf_field() }}
    <select name="search">
        <option>-- Please select position --</option>
        @foreach($pos as $p)
            <option value='{{ $p->position_id }}'>{{ $p->position_name }}</option>
        @endforeach
    </select>
    <input type="submit" value="submit" />
</form>
<button type="submit"><a href="{{ url('/addEmp') }}">Create One</a></button><br/><br/><hr>
<table border = "1" style="border-collapse: collapse;">
    <tr>
        <th>Position Name</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    @foreach($emp_data as $emp)
        <tr>
            <td>{{ $emp->position_name }}</td>
            <td>{{ $emp->firstname }}</td>
            <td>{{ $emp->lastname }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->phone }}</td>
            <td>{{ $emp->age }}</td>
            <td>
                <button type="submit"><a href="{{ route('edit', $emp->id) }}">Update One</a></button>
                <button type="submit"><a href="{{ route('delete', $emp->id) }}">delete</a></button>
            </td>
    </tr>
    @endforeach
</table>

</body>
</html>