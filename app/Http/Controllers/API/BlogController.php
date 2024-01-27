<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Mailstores;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Models\blogsco;


class BlogController extends Controller
{
    public function index()
    {
        try {
            $blogs = Blog::all();


            // Add image URLs for each filename in multiimage

            foreach ($blogs as $record) {
                // Assuming the 'Image' field stores the filename
                $record->Image = asset('public/images/' . $record->Image);
            }
          
            return response()->json(['blogs' => $blogs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function blogbyid($id)
    {
        try {
            // Find the blog by ID
            $blog = Blog::find($id);
        
            if (!$blog) {
                // Return an error response if the blog is not found
                return response()->json(['error' => 'Blog not found'], Response::HTTP_NOT_FOUND);
            }
        
            // Add image URLs for each filename in multiimage
            if ($blog->multiimage) {
                $filenames = explode(',', $blog->multiimage);
                $imageUrls = collect($filenames)->map(function ($filename) {
                    return asset('public/images/' . $filename);
                })->values();
            } else {
                // If no multiimage, return an empty array
                $imageUrls = [];
            }
        
            // Construct the complete response with title, description, and image_urls
            $response = [
                'title' => $blog->Tittle,
                'description' => $blog->Description,
                'image' => asset('public/images/' . $blog->Image),                'image_urls' => $imageUrls,
            ];
        
            return response()->json(['blog'=>$response]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
    public function sendUserContact(Request $request)
    {
        try {

            $name = $request->input('name');
            // $email = $request->input('email');
            $msg = $request->input('msg');
            $phone = $request->input('phone');
            if(!$msg){
                $msg=null;
            }

            //  $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'message' => 'required',
            // ]);

            

            $mail = new Mailstores;
            $mail->name = $name;
            $mail->msg = $msg;
            $mail->phone = $phone;


            $mail->save();
            return response()->json(['message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function get_logo()
    {
        try {
            $logo = Gallery::first();


            // Add image URLs for each filename in multiimage

                // Assuming the 'Image' field stores the filename
                $logo->image = asset('public/images/' . $logo->image);
            

            return response()->json(['logo' => $logo]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function scoblogs()
{
    try {
        $blogs = blogsco::all();

        // Update image URLs
        foreach ($blogs as $blog) {
            $blog->image = url("public/images/{$blog->image}");
        }
        foreach ($blogs as $blog) {
            $blog->ogimage = url("public/images/{$blog->ogimage}");
        }
        return response()->json(['blogs' => $blogs]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    public function blogsco($id)
    {
        try {
            // Find the blog by ID
            $blog = blogsco::where('id', $id)->first();
        
            if (!$blog) {
                // Return an error response if the blog is not found
                return response()->json(['error' => 'Blog not found'], Response::HTTP_NOT_FOUND);
            }
        
            // Add image URLs for each filename in multiimage
          
        
            // Construct the complete response with title, description, and image_urls
            $response = [
                'title' => $blog->title,
                'description' => $blog->description,
                'image' => asset('public/images/' . $blog->image),                'content' => $blog->content,
                'slug'=>$blog->slug,
                'metatitle'=>$blog->metatitle,
                'metadescription'=>$blog->metadescription,
                'ogtitle'=>$blog->ogtitle,
                'ogdescription'=>$blog->ogdescription,
                'ogimage'=>asset('public/images/' . $blog->ogimage),
                'ogurl'=>$blog->ogurl,
                'ogtype'=>$blog->ogtype,
            ];
        
            return response()->json(['blog'=>$response]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}
