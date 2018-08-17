<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forumpost;

class PagesController extends Controller
{
	public function getHomepage() {
		return view('pages.homepage');
	}

	public function getAbout() {
		return view('pages.about');
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function getForum() {
		$forumposts = Forumpost::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.forum')->withForumposts($forumposts);
	}

	public function getWelcome() {
		return view('pages.welcome');
	}

	public function getProfile() {
		return view('pages.profile');
	}

	public function getMyposts()
    {  
        $forumposts = Forumpost::orderBy('id', 'desc')->paginate(10);
        return view('pages.myPosts')->withForumposts($forumposts);
    }


}