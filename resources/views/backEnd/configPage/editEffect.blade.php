@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Config Admin')
@section('title_form','Config')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Config Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('configPage.updateEffect',$configPage->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Name</label>
                        @enderror
                        <input type="text" class="form-control" placeholder="Enter address" name="name" value="{{$configPage->name}}">
                    </div>
              
                    <div class="form-group">
                        @error('content')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Script</label>
                        @enderror
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="content">{{$configPage->content}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                             <div class="form-group">
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="status" value="0" id='category_status' @if ($configPage->status==0)
                                         checked
                                     @endif>
                                     <label class="form-check-label" for="category_status">Hide</label>
                                 </div>
                           </div>
                        </div>
                        <div class="col md-6">
                         <div class="form-group">
                             <div class="form-check">
                                 <input class="form-check-input" type="radio"  name="status" value="1" id='category_status2'
                                 @if ($configPage->status==1)
                                         checked
                                     @endif>
                                 <label class="form-check-label" for="category_status2">Show</label>
                             </div>
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
function showCategories($categories, $parent_id = null, $char = '')
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