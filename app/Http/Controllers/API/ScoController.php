<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\home;
use App\Models\Mailstores;
use App\Models\Scolink;
use App\Models\about;
use App\Models\service;
use App\Models\contacts;
use App\Models\scoblog;
use App\Models\work;
use App\Models\solowork;
use App\Models\soloblog;

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
    public function about()
    {
        try {
            $blogs = about::first();
            return response()->json(['about' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function service()
    {
        try {
            $blogs = service::first();
            return response()->json(['service' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function contact()
    {
        try {
            $blogs = contacts::first();
            return response()->json(['contact' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function work()
    {
        try {
            $blogs = work::first();
            return response()->json(['work' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function scoblogcontent()
    {
        try {
            $blogs = scoblog::first();
            return response()->json(['scoblog' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function findoneblog()
    {
        try {
            $blogs = solowork::first();
            return response()->json(['soloblog' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function findonework()
    {
        try {
            $blogs = soloblog::first();
            return response()->json(['solowork' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
