<!DOCTYPE html>
<?php 
include('func1.php');
$con=mysqli_connect("localhost","root","","myhmsdb");
$doctor = $_SESSION['dname'];
echo $doctor;
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

  // if(isset($_GET['prescribe'])){
    
  //   $pid = $_GET['pid'];
  //   $ID = $_GET['ID'];
  //   $appdate = $_GET['appdate'];
  //   $apptime = $_GET['apptime'];
  //   $disease = $_GET['disease'];
  //   $allergy = $_GET['allergy'];
  //   $prescription = $_GET['prescription'];
  //   $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,appdate,apptime,disease,allergy,prescription) values ('$doctor',$pid,$ID,'$appdate','$apptime','$disease','$allergy','$prescription');");
  //   if($query)
  //   {
  //     echo "<script>alert('Prescribed successfully!');</script>";
  //   }
  //   else{
  //     echo "<script>alert('Unable to process your request. Try again!');</script>";
  //   }
  // }
?>




<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="Algorithm\Doctor\Oyelami_sort.js"></script>
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
 
    <link rel="stylesheet" href="css/button.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/setlocation.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3f5efb, #fc466b);
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
      <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>

  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['dname'] ?>  </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-loc" id="list-loc-list" role="tab" data-toggle="list" aria-controls="home"> Set Location</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        
              <div class="container-fluid container-fullw bg-white" >
              <div class="row">



               <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Appointments</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                      
                      <!--Apppointment list dashboard -->

                      <p class="links cl-effect-1">
                        <a href="#list-app" onclick="clickDiv('#list-app-list')">
                          Appointment List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>





                <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Set Location</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                      
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->
                      <!--location -->


                      <p class="links cl-effect-1">
                        <a href="#list-loc" onclick="clickDiv('#list-loc-list')">
                          Set latitude and longitude in Map
                        </a>
                      </p>
                    </div>
                  </div>
                </div>



                





                <div class="col-sm-4" style="left: 15%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Prescriptions</h4>
                        
                      <p class="links cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>    



             </div>
           </div>
         </div>
    


<!-- appointment list -->
<?php
//array resetter
$pid = array();
$appdate = array();

 $query = "select  pid, userStatus, doctorStatus from appointmenttb where doctor= '$doctor'; ";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name


      $pid[] = $row["pid"];
      $userStatus[] = $row["userStatus"];
      $doctorStatus[] = $row["doctorStatus"];
     // $appdate[] = $row["appdate"];

      //put the status here
      if(($row['userStatus']==1) && ($row['doctorStatus']==1))
      {
        $status[] = 1; //true 
      } else {
        $status[] = 0; //not active
      }






      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>




<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid1_js64 = new Float64Array(pid_js);


var status_js = <?php echo json_encode($status); ?>;

/*
//diagnosing
document.write("content1: " + pid1_js64);


//diagnosing
document.write("          content2: " + status_js);*/
</script>


<script>
var i = 0 ;
var j = pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pid_js_count.length;
document.getElementById("SortBystatus").onclick = Oyelami_sort(status_js,pid1_js64  ); //this is where to display

</script>
<!--<button id="SortBystatus" onclick="cocktailSort(status_js,pid1_js64 ); Display13() ">Sort By Appointment Status</button>
-->

