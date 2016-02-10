<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\User;

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

    	return view('profile.show',compact('user'));
    }
}
