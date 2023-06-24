 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage All the Mentor Information</h4>
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
                      <th scope="col">Name</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>                                   
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach( $mentors as $mentor )
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>
                            @if ( $mentor->profile_pic == NULL )
                                <img src="{{ asset('backend/img/mentor/default.jpg') }}" width="40">
                            @else                    
                                <img src="{{ asset('backend/img/mentor/' . $mentor->profile_pic) }}" width="40">
                            @endif
                          </td>
                          <td>{{ $mentor->full_name }}</td>
                          <td>{{ $mentor->designation }}</td>
                          <td>{{ $mentor->phone }}</td>
                          <td>{{ $mentor->email }}</td>
                          <td>{{ $mentor->address }}</td>
                                                                  
                          <td>
                              @if ( $mentor->status == 1 )
                                  <span class="badge badge-success">Active</span>
                              @elseif ( $mentor->status == 2 )
                                  <span class="badge badge-danger">Inactive</span>
                              @endif
                          </td>
                          <td>
                              <ul class="custom_action">
                                  <li>
                                      <a href="{{ route('mentor.edit' , $mentor->id ) }}">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="" data-toggle="modal" data-target="#mentor{{ $mentor->id }}">
                                          <i class="fa fa-trash"></i>
                                      </a>
                                  </li>
                              </ul>
                          </td>
                          <!-- Delete Modal Start-->
                          <div class="modal fade" id="mentor{{ $mentor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to Delete this Mentor?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          <div class="modal-button">
                                              <ul>
                                                  <li>
                                                      <form action="{{ route('mentor.destroy', $mentor->id ) }}" method="POST">
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
                
                @if ( $mentors->count() == 0 )
                    <div class="alert alert-info">
                        No Mentor Profile added yet. Please add a Mentor first.
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