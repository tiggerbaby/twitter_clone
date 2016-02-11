<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\User;
use App\Comment;

class ProfileController extends Controller
{
    public function index(){

    	// Count the total amout of posts by this user
    	$totalTweets = \Auth::user()->tweets()->count();

    	// foreach($totalTweets as $tweet){
    	// 	echo $tweet->content;
    	// }
    	// return $totalTweets;
    	return view('profile.index',compact('totalTweets'));
    }

    public function newTweet(Request $request)
    {   
    	$this->validate($request,[
    		'content'=>'required|max:140'
    		]);
    	
    	$newTweet = new Tweet();
    	$newTweet->content = $request->content;
    	$newTweet->user_id = \Auth::user()->id;

    	$newTweet->save();

    	// return $request->all();
    	return redirect('profile');
    }

    public function show($username){

    	// find the user
    	$user = User::where('username','=', $username)->firstOrFail();

        $userPosts = $user->tweets()->get();

        // return $userPosts->get();

    	return view('profile.show',compact('user','userPosts'));
    }

    public function newComment(Request $request)
    {
        // 
        $this -> validate($request, [
            'comment'=>'required|min:4|max:140',
            'tweet-id'=>'required|exists:tweets,id',
            ]);

        //Create new comment
        $comment = new Comment();

        $comment->content = $request->comment;
        $comment->user_id = \Auth::user()->id;
        $comment->tweet_id = $request['tweet-id'];

        $comment->save();

        //return 'good to go';
        // return $request->all();
        return back();

    }

}
