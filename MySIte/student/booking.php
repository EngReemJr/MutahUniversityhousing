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

  $query = "select Student_name ,student.student_ID , building.building_char ,reservation.Expiry_date ,reservation.room_ID
  from student ,reservation, building where student.student_ID=reservation.Student_ID and
   reservation.Expiry_date> now() and student.student_ID=".$_SESSION['userID']." and reservation.building_ID=building.building_ID;";
 $results = mysqli_query($conn, $query);
 if (mysqli_num_rows($results) >= 1) {
  header("location: book_details.php");

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


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css ">
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
                <a class="dropdown-item" href="#"> الصفحة الشخصية </a>
                <a class="dropdown-item" href="#"> تسجيل الخروج </a>
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
                    <a class="nav-link" href="#">أخرى</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container h-100 ">



        <div class="d-flex justify-content-center h-100 ">
            <div class="user_card "><div class="d-flex justify-content-center ">
                <h4>صفحة الحجز</h4>
            </div><br><br><br><br>
                <div class="d-flex justify-content-center from_container ">
                    <form action="../code.php" method ="POST">

                        <div class="row ">
                            <div class="col ">
                                <div  class="input-group mb-3 "  onchange="Booking_type()">
                                    <select name="roomtype" id="room" class="selectpicker mh " data-live-search="true " style="padding-top: 12px; padding-left: 30px; ">
                                        <option data-tokens=" ">نوع الغرفة المراد حجزها</option>
                                            <option value="1">غرفة فردية</option>
                                            <option value="2">غرفة مزدوجة</option>
                                            <option value="3">غرفة لثلاثة اشخاص</option>
                                            <option value="4">غرفة رباعية</option>
                                            </select>

                                </div>
                            </div>

                            

                            <div class="col ">
                                <div class="input-group mb-3 ">
                                    <input type="text " class="form-control " name="price" id="Booking_price" disabled required placeholder=" سعر الغرفة ">

                                </div>

                            </div>
                        </div>
                    
                </div><br><br>
                <div class ="row">
</div>
                <div class=" d-flex justify-content-center mt3 login-contaier ">
                    <button type="submit" name="bookRoom" id="bookRoom" class="btn login_btn " >تاكيد الحجز</button>
                </div></form><br><br><br><br>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
    </script>
<script>
function NextPage() {
  location.replace("http://localhost/mysite/student/book_details.php")
}

var Booking_price = {};
Booking_price['1'] = ['350 JOD'];
Booking_price['2'] = ['250 JOD'];
Booking_price['3'] = ['180 JOD'];
Booking_price['4'] = ['120 JOD'];
function Booking_type() {
  /*var Booking_type = document.getElementById("room");
  var BookingType = document.getElementById("Booking_price");
  var selroom = Booking_type.options[Booking_type.selectedIndex].value;
  while (BookingType.options.length) {
    BookingType.remove(0);
  }
  var rooms = Booking_price[selroom];
  if (rooms) {
    var i;
    for (i = 0; i < room.length; i++) {
      var Room = new Option(rooms[i], i);
      BookingType.options.add(Room);
    }
  }*/
 
  var room_type = document.getElementById("room");
var BookingType = document.getElementById("Booking_price");
  var selroom = room_type.options[room_type.selectedIndex].value;
  var rooms = Booking_price[selroom];
BookingType.value = rooms;

} 


</script>
</body>

</html>




<!--<select id="room" onchange="Booking_type()"> 
  <option value="">نوع الغرفة المراد حجزها</option> 
  <option value="1">غرفة فردية</option> 
  <option value="2">غرفة مزدوجة</option> 
  <option value="3">غرفة لثلاثة اشخاص</option>
  <option value="4">غرفة رباعية</option>
</select> 

<select id="Booking_price"></select> 

<script>
var Booking_price = {};
Booking_price['1'] = ['350'];
Booking_price['2'] = ['250'];
Booking_price['3'] = ['180'];
Booking_price['4'] = ['120'];
function Booking_type() {
  var Booking_type = document.getElementById("room");
  var BookingType = document.getElementById("Booking_price");
  var selroom = Booking_type.options[Booking_type.selectedIndex].value;
  while (BookingType.options.length) {
    BookingType.remove(0);
  }
  var rooms = Booking_price[selroom];
  if (rooms) {
    var i;
    for (i = 0; i < room.length; i++) {
      var Room = new Option(rooms[i], i);
      BookingType.options.add(Room);
    }
  }
} 
</script>-->