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
use App\Models\contacts;
use App\Models\blogsco;
use App\Models\Service;
use App\Models\Scolink;
use App\Models\home;
use App\Models\about;
use App\Models\scoblog;
use App\Models\work;
use App\Models\solowork;
use App\Models\soloblog;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Log;
use App\Models\Contentblog;

class ScoController extends Controller
{
    public function scolist(Request $request)
    {
        $data['getRecord'] = Scolink::all();

        return view('admin.sco.scolink', $data);
    }
    public function create_link(Request $request)
    {
        // dd($request->all());
        $link = new Scolink();
        $link->scolink = $request->scolink;
        $link->save();
        return redirect('admin/sco/scolist')->with('success', 'Added successfully.');
    }
    public function link_delete($id, Request $request)
    {
        $image = Scolink::find($id);
        $image->delete();
        return redirect('admin/sco/scolist')->with('success', ' Deleted successful');
    }
    public function link_edit($id, Request $request)
    {
        $data['getRecord'] = Scolink::find($id);
        return view('admin.sco.edit_link', $data);
    }
    public function link_update($id, Request $request)
    {
        $blog = Scolink::find($id);
        $blog->scolink = $request->scolink;
        $blog->save();

        return redirect('admin/sco/scolist')->with('success', 'link updated');
    }
    public function homelist(Request $request)
    {
        $data['getRecord'] = Home::all();

        return view('admin.sco.home', $data);
    }
    public function create_home(Request $request)
    {
        // dd($request->all());
        $data = new Home();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;


        $data->save();
        return redirect('admin/home/homelist')->with('success', ' Added successfully.');
    }
    public function home_delete($id, Request $request)
    {
        $image = Home::find($id);
        $image->delete();
        return redirect('admin/home/homelist')->with('success', ' Deleted successful');
    }
    public function home_edit($id, Request $request)
    {
        $data['getRecord'] = Home::find($id);
        return view('admin.sco.edit_home', $data);
    }
    public function home_update($id, Request $request)
    {
        $data = Home::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();

        return redirect('admin/home/homelist')->with('success', ' updated');
    }

    public function aboutlist(Request $request)
    {
        $data['getRecord'] = about::all();

        return view('admin.sco.about', $data);
    }
    public function create_about(Request $request)
    {
        // dd($request->all());
        $data = new about();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/about/aboutlist')->with('success', ' Added successfully.');
    }
    public function about_delete($id, Request $request)
    {
        $image = about::find($id);
        $image->delete();
        return redirect('admin/about/aboutlist')->with('success', ' Deleted successful');
    }
    public function about_edit($id, Request $request)
    {
        $data['getRecord'] = about::find($id);
        return view('admin.sco.edit_about', $data);
    }
    public function about_update($id, Request $request)
    {
        $data = about::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/about/aboutlist')->with('success', ' updated');
    }
//service
    public function servicelist(Request $request)
    {
        $data['getRecord'] = Service::all();

        return view('admin.sco.service', $data);
    }
    public function create_service(Request $request)
    {
        // dd($request->all());
        $data = new Service();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/service/servicelist')->with('success', ' Added successfully.');
    }
    public function service_delete($id, Request $request)
    {
        $image = Service::find($id);
        $image->delete();
        return redirect('admin/service/servicelist')->with('success', ' Deleted successful');
    }
    public function service_edit($id, Request $request)
    {
        $data['getRecord'] = Service::find($id);
        return view('admin.sco.edit_service', $data);
    }
    public function service_update($id, Request $request)
    {
        $data = Service::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/service/servicelist')->with('success', ' updated');
    }
    // contact
    public function contactlist(Request $request)
    {
        $data['getRecord'] = contacts::all();

        return view('admin.sco.contact', $data);
    }
    public function create_contact(Request $request)
    {
        // dd($request->all());
        $data = new contacts();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/contact/contactlist')->with('success', ' Added successfully.');
    }
    public function contact_delete($id, Request $request)
    {
        $image = contacts::find($id);
        $image->delete();
        return redirect('admin/contact/contactlist')->with('success', ' Deleted successful');
    }
    public function contact_edit($id, Request $request)
    {
        $data['getRecord'] = contacts::find($id);
        return view('admin.sco.edit_contact', $data);
    }
    public function contact_update($id, Request $request)
    {
        $data = contacts::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/contact/contactlist')->with('success', ' updated');
    }

    // scoblog
    public function scobloglist(Request $request)
    {
        $data['getRecord'] = scoblog::all();

        return view('admin.sco.scobloglist', $data);
    }
    public function create_scoblog(Request $request)
    {
        // dd($request->all());
        $data = new scoblog();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/scoblog/scobloglist')->with('success', ' Added successfully.');
    }
    public function scoblog_delete($id, Request $request)
    {
        $image = scoblog::find($id);
        $image->delete();
        return redirect('admin/scoblog/scobloglist')->with('success', ' Deleted successful');
    }
    public function edit_scoblog($id, Request $request)
    {
        $data['getRecord'] = scoblog::find($id);
        return view('admin.sco.edit_scoblog', $data);
    }
    public function scoblog_update($id, Request $request)
    {
        $data = scoblog::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/scoblog/scobloglist')->with('success', ' updated');
    }

