<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Models\BrandModel;
use App\Models\Smtp;
use App\Models\franchise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class FranchiseController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = franchise::all();
        $data['header_title'] = "";

        return view('admin.brand.franchiselist', $data);
    }




    public function delete($id, Request $request)
    {


        $brand = franchise::find($id);
        $brand->delete();

        return redirect()->back()->with('success', ' Successfully Deleted');
    }
}
