<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,  minimum-scale=1.0">
        <title>Document</title>
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('web/css/category.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
        <style>
        body {
            background-image: url("{{url('/')}}/web/imgs/31-layers.png");
            background-size: 115%;
            background-repeat: repeat-y;
            background-position-x: -30px;
        }

        @media (min-width: 576px) {
            body {
                background-size: 110%;
            }
        }
        </style>
    </head>

    <body>
        <div class="categories">

            @if (App::isLocale('en'))

            @foreach ($x as $index=>$category)
            <div class="cate-item">
                <div class="container">

                    <div class="b"
                        style="border: 1px solid rgba(51, 51, 51, 0.4); background: rgba(51, 51, 51, 0.1); margin-bottom: 40px;">

                        <h4 class="heading" style="text-align: center; text-transform: capitalize;">
                            {{$category->section->name_en}}
                        </h4>
                    </div>
                    <div class="cate-wrapper d-flex gx-4 align-items-center">
                        <div class="img-wrapper">
                            <img src="{{ url('public/Image/'.$category->image) }}">
                        </div>
                        <div class="description">
                            <h4>{{$category->name_en}}</h4>
                            <h5>{{$category->descrptions_en}}</h5>
                            <div class="div price-wrapper d-flex align-items-center">
                                <p class="mb-0 me-1">{{$category->price}}</p>
                                <i class="fa-solid fa-dollar-sign" style="color: #C2B280;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach

            @endif


            @if (App::isLocale('ar'))

            @foreach ($x as $index=>$category)
            <div class="cate-item">
                <div class="container">

                    <div class="b"
                        style="border: 1px solid rgba(51, 51, 51, 0.4); background: rgba(51, 51, 51, 0.1); margin-bottom: 40px;">

                        <h4 class=" heading" style="text-align: center;">
                            {{$category->section_ar->name_ar}}
                        </h4>
                    </div>
                    <div class="cate-wrapper d-flex gx-4 align-items-center">
                        <div class="img-wrapper">
                            <img src="{{ url('public/Image/'.$category->image) }}">
                        </div>
                        <div class="description">
                            <h4>{{$category->name_ar}}</h4>
                            <h5>{{$category->descrptions_ar}}</h5>
                            <div class="div price-wrapper d-flex align-items-center">
                                <p class="mb-0 me-1">{{$category->price}}</p>
                                <i class="fa-solid fa-dollar-sign" style="color: #C2B280;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach

            @endif

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
                crossorigin="anonymous"></script>
            </b ody>


</html>