<?php


  $servername   = "localhost";
  $database = "mutah_housing";
$username = "root";
$password = "";


//global $conn;

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  

    echo("<script>
 
    alert('Connection failed: ');
  
  </script>");
}
else{

    if (isset($_POST['login'])){
        session_start(); 


 	$password = $_POST['password'];
     
    $userID = $_POST['userID'];
    if (is_numeric($userID)){
  	$query = "SELECT * FROM student WHERE student_ID='$userID' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['userID'] = $userID;
      $_SESSION['role'] = "student" ;
  	
      
        while($row = $results->fetch_assoc()) {
           $_SESSION['name'] = $row['Student_name'];
           $_SESSION['gender'] = $row['gender'];
        }        

if($_SESSION['gender']==1):
    header('location: student/req.php');
elseif($_SESSION['gender']==0):
        echo("<script>
      alert('غير مسموح لك تسجيل الدخول ');
      window.location.href = 'index.php';
        </script>");
      //  header('location: index.php');
 
    
  endif;

}
 else {
	
       
        echo("<script>
        alert('Wrong username/password ');
        window.location.href = 'index.php';
          </script>"); 
         

          }
        
          
        }
        
    else{
        $query = "SELECT * FROM admin WHERE admin_email ='$userID' AND password ='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['userID'] = $userID;
          $_SESSION['success'] = "You are now logged in";
          
           
          while($row = $results->fetch_assoc()) {
            $_SESSION['name'] = $row['admin_name'];
            

            if($row['admin_type']==0){
              $_SESSION['role'] = "SuperAdmin";
            }
            else{
              $_SESSION['role'] = "admin";
           
            }
          } 
         
         if (  $_SESSION['role'] == "SuperAdmin"){
          echo("<script>
          alert('welcome admin');
          window.location.href = 'SuperAdmin/index.php';
            </script>"); 
         }
          else{
            echo("<script>
        
             window.location.href = 'admin/admin_site.php';

              </script>"); 
              }
         }
        else {
	
       
        echo("<script>
        alert('Wrong username/password ');
        
          </script>"); 
          }
        
       }

    }
    if (isset($_POST['SaveRequest'])){

      session_start(); 
      $sql = "UPDATE `student` SET `student_phone` = '".$_POST['phone']."', `Guardian_phone` = '".$_POST['Guardian_phone']."', `ID_NUM` = '".$_POST['ID_Num']."', `place_of_birth` = '".$_POST['BirthPlace']."', `Nationality` = '".$_POST['country']."', `Academic_level` = '".$_POST['studyLevel']."', `Parent_name` = '".$_POST['jordanianfather']."', `Family_address` = '".$_POST['Address']."', `date_of_Birth` = '".$_POST['date_of_Birth']."', `Religion` = '".$_POST['relegion']."', `the_college` = '".$_POST['the_college']."', `Specialization` = '".$_POST['specialization']."' WHERE `student_ID` = ". $_SESSION['userID'].";";

      if ($conn->query($sql) === TRUE) {
        echo("<script>
        alert('تم حفظ المعلومات');
        window.location.href = 'student/booking.php';
          </script>"); 
      } else {
        echo("<script>
        alert('خطأ في حفظ معلومات الطالب');
        
          </script>"); 
      }
    
    
    
    
    }

   if (isset($_POST['add_admin'])){
#

      $sql = "INSERT  into `admin` (`admin_ID`, `building_ID`, `admin_name`, `admin_phone`, `password`, `ID_NUM`, `admin_email`, `admin_type`) VALUES (NULL,'".$_POST['building_char']."', '".$_POST['admin_name']."','".$_POST['admin_phone'] ."','".$_POST['password']."','".$_POST['ID_Num']."','".$_POST['admin_email']."', '1');";

      if ($conn->query($sql) === TRUE) {
       echo("<script>
       window.location.href = 'SuperAdmin/site2.php';
       alert('تم اضافة المشرفة بنجاح');

         </script>"); 
     } else {
       echo("<script>
       alert('لم تتم اضافة المشرفة');
         </script>"); 
     }


    }
    if (isset($_POST['del_admin'])){

      

     // $RemoveAdmin = $conn->prepare("DELETE FROM admin WHERE admin_email = $_POST['admin_email']");
      $RemoveAdmin->execute();
      if ($conn->query($RemoveAdmin) === TRUE) {
         echo("<script>
         alert('تم حذف المشرفة بنجاح');
           </script>"); 
       } 
      else {
         echo("<script>
         alert('لم يتم خذف المشرفة');
           </script>"); 
       }
     }


    if (isset($_POST['add_student'])){

     

      $sql = "INSERT INTO `student` (`student_ID`, `Student_name`, `student_phone`, `Guardian_phone`, `gender`, `password`, `ID_NUM`, `place_of_birth`, `Nationality`, `Academic_level`, `Parent_name`, `Family_address`, `date_of_Birth`, `Religion`, `the_college`, `Specialization`) VALUES (".$_POST['student_id'].",'".$_POST['student_name']."', NULL, NULL, '1', ".$_POST['password'].", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";

      if ($conn->query($sql) === TRUE) {
        echo("<script>
        alert('تم اضافة الطالب بنجاح');
        window.location.href = 'SuperAdmin/site3.php';
          </script>"); 
      } else {
        echo("<script>
        alert('لم تتم اضافة الطالب');
        window.location.href = 'SuperAdmin/site3.php';

          </script>"); 
      }
    }
    if (isset($_POST['del_student'])){


        $RemoveStudent = $conn->prepare("DELETE FROM student WHERE student_ID = ".$_POST['student_id'].";");
        $RemoveStudent->execute();
        if ($conn->query($RemoveStudent) === TRUE) {
           echo("<script>
           alert('تم حذف الطالب بنجاح');
             </script>"); 
         } 
        else {
           echo("<script>
           alert('لم يتم حذف الطالب');
             </script>"); 
         }
       }
      if (isset($_POST['bookRoom'])){
        session_start(); 
      
        $query = "select the_college from student  where student_ID =".$_SESSION['userID'];
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) >= 1) {
          
            while($row = $results->fetch_assoc()) {
             if ($row['the_college']=="Medicine"){

                  $college = 0;

             }else
             {
                   $college = 1;

             }
            }        
          }
 	$room_type = $_POST['roomtype'];
     
  	$query = "select rm.room_ID ,rm.room_type ,rm.building_ID ,bg.building_char, count(Reservation_num),date_add(now(), INTERVAL 10 DAY) AS DateAdd from rooms rm ,building bg ,reservation rv where rm.building_ID =bg.building_ID and Specialization ='$college' and room_type='$room_type' and rv.room_ID = rm.room_ID and rv.building_ID=rm.building_ID and Expiry_date> now() group by rm.room_ID having count(Reservation_num)<rm.room_type;";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) >= 1) {
  	
        while($row = $results->fetch_assoc()) {
           $room_num = $row['room_ID'];
           $Building_char = $row['building_char'];
           $building_num = $row['building_ID'];
           $Expire_date=$row['DateAdd'];
           break;
        }        
$query="INSERT INTO `reservation` (`Reservation_num`, `building_ID`, `Student_ID`, `room_ID`, `Reservation_type`, `starting_date`, `Expiry_date`) VALUES (NULL, '$building_num', '".$_SESSION['userID']."', '$room_num', '$room_type', now(), '$Expire_date')";
if ($conn->query($query) === TRUE) {
          echo("<script>
          alert('$Expire_date علماً أنه سينتهي حجزك اذا لم تقم بالدفع بتاريخ  $room_num $Building_char  تم الحجز في الغرفة رقم');
          window.location.href = 'student/book_details.php';
            </script>");
}




 }
else{
  echo("<script>
  alert('$room_type لم يتم العثور على غرفة مطابقة للمواصفات حاول مرة أخرى');
  
  window.location.href = 'student/booking.php';
    </script>");
  //  header('location: index.php');

}

}
  if (isset($_POST['add_build'])){
    if (isset($_POST['Specialization'])){
      $spec = 1;
    }
    else{
$spec=0;
    }

    $sql = "INSERT into `building` (`building_ID`, `Specialization`, `building_char`) VALUES (".$_POST['building_ID'].",$spec,'".$_POST['build_char']."');";
    if ($conn->query($sql) === TRUE) {
      echo("<script>
      alert('تم اضافة المبنى بنجاح');
      window.location.href = 'SuperAdmin/index.php';


        </script>"); 
    } else {
      echo("<script>
      alert('لم تتم اضافة المبنى');
      window.location.href = 'SuperAdmin/index.php';

        </script>"); 
    }
  } 

  if (isset($_POST['del_build'])){
    $Removebuld = $conn->prepare("DELETE FROM building WHERE building_char = ".$_POST['build_char'].";");
    $Removebuld->execute();
    if ($conn->query($Removebuld) === TRUE) {
       echo("<script>
       alert('تم حذف المبنى بنجاح');
         </script>"); 
     } 
    else {
       echo("<script>
       alert('لم يتم حذف المبنى');
         </script>"); 
     }
   }

   if (isset($_POST['add_room'])){
    $sql = "INSERT INTO `rooms` (`room_ID`, `building_ID`, `room_type`, `Booking_price`) VALUES ('".$_POST['room_id']."', '".$_POST['']."', '".$_POST['room_type']."', '120');";
    if ($conn->query($sql) === TRUE) {
      echo("<script>
      alert('تم اضافة الغرفة بنجاح');
     window.location.href = 'SuperAdmin/index.php';

        </script>"); 
    } else {
      echo("<script>
      alert('لم تتم اضافة الغرفة');
      window.location.href = 'SuperAdmin/index.php';
        </script>"); 
    }
  } 

}

$conn->close();
?>