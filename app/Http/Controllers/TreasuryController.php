<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;
use App\Models\Treasury;
use App\Models\Bar;
use Illuminate\Support\Facades\DB;

class TreasuryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treasuries = Treasury::all();
        return view('treasury.show')->with('treasuries', $treasuries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('treasury.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treasury = new Treasury;
        $treasury->status = $request->input('status');
        $treasury->locationId = $request->input('locationId');
        $treasury->weight = $request->input('weight');
        $treasury->save();
        return redirect('/treasury')->with('success', 'Treasury Added Successfully');
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
        $treasury = Treasury::find($id);
        return view('treasury.edit')->with('treasury', $treasury);
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
        $treasury = Treasury::find($id);
        $treasury->weight = $request->input('weight');
        $treasury->status = $request->input('status');
        $treasury->locationId = $request->input('locationId');
        $treasury->save();
        return redirect('/treasury')->with('success', 'Treasury Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treasury = Treasury::find($id);

        try {
            $treasury->delete();
            return redirect('/treasury')->with('success', 'Treasury Deleted Successfully');
        } catch (\Exception  $e) {
            return redirect('/treasury')->with('error', 'Treasury Should Be Empty To Be Deleted Because Many Data Will Be Affected');
        }
    }
}
