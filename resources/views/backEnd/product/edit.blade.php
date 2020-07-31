@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Product Admin')
@section('title_form','Product')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                @error('category_id')
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else 
                                    <label for="">Category</label>
                                @enderror
                                <select class="form-control" id="category_idInput"  name="category_id">
                                <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                                <?php   showCategories($categoies,$product->category_id) ?>
                                </select>
                            </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                @error('brand_id')
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else 
                                    <label for="">Brand</label>
                                @endif
                                <select class="form-control" name="brand_id"  id="brand_idInput">
                                    <option value="{{$product->brand_id}}">{{$product->brand->name}}</option>
                                    {{-- <option value="">----Choose Brand----</option> --}}
                                @foreach ($brands as $brand)
                                   @if ($product->brand_id!=$brand->id)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                   @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                            @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else 
                                <label for="">Name</label>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control @error('name')is-invalid @enderror" id="nameInput" placeholder="Enter name Product..." name="name" value="{{$product->name}}">
                            </div>
                       </div>
                       <div class="col-md-6">
                            <label for="">Basic customization</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="product_status" value="0" id='category_status' @if ($product->product_status==0)
                                                    checked
                                                @endif>
                                                <label class="form-check-label" for="category_status">Hide</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="product_status" value="1" id='category_status2' @if ($product->product_status==1)
                                                checked
                                            @endif> 
                                                <label class="form-check-label" for="category_status2">Show</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  name="active_new" value="1" id='active_new' @if ($product->active_new==1)
                                                checked
                                            @endif>
                                                <label class="form-check-label" for="active_new">Show tag new</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @error('feature_id')
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                                @else 
                                    <label for="">Feature</label>
                                @endif
                                <select class="form-control" name="feature_id"  id="feature_idInput">
                                    <option value="{{$product->feature_id}}">{{$product->feature->name}}</option>
                                    {{-- <option value="">----Choose Feature----</option> --}}
                                @foreach ($features as $feature)
                                   @if ($product->feature_id!=$feature->id)
                                        <option value="{{$feature->id}}">{{$feature->name}}</option>
                                   @endif
                                @endforeach
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-12">
                            @error('description')
                            <label class="col-form-label" for="inputError" style="color: red"><i class="far fa-times-circle"></i>{{$message}}</label>
                            @else 
                                <label for="">Description</label>
                            @endif
                            <textarea name="description" class="form-control" id="content">{{$product->description}}</textarea>
                        
                        </div> 
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
{{-- Đệ quy  --}}
<?php   
function showCategories($categories, $checkCate,$parent_id = null, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent == $parent_id)
        {
            $checkCate=$checkCate;
            if ($checkCate != $item->id) {
                    echo '<option value=" '.$item->id.'">'.'&ensp;'.$char.$item->name.'</option>';
            }
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories,$checkCate ,$item->id, '&ensp;'.$char.'|--');
        }
    }
}
?>
@endsection