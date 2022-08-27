<?php

  session_start(); 

  $servername   = "localhost";
  $database = "mutah_housing";
$username = "root";
$password = "";




$conn = new mysqli($servername, $username, $password, $database);

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../index.php');
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

  $query = "select Student_name ,student.student_ID , building.building_char ,reservation.Expiry_date ,reservation.room_ID
   from student ,reservation, building where student.student_ID=reservation.Student_ID and
    reservation.Expiry_date> now() and student.student_ID=".$_SESSION['userID']." and reservation.building_ID=building.building_ID;";
  $results = mysqli_query($conn, $query);
  if (mysqli_num_rows($results) >= 1) {
  
    while($row = $results->fetch_assoc()) {
       $room_num = $row['room_ID'];
       $Building_char = $row['building_char'];
       $student_name = $row['Student_name'];
       $Expire_date=$row['Expiry_date'];
       
       break;
    }        }


?>
<!DOCTYPE html>
<html>

<head>
    <title>Mutah Housing</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=" css/styles.css ">
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
                <a class="dropdown-item" href="#">  الصفحة الشخصية </a>
                <a class="dropdown-item" href="../logout.php">  تسجيل الخروج </a>
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
                    <a class="nav-link" href="req.php">تعديل طلب الالتحاق </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">حجز غرفة</a>
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
                <h4>تفاصيل الحجز الخاص في الطالبة</h4>
            </div><br><br><br>
                <div class="d-flex justify-content-center from_container">


                    <div class="d-flex justify-content-center from_container">

                        <div class="container">


                            <div class="row">
                                <div class="col-sm-5">

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="Building_ID" id="Building_ID" required disabled placeholder=" رمز المبنى " value=<?php if(isset($Building_char)) {echo($Building_char); } ?>>
                                        <label for="Building_ID">رمز المبنى</label><br>  
                                   
                                    </div>

                                </div>
                                <div class="col-sm-7">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="StudentName" id="StudentName " disabled required placeholder="اسم الطالبة "  value=<?php if(isset($student_name)) {echo($student_name);}?>>
                                        <label for="StudentName">اسم الطالبة</label><br>   
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="room_number" id="room_number" required disabled placeholder="رقم الغرفة" value=<?php if(isset($room_num)){echo($room_num);}?> >
                                        <label for="room_number">رقم الغرفة</label><br>
                                   
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="input-group mb-3 ">
                                        <input type="text " class="form-control " name="Student_ID " id="Student_ID " disabled required placeholder="رقم الطالبة"   value=<?php echo($_SESSION['userID']);?>>
                                        <label for="Student_ID">رقم الطالبة</label><br>
                                  
                                    </div>
                                </div>

                            </div>





                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="Ex_Date" id="Ex_Date" required disabled placeholder="تاريخ انتهاء الحجز"  value=<?php if(isset($Expire_date)) {echo($Expire_date);}?> >
                                        <label for="Ex_Date">تاريخ انتهاء الحجز</label><br>
                                   
                                    </div>
                                </div>
                            </div>





                            <div class="d-flex justify-content-center mt3 login-contaier ">
                                <button type="button " name="button " id="Renew_reservation " class="btn login_btn ">تجديد الحجز في نفس الغرفة
                    </button>
                            </div><br><br><br>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
                <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
                </script>

</body>

</html>