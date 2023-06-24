<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('english_title', 'asc')->get();
        return view('backend.pages.course.manage', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();

        $course->english_title              = $request->english_title;
        $course->bangla_title               = $request->bangla_title;
        $course->slug                       = Str::slug($request->english_title);
        $course->intro_video                = $request->intro_video;
        $course->price                      = $request->price;
        $course->bangla_price               = $request->bangla_price;
        $course->graduate_number            = $request->graduate_number;
        $course->total_lecture              = $request->total_lecture;
        $course->class_hour                 = $request->class_hour;
        $course->course_duration            = $request->course_duration;
        $course->motivational_content       = $request->motivational_content;
        $course->course_opportunity         = $request->course_opportunity;
        $course->curriculum_description     = $request->curriculum_description;
        $course->course_requirement         = $request->course_requirement;
        $course->coupon_status              = $request->coupon_status;
        $course->status                     = $request->status;

        if( $request->image )
        {
            $image = $request->file('image');
            $img = rand(). '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/course/' . $img);
            Image::make($image)->save($location);
            $course->image = $img;
        }

        $course->save();

        return redirect()->route('course.manage');
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
        $course = Course::find($id);

        if( !empty($course) )
        {
            return view('backend.pages.course.edit', compact('course'));
        }
        else{
            return redirect()->route('course.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);

        $course->english_title              = $request->english_title;
        $course->bangla_title               = $request->bangla_title;
        $course->slug                       = Str::slug($request->english_title);
        $course->intro_video                = $request->intro_video;
        $course->price                      = $request->price;
        $course->bangla_price               = $request->bangla_price;
        $course->graduate_number            = $request->graduate_number;
        $course->total_lecture              = $request->total_lecture;
        $course->class_hour                 = $request->class_hour;
        $course->course_duration            = $request->course_duration;
        $course->motivational_content       = $request->motivational_content;
        $course->course_opportunity         = $request->course_opportunity;
        $course->curriculum_description     = $request->curriculum_description;
        $course->course_requirement         = $request->course_requirement;
        $course->coupon_status              = $request->coupon_status;
        $course->status                     = $request->status;

        if( !empty( $request->image ) )
        {
            if( File::exists('backend/img/course/' .$course->image)){
                File::delete('backend/img/course/' .$course->image);
            }
            $image = $request->file('image');
            $img = rand(). '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/course/' . $img);
            Image::make($image)->save($location);
            $course->image = $img;
        }

        $course->save();

        return redirect()->route('course.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        if( File::exists('backend/img/course/' .$course->image)){
            File::delete('backend/img/course/' .$course->image);
        }

        $course->delete();

        return redirect()->route('course.manage');
    }
}
