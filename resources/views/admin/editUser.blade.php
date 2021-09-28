<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edit User</title>
</head>

<body>

</body>

</html>

<form class="col-md-8" action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" value="{{ $user->name }}" disabled>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" value="{{ $user->email }}" disabled>
    </div>

    <div >
        <select name="permission" class="custom-select" >
            @foreach ($permissions as $permission)
                <label for="permission">permissions</label>
                <option value="{{ $permission->id}}"  > {{ $permission->name }} </option>
            @endforeach
        </select>
    </div>
@method('PUT')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
