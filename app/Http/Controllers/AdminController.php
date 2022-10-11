<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    /**
     * Show the application admin dashboard.
     *
     * @param int $num
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = $request->month ? Post::orderBy('created_at', 'desc')->whereMonth('created_at', $request->month)->paginate(5) : Post::orderBy('created_at', 'desc')->whereMonth('created_at', date('m'))->paginate(5);

        return view('admin', compact('posts'));
    }
}
