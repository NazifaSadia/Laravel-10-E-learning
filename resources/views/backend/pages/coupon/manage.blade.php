 @extends('backend/layout/template')
 

 @section('body')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Manage All the Coupon Codes</h4>
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
                      <th scope="col">Coupon Code </th>
                      <th scope="col">Discount Type</th>
                      <th scope="col">Course Type</th>
                      <th scope="col">Fixed Amount</th>
                      <th scope="col">Percent Off</th>                                  
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach( $coupons as $coupon )
                      <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $coupon->code }}</td>
                          <td>
                            @if ( $coupon->discount_type == 1 )
                                  <span class="badge badge-dark">Fixed Amount</span>
                              @elseif ( $coupon->discount_type == 2 )
                                  <span class="badge badge-warning">Percentage Off</span>
                              @endif
                          </td>
                          <td>
                            @if ( $coupon->course_type == 1 )
                                  <span class="badge badge-info">Online Course</span>
                              @elseif ( $coupon->course_type == 2 )
                                  <span class="badge badge-success">Offline Course</span>
                              @endif
                          </td>
                          <td>
                            @if ( !empty($coupon->fixed_value) )
                                {{ $coupon->fixed_value }} BDT
                            @else
                                -/-
                            @endif
                          </td>
                          <td>
                            @if ( !empty($coupon->percent_value) )
                                {{ $coupon->percent_value }} %
                            @else
                                -/-
                            @endif
                          </td>
                                                                  
                          <td>
                              @if ( $coupon->status == 1 )
                                  <span class="badge badge-success">Active</span>
                              @elseif ( $coupon->status == 2 )
                                  <span class="badge badge-danger">Inactive</span>
                              @endif
                          </td>
                          <td>
                              <ul class="custom_action">
                                  <li>
                                      <a href="{{ route('coupon.edit' , $coupon->id ) }}">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="" data-toggle="modal" data-target="#coupon{{ $coupon->id }}">
                                          <i class="fa fa-trash"></i>
                                      </a>
                                  </li>
                              </ul>
                          </td>
                          <!-- Delete Modal Start-->
                          <div class="modal fade" id="coupon{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Do you Confirm to Delete this Coupon?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          <div class="modal-button">
                                              <ul>
                                                  <li>
                                                      <form action="{{ route('coupon.destroy', $coupon->id ) }}" method="POST">
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
                
                @if ( $coupons->count() == 0 )
                    <div class="alert alert-info">
                        No Coupon Code added yet. Please add a new Coupon.
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