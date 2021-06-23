<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","myhmsdb");

include('newfunc.php');


if(isset($_POST['docsub']))
{
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $dgender = $_POST['dgender'];
  $docContact = $_POST['docContact'];
  $docAddress = $_POST['docAddress'];
  $query="insert into doctb(username,password,email,spec,docFees,gender)values('$doctor','$dpassword','$demail','$spec','$docFees','$dgender')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
      echo '<script>window.location.href = "http://localhost/Hospital-Management-System-master/admin-panel1.php";</script>';
  }
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];
  $query="delete from doctb where email='$demail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}


?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- for my table design -->
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.col-md-4{
  max-width:20% !important;
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

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
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
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME RECEPTIONIST </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Doctor List</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Patient List</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list"  role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list"  role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
      <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Doctor</a>
      <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">



      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script> 
                      <p class="links cl-effect-1">
                        <a href="#list-doc" onclick="clickDiv('#list-doc-list')">
                          View Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>
                      
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Appointment Details</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                          View Appointments
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-4" style="left: 13%;margin-top: 5%;">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescription List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescriptions
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">
                          Delete Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>
                        

      
                
              </div>
            </div>
      
                



<!-- Preparing the data
SQL to PHP
PHP to JAVA
-->

<script src="Algorithm\Admin\Oyelami_sort.js"></script>

<?php 
 $query = "select  username, docFees from doctb";
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
      $username[] = $row["username"];
      $docFees[] = $row["docFees"];
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
  echo "0 results";

}
$con->close();
?>






<!--Hidden Sorting Process-->
<script>
//assign to a js variable 
var doc_username_js = <?php echo json_encode($username); ?>;
var doc_username_js_l = doc_username_js.map(doc_username_js => doc_username_js.toLowerCase());
var doc_username_js_count = <?php echo json_encode($username); ?>;
var doc_docFees_js = <?php echo json_encode($docFees); ?>;
var doc_docFees_js64 = new Float64Array(doc_docFees_js);
</script>
<script>
var i = 0 ;
var j = doc_username_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doc_username_js_count.length;
document.getElementById("SortByName").onclick = Oyelami_sort(doc_username_js_l,doc_docFees_js64  ); //this is where to display

</script>
<button id="SortByName" onclick="cocktailSort(doc_username_js_l,doc_docFees_js64 ); Display() ">Sort By Name</button>

<script>
function Display() {
document.write("<br>");
document.write(doc_username_js_l);
document.write("<br>");
document.write(doc_docFees_js64 );
document.write("<br>");
document.write("Does it changed and altered the contents?: " + "<br>");
document.write(doc_docFees_js64 );
document.write("    <----------- Yes, ready for cocktail");
}
</script>





<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
var doc_username_js = <?php echo json_encode($username); ?>;
var doc_username_js_l = doc_username_js.map(doc_username_js => doc_username_js.toLowerCase());
var doc_username_js_count = <?php echo json_encode($username); ?>;
var doc_docFees_js = <?php echo json_encode($docFees); ?>;
var doc_docFees_js64 = new Float64Array(doc_docFees_js);
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doc_username_js_count.length;
document.getElementById("SortByNumber").onclick = Oyelami_sort(doc_docFees_js64,doc_username_js_l); //this is where to display

</script>
<button id="SortByNumber" onclick="cocktailSort(doc_docFees_js64,doc_username_js_l); Display1()" >Sort By Number</button>

