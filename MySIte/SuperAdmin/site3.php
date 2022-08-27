<?php

session_start(); 

if (!isset($_SESSION['role'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
if ($_SESSION['role']<> "SuperAdmin") {
  header("location: ../index.php");


}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=" css/site2.css ">
</head>

<body><nav class="navbar navbar-expand-md bg-dark navbar-dark" style="direction:rtl">
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
                <a class="dropdown-item" href="#">تعديل كلمة المرور</a>
                <a class="dropdown-item" href="../logout.php">تسجيل الخروج</a>
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
                    <a class="nav-link" href="index.php"> إدارة المباني و الغرف</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="site2.php"> إدارة المشرفين </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card ">
                <div class="d-flex justify-content-center ">
                    <h4>صفحة الادارة على الطالب</h4>
                </div><br><br>

                
                <div class="d-flex justify-content-center from_container">

                <form method="POST" action="../code.php">

                <div class="row">
          <div class="col">
         <button type="submit" class="btn btn-primary">
         <i class="fas fa-search"></i>
         </button>
         </div>
        <div class="col-sm-10">
        <div class="input-group mb-3 ">
        <input type="search" id="form1" class="form-control" placeholder="ابحث عن طالب ...">
        </div>
        </div>

        </div>

         <br>
        <br>


                    <form method="POST" action="../code.php">
                        <div>
                            <div class="row">
                                <div class=" col ">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="password" id="password" required placeholder="الرقم السري"></div>
                                </div>
                                <div class=" col ">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="student_name" id="student_name" required placeholder="اسم الطالب"></div>
                                </div>
                                <div class="col ">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="student_id" id="student_id" required placeholder="الرقم الجامعي"></div>
                                </div>
                            </div>
                            <div class="row">
                                <dir class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="starter_date" id="starter_date" disabled required placeholder="تاريخ بداية الحجز">
                                    </div>
                                </dir>

                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ex_date" id="ex_date" disabled required placeholder="تاريخ انتهاء الحجز">
                                    </div>
                                </div>
                            </div>
                        </div><br><br><br>
                        <div>
                            <div class="row">
                                <div class=" col ">
                                    <div class="d-flex justify-content-center mt3 login-contaier">
                                        <button type="submit" name="del_student" id="del_student" class="btn btn-primary">حذف طالب</button>
                                    </div>
                                </div>
                                <div class=" col ">
                                    <div class="d-flex justify-content-center mt3 login-contaier">
                                        <button type="submit" name="add_student" id="add_student" class="btn btn-primary">اضافة طالب</button>
                                    </div>
                                </div>

                                <div class=" col ">
     <div class="d-flex justify-content-center mt3 login-contaier">
         <button type="submit" name="add_student" id="add_student" class="btn btn-primary">عرض معلومات الطالب</button>
     </div>
 </div>
                            </div><br><br><br><br><br>
                    </form>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
                    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
                    </script>

</body>

</html>