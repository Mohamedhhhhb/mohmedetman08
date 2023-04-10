@extends('dashboard.layouts.app')


@section('content')
{{--  --}}
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('site.products')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">@lang('site.dashboard')</a></li>
              <li class="breadcrumb-item"><a href="{{url('products/show')}}">@lang('site.products')</a></li>
              <li class="breadcrumb-item active">@lang('site.add')</li>
            </ol>

            <ul>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>


            <!-- /.card-header -->

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>@lang('site.name')</th>
                    <th style="width: 40%">@lang('site.description')</th>
                    <th style="width: 40%">@lang('site.price')</th>
                    <th style="width: 40%">@lang('site.image')</th>
                    <th style="width: 40%">@lang('site.category')</th>
                    <th style="width: 35%">@lang('site.action')</th>

                  </tr>
                </thead>

    <tbody>
        @php
            $i = 0 ;

        @endphp

@if (App::isLocale('ar'))
@foreach ($x as $index=>$category1)

@php
        $i ++;

    @endphp
            <tr>
                <td>{{ $i }}</td>


                <td>    {{ $category1->name_ar }} </td>
                <td>{{ $category1->descrptions_ar }}</td>


                <td>{{ $category1->price }}</td>

            <td>
                <img src="{{ url('public/Image/'.$category1->image) }}"
                style="height: 50px; width: 50px;">
            </td>


        <td>  {{ $category1->section_ar->name_ar }}</td>




                <td>

                    <a href="{{url('products/edit')}}/{{$category1->id}}">edit</a>
                    <a href="{{url('products/delete')}}/{{$category1->id}}">delete</a>
                </td>


            </tr>













@endforeach
@endif

@if (App::isLocale('en'))
@foreach ($p as $index=>$category)

@php
        $i ++;

    @endphp
            <tr>
                <td>{{ $i }}</td>


                <td>    {{ $category->name_en }} </td>
                <td>{{ $category->descrptions_en }}</td>


                <td>{{ $category->price }}</td>

            <td>
                <img src="{{ url('public/Image/'.$category->image) }}"
                style="height: 50px; width: 50px;">
            </td>


        <td>  {{ $category->section->name_en }}</td>




                <td>

                    <a href="{{url('products/edit')}}/{{$category->id}}">edit</a>
                    <a href="{{url('products/delete')}}/{{$category->id}}">delete</a>
                </td>


            </tr>













@endforeach
@endif















        {{-- @foreach ($p as $index=>$category)
        @foreach ($x as $index=>$category1)
        @php
        $i ++;

    @endphp
            <tr>
                <td>{{ $i }}</td>
                @if (App::isLocale('en'))

                <td>    {{ $category->name_en }} </td>
                <td>{{ $category->descrptions_en }}</td>
                @endif
                @if (App::isLocale('ar'))

                <td>    {{ $category1->name_ar }} </td>
                <td>{{ $category1->descrptions_ar }}</td>
                @endif

                <td>{{ $category->price }}</td>

            <td>
                <img src="{{ url('public/Image/'.$category->image) }}"
                style="height: 50px; width: 50px;">
            </td>

            @if (App::isLocale('ar'))
        <td>  {{ $category1->section_ar->name_ar }}</td>
            @endif
            @if (App::isLocale('en'))
            <td>  {{ $category->section->name_en }}</td>
                @endif
                <td>

                    <a href="{{url('products/edit')}}/{{$category->id}}">edit</a>
                    <a href="{{url('products/delete')}}/{{$category->id}}">delete</a>
                </td>


            </tr> --}}
        </tbody>

    </table>








</div>



  @endsection





