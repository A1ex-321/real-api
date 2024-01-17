<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\home;
use App\Models\Mailstores;
use App\Models\Scolink;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class ScoController extends Controller
{
    public function home()
    {
        try {
            $blogs = home::first();
            return response()->json(['home' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function link()
    {
        try {
            $blogs = Scolink::first();
            return response()->json(['link' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
}
