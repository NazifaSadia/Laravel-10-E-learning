<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Batch;
use App\Models\Backend\Course;
use App\Models\Backend\Mentor;
use App\Models\Backend\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::orderBy('id' , 'desc')->get();
        return view('backend.pages.batch.manage', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::orderBy('english_title' , 'asc')->get();
        $mentors = Mentor::orderBy('full_name' , 'asc')->get();
        $branches = Branch::orderBy('name' , 'asc')->get();

        return view('backend.pages.batch.create', compact('courses', 'mentors', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $batch = new Batch();

        $batch->batch_name          = $request->batch_name ;
        $batch->slug                = Str::slug($request->slug) ;
        $batch->starting_date       = $request->starting_date ;
        $batch->class_day           = $request->class_day ;
        $batch->class_timing        = $request->class_timing ;
        $batch->fb_group            = $request->fb_group ;
        $batch->seat_number         = $request->seat_number ;
        $batch->branch_id           = $request->branch_id ;
        $batch->course_id           = $request->course_id ;
        $batch->mentor_id           = $request->mentor_id ;
        $batch->batch_type          = $request->batch_type ;
        $batch->admission_status    = $request->admission_status ;
        $batch->status              = $request->status ;

        $batch->save();

        return redirect()->route('batch.manage');
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
        $batch    = Batch::find($id);
        $courses  = Course::orderBy('english_title' , 'asc')->get();
        $mentors  = Mentor::orderBy('full_name' , 'asc')->get();
        $branches = Branch::orderBy('name' , 'asc')->get();

    
        if ( !empty( $batch ) ){
            return view('backend.pages.batch.edit', compact('batch','courses', 'mentors', 'branches'));
        }
        else{
            return redirect()->route('batch.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $batch    = Batch::find($id);

        $batch->batch_name          = $request->batch_name ;
        $batch->slug                = Str::slug($request->slug) ;
        $batch->starting_date       = $request->starting_date ;
        $batch->class_day           = $request->class_day ;
        $batch->class_timing        = $request->class_timing ;
        $batch->fb_group            = $request->fb_group ;
        $batch->seat_number         = $request->seat_number ;
        $batch->branch_id           = $request->branch_id ;
        $batch->course_id           = $request->course_id ;
        $batch->mentor_id           = $request->mentor_id ;
        $batch->batch_type          = $request->batch_type ;
        $batch->admission_status    = $request->admission_status ;
        $batch->status              = $request->status ;

        $batch->save();

        return redirect()->route('batch.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch    = Batch::find($id);

        $batch->delete();
        
        return redirect()->route('batch.manage');
    }
}
