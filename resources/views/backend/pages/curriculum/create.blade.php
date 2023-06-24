@extends('backend/layout/template')
 
@section('body')
  <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline"></i>
      <div>
          <h4>Add New Course Curriculum</h4>
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
          
                <form action="{{ route('curriculum.store') }}" method="POST" enctype="multipart/form-data"> 
                  @csrf
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <labe>Course Title</labe>
                        <select class="form-control" name="course_id">
                          <option value="0">Please Select the Course Name</option>
                          @foreach ( $courses as $course)
                            <option value="{{$course->id}}">{{ $course->english_title }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Active/Inactive Status</label>
                        <select class="form-control" name="status">
                            <option value="2">Please Select the Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                      </div>
                    </div>

                    <!-- 1st Column -->
                    <div class="col-lg">
                      <div class="form-group">
                        <label>Step One Title [English]</label>
                        <input type="text" name="one_en" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step One Title [Bangla]</label>
                        <input type="text" name="one_bn" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step One Description</label>
                        <textarea name="one_desc" class="form-control" row="3"></textarea>
                      </div>
                    </div>

                    <!-- 2nd Column -->
                    <div class="col-lg">
                      <div class="form-group">
                        <label>Step Two Title [English]</label>
                        <input type="text" name="two_en" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Two Title [Bangla]</label>
                        <input type="text" name="two_bn" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Two Description</label>
                        <textarea name="two_desc" class="form-control" row="3"></textarea>
                      </div>
                    </div>
                    <!-- 3rd Column -->
                    <div class="col-lg">
                      <div class="form-group">
                        <label>Step Three Title [English]</label>
                        <input type="text" name="three_en" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Three Title [Bangla]</label>
                        <input type="text" name="three_bn" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Three Description</label>
                        <textarea name="three_desc" class="form-control" row="3"></textarea>
                      </div>
                    </div>
                    <!-- 4th Column -->
                    <div class="col-lg">
                      <div class="form-group">
                        <label>Step Four Title [English]</label>
                        <input type="text" name="four_en" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Four Title [Bangla]</label>
                        <input type="text" name="four_bn" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Four Description</label>
                        <textarea name="four_desc" class="form-control" row="3"></textarea>
                      </div>
                    </div>
                    <!-- 5th Column -->
                    <div class="col-lg">
                      <div class="form-group">
                        <label>Step Five Title [English]</label>
                        <input type="text" name="five_en" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Five Title [Bangla]</label>
                        <input type="text" name="five_bn" class="form-control" required="required">
                      </div>
                      <div class="form-group">
                        <label>Step Five Description</label>
                        <textarea name="five_desc" class="form-control" row="3"></textarea>
                      </div>
                    </div>


                    <div class="col-lg-12">   
                        <div class="form-group">
                            <input type="submit" name="addCurriculum" value="Publish Curriculum" class="btn btn-teal mg-b-10">
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