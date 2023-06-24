<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;


class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentors = Mentor::orderBy('full_name', 'asc')->get();
        return view('backend.pages.mentor.manage', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mentor = new Mentor();

        $mentor->full_name        = $request->fullname;
        $mentor->designation      = $request->designation;
        $mentor->slug             = Str::slug($request->fullname);
        $mentor->overview         = $request->overview;
        $mentor->phone            = $request->phone;
        $mentor->email            = $request->email;
        $mentor->address          = $request->address;
        $mentor->fiverr_url       = $request->fiverr_url;
        $mentor->upwork_url       = $request->upwork_url;
        $mentor->status           = $request->status;

        // dd($mentor);
        // exit();
        if( $request->image )
        {
            $image = $request->file('image');
            $img = rand(). '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/' . $img);
            Image::make($image)->save($location);
            $mentor->profile_pic = $img;
        }

        if( $request->fiverr_img )
        {
            $fiverr = $request->file('fiverr_img');
            $fvr = rand(). '.' . $fiverr->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/badge/' . $fvr);
            Image::make($fiverr)->save($location);
            $mentor->fiverr_img = $fvr;
        }

        if( $request->upwork_img )
        {
            $upwork = $request->file('upwork_img');
            $upr = rand(). '.' . $upwork->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/badge/' . $upr);
            Image::make($upwork)->save($location);
            $mentor->upwork_img = $upr;
        }

        $mentor->save();

        return redirect()->route('mentor.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // SELECT * FROM table_name WHERE id=1
        $mentor = Mentor::find($id);

        if ( !empty( $mentor ) )
        {
            return view('backend.pages.mentor.edit' , compact('mentor'));
        }
        else{
            return redirect()->route('mentor.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentor = Mentor::find($id);

        $mentor->full_name        = $request->fullname;
        $mentor->designation      = $request->designation;
        $mentor->slug             = Str::slug($request->fullname);
        $mentor->overview         = $request->overview;
        $mentor->phone            = $request->phone;
        $mentor->email            = $request->email;
        $mentor->address          = $request->address;
        $mentor->fiverr_url       = $request->fiverr_url;
        $mentor->upwork_url       = $request->upwork_url;
        $mentor->status           = $request->status;

        if( !empty( $request->image ) )
        {
            if( File::exists('backend/img/mentor/' .$mentor->profile_pic)){
                File::delete('backend/img/mentor/' .$mentor->profile_pic);
            }
            $image = $request->file('image');
            $img = rand(). '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/' . $img);
            Image::make($image)->save($location);
            $mentor->profile_pic = $img;
        }
        if( !empty( $request->fiverr_img ) )
        {
            if( File::exists('backend/img/mentor/badge/' .$mentor->fiverr_img)){
                File::delete('backend/img/mentor/badge/' .$mentor->fiverr_img);
            }
            $fiverr = $request->file('fiverr_img');
            $fvr = rand(). '.' . $fiverr->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/badge/' . $fvr);
            Image::make($fiverr)->save($location);
            $mentor->fiverr_img = $fvr;
        }
        if( !empty( $request->upwork_img ) )
        {
            if( File::exists('backend/img/mentor/badge/' .$mentor->upwork_img)){
                File::delete('backend/img/mentor/badge/' .$mentor->upwork_img);
            }
            $upwork = $request->file('upwork_img');
            $upr = rand(). '.' . $upwork->getClientOriginalExtension();
            $location = public_path('backend/img/mentor/badge/' . $upr);
            Image::make($upwork)->save($location);
            $mentor->upwork_img = $upr;
        }
        $mentor->save();
        return redirect()->route('mentor.manage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mentor = Mentor::find($id);

        if( File::exists('backend/img/mentor/' .$mentor->profile_pic)){
            File::delete('backend/img/mentor/' .$mentor->profile_pic);
        }

        if( File::exists('backend/img/mentor/badge/' .$mentor->fiverr_img)){
            File::delete('backend/img/mentor/badge/' .$mentor->fiverr_img);
        }
        if( File::exists('backend/img/mentor/badge/' .$mentor->upwork_img)){
            File::delete('backend/img/mentor/badge/' .$mentor->upwork_img);
        }

        $mentor->delete();
        return redirect()->route('mentor.manage');
    }
}
