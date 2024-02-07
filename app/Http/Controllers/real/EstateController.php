<?php

namespace App\Http\Controllers\real;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\Mailstores;
use App\Models\Gallery;

use Illuminate\Support\Facades\Session;

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
    public function house(Request $request)
    {
        $data['getRecord'] = Blog::whereIn('type', [1, 2])->get();
        // $data['getRecordcontent'] = Contentblog::all();
        $data['header_title'] = " List";

        return view('main.house', $data);
    }
    public function singlehouserent($id)
    {
        $data['All'] = Blog::whereIn('type', [2])->get();
        // dd($data['All']);
        $data['getRecord'] = Blog::where('id', $id)->get();
        return view('main.singlehouserent', $data);
    }
    public function singlehousesale($id)
    {
        $data['All'] = Blog::whereIn('type', [1])->get();
        // dd($data['All']);
        $data['getRecord'] = Blog::where('id', $id)->get();
        return view('main.singlehousesale', $data);
    }
    public function Alltype(Request $request)
    {
        $data['getRecord'] = Blog::all();
        // $data['getRecordcontent'] = Contentblog::all();
        $data['header_title'] = " List";
        return view('main.index', $data);
    }

    public function message(Request $request)
    {
        try {

            $name = $request->input('name');
            $msg = $request->input('msg');
            $phone = $request->input('phone');
            $mail = new Mailstores;
            $mail->name = $name;
            $mail->msg = $msg;
            $mail->phone = $phone;
            $mail->save();
            Session::flash('success', 'Your message has been submitted successfully!');
            return redirect('/')->with('success', 'Message sent successful');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function get_logo1()
    {
        try {
            $logo = Gallery::first();
    
            if ($logo) {
                $image = asset('public/images/' . $logo->image);
                return response()->json(['image' => $image]);
            } else {
                return response()->json(['error' => 'No record found in the Gallery table']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error']);
        }
    }
    
    
}
