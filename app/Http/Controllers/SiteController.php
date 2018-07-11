<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sites = Site::all();
//        dd($sites);
        return view('admin.site.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats = Category::all();

//        $cats = Category::find("5");

//        dd($cats->sites);
        return view('admin.site.create',compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        $site = new Site();
        $site->name = $request->title;
        $site->category_id = $request->cat_id;
        $site->desc = $request->description;
        $site->save();
        return redirect('admin/site')->withFlashMessage('Site Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $site = Site::find($id);
        $cats = Category::all();
        return view('admin.site.edit',compact(['site','cats']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $site = Site::find($id);
        $site->name = $request->name;
        $site->category_id = $request->cat_id;
        $site->desc = $request->description;
        $site->save();
        return redirect('admin/site')->withFlashMessage('Site Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $site = Site::find($id);
        $site->delete();
        return redirect('admin/site')->withFlashMessage('Site Deleted');
    }
}
