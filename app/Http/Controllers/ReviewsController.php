<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $search = \Request::get('search');
        //$reviews = Review::where('title','content','%'.$search.'%')->orderBy('id')->get();
        $reviews = DB::table('reviews')->where('title','like','%'.$search.'%')->orWhere('content','like','%'.$search.'%')->orderBy('id')->get();
        $reviews = json_decode($reviews,true);
        //return $reviews;
        return view('searchresult')->with('reviews',$reviews);
        //return view('createforum');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createreview')->with('forum_id',Session::get('forum_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
           'title' =>'required|max:255',
           'content' => 'required',
            
        ));
        $user = Auth::user();
        $review = new Review;
        $review->email = $user->email;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->forum_id = $request->forum_id;
        $review->save();
        Session::flash('success','Your new review has been added');
        //redirect to another page
        /*return redirect()->route('posts.show',$post->id);*/
        //$id = $post->id;
        //return view('showforum')->with('id',$id);
        return redirect()->route('forums.show', $review->forum_id);
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
        Session::put('review_id',$id);
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
         $reviews = Review::find($id);
        return view('editreview')->with('reviews',$reviews);
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
        $review = Review::find($id);
         $this->validate($request,array(
           'title' =>'required|max:255',
           'content' => 'required',
            
        ));
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->save();     
        Session::flash('success','Review has been updated');
        
        return redirect()->route('reviews.show', $review->id);
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
        $reviews = Review::find($id);
        $reviews->delete();
        Session::flash('success', 'The review has been successfully deleted.');
        return view('showforum')->with('id', Session::get('forum_id'));
    }
}
