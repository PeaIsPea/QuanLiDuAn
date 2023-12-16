<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class GenreController extends Controller
{
    public function index()
    {
        $genres = DB::table(Genre::retrieveTableName())
            ->get();

        return view("admin.genre.genre", ['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = DB::table(Genre::retrieveTableName())
            ->where('id', '=', $id)
            ->get();

        return $genre;
    }

    public function create()
    {
        return view("admin.genre.addgenre");
    }

    public function store(Request $request)
    {
        // dd($request);
        if (Gate::allows('addGenre')) {
            $request->validate(
                [
                    'genre_name' => [
                        Rule::unique(Genre::retrieveTableName(), 'name'),
                        'required',
                        'string'
                    ]
                ],
                [
                    'genre_name.required' => "Không thể thiếu tên!",
                    'genre_name.unique' => "Trùng tên!"
                ]
            );

            $name = $request->get('genre_name');

            DB::table(Genre::retrieveTableName())
                ->insert(
                    [
                        'name' => $name
                    ]
                );

            toastr()->success('', 'Thêm thành công');
            return redirect()->route('admingenre');
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    public function edit($id)
    {
        $genre = DB::table(Genre::retrieveTableName())
            ->where('id', '=', $id)
            ->first();

        return view("admin.genre.editgenre", ['genre' => $genre]);
    }

    public function update(Request $request, $id)
    {
        if (Gate::allows('editGenre')) {
            $request->validate(
                [
                    'name' => [
                        Rule::unique(Genre::retrieveTableName(), 'name')->ignore($id),
                        'required',
                        'string'
                    ]
                ],
                [
                    'name.required' => "Không thể thiếu tên!",
                    'name.unique' => "Trùng tên!"
                ]
            );

            $name = $request->get('name');

            DB::table(Genre::retrieveTableName())
                ->where('id', '=', $id)
                ->update(
                    [
                        'name' => $name,
                        'updated_at' => Carbon::now()
                    ]
                );

            toastr()->success('', 'Sửa thành công');
            return redirect()->route("admingenre");
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }

    public function delete($id)
    {
        if (Gate::allows('deleteGenre')) {
            $isExist = DB::table(Genre::INTERMEDIATE_TABLE[0])
                ->where('genre_id', '=', $id)
                ->exists();

            if ($isExist) {
                toastr()->error('', 'Xóa thất bại, vẫn còn game thuộc thể loại này');
                return redirect()->back();
            }

            Genre::destroy($id);

            toastr()->success('', 'Xóa thành công');
            return redirect()->route('admingenre');
        }

        toastr()->error('', 'Bạn không đủ quyền hạn');
        return redirect()->back();
    }
}
