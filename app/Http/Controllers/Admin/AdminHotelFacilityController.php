<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminHotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Fasilitas Hotel';
        $hotel_facilities = Facility::where('facility_type', 'hotel')->latest()->paginate(5);

        return view('admin.hotel-facilities.index', compact('title', 'hotel_facilities'))
                ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create | Fasilitas Hotel';

        return view('admin.hotel-facilities.create', compact('title'));
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

        $validatedData['facility_type'] = 'hotel';
        $validatedData['image'] = $request->file('image')->store('uploaded-images');

        Facility::create($validatedData);

        return redirect('/dashboard/hotel-facilities')->with('success', 'New Hotel Facility has been added');
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
    public function edit(Facility $hotel_facility)
    {
        $title = 'Edit | Fasilitas Hotel';

        return view('admin.hotel-facilities.edit', compact('title', 'hotel_facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $hotel_facility)
    {
        $rules = [
            'facility_name' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'hotel';

        if ($request->file('image')) {
            if ($hotel_facility->image) {
                Storage::delete($hotel_facility->image);
            }
            
            $validatedData['image'] = $request->file('image')->store('uploaded-images');
        }

        Facility::where('id', $hotel_facility->id)->update($validatedData);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Hotel Facility has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $hotel_facility)
    {
        if ($hotel_facility->image) {
            Storage::delete($hotel_facility->image);
        }

        Facility::destroy($hotel_facility->id);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Hotel Facility has been removed');
    }
}
