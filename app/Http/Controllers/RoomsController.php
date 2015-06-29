<?php namespace App\Http\Controllers;

use Auth;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\room;

use Illuminate\Http\Request;

class RoomsController extends Controller {
    public function index()
    {
        $rooms = Room::all();

        $dir = scandir(public_path().'/room/');
        $file = array();
        foreach ($dir as $key => $id){
            if (substr( $id, 0, 1 ) !== ".") {
                $folder = scandir(public_path().'/room/'.$id.'/');
                $img = array_pop($folder);
                $file += [$id => '/room/'.$id.'/'.$img];
            }
        }

        return view('rooms.index', ['rooms' => $rooms, 'file' => $file]);
    }

    public function show($id)
    {
        $room = Room::where(['id' => $id])->first();

        $dir = scandir(public_path().'/room/'.$room->id);
        $files = array();
        foreach ($dir as $key => $img){
            if (substr( $img, 0, 1 ) !== ".") {
                $files[] = '../room/'.$room->id.'/'.$img;
            }
        }

        return view('rooms.show', ['room' => $room, 'files' => $files]);
    }

	public function create()
	{
	    return view('rooms.editorcreate');
	}

	public function edit($id)
	{
	    $room = Room::where('id', '=', $id)->firstOrFail();

	    return view('rooms.editorcreate', ['room' => $room]);
	}

	public function update($id, Request $request)
	{
	    $room = Room::where('id', '=', $id)->firstOrFail();

	    $room->update($request->all());

        if (Input::file('img')) {
            $image = Input::file('img');
            $destinationPath = public_path().'/room/'.$thisObject->id.'/';
            $filename = $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
        }

	    return redirect('rooms');
	}

	public function store(Request $request)
	{

	    $this->validate($request,
	        [
	            'name' => 'required',
	            'info'  => 'required',
	            'rate'  => 'required',
	        ],
	        [
	            'name.required' => 'Ange namn!',
	        ]
	    );

        Room::updateOrCreate(['id' => $request->submit], array(
            'name'  => $request->name,
            'info'  => $request->info,
            'rate'  => $request->rate
            //'user'  => Auth::id()
            ));

        $thisObject = Room::orderBy('updated_at', 'desc')
                    ->first();

        if (!file_exists(public_path().'/room/'.$thisObject->id.'/')) {
            mkdir(public_path().'/room/'.$thisObject->id.'/', 0777, true);
        }

        if (Input::file('img')) {
            $image = Input::file('img');
            $destinationPath = public_path().'/room/'.$thisObject->id.'/';
            $filename = $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
        }

        return redirect('rooms/'.$request->slug);	
    }

}