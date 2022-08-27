
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
 <title>Mutah Housing System</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
 <script src="https://kit.fontawesome.com/a2c7be3264.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href=" css/req.css ">
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
                    <a class="nav-link" href="book_details.php"> تفاصيل الحجز </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">   حجز غرفة </a>
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
                <h4>السكن الداخلي لجامعة مؤتة</h4>
</div>
            <div class="d-flex justify-content-center ">
                <h5>نموذج تقديم الطالب</h5>
</div>
              
              
                <div class="d-flex justify-content-center from_container">
                    <form method="POST" action="../code.php">
                        <div class="container">
                            <div class="row">

                            <div class="row">
                                <div class="col" >
                             
                                    <div class="input-group mb-3">
<input type="text" class="form-control" name="country" id="country" required placeholder="الجنسية">
    </div>

                                </div>
                                <div class="col">
                             
                             
                             
                                    <div class="input-group mb-3">
<input type="text" class="form-control"  name="StudentName" id="StudentName"  required placeholder="اسم الطالبة">
    </div>


                                </div>
                                </div>

                                <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
<input type="text" class="form-control" name ="BirthPlace" id="BirthPlace" required placeholder="مكان الولادة">
    </div>


                                </div>
                                <div class="col">
                                   
                                   
                                   
                                    <div class="input-group mb-3">
<input type="text" class="form-control"  name ="UniNumber" id="UniNumber"  required placeholder="الرقم الجامعي ">
    </div>



                                </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
 <input type="text" class="form-control" name= "studyLevel" id="studyLevel"  required placeholder="المستوى الدراسي  ">
     </div>



                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
  <input type="text" class="form-control" name= "ID_Num" id="ID_Num"  placeholder="الرقم الوطني للطالب ">
      </div>



                                </div>
</div>
<div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
       <input type="text" class="form-control" name ="relegion" id="relegion"  required placeholder="الديانة " >
           </div>


                                </div>
                                <div class="col">

                                    <div class="input-group mb-3">
       <input type="text" class="form-control"   name= "phone" id="phone"  required  placeholder="هاتف الطالبة ">
           </div>

                                </div>
</div>
                                <div class="row">

                                <div class="col">
                                    <div class="input-group mb-3">
                     <input type="text" class="form-control"  name ="the_college" id="the_college"  required placeholder="الكلية  ">
                         </div>



                                </div>
                                <div class="col">
                             <div class="input-group mb-3">
                      <input type="text" class="form-control"  name ="Guardian_phone" id="Guardian_phone"  required placeholder="هاتف ولي الأمر ">
                          </div>

                                </div>
                            </div>
                                <div class="row">


                                <div class="col">
                                    <div class="input-group mb-3">
                          <input type="date" class="form-control"  name ="date_of_Birth" id="date_of_Birth"  required  placeholder=" تاريخ الولادة ">
                              </div>


                                </div>
                                <div class="col">
                                   
                                        <div class="input-group mb-3">
     <input type="text" class="form-control"  name ="motherphone" id="MotherPhone"  required  placeholder="هاتف الوالدة " > 
                                </div>
                                 </div>
</div>
                               <div class="row">

                                <div class="col">
                              
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"  name= "specialization" id="specialization"  required  placeholder="التخصص "  >

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                 <input type="text" class="form-control" name= "Address" id="Address"  required placeholder=" عنوان إقامة الأسرة"  
                                      </div>


                                      
                                     </div>
    
                                </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                
                                <div class="input-group mb-3">
                             <input type="text" class="form-control" name= "relation" id="relation" required  placeholder="صلة القرابة" >

                                  </div>
                                   </div>
                                
                                <div class="col">
                                   
      
                                    <div class="input-group mb-3">
   <input type="text" class="form-control" name= "jordanianfather" id="jordanianfather" class="from-control input-user" required   placeholder="اسم ولي الأمر في الأردن " >
        </div>
         </div>

                                
</div>
                            </div>
                        </div>
                  
                </div>
                    <div><p class="text-md-end">يسمح للطلبة المبيت خارج السكن لثلاثة من الاتية :(الاخ المتزوج),(الاخت المتزوجة),(الجدة والجد ان وجدوا)</div>
                    <div>
                     <table class="table table-dark table-striped"><thead>
                       </thead>
                         <tbody class="table-danger">
                          <tr>
                             <td colspan="3" class="table-active"><input type="text" name= "Phone2" id="Phone2" class="from-control input-user" required placeholder="رقم الهاتف"></td> 
                             <td><input type="text" name= "Address2" id="Address2" class="from-control input-user" required  placeholder="العنوان"</td>
                             <td><input type="text" name= "relation2" id="relation2" class="from-control input-user" required  placeholder="صلة القرابة"></td>
                             <td><input type="text" name= "name2" id="name2" class="from-control input-user" required  placeholder="الاسم"</td>
                            <th scope="row">1</th>
                          </tr>
                         <tr>
                            <td colspan="3" class="table-active"><input type="text" name= "Phone3" id="Phone3" class="from-control input-user" required  placeholder="رقم الهاتف"</td>
                            <td><input type="text" name= "Address3" id="Address3" class="from-control input-user" required  placeholder="العنوان"</td>
                            <td><input type="text" name= "relation" id="relation" class="from-control input-user" required  placeholder="صلة القرابة"></td>
                            <td><input type="text" name= "name3" id="name3" class="from-control input-user" required  placeholder="الاسم"</td>
                            <th scope="row">2</th>
                         </tr>
                           </tbody>
</table>
                    </div>
                   
                    <div class = "row"> 
                    <div>
                        <p class="text-md-end">توكيل عن ولي الامر في الاردن
                    </div> 
                              <div class="col">
                               
                                   <div class="input-group mb-3">
                                      <input type="text" class="form-control" name= "Phone4" id="Phone4" required  placeholder="رقم الهاتف" >
                                   </div>
                               </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" name= "Address4" id="Address4" required  placeholder="العنوان" >
                                    </div>
                                </div>
                               <div class="col">
                                 <div class="input-group mb-3">
                             <input type="text" class="form-control" name= "sirname2" id="sirname2" required  placeholder="اسم الوكيل" >
                                 </div>
                                    </div>

                                  </div>
                                  <div class="row">
                                      <span class="col"></span>
                                      
                                       <span class= "col">
                                  <button  type="submit" class="btn btn-primary" name="SaveRequest">حفظ البيانات</button>
</span>
</div>
</div>
</form>

                                   </div>

                     
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>
    <script type="text/javascript " src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js ">
    </script>
<script>
function NextPage() {
  location.replace("http://localhost/mysite/student/booking.php")
}
</script>
</body>

</html>