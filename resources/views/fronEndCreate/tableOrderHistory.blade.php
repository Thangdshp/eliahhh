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
          <td><button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalProduct_{{$order->id}}">More with {{count($order->orderDetail)}}</button>
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
                                    @if ($order->order_status==2)
                                    <th>Evalution</th>
                                    @endif      
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
                                    @if ($order->order_status==2)
                                    <td><a href="{{route('product-detail',[$value->getProductDetail($value->product_detail_id)->product->slug,$value->product_detail_id])}}" class="btn btn-success">Go to</a></td>
                                    @endif  
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
            @if ($order->order_status==2)
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalProduct_{{$order->id}}">Quality evalution
            </button>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>