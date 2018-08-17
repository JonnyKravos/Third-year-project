<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Forumpost;
use Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $forumpost_id)
    {
        $this->validate($request, ['comment' => 'required|min:3']);

        $forumpost = Forumpost::find($forumpost_id);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->forumpost_id = $forumpost->id;

        $comment->save();

        return redirect()->route('forumposts.show', $forumpost->id)->with('success', 'Your comment has been submitted');
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
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $this->validate($request, ['comment' => 'required||min:3']);

        // Store the data
        $comment = Comment::find($id);

        $comment->comment = $request->input('comment');

        $comment->save();

        // redirect back to forums
        return redirect()->route('forumposts.show', $comment->forumpost_id)->with('success', 'Your comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->route('forumposts.show', $comment->forumpost_id)->with('success', 'Your comment has been deleted');
    }
}
