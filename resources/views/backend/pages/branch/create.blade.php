 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create a New Branch</h4>
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
                  
                        <form action="{{ route('branch.store') }}" method="POST"> 
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input type="text" name="name" class="form-control" required="required" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input type="text" name="address1" class="form-control" required="require" autocomplete="off">
                                    </div>

                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Branch Name in Bangla</label>
                                        <input type="text" name="bangla_name" class="form-control" required="require" autocomplete="off">
                                    </div>                                    

                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address2" class="form-control" required="require" autocomplete="off">
                                    </div>                                       
                                </div>

                                <div class="col-lg-4">                                 
                                    <div class="form-group">
                                        <label>Phone No.[Use comma (,) to set Multiple Phone No.]</label>
                                        <input type="text" name="phone" class="form-control" required="require" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Active/Inactive Status</label>
                                        <select class="form-control" name="status">
                                            <option>Please Select the Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="submit" name="addBranch" value="Add New Branch" class="btn btn-teal mg-b-10">
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