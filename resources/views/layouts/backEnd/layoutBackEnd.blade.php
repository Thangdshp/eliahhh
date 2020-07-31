<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <base href="{{asset('')}}">
  <title>@yield('title_page')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/backEnd/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/backEnd/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="public/backEnd/dist/font/css.css" rel="stylesheet">
   <!-- Toastr Css -->
  <link rel="stylesheet" href="public/backEnd/plugins/toastr/toastr.min.css">
  {{-- Datatables Css --}}
  <link rel="stylesheet" href="public/backEnd/plugins/datatables/datatables.min.css">
  {{-- Style me Css --}}
  <link rel="stylesheet" href="public/backEnd/style.css">
  
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('admin')}}" class="nav-link">Home</a>
        </li>
      </ul>
  
      <!-- SEARCH FORM -->
      {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> --}}
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item f-25px">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-id-card-alt" style="border: solid 1px #00000094;padding: 3px;border-radius: 19%;"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="public/backEnd/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
          @if (Auth::user()->level==1)
            Admin
          @else
            Root Admin
          @endif
        </span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (Auth::user()->avatar!=null)
              <img class="img-circle elevation-2" src="storage/app/{{Auth::user()->avatar}}" alt="User profile picture">
            @else
              <img class="img-circle elevation-2" src="{{$avatar}}" alt="User profile picture">
            @endif
          </div>
          <div class="info">
            <a href="{{route('user.profile')}}" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-header pl-3">Statistical</li>
            <li class="nav-item has-treeview{{ Route::is('admin') ? ' menu-open' : '' }}">
              <a href="#" class="nav-link {{ Route::is('admin') ? ' active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin')}}" class="nav-link {{ Route::is('admin') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard Statistical</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Product Config</li>
            <li class="nav-item has-treeview{{ Route::is('brand.index') ? ' menu-open' : (Route::is('brand.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('brand.index') ? ' active' : (Route::is('brand.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Brand
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('brand.index')}}" class="nav-link{{ Route::is('brand.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Brand</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('brand.create')}}" class="nav-link{{ Route::is('brand.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Brand</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('category.index') ? ' menu-open' : (Route::is('category.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('category.index') ? ' active' : (Route::is('category.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Category
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link{{ Route::is('category.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('category.create')}}" class="nav-link{{ Route::is('category.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Category</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('color.index') ? ' menu-open' : (Route::is('color.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('color.index') ? ' active' : (Route::is('color.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Color
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('color.index')}}" class="nav-link{{ Route::is('color.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Color</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('color.create')}}" class="nav-link{{ Route::is('color.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Color</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('feature.index') ? ' menu-open' : (Route::is('feature.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('feature.index') ? ' active' : (Route::is('feature.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Feature
                    <i class="fas fa-angle-left right"></i>
                
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('feature.index')}}" class="nav-link{{ Route::is('feature.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Feature</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('feature.create')}}" class="nav-link{{ Route::is('feature.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Feature</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('priceSpace.index') ? ' menu-open' : (Route::is('priceSpace.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('priceSpace.index') ? ' active' : (Route::is('priceSpace.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Price Space
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('priceSpace.index')}}" class="nav-link{{ Route::is('priceSpace.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Price Space</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('priceSpace.create')}}" class="nav-link{{ Route::is('priceSpace.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Price Space</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('product.index') ? ' menu-open' : (Route::is('product.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('product.index') ? ' active' : (Route::is('product.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Product
                    <i class="fas fa-angle-left right"></i>
                  
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link{{ Route::is('product.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('product.create')}}" class="nav-link{{ Route::is('product.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Order Config</li>
            <li class="nav-item has-treeview{{ Route::is('order.indexProgress') ? ' menu-open' : (Route::is('order.indexAccept') ? ' menu-open' : (Route::is('order.indexSuccessful')? ' menu-open':(Route::is('order.indexRefuse')?' menu-open' : '')) )}}">
              <a href="#" class="nav-link{{ Route::is('order.indexProgress') ? ' active' : (Route::is('order.indexAccept') ? ' active' : (Route::is('order.indexSuccessful')? ' active':(Route::is('order.indexRefuse')?' active' : '')) )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Order
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('order.indexProgress')}}" class="nav-link{{ Route::is('order.indexProgress') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List of orders in progress</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('order.indexAccept')}}" class="nav-link{{ Route::is('order.indexAccept') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List of orders in accept</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('order.indexSuccessful')}}" class="nav-link{{ Route::is('order.indexSuccessful') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List of orders in successful</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('order.indexRefuse')}}" class="nav-link{{ Route::is('order.indexRefuse') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List of orders in refuse</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('payment.index') ? ' menu-open' : (Route::is('payment.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('payment.index') ? ' active' : (Route::is('payment.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Payment
                    <i class="fas fa-angle-left right"></i>
                
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('payment.index')}}" class="nav-link{{ Route::is('payment.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Payment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('payment.create')}}" class="nav-link{{ Route::is('payment.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Payment</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Blog Config</li>
            <li class="nav-item has-treeview{{ Route::is('categoryBlog.index') ? ' menu-open' : (Route::is('categoryBlog.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('categoryBlog.index') ? ' active' : (Route::is('categoryBlog.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Category Blog
                    <i class="fas fa-angle-left right"></i>
                   
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('categoryBlog.index')}}" class="nav-link{{ Route::is('categoryBlog.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Category Blog</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('categoryBlog.create')}}" class="nav-link{{ Route::is('categoryBlog.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Category Blog</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('blog.index') ? ' menu-open' : (Route::is('blog.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('blog.index') ? ' active' : (Route::is('blog.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Blog
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('blog.index')}}" class="nav-link{{ Route::is('blog.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Blog</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('blog.create')}}" class="nav-link{{ Route::is('blog.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Blog</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Event Config</li>
            <li class="nav-item has-treeview{{ Route::is('discountCode.index') ? ' menu-open' : (Route::is('discountCode.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('discountCode.index') ? ' active' : (Route::is('discountCode.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Discount Code
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('discountCode.index')}}" class="nav-link{{ Route::is('discountCode.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Code Sale</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('discountCode.create')}}" class="nav-link{{ Route::is('discountCode.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Discount Code</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('newLetter.index') ? ' menu-open' : (Route::is('newLetter.send') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('newLetter.index') ? ' active' : (Route::is('newLetter.send') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Email 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('newLetter.index')}}" class="nav-link{{ Route::is('newLetter.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Email</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('newLetter.send')}}" class="nav-link{{ Route::is('newLetter.send') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Send Email</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Service Config</li>
             
            <li class="nav-item has-treeview{{ Route::is('service.index') ? ' menu-open' : (Route::is('service.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('service.index') ? ' active' : (Route::is('service.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Service
                    <i class="fas fa-angle-left right"></i>
                 
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('service.index')}}" class="nav-link{{ Route::is('service.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Service</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('service.create')}}" class="nav-link{{ Route::is('service.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Service</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">User Config</li>
             
            <li class="nav-item has-treeview{{ Route::is('user.index') ? ' menu-open' : (Route::is('user.create') ? ' menu-open' : '' )}}">
              <a href="" class="nav-link{{ Route::is('user.index') ? ' active' : (Route::is('user.create') ? ' active' : '' )}}">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    User
                    <i class="fas fa-angle-left right"></i>
                 
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link{{ Route::is('user.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('user.create')}}" class="nav-link{{ Route::is('user.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">Web Config</li>
            <li class="nav-item has-treeview{{ Route::is('slideshow.index') ? ' menu-open' : (Route::is('slideshow.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('slideshow.index') ? ' active' : (Route::is('slideshow.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Slideshow
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('slideshow.index')}}" class="nav-link{{ Route::is('slideshow.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Slideshow</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('slideshow.create')}}" class="nav-link{{ Route::is('slideshow.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Slideshow</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('banner.index') ? ' menu-open' : (Route::is('banner.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('banner.index') ? ' active' : (Route::is('banner.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Banner
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link{{ Route::is('banner.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Banner</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('banner.create')}}" class="nav-link{{ Route::is('banner.create') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Banner</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview{{ Route::is('configPage.index') ? ' menu-open' : (Route::is('banner.create') ? ' menu-open' : '' )}}">
              <a href="#" class="nav-link{{ Route::is('configPage.index') ? ' active' : (Route::is('banner.create') ? ' active' : '' )}}">
                <i class="nav-icon fas fa-copy"></i>
                <p>                
                  Config Page
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('configPage.index')}}" class="nav-link{{ Route::is('configPage.index') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Config page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('configPage.addE')}}" class="nav-link{{ Route::is('configPage.addE') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Effect</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('configPage.addI')}}" class="nav-link{{ Route::is('configPage.addI') ? ' active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Info</p>
                  </a>
                </li>
              </ul>
            </li>
                 
           
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('title_form')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active">@yield('title_form')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">     
            @yield('content')
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <div class="card card-outline" style="background: inherit">
        <div class="card-body box-profile">
          <div class="text-center">
            @if (Auth::user()->avatar!=null)
              <img class="profile-user-img img-fluid img-circle" src="storage/app/{{Auth::user()->avatar}}" alt="User profile picture">
            @else
              <img class="profile-user-img img-fluid img-circle" src="{{$avatar}}" alt="User profile picture">
            @endif
          </div>

          <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

          <p class="text-muted text-center">
            @if (Auth::user()->level==1)
              ( Admin )
            @else
              ( Root Admin )
            @endif
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- Control sidebar content goes here -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview{{ Route::is('user.profile') ? ' menu-open' : (Route::is('user.profile') ? ' menu-open' : '' )}}">
          <a href="" class="nav-link {{ Route::is('user.profile') ? ' active' : (Route::is('user.profile') ? ' active' : '' )}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('user.profile')}}" class="nav-link {{ Route::is('user.profile') ? 'active active_bg' : (Route::is('user.profile') ? 'active_bg active' : '' )}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('user.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('index')}}" class="nav-link" style="padding-left: 21px;">
            <i class="fas fa-home"></i>
            <p>
              Back Website Eliah
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.getLogout')}}" class="nav-link" style="padding-left: 21px;">
            <i class="fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </aside>
    <!-- /.control-sidebar -->
  
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.3
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->
  
  <!-- REQUIRED SCRIPTS -->
  
  <!-- jQuery -->
  <script src="public/backEnd/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="public/backEnd/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="public/backEnd/dist/js/adminlte.js"></script>
  {{-- Nhúng ckeditor  --}}
  <script >
    var base_url=function(){
        return "{{url('')}}";
      }
      var akey=function(){
        return 'Yo8ra9tl6lpptFvk8UhsZ9HD';
      }
  </script>
  <script src="public/backEnd/tinymce/tinymce.min.js"></script>
  <script src="public/backEnd/tinymce/config.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="public/backEnd/plugins/chart.js/Chart.min.js"></script>
  <!-- DataTable SCRIPTS -->
  <script src="public/backEnd/plugins/datatables/datatables.min.js"></script>
  <!-- Toastr SCRIPTS -->
  <script src="public/backEnd/plugins/toastr/toastr.min.js"></script>
  {{-- Js Goi cua datatable --}}
  <script>$('#myTable').DataTable();</script>
  {{-- Hien thi lenh goi alert  --}}
  @yield('alert')
  {{-- Js va ajax me --}}
  <script src="public/backEnd/ajax/jsMe.js"></script>
  @yield('script_cus')
 
  </body>
</html>
