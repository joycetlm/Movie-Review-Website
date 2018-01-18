<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use Session;
use Auth;
class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Forum::orderBy('id', 'desc')->paginate(5);
        return view('filmshare')->with('forums',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createforum()
    {
        return view('createforum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,array(
           'filmname' =>'required|max:255',
           'filmlink' => 'required',
            'tags' => 'required'
            
        ));
        $user = Auth::user();



        //store in db
        /*return  $request->filmname;*/

        $post = new Forum;
        $post->email = $user->email;
        $post->filmname = $request->filmname;
        $post->filmlink = $request->filmlink;
        $post->profile = $request->profile;
        $post->tags = $request->tags;
        $post->save();
        Session::flash('success','Your new forum has been added');
        //redirect to another page
        /*return redirect()->route('posts.show',$post->id);*/
        //$id = $post->id;
        //return view('showforum')->with('id',$id);
        return redirect()->route('forums.show', $post->id);
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
        Session::put('forum_id',$id);
        return view('showforum')->with('id', $id);
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
        $forums = Forum::find($id);
        return view('editforum')->with('forums',$forums);
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
        $post = Forum::find($id);
        $this->validate($request,array(
           'filmname' =>'required|max:255',
           'filmlink' => 'required',
            'tags' => 'required'
            
        ));
        $post->filmname = $request->input('filmname');
        $post->filmlink = $request->input('filmlink');
        $post->profile = $request->input('profile');
        $post->tags = $request->input('tags');
        $post->save();
        Session::flash('success','Forum has been updated');
        
        return redirect()->route('forums.show', $post->id);

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
        $post = Forum::find($id);
        $post->delete();
        Session::flash('success', 'The forum has been successfully deleted.');
        return view('filmshare');
    }
}