<script>
function Display1() {
    document.write("<br>");
    document.write(doc_username_js_l);
    document.write("<br>");
    document.write(doc_docFees_js64);
    document.write("<br>");
    document.write("Does it changed and altered the contents?: " + "<br>");
    document.write(doc_docFees_js64);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>























      <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
      <div class="col-md-4">
          <label>Search by:</label>
        </div>

        <div class="col-md-8">
        <form class="form-group" action="doctorsearch.php" method="post">                            
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="spec" name="spec">Specialization</option>
                                        <option value="email" name="email">Email</option>
                                        <option value="password" name="password">Password</option>
                                        <option value="fees" name="fees">Fees</option>
                                        <option value="gender" name="gender">Gender</option>
                                        <option value="docContact" name="docContact">Contact</option>
                                        <option value="docAddress" name="docAddress">Address</option>
                                        </select>
        <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>                                
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div>
        </form>                
         </div>
         <br><br>



         <!--Sort by 
    <div class="col-md-4">
      <label>Sort by:</label>
    </div>

    <div class="col-md-8">
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="fees" name="fees">Fees</option>
                                        </select>
        <div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div>
      </form>
    </div>
    <br>-->

    <!--<input id="clickMe" type="button" value="Sort By Doctor Name" onclick="doFunction();" />
    <input id="clickMe" type="button" value="Sort By Doctor Fees" onclick="doFunction();" />-->
    <br>
<!--
    <table class="table table-hover">
          <thead>
            <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
-->







<div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn100" class="btn btn-primary">Original Order</button>
<button id="btn1" class="btn btn-primary">Sort By Doctor Name</button>
<button id="btn2" class="btn btn-primary">Sort By Fees</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table1" style="width:100%;display:none">

            <script>
              Oyelami_sort(doc_username_js_l,doc_docFees_js64 );
              cocktailSort(doc_username_js_l,doc_docFees_js64);
  </script>
            <tr>
              <th>Doctor Name</th>
              <th>Fees</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select username from doctb";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(doc_username_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(doc_docFees_js64[counter]);
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
              Oyelami_sort(doc_docFees_js64, doc_username_js_l );
              cocktailSort(doc_docFees_js64, doc_username_js_l);
  </script>

<tr>
    <th>Doctor Name</th>
    <th>Fees</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select username from doctb";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doc_username_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doc_docFees_js64[counter]);
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
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select * from doctb";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
      $username = $row['username'];
      $spec = $row['spec'];
      $email = $row['email'];
      $password = $row['password'];
      $docFees = $row['docFees'];
      $gender = $row['gender'];
      $docContact = $row['docContact'];
      $docAddress = $row['docAddress'];

      
      echo "<tr>
        <td>$username</td>
        <td>$spec</td>
        <td>$email</td>
        <td>$password</td>
        <td>$docFees</td>
        <td>$gender</td>
        <td>$docContact</td>
        <td>$docAddress</td>
      </tr>";
    }
  ?>
</table>


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



        <!--Alter later to search by 7 criteria
        
        <div class="col-md-4">
          <label>Search by:</label>
        </div>

                                    <div class="col-md-8">
                                    
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="spec" name="spec">Specialization</option>
                                        <option value="email" name="email">Email</option>
                                        <option value="password" name="password">Password</option>
                                        <option value="fees" name="fees">Fees</option>
                                        <option value="gender" name="gender">Gender</option>
                                        <option value="docContact" name="docContact">Contact</option>
                                        <option value="docAddress" name="docAddress">Address</option>
                                        </select>

                                        </div><br><br>
        <div class="col-md-10"><input type="text" name="admin-query-doc" placeholder="Enter here" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div><br>-->

    <!--Sort by 
    <div class="col-md-4"><label>Sort by:</label></div>
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <div class="col-md-8">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="fees" name="fees">Fees</option>
                                        </select>
                                        </div>
        <br><div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div></div>
      </form>
    </div>
    <br>-->



<!--Doctor List 
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>-->
                  
                <!--Displayer
                  <?php 
                    /*$con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;
                    $query = "select * from doctb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      $gender = $row['gender'];
                      $docContact = $row['docContact'];
                      $docAddress = $row['docAddress'];

                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                        <td>$gender</td>
                        <td>$docContact</td>
                        <td>$docAddress</td>
                      </tr>";
                    }*/
                  ?>
                </tbody>
              </table>
        <br>-->
      </div><!-- end of the div for doc-->
    






















  <!--patient-->  
  
<?php 
 $query = "select  fname, lname from patreg";
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
      $fname[] = $row["fname"];
      $lname[] = $row["lname"];
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
  echo "0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pat_fname_js_count = <?php echo json_encode($fname); ?>;


var pat_fname_js = <?php echo json_encode($fname); ?>;
var pat_fname_js_l = pat_fname_js.map(pat_fname_js => pat_fname_js.toLowerCase());

var pat_lname_js = <?php echo json_encode($lname); ?>;
var pat_lname_js_l = pat_lname_js.map(pat_lname_js => pat_lname_js.toLowerCase());

</script>


<script>
var i = 0 ;
var j = pat_fname_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_fname_js_count.length;
document.getElementById("SortByfname").onclick = Oyelami_sort(pat_fname_js_l,pat_lname_js_l  ); //this is where to display

</script>
<button id="SortByfname" onclick="cocktailSort(pat_fname_js_l,pat_lname_js_l ); Display2() ">Sort By First Name</button>

<script>
function Display2() {
document.write("<br>");
document.write(pat_fname_js_l);
document.write("<br>");
document.write(pat_lname_js_l );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(pat_lname_js_l );
document.write("    <----------- Yes, ready for cocktail");
}
</script>





