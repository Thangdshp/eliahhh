@extends('layouts/frontEnd/layoutFrontEnd2')
@section('titleWeb',"About")
@section('titlePage','Proflie')
@section('content')
<div class="container wp-container" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="row">
      
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Order Me</a></li>
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">              
                  <div class="d-flex">
                      <button class="btn btn-check_order btn-danger" onclick="clickOrder_show(0,this)">Processing</button>
                      <button class="btn btn-check_order" onclick="clickOrder_show(1,this)">Accept</button>
                      <button class="btn btn-check_order" onclick="clickOrder_show(2,this)">Successful</button>
                      <button class="btn btn-check_order" onclick="clickOrder_show(3,this)">Refuse</button>
                  </div>
                  <br>
                  <br>
                  <div class="content-time">
                    <table class="table text-nowrap" id="myTable">
                      <thead>
                        <tr class="text-center">
                          <th class="text-left">Stt</th>
                          <th>Order Detail</th>
                          <th>Sum Price</th>
                          <th>Status</th>
                          <th>Date of purchase</th>
                          <th>Tool</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                          <tr class="text-center">
                            <td class="text-left">{{$loop->index+1}}</td>
                            <td><button class="btn btn-success" type="btn" data-toggle="modal" data-target="#modalProduct_{{$order->id}}">More with {{count($order->orderDetail)}}</button>
                              <!-- Modal -->
                              <div class="modal fade" id="modalProduct_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-12">
                                          <div class="card">
                                            <div class="card-header">
                                              <h3 class="card-title">Order Detail</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                              <table class="table table-head-fixed text-nowrap">
                                                <thead>
                                                  <tr>
                                                    <th>Stt</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Color</th>
                                                    <th>Quantity</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($order->orderDetail as $value)
                                                    <tr>
                                                      <td>{{$loop->index+1}}</td>
                                                      <td><img src="storage/app/{{($value->getProductDetail($value->product_detail_id))->productDetailImage[0]->url_img}}" alt="" style="width:100px; object-fit: cover"></td>
                                                      <td>{{($value->getProductDetail($value->product_detail_id))->product->name}}</td>
                                                      <td>
                                                        @if (($value->getProductDetail($value->product_detail_id))->color!=null)
                                                          {{($value->getProductDetail($value->product_detail_id))->color->name}}
                                                        @endif
                                                      </td>
                                                      <td>{{$value->quantity}}</td>
                                                    </tr>
                                                  @endforeach
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>             
                            </td>
                            <td>{{$order->sum}} $</td>
                            <td>
                              @if ($order->order_status==0)
                                Processing
                              @elseif($order->order_status==1)
                                Accept
                              @elseif($order->order_status==2)
                                Successful 
                              @else
                                Refuse
                              @endif
  
                            </td>
                            <td>{{$order->sum}}</td>   
                            <td>
                              @if ($order->order_status==0)
                                <form action="{{route('profile.order_delete',$order->id)}}" method="POST">  
                                  @csrf                         
                                    <button type="submit" class="btn btn-danger">Cancel order</button>
                                </form>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.tab-pane -->
      
                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" method="POST" action="{{route('profile.customeUpdate',Auth::user()->id)}}">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        @error('name')
                          <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="inputName" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        @error('email')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="inputEmail" placeholder="Email" name="email" value="{{Auth::user()->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail1" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                        @error('phone')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="tel" class="form-control @error('phone') is-invalid  @enderror" id="inputEmail1" placeholder="Phone Number" name="phone" value="{{Auth::user()->phone}}">
                      </div>
                    </div>
                     <div class="form-group">
                      @error('address')
                          <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                      <label for="">Address</label>
                      @enderror
                      <input type="text" class="form-control @error('address') is-invalid  @enderror " placeholder="Enter address..." name="address" value="{{Auth::user()->address}}" tabindex="5">
                    </div>
                    <div class="form-group">
                      @error('birth_day')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                      @else
                        <label for="">Birth day</label>
                      @enderror
                      <input type="date" class="form-control @error('birth_day') is-invalid  @enderror " placeholder="Enter birth day..." name="birth_day" value="{{Auth::user()->birth_day}}" tabindex="6">
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Old Password</label>
                      <div class="col-sm-10">
                        @error('oldPassword')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="password" class="form-control @error('oldPassword') is-invalid  @enderror" id="inputName2" placeholder="Old Password" name="oldPassword">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName3" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputName3" placeholder="New Password" name="newPassword">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName4" class="col-sm-2 col-form-label">Confirm New Password</label>
                      <div class="col-sm-10">
                        @error('repPassword')
                        <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="password" class="form-control @error('repPassword') is-invalid  @enderror" id="inputName4" placeholder="Confirm New Password" name="repPassword">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection