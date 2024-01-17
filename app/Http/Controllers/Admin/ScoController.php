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
        return redirect('admin/sco/scolist')->with('success', ' Added successfully.');
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
        $data->save();
        return redirect('admin/about/aboutlist')->with('success', ' updated');
    }

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
        $data->save();
        return redirect('admin/contact/contactlist')->with('success', ' updated');
    }
    // blog
    public function bloglist(Request $request)
    {
        $data['getRecord'] = blogsco::all();

        return view('admin.sco.blogsco', $data);
    }
    public function create_blogsco(Request $request)
    {
        // dd($request->all());
        $data = new blogsco();
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;

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
        $data = blogsco::find($id);
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->save();
        return redirect('admin/blogsco/bloglist')->with('success', ' updated');
    }
}
