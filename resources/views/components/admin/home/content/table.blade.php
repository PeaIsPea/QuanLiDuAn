<tr>
    {{-- <td><img src="../images/{{ $game->image }}"width="150" height="100" /></td> --}}
    {{-- <td>{{ $game->id }}</td> --}}
    <td>{{ $game->name }}</td>
    <td>{{ $game->price }}</td>
    <td>{{ date('d-m-Y', strtotime($game->created_at)) }}</td>
    <td>{{ date('d-m-Y', strtotime($game->updated_at)) }}</td>
    <td><a href="{{ route('editgame', ['id' => $game->id]) }}" class="btn btn-outline-warning">Sửa</a></td>
    <td><a href="{{ route('deletegame', ['id' => $game->id]) }}"  class="btn btn-outline-danger">Xóa</a></td>
</tr>
