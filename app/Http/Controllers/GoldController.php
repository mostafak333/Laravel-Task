<?php

namespace App\Http\Controllers;

use App\Models\Gold;
use App\Models\Treasury;
use App\Models\Bar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GoldController extends Controller
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

        $allgold = Gold::all();
        return view('gold.show')->with('allgold', $allgold);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treasuries = Treasury::all();
        $bars = Bar::all();
        return view('gold.add')->with('treasuries', $treasuries)->with('bars', $bars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input('karat');
        $bid = DB::select("SELECT id FROM bar WHERE karat= $input");
        $treasury = Treasury::find($request->input('treasuryid'));
        $treasuryStatus = $treasury->status;
        $gold = new Gold;
        $gold->status = $request->input('status');
        $gold->treasuryid = $request->input('treasuryid');
        $gold->barid = $bid[0]->id;
        $gold->weight = $request->input('weight');
        $goldw = DB::select("SELECT SUM(weight) as totalw  FROM gold WHERE treasuryId=$gold->treasuryid ");

        if ($treasuryStatus == $request->input('status')) {
            if ($treasury->weight >= ($goldw[0]->totalw + $gold->weight)) {
                $gold->save();
                return redirect('/gold')->with('success', 'Gold Added Successfully');
            } else {

                return back()->with('error', 'treasury weigt Full');
            }
        } else {
            return back()->with('error', 'Gold Status should be same treasury Status');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allgold = DB::select("SELECT * FROM gold WHERE treasuryId= $id");
        return view('gold.show')->with('allgold', $allgold);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gold = Gold::find($id);
        $bars = Bar::all();
        $treasuries = Treasury::all();
        return view('gold.edit')->with('gold', $gold)->with('bars', $bars)->with('treasuries', $treasuries);
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
        $input = $request->input('karat');
        $bid = DB::select("SELECT id FROM bar WHERE karat= $input");
        $treasury = Treasury::find($request->input('treasuryid'));
        $treasuryStatus = $treasury->status;
        $gold =  Gold::find($id);
        $gold->status = $request->input('status');
        $gold->treasuryid = $request->input('treasuryid');
        $gold->barid = $bid[0]->id;
        $gold->weight = $request->input('weight');
        $goldw = DB::select("SELECT SUM(weight) as totalw  FROM gold WHERE treasuryId=$gold->treasuryid ");
        if ($treasuryStatus == $request->input('status')) {
            if ($treasury->weight >= ($goldw[0]->totalw + $gold->weight)) {
                $gold->save();
                return redirect('/gold')->with('success', 'Gold Added Successfully');
            } else {

                return back()->with('error', 'treasury weigt Full');
            }
        } else {
            return back()->with('error', 'Gold Status should be same treasury Status');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gold = Gold::find($id);
        $gold->delete();
        return redirect('/gold')->with('success', 'Gold Deleted Successfully');
    }
}
