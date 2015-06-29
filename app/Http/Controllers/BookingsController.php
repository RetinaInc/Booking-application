<?php namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class BookingsController extends Controller {


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

        return view('booking.index', ['rooms' => $rooms, 'file' => $file]);
    }

    public function calendar(Request $request)
    {
        return view('booking.done');
    }

    public function room(Request $request)
    {
        //$rooms = Room::all();
        $rooms = Room::where(['id' => 1])->get();

        $dir = scandir(public_path().'/room/');
        $file = array();
        foreach ($dir as $key => $id){
            if (substr( $id, 0, 1 ) !== ".") {
                $folder = scandir(public_path().'/room/'.$id.'/');
                $img = array_pop($folder);
                $file += [$id => '/room/'.$id.'/'.$img];
            }
        }

        $html = view('booking.room', ['rooms' => $rooms, 'file' => $file])->render();
        return Response::json(array('input' => $request->input, 'html' => $html));
        //return view('booking.room', ['rooms' => Request::input()]);
    }

    public function done(Request $request)
    {
        $room = Room::where(['id' => $request->id])->first();

        return view('booking.done', ['room' => $room, 'date' => $request->submit]);
    }

}
