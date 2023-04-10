
@extends('dashboard.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('site.categories')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">@lang('site.dashboard')</a></li>
              <li class="breadcrumb-item"><a href="{{url('catageries/show')}}">@lang('site.categories')</a></li>
              <li class="breadcrumb-item active"> @lang('site.show')</li>
            </ol>
            <ul>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                </ul>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


            <!-- /.card-header -->

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>@lang('site.name')</th>
                    <th style="width: 40%">@lang('site.description')</th>

                    <th style="width: 35%">@lang('site.price')</th>
                    <th style="width: 35%">@lang('site.image')</th>
                    <th style="width: 35%">@lang('site.action')</th>

                  </tr>
                </thead>

    <tbody>
        @php
            $i = 0 ;

        @endphp
        @foreach ($x as $index=>$category)
        @php
        $i ++;

    @endphp
            <tr>
                <td>{{ $i }}</td>
                @if (App::isLocale('en'))
                <td>
                    {{ $category->name_en}}

                </td>
                <td>{{ $category->descrptions_en }}</td>
                @endif
                @if (App::isLocale('ar'))
                <td><a href="{{url('catageries')}}/{{$category->id}}">
                    {{ $category->name_ar}}
                </a>
                </td>
                <td>{{ $category->descrptions_ar}}</td>
                @endif
                <td>{{ $category->price }}</td>


                <td>
                    <img src="{{ url('public/Image/'.$category->image) }}"
                    style="height: 100px; width: 150px;">
                </td>




                <td>
                    <a href="{{url('catageries/edit')}}/{{$category->id}}">edit</a>
                    <a href="{{url('catageries/delete')}}/{{$category->id}}">delete</a>
                </td>



            </tr>

        @endforeach
        </tbody>

    </table>








</div>



  @endsection




