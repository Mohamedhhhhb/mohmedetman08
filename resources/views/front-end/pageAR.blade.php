<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,  minimum-scale=1.0">
        <title>Document</title>
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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
        <div class="title">
            <div class="container">
                <div class="logo text-center w-50">
                    <img src="{{asset('web/imgs/logo.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="menu-list ">
            @foreach ($x as $index=>$category)
            <div class="menu-item">
                <div class="container menu-item-wrapper">
                    <a href="{{url('catageries/show')}}/{{$category->id}}">
                        <div class="row gx-1">
                            <div class="col-9">
                                <div class="item-caption">
                                    <h3>{{$category->name_ar}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="item-img-wrapper">
                                    <img src="{{ url('public/Image/'.$category->image) }}" class="item-img">
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            </div>


            @endforeach
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    </body>

</html>