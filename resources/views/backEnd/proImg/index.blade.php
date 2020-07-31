@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Product Admin')
@section('title_form','Product')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Product</strong></h3>
        <div class="card-tools">
            <a href="{{route('product.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Product</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th class="text-left">Name</th>
              <th>Product Detail</th>
              <th>Category</th>
              <th>Brand</th>
              <th>Feature</th>
              <th>Active Home</th>
              <th>Active New</th>
              <th>Status</th>
              <th>Created_at</th>
              <th>Tool</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr class="text-center">
                <td class="text-left">{{$product->name}}</td>
                <td><button class="btn btn-success" type="btn" data-toggle="modal" data-target="#modalProduct_{{$product->id}}">More with {{count($product->productDetail)}}</button>
                  <!-- Modal -->
                  <div class="modal fade" id="modalProduct_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                  <h3 class="card-title">Product Detail</h3>
                  
                                 @if (count($product->productDetail)!=0)
                                  @if ($product->productDetail[0]->color_id!=null)
                                    @if (count($product->productDetail)!=count($color))
                                      <div class="card-tools">
                                        <input type="hidden" value="{{count($color)}}">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                          <a href="{{route('productDetail.createCustom',$product->id)}}"  class="btn btn-success">Add Product Detail</a>
                                        </div>
                                      </div>
                                    @endif
                                  @endif
                                  @else
                                  <div class="card-tools">
                                    <input type="hidden" value="{{count($color)}}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                      <a href="{{route('productDetail.createCustom',$product->id)}}"  class="btn btn-success">Add Product Detail</a>
                                    </div>
                                  </div>  
                                 @endif
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                  <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                      <tr>
                                        <th>Photo management</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Price Sale</th>
                                        <th>Status</th>
                                        <th>Created_at</th>
                                        <th>Tools</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($product->productDetail as $value)
                                        <tr>
                                          <td><button class="btn btn-success" type="btn" data-toggle="modal" data-target="#modalImg_{{$product->id}}">More Image {{count($value->productDetailImage)}}</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalImg_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Images Product Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row">
                                                      <div class="col-12">
                                                        <div class="card">
                                                          <div class="card-header">
                                                            <h3 class="card-title">Images Product Detail</h3>
                                                          </div>
                                                          <!-- /.card-header -->
                                                          <div class="card-body table-responsive p-0" style="height: 300px;">
                                                            <table class="table table-head-fixed text-nowrap">
                                                              <thead>
                                                                <tr>
                                                                  <th>Image</th>
                                                                  <th>Position</th>
                                                                  <th>Status</th>
                                                                  <th>Created_at</th>
                                                                  <th>Tools</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                @foreach ($value->productDetailImage as $imageItem)
                                                                  <tr>
                                                                    <td>
                                                                      <img src="storage/app/{{$imageItem->url_img}}" alt="" class="imgPreview" style="object-fit: cover">
                                                                    </td>
                                                                    <td>{{$imageItem->position}}</td>
                                                                    <td>
                                                                      @if ($imageItem->pdi_status==1)
                                                                        Show
                                                                      @else 
                                                                        Hiden 
                                                                      @endif
                                                                    </td>
                                                                    <td>{{$value->created_at}}</td>
                                                                    <td>
                                                                      <form action="{{route('productDetailImages.destroy',$imageItem->id)}}" method="POST">
                                                                            @csrf @method("DELETE")
                                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                                            <a href="{{route('productDetailImages.edit',$imageItem->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                                        </form>
                                                                    </td>
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
                                                    <button type="button" class="btn btn-primary" onclick="closeModal('#modalImg_{{$product->id}}','#modalProduct_{{$product->id}}')">Back</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>             
                                          </td>
                                          <td class="d-flex justify-content-between">
                                            @if ($value->color_id!=null)
                                             <span>{{$value->color->name}}</span>
                                             <span class="color_show" style="background:{{$value->color->color_code}};"></span>
                                            @else 
                                              Default Color
                                            @endif
                                          </td>
                                          <td>{{$value->quantity}}</td>
                                          <td>{{$value->price}}</td>
                                          <td>{{$value->price_sale}}</td>
                                          <td>
                                            @if ($value->product_detail_status==1)
                                              Show
                                            @else 
                                              Hiden 
                                            @endif
                                          </td>
                                          <td>{{$value->created_at}}</td>
                                          <td>
                                            <form action="{{route('productDetail.destroy',$value->id)}}" method="POST">
                                                  @csrf @method("DELETE")
                                                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                  <a href="{{route('productDetail.edit',$value->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                              </form>
                                          </td>
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
                <td>{{$product->category->name}}</td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->feature->name}}</td>
                <td>
                  @if ($product->active_home==1)
                    Show
                  @else 
                    Hiden 
                  @endif
                </td>
                <td>
                  @if ($product->active_new==1)
                    Show
                  @else 
                    Hiden 
                  @endif
                </td>
                <td>
                  @if ($product->product_status==1)
                    Show
                  @else 
                    Hiden 
                  @endif
                </td>
                <td>
                  {{$product->created_at}}
                </td>   
                <td>
                  <form action="{{route('product.destroy',$product->id)}}" method="POST">
                        @csrf @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </form>
                </td>
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
@endsection
@if (Session::has('success'))
    @section('alert')
        <script>
          Command: toastr["success"]("{{Session::get('success')}}")
        </script>
    @endsection
@endif
@if (Session::has('error'))
    @section('alert')
        <script>
          Command: toastr["error"]("{{Session::get('error')}}")
        </script>
    @endsection
@endif
@if (Session::has('modals'))
    @section('script_cus')
        <script>
          $("{{Session::get('modals')}}").modal('show')
        </script>
    @endsection
@endif
{{-- Đệ quy  --}}
<?php 
function selectDb(){

}
?>



<?php 
  function showCategories($categories, $parent_id = null, $char = '')
  {
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent == $parent_id)
        {
          echo '<tr class="text-center">';
          echo '<td class="text-left">'.$char.$item->name.'</td>';
          if ($item->parentCate!=null) {
            // while($item->parentCate->parent!=null){
            //   $strParent=$strParent.'/'.$item->parentCate;
            // }
            echo '<td>'.$item->parentCate->name.'</td>';
          }else{
            echo '<td> </td>';
          }
          if ($item->category_status==1) {
            echo '<td> Show </td>';
          }else{
            echo '<td> Ẩn </td>';
          }
          echo '<td>'.$item->created_at.'</td>';
          echo 
          '<td>
            <form action="" method="POST">
              <input type="hidden" name="token" value="$token" />
              <input type="hidden" name="_method" value="PUT">
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
              <a href="admin/category/'.$item->id.'/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
            </form>
          </td>';
          echo '</tr>';
          // Xóa chuyên mục đã lặp
          unset($categories[$key]);
          // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
          showCategories($categories,$item->id,$char.'|--');
        }
    }
  }
?>