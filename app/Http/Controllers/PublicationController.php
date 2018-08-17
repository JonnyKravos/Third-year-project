<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Message;
use Auth;

class PublicationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::all();

        return view('publications.index')->with(compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, ['name' => 'required|max:255', 'link' => 'required' ]);

        // Store the data
        $publication = new Publication;

        $publication->name = $request->name;
        $publication->link = $request->link;

        $publication->save();

        // redirect back to forums
        return redirect()->route('publications.index')->with('success', 'Youve added a publication');
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
        $publication = Publication::find($id);
        return view('publications.edit')->with(compact('publication'));
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
        // Validation
        $this->validate($request, ['name' => 'required|max:255', 'link' => 'required' ]);

        // Store the data
        $publication = Publication::find($id);

        $publication->name = $request->input('name');
        $publication->link = $request->input('link');

        $publication->save();

        // redirect back to forums
        return redirect()->route('publications.index')->with('success', 'Youve added a publication');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);

        $publication->delete();

        return redirect()->route('publications.index')->with('success', 'Your post has been deleted');
    }
}
