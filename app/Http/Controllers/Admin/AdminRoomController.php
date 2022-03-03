<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Kamar';
        $rooms = Room::latest()->paginate(5);

        return view('admin.rooms.index', compact('title', 'rooms'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create | Data Kamar';
        $facilities = Facility::all()->where('facility_type', 'room');

        return view('admin.rooms.create', compact('title', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'room_type' => 'required|max:255',
            'number_of_rooms' => 'required|numeric',
            'facility_id' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['image'] = $request->file('image')->store('uploaded-images');

        Room::create($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'New Room has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $title = 'Detail | Data Kamar';

        return view('admin.rooms.show', compact('title', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $title = 'Edit | Data Kamar';
        $facilities = Facility::all()->where('facility_type', 'room');

        return view('admin.rooms.edit', compact('title', 'room', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $rules = [
            'room_type' => 'required|max:255',
            'number_of_rooms' => 'required|numeric',
            'facility_id' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($room->image) {
                Storage::delete($room->image);
            }
            
            $validatedData['image'] = $request->file('image')->store('uploaded-images');
        }

        Room::where('id', $room->id)->update($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'Room has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if ($room->image) {
            Storage::delete($room->image);
        }

        Room::destroy($room->id);

        return redirect('/dashboard/rooms')->with('success', 'Room has been removed');
    }
}
