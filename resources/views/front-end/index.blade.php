<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,  minimum-scale=1.0"">
        <title>Document</title>
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    </head>
    <body>

        <div class="title">
            <div class="container">
                <div class="col-12">
                    {{-- Splitting url so that locale can be set to url and    after redirection stays on the same page --}}
                    @php
                      $url = url()->full();
                      $pos = strpos($url, app()->getLocale());
                    @endphp
                    <a href="{{ substr_replace($url,"en",$pos,2) }}" class="btn btn-info"> English</a>
                    <a href="{{ substr_replace($url,"ar",$pos,2) }}" class="btn btn-primary"> Arabic</a>
                    </div>
                <div class="logo text-center w-50">

                    <img src="{{asset('web/imgs/logo.png')}}" alt="" class="w-100">


                </div>
            </div>
        </div>

        <div class="menu-list ">
            @foreach ($x as $index=>$category)
            <div class="menu-item">
                <div class="container">
                    <a href="{{url('catageries/show')}}/{{$category->id}}">
                        <div class="row gx-1">
                            <div class="col-9">
                                <div class="item-caption">
                                    <h3>{{$category->name_en}}</h3>
                                </div>
                            </div>
                            <div class="col-3">

                                <img src="{{ url('public/Image/'.$category->image) }}"
                                style="height: 200px; width: 150px;">

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="background-icons">
            <img src="{{asset('web/imgs/Shape 3 copy 2.svg')}}" alt="" class=" shape shape1">
            <img src="{{asset('web/imgs/2-layers (1).svg')}}" alt="" class="shape shape2">
            <img src="{{asset('web/imgs/Shape 1 copy 3.svg')}}" alt="" class=" shape shape3">
            <img src="{{asset('web/imgs/Shape 2 copy 2.svg')}}" alt="" class="shape shape4">
            <img src="{{asset('web/imgs/2-layers.svg')}}" alt="" class="shape shape5">
            <img src="{{asset('web/imgs/3-layers.svg')}}" alt="" class="shape shape6">
            <img src="{{asset('web/imgs/Shape 3 copy 2.svg')}}" alt="" class=" shape shape7">
            <img src="{{asset('web/imgs/1-layers.svg')}}" alt="" class=" shape shape8">
            <img src="{{asset('web/imgs/Shape_1_copy.svg')}}" alt="" class=" shape shape10">
            <img src="{{asset('web/imgs/Shape_1_copy.svg')}}" alt="" class=" shape shape11">
            <img src="{{asset('web/imgs/2-layers (1).svg')}}" alt="" class="shape shape12">
            <img src="{{asset('web/imgs/2-layers (1).svg')}}" alt="" class="shape shape13">
            <img src="{{asset('web/imgs/4-layers.svg')}}" alt="" class="shape shape14">
            <img src="{{asset('web/imgs/Shape 4 copy 2.svg')}}" alt="" class="shape shape15">
            <img src="{{asset('web/imgs/5-layers.svg')}}" alt="" class="shape shape16">
            <img src="{{asset('web/imgs/3-layers.svg')}}" alt="" class="shape shape17">
            <img src="{{asset('web/imgs/Shape_2_copy_2.svg')}}" alt="" class="shape shape18">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
            crossorigin="anonymous"></script>
    </body>

</html>
