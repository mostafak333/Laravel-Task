<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use mysqli;

class BarController extends Controller
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
        $bars = Bar::all();
        return view('bar.show')->with('bars', $bars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bar.add');
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
            'karat' => 'required',

        ]);
        $bar = new Bar();
        $karat = $request->input('karat');
        $result = DB::select("SELECT id FROM bar WHERE karat = $karat");
        if ($result != null) {
            return redirect('/bar')->with('error', "Bar of karat $karat Already Exist");
        } else {
            $bar->karat = $request->input('karat');
            $bar->save();
            return redirect('/bar')->with('success', 'Bar Added Successfully');
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
        $bar = Bar::find($id);

        return view('bar.edit')->with('bar', $bar);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bar = Bar::find($id);
        try {
            $bar->delete();
            return redirect('/bar')->with('success', 'Bar Deleted Successfully');
        } catch (\Exception  $e) {
            return redirect('/bar')->with('error', 'Bar Can\'T Deleted Because Many Data Will Be Affected');
        }
    }
}
