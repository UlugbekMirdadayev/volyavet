<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\News;
use App\Models\Post;
use App\Models\Review;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {

        $posts = Post::latest()->get();
        $query = null;
        if ($request->has('query')) {
            $query = $request->get('query');
            $posts = Post::where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('body', 'like', '%' . $query . '%');
            })
                ->get();
        }
        return view('search', compact('posts', 'query'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');


        $news = News::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->get();

        $reviews = Review::where('author', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->get();

        $teams = Team::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->get();

        $services = Service::where('title', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->get();

        $contacts = Contact::where('type', 'like', '%' . $query . '%')
            ->orWhere('src', 'like', '%' . $query . '%')
            ->get();


        $posts = $posts->concat($teams)
            ->concat($reviews)
            ->concat($services)
            ->concat($contacts)
            ->concat($news);



        return view('search', compact('posts', 'query'));
    }
}
