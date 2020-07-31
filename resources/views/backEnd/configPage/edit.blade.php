@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Category Admin')
@section('title_form','Category')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('category.update',$cate->id)}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$cate->id}}">
                <div class="card-body">
                    <div class="form-group">
                        @error('parent')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else 
                            <label for="">Parent Category</label>
                        @endif
                        <select class="form-control" name="parent">
                            @if ($cate->parent!=null)
                                <option value="{{$cate->parent}}">{{$cate->parentCate->name}}</option>
                            @endif
                            <option value="">----It parent----</option>
                            <?php   showCategories($categoies) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @enderror
                        <input type="text" class="form-control @error('name') is-invalid  @enderror " placeholder="Enter name brand..." name="name" value="{{$cate->name}}">
                    </div>
                   <div class="row">
                       <div class="col md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category_status" value="0" id='category_status' @if ($cate->category_status==0)
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="category_status">Hide</label>
                                </div>
                          </div>
                       </div>
                       <div class="col md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  name="category_status" value="1" id='category_status2'
                                @if ($cate->category_status==1)
                                        checked
                                    @endif>
                                <label class="form-check-label" for="category_status2">Show</label>
                            </div>
                      </div>
                   </div>
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
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
{{-- Đệ quy  --}}
<?php   
function showCategories($categories,$parent_id = null, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent == $parent_id)
        {
            echo '<option value=" '.$item->id.'">'.'&ensp;'.$char.$item->name.'</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, '&ensp;'.$char.'|--');
        }
    }
}

?>