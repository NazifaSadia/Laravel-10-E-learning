@extends('backend/layout/template')
 

@section('body')
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage All Courses</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="row">
      <div class="col-lg-12">
      
        <!-- Page Body Content Start -->
        <div class="card bd-0 shadow-base">
          @include('backend.flash-message')
          <div class="d-md-flex justify-content-between pd-25">
                
            <!-- Table Content Start -->
            <div class="bd bd-gray-300 rounded table-responsive">
              <table class="table table-bordered table-striped table-hover table_custom">
                <thead class="thead-dark">
                  <tr>
                  <th scope="col">#Sl.</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Regular Price</th>
                  <th scope="col">Course duration</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>

                  @foreach( $courses as $course )
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>
                        @if ( $course->image == NULL )
                          <img src="{{ asset('backend/img/course/default.jpg') }}" width="40">
                        @else                    
                          <img src="{{ asset('backend/img/course/' . $course->image) }}" width="40">
                        @endif
                      </td>
                      <td>{{ $course->english_title }}</td>
                      <td>{{ $course->price }}</td>
                      <td>{{ $course->course_duration }}</td>
                      <td>
                        @if ( $course->status == 1 )
                            <span class="badge badge-success">Active</span>
                        @elseif ( $course->status == 2 )
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                        <td>
                          <ul class="custom_action">
                            <li>
                              <a href="{{ route('course.edit' , $course->id ) }}">
                                <i class="fa fa-edit"></i>
                              </a>
                            </li>
                            <li>
                              <a href="" data-toggle="modal" data-target="#course{{ $course->id }}">
                                <i class="fa fa-trash"></i>
                              </a>
                            </li>
                          </ul>
                        </td>
                        <!-- Delete Modal Start-->
                        <div class="modal fade" id="course{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to Delete this Course?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-center">
                                <div class="modal-button">
                                  <ul>
                                    <li>
                                      <form action="{{ route('course.destroy', $course->id ) }}" method="POST">
                                          @csrf
                                          <button type="submit" class="btn btn-danger">Confirm</button>
                                      </form>
                                    </li>
                                    <li>
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Delete Modal End-->
                    </tr>

                    @endforeach
                </tbody>
              </table>
              
              @if ( $courses->count() == 0 )
                <div class="alert alert-info">
                    No Course added yet. Please add a course first.
                </div>
              @endif
            </div>             
            <!-- Table Content End -->
          </div>
        </div>
        <!-- Page Body Content End -->
      </div>
    </div>
  </div>
@endsection