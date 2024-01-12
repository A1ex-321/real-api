<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contentblog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    public function index()
    {
        try {
            $records = Blog::all();
        
            $recordsWithImageUrls = $records->map(function ($blog) {
                $blogData = $blog->toArray();
        
                // Add image URLs for each filename in multiimage
                if ($blog->multiimage) {
                    $filenames = explode(',', $blog->multiimage);
                    $imageUrls = collect($filenames)->map(function ($filename) {
                        return asset('public/images/' . $filename);
                    })->values();
        
                    $blogData['image_urls'] = $imageUrls;
                } else {
                    $blogData['image_urls'] = new \stdClass();
                }
        
                return $blogData;
            });
        
            return response()->json(['blog_records' => $recordsWithImageUrls]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        
        
    }

   

    // public function demo()
    // {
    //     try {
    //         $records = Blog::with('contentblogs')->get();
    //         Log::info('Razorpay API Request: ' . json_encode($records));

    //         // $recordsArray = $records->toArray(); // Convert the collection to an array
        
    //         // Log::info('Razorpay API Request: ' . json_encode($recordsArray));
        
    //         $recordsWithImageUrls = $records->map(function ($blog) {
    //             $blogData = $blog->toArray();
    //             $blogData['Image'] = asset('public/images/' . $blog->Image);
    //             return $blogData;
    //         });
        
    //         return response()->json(['blog_records' => $recordsWithImageUrls]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
        
        
    // }
}
