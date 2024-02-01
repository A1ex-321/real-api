<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Models\BrandModel;
use App\Models\Smtp;
use App\Models\Mailstores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Gallery;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Log;
use App\Models\Contentblog;

class BlogController extends Controller
{
    public function uploadMultiple(Request $request)
    {
        if ($request->hasFile('multipleimage')) {
            $images = $request->file('multipleimage');

            foreach ($images as $image) {
                $filename = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
                $image->move(public_path('images'), $filename);

                // Insert the filename into the 'blogimage' table
                Blogimage::create([
                    'filename' => $filename,
                ]);
            }



            return response()->json(['message' => 'Images uploaded successfully']);
        }

        return response()->json(['error' => 'No images selected'], 400);
    }
    public function fetchImages()
    {
        $images = Blogimage::all(); // Assuming 'BlogImage' is your model
        $images = $images->map(function ($image) {
            return [
                'id' => $image->id,
                'url' => asset('public/images/' . $image->filename),
            ];
        });
        return response()->json(['images' => $images]);
    }
    public function deleteimage($id)
    {
        try {
            $image = Blogimage::find($id);

            if (!$image) {
                return response()->json(['error' => 'Image not found'], 404);
            }

            // Perform the deletion
            $image->delete();

            return response()->json(['message' => 'Image deleted successfully']);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Exception caught while deleting image: ' . $e->getMessage());

            // Return a generic error response
            return response()->json(['error' => 'Error deleting image'], 500);
        }
    }
    public function create_logo(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $images = $request->file('image');

            $filename = time() . '_' . str_replace(' ', '_', $images->getClientOriginalName());
            $images->move(public_path('images'), $filename);

            // Insert the filename into the 'blogimage' table
            Gallery::create([
                'image' => $filename,
            ]);
            return redirect('admin/logo/logo')->with('success', 'content Blog uploaded successfully.');
        }

