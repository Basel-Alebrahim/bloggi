<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
//        $posts = Post::with(['media', 'user'])
//            ->whereHas('category', function ($query) {
//                $query->whereStatus(1);
//            })
//            ->whereHas('user', function ($query) {
//                $query->whereStatus(1);
//            })
//            ->post()->active()->orderBy('id', 'desc')->paginate(5);

        return view('backend.index');//, compact('posts')
    }
}
