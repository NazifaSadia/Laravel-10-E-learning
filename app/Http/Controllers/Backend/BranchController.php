<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::orderBy('id', 'asc')->get();
        //$branches = Branch::orderBy('id', 'asc')->paginate(1);
        return view('backend.pages.branch.manage', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:255',
            'phone'   => 'required|max:255',
        ],
        [
            'name.required'  => 'Branch Name cannot be Empty!',
            'phone.required'  => 'Phone Number cannot be Empty!',
        ]);


        $branch = new Branch();

        // Table_column_name      = Form name="---"
        $branch->name             = $request->name;
        $branch->bangla_name      = $request->bangla_name;
        $branch->slug             = Str::slug($request->name);
        $branch->address_line1    = $request->address1;
        $branch->address_line2    = $request->address2;
        $branch->phone            = $request->phone;
        $branch->status           = $request->status;

        $branch->save();
        return redirect()->route('branch.manage')->with('success', 'New Branch Added Successfully');
        //return back()->with('success', 'New Branch Added Successfully');
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
        $branch = Branch::find($id);

        if( !is_null($branch) ){
            return view('backend.pages.branch.edit', compact('branch'));
        }
        else{
            route('branch.manage');
        }       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::find($id);

        // Table_column_name      = Form name="---"
        $branch->name             = $request->name;
        $branch->bangla_name      = $request->bangla_name;
        $branch->slug             = Str::slug($request->name);
        $branch->address_line1    = $request->address1;
        $branch->address_line2    = $request->address2;
        $branch->phone            = $request->phone;
        $branch->status           = $request->status;

        $branch->save();

        return redirect()->route('branch.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);

        if( !is_null( $branch ) ){
            $branch->delete();

            return redirect()->route('branch.manage');
        }

    }
}