    // sco work
    public function worklist(Request $request)
    {
        $data['getRecord'] = work::all();

        return view('admin.sco.worklist', $data);
    }
    public function create_work(Request $request)
    {
        // dd($request->all());
        $data = new work();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/work/worklist')->with('success', ' Added successfully.');
    }
    public function work_delete($id, Request $request)
    {
        $image = work::find($id);
        $image->delete();
        return redirect('admin/work/worklist')->with('success', ' Deleted successful');
    }
    public function work_edit($id, Request $request)
    {
        $data['getRecord'] = work::find($id);
        return view('admin.sco.edit_work', $data);
    }
    public function work_update($id, Request $request)
    {
        $data = work::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/work/worklist')->with('success', ' updated');
    }
//new work page by id
    public function soloworklist(Request $request)
    {
        $data['getRecord'] = solowork::all();

        return view('admin.sco.solowork', $data);
    }
    public function solowork_work(Request $request)
    {
        // dd($request->all());
        $data = new solowork();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/solo/solowork')->with('success', ' Added successfully.');
    }
    public function solowork_delete($id, Request $request)
    {
        $image = solowork::find($id);
        $image->delete();
        return redirect('admin/solo/solowork')->with('success', ' Deleted successful');
    }
    public function solowork_edit($id, Request $request)
    {
        $data['getRecord'] = solowork::find($id);
        return view('admin.sco.edit_solowork', $data);
    }
    public function solowork_update($id, Request $request)
    {
        $data = solowork::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/solo/solowork')->with('success', ' updated');
    }
    //find by id blog
    public function onebloglist(Request $request)
    {
        $data['getRecord'] = soloblog::all();

        return view('admin.sco.soloblog', $data);
    }
    public function create_oneblog(Request $request)
    {
        // dd($request->all());
        $data = new soloblog();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        $data->save();
        return redirect('admin/oneblog/onebloglist')->with('success', ' Added successfully.');
    }
    public function oneblog_delete($id, Request $request)
    {
        $image = soloblog::find($id);
        $image->delete();
        return redirect('admin/oneblog/onebloglist')->with('success', ' Deleted successful');
    }
    public function oneblog_edit($id, Request $request)
    {
        $data['getRecord'] = soloblog::find($id);
        return view('admin.sco.edit_soloblog', $data);
    }
    public function oneblog_update($id, Request $request)
    {
        $data = soloblog::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogdescription;
        $data->ogimage = $request->ogimage;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;
        $data->save();
        return redirect('admin/oneblog/onebloglist')->with('success', ' updated');
    }
    // blog
    public function bloglist(Request $request)
    {
        $data['getRecord'] = blogsco::all();

        return view('admin.sco.blogsco', $data);
    }
    public function create_blogsco(Request $request)
    {
        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:blogsco,slug',
            // Add other validation rules as needed
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $data = new blogsco();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->content = $request->content;
        if ($request->hasFile('image')) {
            $images = $request->file('image');

            $filename = time() . '_' . str_replace(' ', '_', $images->getClientOriginalName());
            $images->move(public_path('images'), $filename);                   
        }
        $data->image = $filename;
        $data->metatitle=$request->title;
        $data->metadescription=$request->description;
        $data->ogimage=$filename;
        $data->slug=$request->slug;

        $data->save();
        return redirect('admin/blogsco/bloglist')->with('success', ' Added successfully.');
    }
    public function blogsco_delete($id, Request $request)
    {
        $image = blogsco::find($id);
        $image->delete();
        return redirect('admin/blogsco/bloglist')->with('success', ' Deleted successful');
    }
    public function blogsco_edit($id, Request $request)
    {
        $data['getRecord'] = blogsco::find($id);
        return view('admin.sco.edit_blogsco', $data);
    }
    public function blogsco_update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:blogsco,slug,' . $id,
            // Add other validation rules as needed
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = blogsco::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->content = $request->content;
        if ($request->hasFile('image')) {
            $images = $request->file('image');

            $filename = time() . '_' . str_replace(' ', '_', $images->getClientOriginalName());
            $images->move(public_path('images'), $filename);    
            $data->image = $filename;               
        }
        else{
            $data->image = $data->image; 
        }
        $data->slug=$request->slug;
        $data->save();
        return redirect('admin/blogsco/bloglist')->with('success', ' updated');
    }
    public function sco_update($id, Request $request)
    {
        $data = blogsco::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->ogtitle = $request->ogtitle;
        $data->ogdescription = $request->ogtitle;
        $data->ogurl = $request->ogurl;
        $data->ogtype = $request->ogtype;

        if ($request->hasFile('ogimage')) {
            $images = $request->file('ogimage');

            $filename = time() . '_' . str_replace(' ', '_', $images->getClientOriginalName());
            $images->move(public_path('images'), $filename);    
            $data->ogimage = $filename;               
        }
        else{
            $data->ogimage = $data->ogimage; 
        }
        $data->save();
        return redirect('admin/blogsco/bloglist')->with('success', ' updated');
    }
    public function checkSlugAvailability(Request $request)
    {
        $submittedSlug = $request->input('slug');

        // Check if the submitted slug already exists in the database
        $count = blogsco::where('slug', $submittedSlug)->count();

        // Respond with JSON indicating slug availability
        return response()->json(['available' => $count == 0]);
    }


    public function content_view(Request $request, $id)
    {
        $content = blogsco::where('id', $id)->first();
        // $imageArray = $content->multiimage ? explode(',', $content->multiimage) : [];

        return view('admin.sco.view_blogcontent', compact('content'));
    }
    
}