<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pat_fname_js_count = <?php echo json_encode($fname); ?>;


var pat_fname_js = <?php echo json_encode($fname); ?>;
var pat_fname_js_l = pat_fname_js.map(pat_fname_js => pat_fname_js.toLowerCase());

var pat_lname_js = <?php echo json_encode($lname); ?>;
var pat_lname_js_l = pat_lname_js.map(pat_lname_js => pat_lname_js.toLowerCase());
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_fname_js_count.length;
document.getElementById("SortBylname").onclick = Oyelami_sort(pat_lname_js_l,pat_fname_js_l); //this is where to display

</script>
<button id="SortBylname" onclick="cocktailSort(pat_lname_js_l,pat_fname_js_l); Display3()" >Sort By Last Name</button>

<script>
function Display3() {
    document.write("<br>");
    document.write(pat_fname_js_l);
    document.write("<br>");
    document.write(pat_lname_js_l);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(pat_lname_js_l);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>
  



    <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">
<!--
       <div class="col-md-8">
      <form class="form-group" action="patientsearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
                  -->


    <div class="col-md-4">
          <label>Search by:</label>
        </div>

        <div class="col-md-8">
        <form class="form-group" action="patientsearch.php" method="post">                            
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Patient ID</option>
                                        <option value="spec" name="spec">First Name</option>
                                        <option value="email" name="email">Last Name</option>
                                        <option value="password" name="password">Gender</option>
                                        <option value="fees" name="fees">Email</option>
                                        <option value="gender" name="gender">Contact</option>
                                        <option value="docContact" name="docContact">Password</option>
                                        </select>
        <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>                                
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div>
        </form>                
         </div>
         <br><br>



         <!--Sort by
    <div class="col-md-4">
      <label>Sort by:</label>
    </div>

    <div class="col-md-8">
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">First Name</option>
                                        <option value="fees" name="fees">Last Name</option>
                                        <option value="fees" name="fees">Gender</option>
                                        <option value="fees" name="fees">Email</option>
                                        <option value="fees" name="fees">Patient ID</option>
                                        </select>
        <div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div>
      </form>
    </div> -->
    <br>


        <!--
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>

-->


<div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn1100" class="btn btn-primary">Original Order</button>
<button id="btn11" class="btn btn-primary">Sort By Patient's First Name</button>
<button id="btn22" class="btn btn-primary">Sort By Patient's Last Name</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table11" style="width:100%;display:none">

            <script>
              Oyelami_sort(pat_fname_js_l,pat_lname_js_l );
              cocktailSort(pat_fname_js_l,pat_lname_js_l);
  </script>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select fname from patreg";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(pat_fname_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(pat_lname_js_l[counter]);
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
<table id="table22" style="width:100%;display:none">

<script>
              Oyelami_sort(pat_lname_js_l, pat_fname_js_l );
              cocktailSort(pat_lname_js_l, pat_fname_js_l);
  </script>

<tr>
    <th>First Name</th>
    <th>Last Name</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select fname from patreg";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pat_fname_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pat_lname_js_l[counter]);
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
<table id="table1100" style="width:100%; ">
<tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                  
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select * from patreg";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
      $pid = $row['pid'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $email = $row['email'];
      $contact = $row['contact'];
      $password = $row['password'];
     

      
      echo "<tr>
        <td>$pid</td>
        <td>$fname</td>
        <td>$lname</td>
        <td>$gender</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$password</td>
      </tr>";
    }
  ?>
</table>


<script>
document.getElementById("btn11").addEventListener("click", function(){

  document.getElementById("table11").style.display = "block";
  document.getElementById("table22").style.display = "none";//hide
  document.getElementById("table1100").style.display = "none";//hide
});
document.getElementById("btn22").addEventListener("click", function(){
  document.getElementById("table22").style.display = "block";
  document.getElementById("table11").style.display = "none";//hide
  document.getElementById("table1100").style.display = "none";//hide
});
document.getElementById("btn1100").addEventListener("click", function(){
  document.getElementById("table1100").style.display = "block";
  document.getElementById("table11").style.display = "none";//hide
  document.getElementById("table22").style.display = "none";//hide
});
</script>



        <!--Alter later to search by 7 criteria
        
        <div class="col-md-4">
          <label>Search by:</label>
        </div>

                                    <div class="col-md-8">
                                    
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="spec" name="spec">Specialization</option>
                                        <option value="email" name="email">Email</option>
                                        <option value="password" name="password">Password</option>
                                        <option value="fees" name="fees">Fees</option>
                                        <option value="gender" name="gender">Gender</option>
                                        <option value="docContact" name="docContact">Contact</option>
                                        <option value="docAddress" name="docAddress">Address</option>
                                        </select>

                                        </div><br><br>
        <div class="col-md-10"><input type="text" name="admin-query-doc" placeholder="Enter here" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div><br>-->

    <!--Sort by 
    <div class="col-md-4"><label>Sort by:</label></div>
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <div class="col-md-8">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="fees" name="fees">Fees</option>
                                        </select>
                                        </div>
        <br><div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div></div>
      </form>
    </div>
    <br>-->



<!--Doctor List 
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>-->
                  
                <!--Displayer
                  <?php 
                    /*$con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;
                    $query = "select * from doctb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      $gender = $row['gender'];
                      $docContact = $row['docContact'];
                      $docAddress = $row['docAddress'];

                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                        <td>$gender</td>
                        <td>$docContact</td>
                        <td>$docAddress</td>
                      </tr>";
                    }*/
                  ?>
                </tbody>
              </table>
        <br>-->
      </div><!-- end of the div for doc-->
    





<!--prescription sort -->
<div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">

       <div class="col-md-8">
  
        <div class="row">
        
    
        
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Doctor</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;
                    $query = "select * from prestb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $doctor = $row['doctor'];
                      $pid = $row['pid'];
                      $ID = $row['ID'];
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $appdate = $row['appdate'];
                      $apptime = $row['apptime'];
                      $disease = $row['disease'];
                      $allergy = $row['allergy'];
                      $pres = $row['prescription'];

                      
                      echo "<tr>
                        <td>$doctor</td>
                        <td>$pid</td>
                        <td>$ID</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$appdate</td>
                        <td>$apptime</td>
                        <td>$disease</td>
                        <td>$allergy</td>
                        <td>$pres</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
        <br>
      </div>
      </div>
      </div>













<!--Appoinment Sort -->







  
<?php 
$pid = array();
$doctor = array();
 $query = "select  pid, doctor from appointmenttb";
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
      $doctor[] = $row["doctor"];
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
  echo "0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var app_pid_js_count = <?php echo json_encode($pid); ?>;


var app_pid_js = <?php echo json_encode($pid); ?>;
var app_pid_js64 = new Float64Array(app_pid_js);

var app_doctor_js = <?php echo json_encode($doctor); ?>;
var app_doctor_js_l = app_doctor_js.map(app_doctor_js => app_doctor_js.toLowerCase());

</script>


<script>
var i = 0 ;
var j = app_pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = app_pid_js_count.length;
document.getElementById("SortByappID").onclick = Oyelami_sort(app_pid_js64,app_doctor_js_l  ); //this is where to display

</script>
<button id="SortByappID" onclick="cocktailSort(app_pid_js64,app_doctor_js_l ); Display6() ">Sort By Patient ID</button>

<script>
function Display6() {
document.write("<br>");
document.write(app_pid_js64);
document.write("<br>");
document.write(app_doctor_js_l );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(app_doctor_js_l );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->




<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var app_pid_js_count = <?php echo json_encode($pid); ?>;


var app_pid_js = <?php echo json_encode($pid); ?>;
var app_pid_js64 = new Float64Array(app_pid_js);

var app_doctor_js = <?php echo json_encode($doctor); ?>;
var app_doctor_js_l = app_doctor_js.map(app_doctor_js => app_doctor_js.toLowerCase());
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = app_pid_js_count.length;
document.getElementById("SortByappDoctor").onclick = Oyelami_sort(app_doctor_js_l,app_pid_js64); //this is where to display

</script>
<button id="SortByappDoctor" onclick="cocktailSort(app_doctor_js_l,app_pid_js64); Display7()" >Sort By Patient's Doctor </button>

<script>
function Display7() {
    document.write("<br>");
    document.write(app_pid_js64);
    document.write("<br>");
    document.write(app_doctor_js_l);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(app_doctor_js_l);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>
























      <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">

         <div class="col-md-8">
      <form class="form-group" action="appsearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="app_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="app_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>




    <div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn11100" class="btn btn-primary">Original Order</button>
<button id="btn111" class="btn btn-primary">Sort By Patient ID</button>
<button id="btn222" class="btn btn-primary">Sort By Patient's Doctor</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table111" style="width:100%;display:none">

            <script>
              Oyelami_sort(app_pid_js64,app_doctor_js_l );
              cocktailSort(app_pid_js64,app_doctor_js_l);
  </script>
            <tr>
              <th>Patient PID</th>
              <th>Patient's Doctor</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select pid from appointmenttb";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(app_pid_js64[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(app_doctor_js_l[counter]);
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
<table id="table222" style="width:100%;display:none">

<script>

              Oyelami_sort(app_doctor_js_l, app_pid_js64 );
              cocktailSort(app_doctor_js_l, app_pid_js64);
  </script>

<tr>
    <th>Patient ID</th>
    <th>patient's Doctor</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select pid from appointmenttb";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(app_pid_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(app_doctor_js_l[counter]);
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
<table id="table11100" style="width:100%;display:none ">
<tr>



                    <th scope="col">Appointment ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
                  


  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select * from appointmenttb";
    $result = mysqli_query($con,$query);
        /*      
    while ($row = mysqli_fetch_array($result)){
      $pid = $row['pid'];
      $ID = $row['ID'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $email = $row['email'];
      $contact = $row['contact'];
      $doctor = $row['doctor'];
      $docFees = $row['docFees'];
      $appdate = $row['appdate'];
      $apptime = $row['apptime'];


      
      echo "<tr>
        <td>$pid</td>
        <td>$ID</td>
        <td>$fname</td>
        <td>$lname</td>
        <td>$gender</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$doctor</td>
        <td>$docFees</td>
        <td>$appdate</td>
        <td>$apptime</td>
        <td>
                    if((.$row['userStatus']==1) && (.$row['doctorStatus']==1))  
                    {
                      echo 'Active';
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo 'Cancelled by Patient';
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo 'Cancelled by Doctor';
                    }
                        </td>

      </tr>";
    }
  ?>*/
  while ($row = mysqli_fetch_array($result)){
    ?>
        <tr>
          <td><?php echo $row['ID'];?></td>
          <td><?php echo $row['pid'];?></td>
          <td><?php echo $row['fname'];?></td>
          <td><?php echo $row['lname'];?></td>
          <td><?php echo $row['gender'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['contact'];?></td>
          <td><?php echo $row['doctor'];?></td>
          <td><?php echo $row['docFees'];?></td>
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
        echo "Cancelled by Doctor";
      }
          ?></td>
        </tr>
      <?php } ?>
  </tbody>

</table>


<script>
document.getElementById("btn111").addEventListener("click", function(){

  document.getElementById("table111").style.display = "block";
  document.getElementById("table222").style.display = "none";//hide
  document.getElementById("table11100").style.display = "none";//hide
});
document.getElementById("btn222").addEventListener("click", function(){
  document.getElementById("table222").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
  document.getElementById("table11100").style.display = "none";//hide
});
document.getElementById("btn11100").addEventListener("click", function(){
  document.getElementById("table11100").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
  document.getElementById("table222").style.display = "none";//hide
});
</script>



        <br>
      </div>

<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>






      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          <div class="col-md-4"><label>Your Name:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
                                    
                                    <div class="col-md-4"><label>Contact #:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docContact" required></div><br><br>

                                    <div class="col-md-4"><label>Address:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docAddress" required></div><br><br>

                                    


                                    <div class="col-md-4"><label>Specialization:</label></div>
                                    <div class="col-md-8">
                                    <select name="special" class="form-control" id="special" required="required">
                                        <option value="head" name="spec" disabled selected>Select Specialization</option>
                                        <option value="General" name="spec">General</option>
                                        <option value="Cardiologist" name="spec">Cardiologist</option>
                                        <option value="Neurologist" name="spec">Neurologist</option>
                                        <option value="Pediatrician" name="spec">Pediatrician</option>
                                        </select>
                                        </div><br><br>
                                    <div class="col-md-4"><label>Email ID:</label></div>
                                    
                                    <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                                    <div class="col-md-4"><label>Password:</label></div>
                                    <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required></div><br><br>
                                    <div class="col-md-4"><label>Confirm Password:</label></div>

                                    <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                                    <div class="col-md-4"><label>Consultancy Fees:</label></div>

                                    <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>
                                       
                                       
                                        
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>

                                            <br>

                </div>
          <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
        </form>
      </div>






      <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                  
                </div>
          <input type="submit" name="docsub1" value="Delete Doctor" class="btn btn-primary" onclick="confirm('do you really want to delete?')">
        </form>
      </div>



       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

       <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

         <div class="col-md-8">
      <form class="form-group" action="messearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;

                    $query = "select * from contact;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['message'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>



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