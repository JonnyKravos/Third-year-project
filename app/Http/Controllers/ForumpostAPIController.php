<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forumpost;
use App\Publication;
use App\Message;
use Auth;
use App\Http\Resources\Forumpost as ForumpostResource;
use App\Http\Requests;

class ForumpostAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forumposts = Forumpost::orderBy('id', 'desc')->paginate(5);
        return ForumpostResource::collection($forumposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forumpost = $request->isMethod('put') ? Forumpost::findOrFail($request->forumpost_id) : new Forumpost;

        $forumpost->id = $request->input('forumpost_id');
        $forumpost->title = $request->input('title');
        $forumpost->publication_id = $request->input('publication_id');
        $forumpost->body = $request->input('body');
        $forumpost->user_id = $request->input('user_id');

        if ($forumpost->save()) {
            return new ForumpostResource($forumpost);
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
        $article = Forumpost::findOrFail($id);
        return new ForumpostResource($article);
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
        $forumpost = Forumpost::findOrFail($id);
        if ($forumpost->delete()) {
            return new ForumpostResource($forumpost);
        }
        
    }
}
