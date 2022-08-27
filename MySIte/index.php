<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=" css/styles.css ">
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card ">
                <div class="d-flex justify-content-center ">
                    <!--<div class="brand_logo_container ">
                        <img src="img/muta.png " class="brand_logo " alt="Programming Knowledge logo ">
                    </div>-->
                </div>
                <div class="d-flex justify-content-center from_container">
                    <form method="POST" action="code.php">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="userID" id="username" class="from-control input-user" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="from-control input-pass" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custome-control-input" id="customControlInline">
                                <label class="custome-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt3 login-contaier">
                          <button type="submit" name="login" id="login" class="btn login_btn">login</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        don't have an account ?
                        <a href="#" class="ml-2">sign up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">forgot your password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
    </script>

</body>


 



</html>