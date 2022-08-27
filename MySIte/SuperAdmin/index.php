<?php
session_start(); 
$servername   = "localhost";
$database = "mutah_housing";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);
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
$query = "SELECT building_ID , building_char FROM building where building_ID=(select max(building_ID) from building);";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) == 1) {
  while($row = $results->fetch_assoc()) {
     $building_ID = ++$row['building_ID'];
     $building_char = ++$row['building_char'];

  }        
}
else{
    $building_ID = 1;
 $building_char = 'A'; 
}



?>
<!DOCTYPE html>
<html>

<head>
   <title>Mutah Housing System</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"><script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href=" css/site1.css ">
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
                <a class="dropdown-item" href="#">تعديل كلمة المرور</a>
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
                    <a class="nav-link" href="site2.php">إدارةالمشرفين</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="site3.php"> صفحة الطلاب</a>
                </li>
              
              
              
            </ul>
        </div>
    </nav>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card ">
                <div class="d-flex justify-content-center ">
                    <h4>صفحة التعديل على المباني والغرف</h4>
                </div><br><br><br><br>
                <div class="d-flex justify-content-center from_container">
                    <form method="POST" action="../code.php">
                        <div>
                            <div class="row">
                                
                                <div class="col-sm-3">
                                    <div style="margin-top: 25px;" class="d-flex justify-content-center mt3 login-contaier">
                                        <button type="submit" name="add_build" id="add_build" class="btn btn-primary">اضافة مبنى</button>
                                    </div>
                                </div>
                                

                                <div class="col-sm-9">
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="Specialization" name="Specialization" value="1">
                                  <label class="form-check-label" for="mySwitch">مبنى لطلاب غير طلاب الطب</label>
                                </div>
                                    <div class="input-group mb-3 ">
                                        <input type="text" class="form-control " name="build_char" id="build_char" required placeholder="رمز المبنى"  value=<?php echo($building_char);?>> 
                                </div>
                                <input type="hidden" class="form-control " name="building_ID" id="build_ID" required value=<?php echo($building_ID);?>>  </div>


                            </div>
                            <div class="row" style="direction:ltr;">
                            <div class=" col ">
   <div class="d-flex justify-content-center mt3 login-contaier">
       <button type="submit" name="del_build" id="del_build" class="btn btn-primary">حذف المبنى</button>
   </div>
</div>

                            <div class="col ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="admin_email" id="admin_email"  placeholder="ايميل المشرف">
                            </div>
</div>


 <div class="col"> <select class="form-select" aria-label="Default select example">
     <option selected>اسماء المشرفين</option>
     <option value="1">ريم</option>
     <option value="2">فاطمة</option>
     
   </select>
 </div>   
 <div class="col ">
     <select class="form-select" aria-label="Default select example">
     <option selected>اختر رمز المبنى</option>

     <?php
$query = "SELECT building_ID , building_char FROM building ";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) >= 1) {
  while($row = $results->fetch_assoc()) {
     $building_ID = $row['building_ID'];
     $building_char = $row['building_char'];
echo("<option value='$building_ID'>$building_char</option>");
  }}
?>
   </select>
 </div>

</div>
                        </div><br><br><br>
                        <div>
                            <div class="row">
                                <div class=" col-sm-3">
                                    <div class="d-flex justify-content-center mt3 login-contaier">
                                        <button type="submit" name="add_room" id="add_room" class="btn btn-primary">اضافة غرفة</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
    <select class="form-select" aria-label="Default select example" name="room_type">
    <option selected>اختر نوع الغرفة</option>
    <option value="1">غرفة فردية</option>
    <option value="2">غرفة زوجية</option>
    <option value="3">غرفة ثلاثية</option>
    <option value="4">غرفة رباعية</option>
  </select>
</div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="room_id" id="room_id" placeholder="رقم الغرفة"></div>
                                </div>
                            </div>
                           
                           
                           
                        </div>
                        
                        
                        <div class="row" style="direction:ltr;">
                            <div class=" col ">
   <div class="d-flex justify-content-center mt3 login-contaier">
       <button type="submit" name="del_build" id="del_build" class="btn btn-primary">حذف الغرفة</button>
   </div>
</div>
<div class="col">
<div class="input-group mb-3">
     <input type="text" class="form-control" name="student_id" id="student_id"  placeholder="رقم الطالب الجامعي">
 </div>

</div>

 <div class="col"> <select class="form-select" aria-label="Default select example">
     <option selected>اسماء الطلاب</option>
     <option value="1">أسماء</option>
     <option value="2">نور</option>
     
   </select>
 </div>   
 <div class="col ">
     <select class="form-select" aria-label="Default select example" name="room_type">
     <option selected>اختر رقم الغرفة</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
   </select>
 </div>

                        </div>
                        </div>
                        <br><br><br><br><br>
                    </form>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
                <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
                </script>

</body>

</html>