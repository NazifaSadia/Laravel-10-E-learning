 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage All the Batches of Admission Going On</h4>
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
                      <th scope="col">Batch Name</th>
                      <th scope="col">Admission Status</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Mentor Name</th>
                      <th scope="col">Branch Name</th>                                  
                      <th scope="col">Class Starting Date</th>                               
                      <th scope="col">Batch Type</th>                                
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach( $batches as $batch )
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $batch->batch_name }}</td>
                          <td>
                            @if ( $batch->admission_status == 1 )
                                <span class="badge badge-success">Admission Going On</span>
                            @elseif ( $batch->admission_status == 2 )
                                <span class="badge badge-warning">Admission Closed</span>
                            @endif
                          </td>
                          <td>{{ $batch->course->english_title }}</td>
                          <td>{{ $batch->mentor->full_name }}</td>
                          <td>{{ $batch->branch->name }}</td>
                          <td>{{ $batch->starting_date }}</td>
                          <td>
                            @if ( $batch->batch_type == 1 )
                                <span class="badge badge-info">Online</span>
                            @elseif ( $batch->batch_type == 2 )
                                <span class="badge badge-dark">Offline</span>
                            @endif
                          </td>
                                        
                          <td>
                              @if ( $batch->status == 1 )
                                  <span class="badge badge-success">Active</span>
                              @elseif ( $batch->status == 2 )
                                  <span class="badge badge-danger">Inactive</span>
                              @endif
                          </td>
                          <td>
                            <ul class="custom_action">
                              <li>
                                <a href="{{ route('batch.edit' , $batch->id ) }}">
                                  <i class="fa fa-edit"></i>
                                </a>
                              </li>
                              <li>
                                <a href="" data-toggle="modal" data-target="#batch{{ $batch->id }}">
                                  <i class="fa fa-trash"></i>
                                </a>
                              </li>
                            </ul>
                          </td>
                          <!-- Delete Modal Start-->
                          <div class="modal fade" id="batch{{ $batch->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to Delete this Batch?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          <div class="modal-button">
                                              <ul>
                                                  <li>
                                                      <form action="{{ route('batch.destroy', $batch->id ) }}" method="POST">
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
                
                @if ( $batches->count() == 0 )
                    <div class="alert alert-info">
                        No Batch added for Admission right now. Please add a New Batch to start the Admission Process.
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