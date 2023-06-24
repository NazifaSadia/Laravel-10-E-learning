@extends('backend/layout/template')
 

@section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Create a New Course</h4>
            <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
    </div>

    <div class="br-pagebody">
      <div class="row"3>
        <div class="col-lg-12">
        
          <!-- Page Body Content Start -->
          <div class="card bd-0 shadow-base">
            <div class="pd-25">
              @include('backend.flash-message')               
        
              <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="row">

                  <!-- 1st Column -->
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Course Name [ English ]</label>
                      <input type="text" name="english_title" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Intro Video URL</label>
                      <input type="text" name="intro_video" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Course Duration</label>
                      <input type="text" name="course_duration" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Course Motivation</label>
                      <textarea name="motivational_content" class="form-control" rows="4"></textarea>
                    </div>
                    
                  </div>

                  <!-- 2nd Column -->
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Course Name [ Bangla ]</label>
                      <input type="text" name="bangla_title" class="form-control" required="required" autocomplete="off">
                    </div>                                
                    <div class="form-group">
                      <label>Total Graduate Number</label>
                      <input type="text" name="graduate_number" class="form-control" required="required" autocomplete="off">
                    </div>                                
                    <div class="form-group">
                      <label>Coupon Status</label>
                      <select class="form-control" name="coupon_status">
                          <option value="2">Please Select the Status</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Course Opportunity</label>
                      <textarea name="course_opportunity" class="form-control" rows="4"></textarea>
                    </div>
                                                    
                  </div>

                  <!-- 3rd Column -->
                  <div class="col-lg-3">                                 
                    <div class="form-group">
                      <label>Price [ In English ]</label>
                      <input type="text" name="price" class="form-control" required="required" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label>Total Lecture Number</label>
                      <input type="text" name="total_lecture" class="form-control" required="required" autocomplete="off">
                    </div>  

                    <div class="form-group">
                      <label>Course Status</label>
                      <select class="form-control" name="status">
                          <option value="1">Please Select the Status</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Course Description</label>
                      <textarea name="curriculum_description" class="form-control" rows="4"></textarea>
                    </div>
                  </div>

                  <!-- 4th Column -->
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Price [ In Bangla ]</label>
                      <input type="text" name="bangla_price" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Class Hour</label>
                      <input type="text" name="class_hour" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Course Thumbnail</label>
                      <input type="file" name="image" class="form-control-file">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Course Requirement</label>
                      <textarea name="course_requirement" class="form-control" rows="4"></textarea>
                    </div>

                  </div>
                  

                  <div class="col-lg-12">
                      <div class="form-group">
                          <input type="submit" name="addCourse" value="Add New Course" class="btn btn-teal mg-b-10">
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