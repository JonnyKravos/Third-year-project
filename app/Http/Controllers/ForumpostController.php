<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forumpost;
use App\Publication;
use App\Message;
use Auth;
use App\Http\Resources\Forumpost as ForumpostResource;
use App\Http\Requests;

class ForumpostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin' or 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forumposts = Forumpost::orderBy('id', 'desc')->paginate(5);

        //View
        return view('forumposts.index')->withForumposts($forumposts);

        //api
        //return ForumpostResource::collection($forumposts);
    }

    // public function myPosts()
    // {
    //     //
    //     $forumposts = Forumpost::orderBy('id', 'desc')->paginate(10);

    //     return view('forumposts.myPosts')->withForumposts($forumposts);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        $publications = Publication::all();
        return view('forumposts.create')->withPublications($publications);
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
        $this->validate($request, ['title' => 'required|max:255', 'body' => 'required']);

        // Store the data
        $forumpost = new Forumpost;

        $forumpost->title = $request->title;
        $forumpost->publication_id = $request->publication_id;
        $forumpost->body = $request->body;
        $forumpost->user_id = Auth::user()->id;

        $forumpost->save();

        // redirect back to forums
        return redirect()->route('forumposts.show', $forumpost->id)->with('success', 'Your post has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // View
        $forumpost = Forumpost::find($id);
        return view('forumposts.show')->withForumpost($forumpost);

        //api
        // $article = Forumpost::findOrFail($id);
        // return new ForumpostResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $forumpost = Forumpost::find($id);
        $publications = Publication::all();
        $x = [];
        foreach ($publications as $publication) {
            $x[$publication->id] = $publication->name;
        }
        // if (Auth::user() != $forumpost->user) {
        //     return redirect()->route('forumposts.show', $forumpost->id)->with('success', 'You cant edit other peoples posts');
        // }

        return view('forumposts.edit')->withForumpost($forumpost)->withPublications($x);
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
        $this->validate($request, ['title' => 'required|max:255', 'body' => 'required' ]);

        // Store the data
        $forumpost = Forumpost::find($id);

        $forumpost->title = $request->input('title');
        $forumpost->publication_id = $request->input('publication_id');
        $forumpost->body = $request->input('body');

        $forumpost->save();

        // redirect back to forums
        return redirect()->route('forumposts.show', $forumpost->id)->with('success', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forumpost = Forumpost::find($id);
        // if (Auth::user() != $forumpost->user) {
        //     return redirect()->route('forumposts.show', $forumpost->id)->with('success', 'You cant delete other peoples posts');
        // }

        $forumpost->delete();

        return redirect()->route('forumposts.index', $forumpost->id)->with('success', 'Your post has been deleted');
    }
}
