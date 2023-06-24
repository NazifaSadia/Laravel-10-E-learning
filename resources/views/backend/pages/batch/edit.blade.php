@extends('backend/layout/template')
 

@section('body')
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update Batch Information</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="row">
      <div class="col-lg-12">
      
        <!-- Page Body Content Start -->
        <div class="card bd-0 shadow-base">
          <div class="pd-25">                  
        
            <form action="{{ route('batch.update', $batch->id) }}" method="POST" enctype="multipart/form-data"> 
              @csrf
              <div class="row">
                <!-- 1st Column -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Batch Name</label>
                    <input type="text" name="batch_name" class="form-control" required="required" autocomplete="off" value="{{ $batch->batch_name }}">
                  </div>
                  <div class="form-group">
                    <label>Starting Date</label>
                    <input type="text" name="starting_date" class="form-control" required="required" autocomplete="off" value="{{ $batch->starting_date }}">
                  </div>
                  
                  <div class="form-group">
                    <label>Total Seat</label>
                    <input type="text" name="seat_number" class="form-control" required="required" autocomplete="off" value="{{ $batch->seat_number }}">
                  </div>

                </div>

                <!-- 2nd Column -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Course Name</label>
                    <select class="form-control" name="course_id">
                      <option value="0">Please Select the Course</option>
                      @foreach ( $courses as $course)
                        <option value="{{$course->id}}"

                          @if($course->id ==  $batch->course_id)
                            selected
                          @endif

                        >{{ $course->english_title }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Class Day [Ex: Sunday, Tuesday]</label>
                    <input type="text" name="class_day" class="form-control" required="required" autocomplete="off" value="{{ $batch->class_day }}">
                  </div>
                  
                  <div class="form-group">
                    <label>Batch Type</label>
                    <select class="form-control" name="batch_type">
                      <option value="1">Select the Batch Type</option>
                      <option value="1" @if ($batch->batch_type == 1 ) selected @endif>Online</option>
                      <option value="2" @if ($batch->batch_type == 2 ) selected @endif>Offline</option>
                    </select>
                  </div>
                  
                </div>
                <!-- 3rd Column -->      
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Mentor Name</label>
                    <select class="form-control" name="mentor_id">
                      <option value="0">Select the Mentor Name</option>
                      @foreach ( $mentors as $mentor)
                        <option value="{{ $mentor->id }}"
                        
                        @if( $mentor->id == $batch->mentor_id )
                          selected
                        @endif

                        >{{ $mentor->full_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Class Time</label>
                    <input type="text" name="class_timing" class="form-control" value="{{ $batch->class_timing }}">
                  </div>

                  
                  <div class="form-group">
                    <label>Admission Status</label>
                    <select class="form-control" name="admission_status">
                      <option value="1">Select the Admission Status</option>
                      <option value="1" @if ($batch->admission_status == 1) selected @endif>Admission Going On</option>
                      <option value="2" @if ($batch->admission_status == 2) selected @endif>Admission Closed</option>
                    </select>
                  </div>
                    
                </div>
                <!-- 4th Column -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Branch Name</label>
                    <select class="form-control" name="branch_id">
                      <option>Select the Branch</option>
                      @foreach ( $branches as $branch )
                        <option value="{{ $branch->id }}"
                        
                        @if ( $branch->id == $batch->branch_id)
                          selected
                        @endif

                        >{{ $branch->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Facebook group</label>
                    <input type="text" name="fb_group" class="form-control" required="required" autocomplete="off" value="{{ $batch->fb_group }}">
                  </div>

                  <div class="form-group">
                    <label>Status [Active/Inactive]</label>
                    <select class="form-control" name="status">
                      <option value="2">Select the Status</option>
                      <option value="1" @if ( $batch->status == 1) selected @endif>Active</option>
                      <option value="2" @if ( $batch->status == 2) selected @endif>Inactive</option>
                    </select>
                  </div>
                </div>  

                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="submit" name="updateBatch" value="Save Changes" class="btn btn-teal mg-b-10">
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