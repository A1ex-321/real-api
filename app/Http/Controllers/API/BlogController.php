<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contentblog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BlogController extends Controller
{
    public function index()
    {
        try {

            $records = Blog::all();

            $recordsWithImageUrls = $records->map(function ($blog) {
                $blogData = $blog->toArray();
                $blogData['image_url'] = asset('public/images/' . $blog->Image);
                return $blogData;
            });

            return response()->json(['blog_records' => $recordsWithImageUrls]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function content_blog($id)
    {
        try {
            $blogcontent = Contentblog::where("blog_id", $id)->get();        //  $categorys = CategoryModel::all();
            if ($blogcontent) {

                return response()->json(['content' => $blogcontent]);
            } else {
                return response()->json(['error' => 'content not found'], Response::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
