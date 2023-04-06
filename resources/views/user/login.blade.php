<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HAHOUT
 </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>
html {
    height: 100%;
}
body {
    height: 100%;
}
.global-container {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f5f5f5;
}
form {
    padding-top: 10px;
    font-size: 14px;
    margin-top: 30px;
}
.card-title {
font-weight: 300;
 }
.btn {
    font-size: 14px;
    margin-top: 20px;
}
.login-form {
    width: 330px;
    margin: 20px;
}
.sign-up {
    text-align: center;
    padding: 20px 0 0;
}
.alert {
    margin-bottom: -30px;
    font-size: 13px;
    margin-top: 20px;
}
</style>
<body>


  <div class="global-container">
    <div class="card login-form">
    <div class="card-body">



        @if (session()->has('errors'))
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('errors') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <h3 class="card-title text-center"> HAHOUT </h3>
        <div class="card-text">
            <form
            action={{url('/post_login')}}
            method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1"> Enter Email address </label>
                    <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required name ="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Enter Password </label>

                    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"required name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Lgin in </button>

            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>
