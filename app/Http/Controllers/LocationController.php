<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.show')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'locationname' => 'required',
            'governorate' => 'required',
            'address' => 'required'
        ]);
        $location = new Location;
        $location->country = $request->input('locationname');
        $location->Governorate = $request->input('governorate');
        $location->address = $request->input('address');
        $location->save();
        return redirect('/location')->with('success', 'location Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = location::find($id);
        return view('location.edit')->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'locationname' => 'required',
            'governorate' => 'required',
            'address' => 'required'
        ]);
        $location = location::find($id);
        $location->country = $request->input('locationname');
        $location->governorate = $request->input('governorate');
        $location->address = $request->input('address');
        $location->save();
        return redirect('/location')->with('success', 'location Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = location::find($id);
        $location->delete();
        return redirect('/location')->with('success', 'location Deleted Successfully');
    }
}
