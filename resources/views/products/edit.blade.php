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
            <h1 class="m-0"> @lang('site.add') @lang('site.products')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">@lang('site.dashboard')</a></li>
              <li class="breadcrumb-item"><a href="#">@lang('site.products')</a></li>
              <li class="breadcrumb-item active">@lang('site.add')</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
{{-- {{url(catageries/store)}} --}}
<div class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <form action="{{url(app()->getlocale().'/products/update')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="text" value="{{$i->id}}"name="id1" hidden="true">
        <input type="text" value="{{$i1->id}}"name="id2" hidden="true">
<div class="card-body">
    <div class="form-field">
        <div class="form-group">
          <label for="fname">Name in En</label>
          <input type="text" name="name_en" value="{{$i->name_en}}" class="form-control form-control-lg">
        </div>
        <div class="form-group">
          <label for="lname">Name in Ar</label>
          <input type="text" name="name_ar" value="{{$i1->name_ar}}" class="form-control form-control-lg">
        </div>
      </div>
      <div class="form-field">
        <div class="form-group">
          <label for="description">description in En</label>
          <input type="text" name="description_en" value="{{$i->descrptions_en}}" class="form-control form-control-lg">
        </div>
        <div class="form-group">
          <label for="description">description in Ar</label>
          <input type="text" name="description_ar" value="{{$i1->descrptions_ar}}"class="form-control form-control-lg">
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
      <div class="form-group">
        <label for="inputName" class="control-label"></label>
        <select name="section" class="form-control SlectBox" onclick="console.log($(this).val())"
            onchange="console.log('change is firing')">

            <option value="" selected disabled>@lang('site.category')</option>
            @foreach ($x as $section)

<option value="{{ $section->id }}"> {{ $section->name_en}} </option>
@endforeach

</select>
</div>



<div class="card-footer">
<button type="submit" class="btn btn-primary">@lang('site.add')</button>
</div>
</form>

 </div>





</div>



</div>
  <!-- /.content-wrapper -->
  @endsection