        return response()->json(['error' => 'No images selected'], 400);
    }
    public function upload(Request $request)
    {
        // Log the request data
        Log::info('Request Data:', $request->all());

        $image = $request->file('upload');
        $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());

        // Log the file move result
        $isMoved = $image->move(public_path('images'), $imageName);

        // Check if the file move was successful and log accordingly
        if ($isMoved) {
            Log::info('File Move Success:', ['imageName' => $imageName]);
        } else {
            Log::error('File Move Failed:', ['imageName' => $imageName]);
        }
        Log::error('File :', ['url' => asset('public/images/' . $imageName)]);
        return response()->json(['url' => asset('public/images/' . $imageName),'uploaded'=>1]);
    }
    public function blog_add(Request $request)
    {
        Blogimage::truncate();
        $data['header_title'] = "Add New Brand";
        return view('admin.blog.add-new', $data);
    }
    public function content_add(Request $request, $id)
    {
        $data['blog'] = Blog::find($id);
        // $data['header_title'] = "Add New Brand";
        return view('admin.blog.contentblog', $data);
    }
    public function content_view(Request $request, $id)
    {
        $content = Blog::where('id', $id)->first();
        $imageArray = $content->multiimage ? explode(',', $content->multiimage) : [];

        return view('admin.blog.viewcontent', compact('content', 'imageArray'));
    }

    public function create_content_blog(Request $request)
    {
        // dd($request->all());
        $blog = new Contentblog;
        $blog->blog_id = $request->blog_id;
        $blog->content_blog = $request->content_blog;
        $blog->save();
        return redirect('admin/blog/list')->with('success', 'content Blog uploaded successfully.');
    }
    public function create_blog(Request $request)
    {
            // dd($request->all());
        try {
            $blog = new Blog;
            $blog->Tittle = $request->Tittle;
            $blog->Description = $request->Description;
            $blog->price = $request->price;
            $blog->address = $request->address;
            $blog->amenities = $request->amenities;
            $blog->condition = $request->condition;
            $blog->type = $request->type;



            if ($request->hasFile('Image')) {
                $imageName = time() . '.' . $request->Image->extension();
                $request->Image->move(public_path('images'), $imageName);
                $blog->Image = $imageName;
            }
            if ($request->multiimage) {
                $idArray = explode(',', $request->multiimage);
                $filenames = Blogimage::whereIn('id', $idArray)->pluck('filename');
                $filenamesString = implode(',', $filenames->toArray());
                $blog->multiimage = $filenamesString;
            }
            // $blog->content_blog = $request->content_blog;
            $blog->save();
            $delete = $request->multiimage;
            $idArray = explode(',', $delete);
            Blogimage::whereIn('id', $idArray)->delete();
            return redirect('admin/sale/list')->with('success', 'uploaded successfully.');
        } catch (\Exception $e) {
            // Handle the exception (log or display an error message)
            return redirect('admin/sale/list')->with('success', 'dont uploaded successfully.');
        }
    }


    public function list(Request $request)
    {
        $data['getRecord'] = Blog::all();
        // $data['getRecordcontent'] = Contentblog::all();
        $data['header_title'] = " List";

        return view('admin.blog.list', $data);
    }
    public function logo(Request $request)
    {
        $data['getRecord'] = Gallery::all();
        // dd($data['getRecord']);
        return view('admin.blog.logo', $data);
    }
    public function blog_edit($id, Request $request)
    {
        Blogimage::truncate();
        $data['getRecord'] = Blog::find($id);
        // dd($data);
        if ($data['getRecord'] && $data['getRecord']->multiimage) {
            $imageArray = explode(',', $data['getRecord']->multiimage);
            foreach ($imageArray as $imageName) {
                $blogImage = new BlogImage;
                $blogImage->filename = $imageName;
                $blogImage->save();
            }
        }
        $data['header_title'] = "Edit blog";

        return view('admin.blog.blog-edit', $data);
    }
    public function content_edit($id, Request $request)
    {
        $data['getRecord'] = Contentblog::find($id);
        $data['header_title'] = "Edit blog";

        return view('admin.blog.content-edit', $data);
    }
    public function create_content_update_blog(Request $request, $id)
    {
        $blog = Contentblog::find($id);
        if ($request->has('content_blog') && $request->filled('content_blog')) {
            $blog->content_blog = $request->input('content_blog');
        } else {
            $blog->content_blog = $blog->content_blog;
        }
        $blog->save();
        return redirect('admin/blog/list')->with('success', 'Blog updated successfully successfully.');
    }
    public function blog_update($id, Request $request)
    {
        //    dd($request->all());
        $blog = Blog::find($id);
        $blog->Tittle = $request->Tittle;
        $blog->Description = $request->Description;
        $blog->price = $request->price;
        $blog->address = $request->address;
        $blog->amenities = $request->amenities;
        $blog->condition = $request->condition;
        $blog->type = $request->type;

        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('images'), $imageName);

            $blog->Image = $imageName;
        } else {
            $blog->Image = $blog->Image;
        }

        if ($request->multiimage) {
            $idArray = explode(',', $request->multiimage);
            $existingFilenames = Blogimage::whereIn('id', $idArray)->pluck('filename')->toArray();

            $newFilenames = array_diff($idArray, $existingFilenames);

            $blog->multiimage = implode(',', $existingFilenames);

            foreach ($newFilenames as $filename) {
                $blogImage = new Blogimage;
                $blogImage->filename = $filename;
                $blogImage->save();
            }
        }

        $blog->save();
        Blogimage::truncate();

        return redirect('admin/sale/list')->with('success', ' updated');
    }

    public function delete($id, Request $request)
    {
        $brand = Blog::find($id);
        $brand->delete();
        return redirect()->back()->with('success', ' Successfully Deleted');
    }
    public function delete_blog($id, Request $request)
    {
        $brand = Contentblog::find($id);
        $brand->delete();
        return redirect('admin/blog/list')->with('success', 'blog content Deleted successful');
    }
    public function gallery_delete($id, Request $request)
    {
        $image = Gallery::find($id);
        $image->delete();
        return redirect('admin/logo/logo')->with('success', 'Deleted successful');
    }
    public function demo()
    {
        // $data['header_title'] = "Add New Brand";
        return view('admin.blog.demo');
    }
    
}
