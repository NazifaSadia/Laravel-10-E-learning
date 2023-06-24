 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create a New Mentor Profile</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row">
            <div class="col-lg-12">
            
                <!-- Page Body Content Start -->
                <div class="card bd-0 shadow-base">
                    <div class="pd-25">
                        @include('backend.flash-message')               
                  
                        <form action="{{ route('mentor.store') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" class="form-control" required="required" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" class="form-control" required="require" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" required="require" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Overview</label>
                                        <textarea class="form-control" rows="5" name="overview"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required="require" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" required="require" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Fiverr URL</label>
                                        <input type="text" name="fiverr_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Upwork URL</label>
                                        <input type="text" name="upwork_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Active/Inactive Status</label>
                                        <select class="form-control" name="status">
                                            <option value="2">Please Select the Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                                                        
                                </div>

                                <div class="col-lg-4">  
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Fiverr Logo</label>
                                        <input type="file" name="fiverr_img" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label>Upwork Logo</label>
                                        <input type="file" name="upwork_img" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="addMentor" value="Add New Mentor" class="btn btn-teal mg-b-10">
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