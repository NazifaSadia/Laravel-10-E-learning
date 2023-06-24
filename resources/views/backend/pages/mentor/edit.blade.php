 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Update Mentor Profile Information</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row">
            <div class="col-lg-12">
            
                <!-- Page Body Content Start -->
                <div class="card bd-0 shadow-base">
                    <div class="pd-25">                  
                  
                        <form action="{{ route('mentor.update', $mentor->id) }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" class="form-control" required="required" autocomplete="off" value="{{ $mentor->full_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" class="form-control" required="require" autocomplete="off" value="{{ $mentor->designation }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" required="require" autocomplete="off" value="{{ $mentor->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Overview</label>
                                        <textarea class="form-control" rows="5" name="overview" >{{ $mentor->overview }}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required="require" autocomplete="off" value="{{ $mentor->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" required="require" autocomplete="off" value="{{ $mentor->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Fiverr URL</label>
                                        <input type="text" name="fiverr_url" class="form-control" value="{{ $mentor->fiverr_url }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Upwork URL</label>
                                        <input type="text" name="upwork_url" class="form-control" value="{{ $mentor->upwork_url }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Active/Inactive Status</label>
                                        <select class="form-control" name="status">
                                            <option value="2">Please Select the Status</option>
                                            <option value="1" @if ($mentor->status == 1) selected @endif>Active</option>
                                            <option value="2" @if ($mentor->status == 2) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                                                        
                                </div>

                                <div class="col-lg-4">  
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <br>
                                        @if ( $mentor->profile_pic == NULL )
                                            <img src="{{ asset('backend/img/mentor/default.jpg') }}" width="40">
                                        @else                    
                                            <img src="{{ asset('backend/img/mentor/' . $mentor->profile_pic) }}" width="40">
                                        @endif
                                        <br>
                                        <input type="file" name="image" class="form-control-file">
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Fiverr Logo</label>
                                        <br>
                                        @if ( $mentor->fiverr_img == NULL )
                                            No Logo Uploaded.
                                        @else                    
                                            <img src="{{ asset('backend/img/mentor/badge/' . $mentor->fiverr_img) }}" width="40">
                                        @endif
                                        <br><br>
                                        <input type="file" name="fiverr_img" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label>Upwork Logo</label>
                                        <br>
                                        @if ( $mentor->upwork_img == NULL )
                                            No Logo Uploaded.
                                        @else                    
                                            <img src="{{ asset('backend/img/mentor/badge/' . $mentor->upwork_img) }}" width="40">
                                        @endif
                                        <br><br>
                                        <input type="file" name="upwork_img" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="updateMentor" value="Save Changes" class="btn btn-teal mg-b-10">
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