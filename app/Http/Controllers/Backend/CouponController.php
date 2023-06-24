<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('code', 'asc')->get();
        return view('backend.pages.coupon.manage', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();

        $coupon->code                = $request->code;
        $coupon->discount_type       = $request->discount_type;
        $coupon->course_type         = $request->course_type;
        $coupon->fixed_value         = $request->fixed_value;
        $coupon->percent_value       = $request->percent_value;
        $coupon->status              = $request->status;

        $coupon->save();

        return redirect()->route('coupon.manage');
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
        $coupon = Coupon::find($id);

        if ( !empty( $coupon ) )
        {
            return view('backend.pages.coupon.edit' , compact('coupon'));
        }
        else{
            return redirect()->route('coupon.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::find($id);

        $coupon->code                = $request->code;
        $coupon->discount_type       = $request->discount_type;
        $coupon->course_type         = $request->course_type;
        $coupon->fixed_value         = $request->fixed_value;
        $coupon->percent_value       = $request->percent_value;
        $coupon->status              = $request->status;

        $coupon->save();

        return redirect()->route('coupon.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();
        return redirect()->route('coupon.manage');
    }
}
