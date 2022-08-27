<?php

  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
  if ($_SESSION['role']<> "student") {
	header("location: ../index.php");
  }
  if($_SESSION['gender']==0){
    echo("<script>
  window.location.href = '../index.php'
    </script>");
  //  header('location: index.php');


  }


?>


<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=" css/styles.css ">
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="direction:rtl">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="../images/pesronlogo.ico" alt="Logo" style="width:40px;">
        </a>
        <li class="nav-item dropdown">

        <?php

echo("<a class='dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='text-decoration: none;'>". $_SESSION['name'] ."</a>");
?>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">الصفحة الشخصية</a>
                <a class="dropdown-item" href="#">تسجيل الخروج</a>
            </div>
        </li>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="req.php"> تعديل طلب الالتحاق </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">   حجز غرفة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book_details.php">   تفاصيل الحجز</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">أخرى</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card ">
            <div class="d-flex justify-content-center ">
                  <h4> سداد رسوم الحجز</h4>
            </div><br><br><br><br>

                <div class="d-flex justify-content-center from_container">


                    <div class="d-flex justify-content-center from_container">
                        <form>
                            <div class="container">


                                <div class="row">
                                    <div class="col">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="price" id="price" required disabled placeholder="المبلغ المستحق ">
                                        </div>

                                    </div>
                                    <div class="col ">
                                        <select class="form-select" aria-label="Default select example">
                                        <option selected>اختر طريقة الدفع</option>
                                        <option value="1">الدفع الإلكتروني</option>
                                        <option value="2">الدفع عن طريق البنك</option>
                                        
                                      </select>



                                    </div>
                                </div>












                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="payment_date" id="payment_date" required disabled placeholder=" تاريخ الدفع">
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " class="form-control " name="bill_num" id="bill_num"  required placeholder="رقم الفاتورة">
                                        </div>
                                    </div>

                                </div>






                                <div class="d-flex justify-content-center mt3 login-contaier ">
                                    <button type="button " name="button" id="confirm_payment " class="btn login_btn " onclick="NextPage();">تأكيد عملية الدفع
                               </button>
                                </div><br><br><br><br>
                            </div>

                        </form>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
                <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
                </script>
<script>
function NextPage() {
  location.replace("http://localhost/mysite/student/book_details.php")
}
</script>
</body>

</html>