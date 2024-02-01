<?php

namespace App\Http\Controllers\real;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;

class EstateController extends Controller
{
    public function land(Request $request)
    {
        $data['getRecord'] = Blog::whereIn('type', [3, 4])->get();
        // $data['getRecordcontent'] = Contentblog::all();
        $data['header_title'] = " List";

        return view('main.land', $data);
    }
    public function singlelandrent($id)
    {
        $data['All'] = Blog::whereIn('type', [4])->get();
        // dd($data['All']);
        $data['getRecord'] = Blog::where('id', $id)->get();
        return view('main.singlelandrent', $data);
    }
    public function singlelandsale($id)
    {
        $data['All'] = Blog::whereIn('type', [3])->get();
        // dd($data['All']);
        $data['getRecord'] = Blog::where('id', $id)->get();
        return view('main.singlelandsale', $data);
    }
}
