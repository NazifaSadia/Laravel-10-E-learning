@extends('backend/layout/template')
 

@section('body')
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update Coupon Code Information</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="row">
      <div class="col-lg-12">
      
        <!-- Page Body Content Start -->
        <div class="card bd-0 shadow-base">
          <div class="pd-25">                  
        
            <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data"> 
              @csrf
              <div class="row">
                <!-- 1st Column -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="code" class="form-control" required="required" autocomplete="off" placeholder="Enter the Coupon Code" 
                    value="{{$coupon->code}}">
                  </div>
                  <div class="form-group">
                    <label>Fixed Value [BDT/Taka]</label>
                    <input type="text" name="fixed_value" class="form-control" placeholder="Enter the Amount only" value="{{$coupon->fixed_value}}">
                  </div>
                    
                </div>
                <!-- 2nd Column -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Discount Type</label>
                    <select class="form-control" name="discount_type">
                        <option value="1">Please Select the Discount Type</option>
                        <option value="1" @if ($coupon->discount_type == 1) selected @endif>Fixed Amount</option>
                        <option value="2" @if ($coupon->discount_type == 2) selected @endif>Percentage Off</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Percentage Off [%]</label>
                    <input type="text" name="percent_value" class="form-control" placeholder="Enter the Percentage Number only" value="{{$coupon->percent_value}}">
                  </div>
                </div>
                <!-- 3rd Column -->
                <div class="col-lg-4">  
                  <div class="form-group">
                    <label>Course Type</label>
                    <select class="form-control" name="course_type">
                      <option value="1">Please Select the Course Type</option>
                      <option value="1" @if ($coupon->course_type == 1) selected @endif>Online</option>
                      <option value="2" @if ($coupon->course_type == 2) selected @endif>Offline</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Active/Inactive Status</label>
                    <select class="form-control" name="status">
                      <option value="2">Please Select the Status</option>
                      <option value="1" @if ($coupon->status == 1) selected @endif>Active</option>
                      <option value="2" @if ($coupon->status == 2) selected @endif>Inactive</option>
                    </select>
                  </div>
                    
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="submit" name="updateCoupon" value="Save Changes" class="btn btn-teal mg-b-10">
                  </div>
                </div>
              </div>
            </form>
              
          </div>
        </div>
        <!-- Page Body Content End -->
      </div>
    </div>
  </div>
 @endsection