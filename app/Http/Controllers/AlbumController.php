<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\LogUpdate;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::get();
        return view('welcome',compact('albums'));
    }
    public function edit(string $id)
    {
        $album = Album::where('id',$id)
            ->get();
        return view('album.update_album',compact('album'));
    }
    public function update(Request $request)
    {
        Album::where('id',$request->id)
            ->update([
                'name'=>$request->name,
                'artist' => $request->artist,
                'description' => $request->descr,
                'image' => $request->image,
            ]);
        LogUpdate::create([
           'albums_id' => $request->id,
           'users_id' =>  Auth::id(),
        ]);

        return redirect('album');
    }
    public function destroy(string $id)
    {
        Album::destroy($id);
        return redirect('/');
    }
}

