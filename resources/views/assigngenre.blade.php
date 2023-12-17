<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('cdn')
</head>

<body>
    <form action="{{ route('addGen') }}" method="post">
        @csrf
        <label for="genre">Genre Name</label>
        <input id="genre" name="genre" type="text" value="" >
        <button class="btn btn-primary">Add</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Genre</th>
                <th scope="col">Add</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $item)
                <form action="{{ route('assignGen') }}" method="POST">
                    @csrf
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            <input name="name" type="text" value="{{ $item->name }}" >
                        </td>
                        <td>
                            <select class="form-select" name="genre" id="">
                                @foreach ($genres as $genre)
                                    <option id="{{ $genre->id }}" value="{{ $genre->name }}">
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary">Assign</button>
                        </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
</body>

</html>
