<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminRoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Fasilitas Kamar';
        $room_facilities = Facility::where('facility_type', 'room')->latest()->paginate(5);

        return view('admin.room-facilities.index', compact('title', 'room_facilities'))
                ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create | Fasilitas Kamar';

        return view('admin.room-facilities.create', compact('title'));
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
            'facility_name' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'room';
        $validatedData['image'] = $request->file('image')->store('uploaded-images');

        Facility::create($validatedData);

        return redirect('/dashboard/room-facilities')->with('success', 'New Room Facility has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $room_facility)
    {
        $title = 'Edit | Fasilitas Kamar';

        return view('admin.room-facilities.edit', compact('title', 'room_facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $room_facility)
    {
        $rules = [
            'facility_name' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'room';

        if ($request->file('image')) {
            if ($room_facility->image) {
                Storage::delete($room_facility->image);
            }
            
            $validatedData['image'] = $request->file('image')->store('uploaded-images');
        }

        Facility::where('id', $room_facility->id)->update($validatedData);

        return redirect('/dashboard/room-facilities')->with('success', 'Room Facility has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $room_facility)
    {
        if ($room_facility->image) {
            Storage::delete($room_facility->image);
        }

        Facility::destroy($room_facility->id);

        return redirect('/dashboard/room-facilities')->with('success', 'Room Facility has been removed');
    }
}
