@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Category Admin')
@section('title_form','Category')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><strong>List Category</strong></h3>
        <div class="card-tools">
            <a href="{{route('category.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Category</a>
        </div>
      </div>
      <br>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-2">
        <table class="table text-nowrap" id="myTable">
          <thead>
            <tr class="text-center">
              <th td class="text-left">Name</th>
              <th>Parent</th>
              <th>Status</th>
              <th>created_at</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
           <?php  showCategories($categoies)  ?>
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
            <form action="admin/category/'.$item->id.'" method="POST">
              '.csrf_field().'
              <input type="hidden" name="_method" value="DELETE">
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