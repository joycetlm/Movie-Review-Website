<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Comment;
use Session;
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
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
           'content' =>'required',
            
        ));
        //store in db
        /*return  $request->filmname;*/
        $user = Auth::user();

        $post = new Comment;
        $post->email = $user->email;
        $post->review_id = $request->id;
        $post->content = $request->content;
        $post->save();
        Session::flash('success','Your new comment has been added');
        //redirect to another page
        /*return redirect()->route('posts.show',$post->id);*/
        //$id = $post->id;
        //return view('showforum')->with('id',$id);
        return redirect()->route('comments.show', $post->review_id);
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
        return view('showreview')->with('id', $id);
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
        $comments = Comment::find($id);
        return view('editcomment')->with('comments',$comments);
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
        $post = Comment::find($id);
        $this->validate($request,array(
           'content' =>'required',
            
        ));
        $post->email = 'luming@qq.com';
        $post->content = $request->input('content');
        $post->save();
        Session::flash('success','Comment has been updated');
        
        return redirect()->route('comments.show', $post->review_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comments = Comment::find($id);
        
        $comments->delete();
        Session::flash('success', 'The comment has been successfully deleted.');
        return view('showreview')->with('id', Session::get('review_id'));
    }
}
