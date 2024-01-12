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
use Illuminate\Support\Facades\Log;
use App\Models\Contentblog;
use Illuminate\Support\Facades\Session;
class DemoController extends Controller
{

    public function fileStore(Request $request)
    {
        try {
            $images = $request->file('file');


            $imageName = $images->getClientOriginalName();
            $images->move(public_path('images'), $imageName);
                // Retrieve existing uploaded images from the session
        $uploadedImages = session('uploadedImages', []);

        // Append the new image name
        $uploadedImages[] = $imageName;

        // Store the updated array back into the session
        return response()->json(['success' => $uploadedImages]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
}