<script>
function Display13() {
document.write("<br>");
document.write(pid1_js64);
document.write("<br>");
document.write(status_js );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(status_js );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->




<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid1_js64 = new Float64Array(pid_js);


var status_js = <?php echo json_encode($status); ?>;

</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = pid_js_count.length;
document.getElementById("SortByPID1").onclick = Oyelami_sort(pid1_js64,status_js); //this is where to display

</script>
<!--<button id="SortByPID1" onclick="cocktailSort(pid1_js64,status_js); Display14()" >Sort By Patient's ID - Appointment </button>
-->
<script>
function Display14() {
    document.write("<br>");
    document.write(pid1_js64);
    document.write("<br>");
    document.write(status_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(status_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>



    <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
    <div class="col-md-8">
                      
                      </div>
             
                      <div class = "frame">
             
                     <h2>Search by Patients:</h2>
                     <button class="custom-btn btn-5" onclick="location.href='BinarySearch/D_patient_search_name.php?pingDOCT=<?php echo $doctor ?>'" >First Name</button>
                     <button class="custom-btn btn-6" onclick="location.href='BinarySearch/D_patient_search_lname.php?pingDOCT=<?php echo $doctor ?>'" >Last Name</button>
     
                     <!--<button class="custom-btn btn-14">Read More</button>-->
                
                      </div>
                      <br><br>






    <div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn11005" class="btn btn-primary">Original Order</button>
<button id="btn115" class="btn btn-primary">Sort By Appointment Status </button>
<button id="btn225" class="btn btn-primary">Sort By Patient ID </button>
<br><br>






<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table115" style="width:100%;display:none">

            <script>
              Oyelami_sort(status_js,pid1_js64 );
              cocktailSort(status_js,pid1_js64);
  </script>
            <tr>
              <th>Patient ID</th>
              <th>Status</th>
              <th>Prescribe</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select  pid, userStatus, doctorStatus from appointmenttb where doctor= '$doctor'; ";
             
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(pid1_js64[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(status_js[counter]);
                          
                            </script>
              </td>

              <td>


              <script>
               if((status_js[counter]) == 1){
              document.write('<button class="btn btn-success">Prescibe</button>')
               }else{
                document.write('<button class="btn btn-danger">Inactive</button>')
               }
               counter++;
              
              </script>



              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table225" style="width:100%;display:none">

<script>
              Oyelami_sort(pid1_js64, status_js );
              cocktailSort(pid1_js64, status_js);
  </script>

<tr>
    <th>Patient ID</th>
    <th>Status</th>
    <th>Prescribe</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select  pid, userStatus, doctorStatus from appointmenttb where doctor= '$doctor'; ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pid1_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(status_js[counter]);
                
                  </script>
    </td>
    
    <td>

<script>
    if((status_js[counter]) == 1){
              document.write('<button class="btn btn-success">Prescibe</button>')
               }else{
                document.write('<button class="btn btn-danger">Inactive</button>')
               }
               counter++;
</script>


</td>



  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table11005" style="width:100%; ">
<tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>
                  
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    
    $query = "select * from appointmenttb where doctor = '$doctor'; ";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?php echo $row['pid'];?></td>
        <td><?php echo $row['ID'];?></td>
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['lname'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['contact'];?></td>
        <td><?php echo $row['appdate'];?></td>
        <td><?php echo $row['apptime'];?></td>
     
     
     
        <td>
    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
    {
      echo "Active";
    }
    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
    {
      echo "Cancelled by Patient";
    }

    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
    {
      echo "Cancelled by You";
    }
        ?></td>





     <td>
        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
        { ?>

          
          <a href="doctor-panel.php?ID=<?php echo $row['ID']?>&cancel=update" 
              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
          <?php } else {

                echo "Cancelled";
                } ?>
        
        </td>

        <td>

        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
        { ?>

        <a href="prescribe.php?pid=<?php echo $row['pid']?>&ID=<?php echo $row['ID']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>"
        tooltip-placement="top" tooltip="Remove" title="prescribe">
        <button class="btn btn-success">Prescibe</button></a>
        <?php } else {

            echo "-";
            } ?>
        
        </td>






      </tr></a>
    <?php } ?>

</table>


<script>
document.getElementById("btn115").addEventListener("click", function(){

  document.getElementById("table115").style.display = "block";
  document.getElementById("table225").style.display = "none";//hide
  document.getElementById("table11005").style.display = "none";//hide
});
document.getElementById("btn225").addEventListener("click", function(){
  document.getElementById("table225").style.display = "block";
  document.getElementById("table115").style.display = "none";//hide
  document.getElementById("table11005").style.display = "none";//hide
});
document.getElementById("btn11005").addEventListener("click", function(){
  document.getElementById("table11005").style.display = "block";
  document.getElementById("table115").style.display = "none";//hide
  document.getElementById("table225").style.display = "none";//hide
});
</script>







      </div>





















<script src="Algorithm\Doctor\Oyelami_sort.js"></script>

<!--list pres -->


<?php 

//array resetter
$pid = array();
$appdate = array();

 $query = "select  pid, appdate from prestb where doctor= '$doctor'; ";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name


      $pid[] = $row["pid"];
      $appdate[] = $row["appdate"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid_js64 = new Float64Array(pid_js);

var appdate_js = <?php echo json_encode($appdate); ?>;

</script>


<script>
var i = 0 ;
var j = pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pid_js_count.length;
document.getElementById("SortByPID").onclick = Oyelami_sort(pid_js64,appdate_js  ); //this is where to display

</script>
<!--<button id="SortByPID" onclick="cocktailSort(pid_js64,appdate_js ); Display11() ">Sort By Patient ID - Prescription</button>
-->
<script>
function Display11() {
document.write("<br>");
document.write(pid_js64);
document.write("<br>");
document.write(appdate_js );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(appdate_js );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->




<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid_js64 = new Float64Array(pid_js);

var appdate_js = <?php echo json_encode($appdate); ?>;

</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = pid_js_count.length;
document.getElementById("SortByAPP").onclick = Oyelami_sort(appdate_js,pid_js64); //this is where to display

</script>
<!--<button id="SortByAPP" onclick="cocktailSort(appdate_js,pid_js64); Display12()" >Sort By Patient's Appointment - Prescription </button>
-->

<script>
function Display12() {
    document.write("<br>");
    document.write(pid_js64);
    document.write("<br>");
    document.write(appdate_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(appdate_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>





      

      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">



      <div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn100" class="btn btn-primary">Original Order</button>
<button id="btn1" class="btn btn-primary">Sort By Patient ID</button>
<button id="btn2" class="btn btn-primary">Sort By Appointment Date</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table1" style="width:100%;display:none">

            <script>
              Oyelami_sort(pid_js64,appdate_js );
              cocktailSort(pid_js64,appdate_js);
  </script>
            <tr>
              <th>Patient ID</th>
              <th>Appointment Date</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select  pid, appdate from prestb where doctor= '$doctor'; ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(pid_js64[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(appdate_js[counter]);
                          counter++;
                            </script>
              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table2" style="width:100%;display:none">

<script>
              Oyelami_sort(appdate_js, pid_js64 );
              cocktailSort(appdate_js, pid_js64);
  </script>

<tr>
    <th>Patient ID</th>
    <th>Appointment Date</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select  pid, appdate from prestb where doctor= '$doctor'; ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pid_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(appdate_js[counter]);
                 counter++;
                  </script>
    </td>
  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table100" style="width:100%;">
<tr>
<th scope="col">Patient ID</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                   
                    <th scope="col">Prescribe</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select  * from prestb where doctor= '$doctor'; ";
    $result = mysqli_query($con,$query);
       
    while ($row = mysqli_fetch_array($result)){
      ?>
          <tr>
            <td><?php echo $row['pid'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['ID'];?></td>
            
            <td><?php echo $row['appdate'];?></td>
            <td><?php echo $row['apptime'];?></td>
            <td><?php echo $row['disease'];?></td>
            <td><?php echo $row['allergy'];?></td>
            <td><?php echo $row['prescription'];?></td>
        
          </tr>

    
        <?php }
        ?>
 
</div>





<script>
document.getElementById("btn1").addEventListener("click", function(){

  document.getElementById("table1").style.display = "block";
  document.getElementById("table2").style.display = "none";//hide
  document.getElementById("table100").style.display = "none";//hide
});
document.getElementById("btn2").addEventListener("click", function(){
  document.getElementById("table2").style.display = "block";
  document.getElementById("table1").style.display = "none";//hide
  document.getElementById("table100").style.display = "none";//hide
});
document.getElementById("btn100").addEventListener("click", function(){
  document.getElementById("table100").style.display = "block";
  document.getElementById("table1").style.display = "none";//hide
  document.getElementById("table2").style.display = "none";//hide
});
</script>

</div>

        <table class="table table-hover">
              </table>
      </div>















































      <div class="tab-pane fade" id="list-loc" role="tabpanel" aria-labelledby="list-loc-list">
        <table class="table table-hover">
                
  
<p> Set location </p>
<a href="setlocation.php">Click Here to set your location</a>









                </tbody>
              </table>
      </div>

































      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Patient ID</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;

                    $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prestb where doctor='$doctor';";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['ID'];?></td>
                        
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>

      </div>


      

      <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;

                    $query = "select * from appointmenttb;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['docFees'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>








     
      


      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                  <div class="col-md-4"><label>Doctor Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="doctor" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  name="dpassword" required></div><br><br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                  <div class="col-md-4"><label>Consultancy Fees:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>
                </div>
          <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
        </form>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>
