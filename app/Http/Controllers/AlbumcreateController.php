<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;
use GuzzleHttp\Client;

class AlbumcreateController extends Controller
{
    public function index()
    {
        return view('album.new_album');
    }
    public function find(Request $request)
    {
        if($request->ajax()){
            $response = Http::get('http://ws.audioscrobbler.com/2.0/',[
                'method' => 'album.search',
                'album' => $request->value,
                'api_key' => 'efe350e6b453f277990cabdd9289d1b9',
                'limit' => '1',
                'format' => 'json',
            ]);
            $data = json_decode($response);
            foreach ($data->results->albummatches->album as $album)
            {
                foreach (end($album->image) as $item)
                {
                    return response()->json(['artist'=>$album->artist,'descr'=>$album->artist,'image'=>$item]);
                }
            }




        }
    }
    public function store  (Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'artist' => ['required'],
            'descr' => ['required'],
            'image' => ['required'],
        ]);
       Album::create([
           'name' => $request->name,
           'artist' => $request->artist,
           'description' => $request->descr,
           'image' => $request->image,
       ]);
       return redirect('/');
    }
}
