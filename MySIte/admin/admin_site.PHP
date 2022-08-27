
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
if ($_SESSION['role']<> "admin") {
  header("location: ../index.php");


}


?>




<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=" css/admin.css ">
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
                <a class="dropdown-item" href="../logout.php">تسجيل الخروج</a>
            </div>
        </li>
    </nav>



    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card ">
                <div class="d-flex justify-content-center ">
                    <h4>السكن الداخلي لجامعة مؤتة</h4>
                </div><br>
                <div class="d-flex justify-content-center ">
                    <h5>معلومات الطالبة</h5><br><br><br>
                </div>


                <div class="d-flex justify-content-center from_container">
                    
                        <div >
                            <div class="row" style="margin-bottom:5px;" >
                                <div class="col"> <select class="form-select" aria-label="Default select example">
                                <option selected>اسماء الطلاب</option>
                                <option value="1">ريميم</option>
                                <option value="2">ريم 1</option>
                                
                              </select>
                                </div>
                               
                                <div class="col">
                                <select class="form-select" aria-label="Default select example" name="room_ID">
  <option selected>اختر رقم  الغرفة</option>

                                    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  
    
    $query = "SELECT room_ID , building_char FROM rooms rm ,building bg where bg.building_Id =rm.building_ID and building_char ='".$_POST['building_char']."'";
    $results = mysqli_query($conn, $query);
      while($row = $results->fetch_assoc()) {
         $room_ID = $row['room_ID'];
    echo("<option value='$room_ID'>$room_ID</option>");
    echo("<script>alert('$room_ID')</script>");      }}
    


                                    ?>
 
   </select>
 </div>
                              
                              
                             
                                <div class="col ">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="ch">
     <select class="form-select" aria-label="Default select example" name="building_char" onchange="this.form.submit();" >
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

</form>
 </div>

                             
                               
                            </div>
                            <div>
                                <div class="row">
                              
                              
                             
                              
                                    <div class=" col ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " class="form-control " name="ex_date " id="ex_date " disabled required placeholder="تاريخ انتهاء الحجز"></div>
                                    </div>
                                    <div class="col ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " class="form-control " name="starter_date" id="starter_date " disabled required placeholder="تاريخ بداية الحجز"></div>
                                    </div>

                                    <div class="col">
         
                                    <div class="input-group mb-3">
              
                                    <input type="text" class="form-control" name="student_id" id="student_id" required  placeholder="رقم الطالبة"></div>
 
 
 
 
            </div>
                                  
                                  <div class=" d-flex justify-content-center" style="direction : rtl;align-item:center">
                                      
                                      
                                       <span >
                                  <button  type="button" class="btn btn-primary" name="showStudent">عرض معلومات الطالب</button>
</span>
</div>

                
                                </div>
                                <div><br>
                                    <h4 class="d-flex justify-content-center ">
                                        بيان عملية نقل الطالبة </h4>
                                </div><br><br>
                                <div class="row">
                                                           
                                <div class="col ">
     <select class="form-select" aria-label="Default select example" name="room_ID">
     <option selected>اختر رقم الغرفة </option>
     <option value="">1</option>
     <option value="">2</option>
     <option value="">3</option>


   </select>
 </div>   
                            
                            
                            
                            
                            
                                <div class="col ">
     <select class="form-select" aria-label="Default select example" name="building_char">
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
                                                              

                                                                 
                                    <div class="col ">
                                        <div class="input-group mb-3 ">
                                            <input type="text " class="form-control " name="student_id " id="student_id " required placeholder="رقم الطالب"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="Added amount" id="Added amount" disabled required placeholder="المبلغ المضاف"></div><br><br>
                                <div class="d-flex justify-content-center mt3 login-contaier">
                                    <button type="submit " class="btn login_btn ">تاكيد النقل</button>
                                </div>
                            </div>
                   
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
                    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
                    </script>

</body>

</html>