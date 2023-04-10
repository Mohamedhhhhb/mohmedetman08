<!-- Content Wrapper. Contains page content -->

@extends('dashboard.layouts.app')
@section('content')
<style>

    .form-div {
      margin: 50px auto 50px;
      padding: 25px 15px 10px 15px;
      border: 4px solid #80ced7;
      border-radius: 30px;
      font-size: 1.1em;
      font-family: 'Merriweather&display=swap', serif;
    }

    .form-control:focus {
      box-shadow: none;
    }

    form p {
      font-size: .89;
    }

    .form-div.login {
      margin-top: 100px;
    }

    .logout {
      color: red;
    }

    .form-field {
      display: flex;
    }

    .form-group {
      width: 100%;
    }

    .form-group label {
      width: 120px;
      display: inline-block;
    }

    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">fzddfzsdHome</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
{{-- {{url(catageries/store)}} --}}
    <form action="{{url('catageries/update')}}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        {{ method_field('put') }}

        <div class="card-body">
            <input type="text" value="{{$i->id}}" name="id1" hidden="true">
            <input type="text" value="{{$x->id}}" name="id2" hidden="true">

            <div class="form-field">
              <div class="form-group">
                <label for="fname">Name in En</label>
                <input type="text"  value="{{$i->name_en}}" name="name_en" value="" class="form-control form-control-lg">
              </div>
              <div class="form-group">
                <label for="lname">Name in Ar</label>
                <input type="text" name="name_ar"  value="{{$x->name_ar}}" class="form-control form-control-lg">
              </div>
            </div>
            <div class="form-field">
              <div class="form-group">
                <label for="description">description in En</label>
                <input type="text" name="description_en" value="{{$i->descrptions_en}}" class="form-control form-control-lg">
              </div>
              <div class="form-group">
                <label for="description">description in Ar</label>
                <input type="text" name="description_ar" value="{{$x->descrptions_ar}}" class="form-control form-control-lg">
              </div>
            </div>
            <div class="form-field">
              <div class="form-group" style="width:80%">
                <label for="phone">Price</label>
                <input type="number" name="price" value="{{$i->price}}" class="form-control form-control-lg">
              </div>

            </div>
            <div class="form-group" style="width:80%">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control form-control-lg">
            </div>




             <div class="card-footer" style="width:50%">
               <button type="submit" class="btn btn-primary">edit</button>
             </div>
             </div>








  {{-- <div class="card-body">
    <input type="text" value="{{$i->id}}" name="id" hidden="true">

    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" value="{{$i->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Descrption</label>
        <input type="textarea"value="{{$i->descrptions}}" name="descrption" class="form-control" id="exampleInputPassword1" placeholder="Enter Descrption">
    </div>

    <div class="form-group">
        <input type="file" name="image" class="course form-control">
        </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">update</button>
  </div>--}}
</form>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
  @endsection
