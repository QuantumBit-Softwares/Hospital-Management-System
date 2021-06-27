<!DOCTYPE html>
<?php 
include('func.php');  
include('newfunc.php');
//include('distance_in_js1.php');


$con=mysqli_connect("localhost","root","","myhmsdb");


  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $gender = $_SESSION['gender'];
  $lname = $_SESSION['lname'];
  $contact = $_SESSION['contact'];

echo $pid;

if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor=$_POST['doctor'];
  $email=$_SESSION['email'];
  # $fees=$_POST['fees'];
  $docFees=$_POST['docFees'];

  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
	
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
      $check_query = mysqli_query($con,"select apptime from appointmenttb where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

        if(mysqli_num_rows($check_query)==0){
          $query=mysqli_query($con,"insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values($pid,'$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')");

          if($query)
          {
            echo "<script>alert('Your appointment successfully booked');</script>";
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }
      }
      else{
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    }
    else{
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }
  else{
      echo "<script>alert('Select a time or date in the future!');</script>";
  }
  
}

if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }





function generate_bill(){
  $con=mysqli_connect("localhost","root","","myhmsdb");
  $pid = $_SESSION['pid'];
  $output='';
  $query=mysqli_query($con,"select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prestb p inner join appointmenttb a on p.ID=a.ID and p.pid = '$pid' and p.ID = '".$_GET['ID']."'");
  while($row = mysqli_fetch_array($query)){
    $output .= '
    <label> Patient ID : </label>'.$row["pid"].'<br/><br/>
    <label> Appointment ID : </label>'.$row["ID"].'<br/><br/>
    <label> Patient Name : </label>'.$row["fname"].' '.$row["lname"].'<br/><br/>
    <label> Doctor Name : </label>'.$row["doctor"].'<br/><br/>
    <label> Appointment Date : </label>'.$row["appdate"].'<br/><br/>
    <label> Appointment Time : </label>'.$row["apptime"].'<br/><br/>
    <label> Disease : </label>'.$row["disease"].'<br/><br/>
    <label> Allergies : </label>'.$row["allergy"].'<br/><br/>
    <label> Prescription : </label>'.$row["prescription"].'<br/><br/>
    <label> Fees Paid : </label>'.$row["docFees"].'<br/>
    
    ';

  }
  
  return $output;
}


if(isset($_GET["generate_bill"])){
  require_once("TCPDF/tcpdf.php");
  $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf -> SetCreator(PDF_CREATOR);
  $obj_pdf -> SetTitle("Generate Bill");
  $obj_pdf -> SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetDefaultMonospacedFont('helvetica');
  $obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf -> SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
  $obj_pdf -> SetPrintHeader(false);
  $obj_pdf -> SetPrintFooter(false);
  $obj_pdf -> SetAutoPageBreak(TRUE, 10);
  $obj_pdf -> SetFont('helvetica','',12);
  $obj_pdf -> AddPage();

  $content = '';

  $content .= '
      <br/>
      <h2 align ="center"> Global Hospitals</h2></br>
      <h3 align ="center"> Bill</h3>
      

  ';
 
  $content .= generate_bill();
  $obj_pdf -> writeHTML($content);
  ob_end_clean();
  $obj_pdf -> Output("bill.pdf",'I');

}

function get_specs(){
  $con=mysqli_connect("localhost","root","","myhmsdb");
  $query=mysqli_query($con,"select username,spec from doctb");
  $docarray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $docarray[] = $row;
    }
    return json_encode($docarray);
}

?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="Algorithm\Patient\Oyelami_sort.js"></script>
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

    
  
    
        <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    <link rel="stylesheet" href="css/button.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

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

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $username ?> 
   </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%; margin-top: 3%">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a>
      <a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
      <a class="list-group-item list-group-item-action" href="#list-loc" id="list-loc-list" role="tab" data-toggle="list" aria-controls="home">Set Location</a>
      <a class="list-group-item list-group-item-action" href="#list-distances" id="list-distances-list" role="tab" data-toggle="list" aria-controls="home">Search Doctors Nearby</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">


      <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4" style="left: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Book My Appointment</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                      
                      <p class="links cl-effect-1">
                        <a href="#list-home" onclick="clickDiv('#list-home-list')">
                          Book Appointment
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">My Appointments</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Appointment History
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-sm-4" style="left: 20%;margin-top:5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescriptions</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                
         
         
                <div class="col-sm-4" style="left: 5% ; margin-top:5%">
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
                

                <div class="col-sm-4" style="left: 45% ; margin-top:-16%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Nearby Doctors</h4>
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
                        <a href="#list-loc" onclick="clickDiv('#list-distances-list')">
                          Search for Available Doctors Nearby
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

            </div>
          </div>







      <div class="tab-pane fade" id="list-loc" role="tabpanel" aria-labelledby="list-loc-list">
        <table class="table table-hover">
          <p> Set location </p>
            <a href="setlocation1.php">Click Here to set your location</a>
        </table>
      </div>




<?php
include('distance_in_js1.php');
?>










<!--Distances Sort -->

<?php 
//refresher

$pid = array();
$doctor = array();
 $query = "select  username from doctb";
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


    
      $doctor[] = $row["username"];
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
  echo " "; //"0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pat_doc_js_count = <?php echo json_encode($doctor); ?>;

var pat_doc_js = <?php echo json_encode($doctor); ?>;
var pat_doc_js_l = pat_doc_js.map(pat_doc_js => pat_doc_js.toLowerCase());

//put here the distances 
var pat_doc_dis_js = distance_km;
//document.write("content of distance km" +pat_doc_dis_js );
var pat_doc_dis_js64 = new Float64Array(pat_doc_dis_js);
//document.write("content of distance km64" +pat_doc_dis_js64 );



</script>


<script>
var i = 0 ;
var j = pat_doc_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_doc_js_count.length;
document.getElementById("SortBydistance").onclick = Oyelami_sort(pat_doc_dis_js64,pat_doc_js_l  ); //this is where to display

</script>
<!--<button id="SortBydistance" onclick="cocktailSort(pat_doc_dis_js64,pat_doc_js_l ); Display001() ">Sort By Nearest Distance</button>
-->

<script>
function Display001() {
document.write("<br>");
document.write(pat_doc_js_l);
document.write("<br>");
document.write(pat_doc_dis_js64 );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(pat_doc_dis_js64 );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->





<!--SEARCH FOR AVAILABLE DOCTORS DISTANCES-->
      <div class="tab-pane fade" id="list-distances" role="tabpanel" aria-labelledby="list-distances-list">
        
    

      <div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn100" class="btn btn-primary">Original Order</button>
<button id="btn1" class="btn btn-primary">Sort By Nearest Distance</button>

<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table111" style="width:100%;display:none">

            <script>
              Oyelami_sort(pat_doc_dis_js64,pat_doc_js_l );
              cocktailSort(pat_doc_dis_js64,pat_doc_js_l);
  </script>
            <tr>
              <th>Doctor Name</th>
              <th>Distance</th>
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
                            document.write(pat_doc_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(pat_doc_dis_js64[counter]);
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
<table id="table11100" style="width:100%; ">
<tr>



              <th scope="col">Doctor Name</th>
              <th scope="col">Distance</th>
              <th scope="col">Get Direction</th>
              <th scope="col">Book Now</th>
                  


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
         
        
        <td><?php echo $row['username'];?></td>
                

                 <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(distance_km[counter]);
                  document.write(" KM")
                  counter++;
                  </script>
                  </td>



                       
                       
                        <td>




                                     
                    <script type="text/javascript">
                    function redirect()
                    {
                    window.location(url);
                    }

                      var url = "https://www.google.com/maps/dir/?api=1&origin="+doc_lat_js[counterplus]+","+doc_lng_js[counterplus]+"&destination="+pat_lat_js+","+pat_lng_js; 
                      //var url = doc_lat_js[counterplus]+","+doc_lng_js[counterplus];
                      //document.write( url);
                      counterplus = counterplus + 1;
                      document.write('<a href="' + url + '">Get Direction</a>');
                    </script>
                 <!--  <a href="#"> <button class="btn btn-success">Success</button><a href="#">
                        Get direction MAP BOX API
                    <form action="javascript:window.location.href=(url);" method="POST"   >
                    <input type = "submit" onclick="redirect()" class = "btn btn-success" value="Get Direction" /> -->
                        </td>

                        </form>
              

<td>
<form action="landing/index.html", target = "_blank" >

    <input type = "submit"  class = "btn btn-success" value="Book Now" /> 
</form>
</td>


        </tr>
      <?php } ?>
  </tbody>

</table>


<script>
document.getElementById("btn1").addEventListener("click", function(){

  document.getElementById("table111").style.display = "block";
  //document.getElementById("table222").style.display = "none";//hide
  document.getElementById("table11100").style.display = "none";//hide
});

document.getElementById("btn100").addEventListener("click", function(){
  document.getElementById("table11100").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
 // document.getElementById("table222").style.display = "none";//hide
});
</script>



        <br>
      </div>
  
      
      
      
      
      
      
      
      










      
      
      
      
      
      
      
























      <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="admin-panel.php">
                <div class="row">
                  
                  <!-- <?php

                        $con=mysqli_connect("localhost","root","","myhmsdb");
                        $query=mysqli_query($con,"select username,spec from doctb");
                        $docarray = array();
                          while($row =mysqli_fetch_assoc($query))
                          {
                              $docarray[] = $row;
                          }
                          echo json_encode($docarray);

                  ?> -->
        

                    <div class="col-md-4">
                          <label for="spec">Specialization:</label>
                        </div>
                        <div class="col-md-8">
                          <select name="spec" class="form-control" id="spec">
                              <option value="" disabled selected>Select Specialization</option>
                              <?php 
                              display_specs();
                              ?>
                          </select>
                        </div>

                        <br><br>

                        <script>
                      document.getElementById('spec').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctor').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>

              <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                <div class="col-md-8">
                    <select name="doctor" class="form-control" id="doctor" required="required">
                      <option value="" disabled selected>Select Doctor</option>
                
                      <?php display_docs(); ?>
                    </select>
                  </div><br/><br/> 


                        <script>
              document.getElementById('doctor').onchange = function updateFees(e) {
                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                document.getElementById('docFees').value = selection;
              };
            </script>

                  
                  

                  
                        <!-- <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                                <div class="col-md-8">
                                    <select name="doctor" class="form-control" id="doctor1" required="required">
                                      <option value="" disabled selected>Select Doctor</option>
                                      
                                    </select>
                                </div>
                                <br><br> -->

                                <!-- <script>
                                  document.getElementById("spec").onchange = function updateSpecs(event) {
                                      var selected = document.querySelector(`[data-value=${this.value}]`).getAttribute("value");
                                      console.log(selected);

                                      var options = document.getElementById("doctor1").querySelectorAll("option");

                                      for (i = 0; i < options.length; i++) {
                                        var currentOption = options[i];
                                        var category = options[i].getAttribute("data-spec");

                                        if (category == selected) {
                                          currentOption.style.display = "block";
                                        } else {
                                          currentOption.style.display = "none";
                                        }
                                      }
                                    }
                                </script> -->

                        
                    <!-- <script>
                    let data = 
                
              document.getElementById('spec').onchange = function updateSpecs(e) {
                let values = data.filter(obj => obj.spec == this.value).map(o => o.username);   
                document.getElementById('doctor1').value = document.querySelector(`[value=${values}]`).getAttribute('data-value');
              };
            </script> -->


                  
                  <div class="col-md-4"><label for="consultancyfees">
                                Consultancy Fees
                              </label></div>
                              <div class="col-md-8">
                              <!-- <div id="docFees">Select a doctor</div> -->
                              <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly"/>
                  </div><br><br>

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-8">
                    <!-- <input type="time" class="form-control" name="apptime"> -->
                    <select name="apptime" class="form-control" id="apptime" required="required">
                      <option value="" disabled selected>Select Time</option>
                      <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
                    </select>

                  </div><br><br>

                  <div class="col-md-4">
                    <input type="submit" name="app-submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      





























<!-- appointment list -->
<?php
//array resetter
$pid = array();
$appdate = array();
$doctor = array ();

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];

$con=mysqli_connect("localhost","root","","myhmsdb");
global $con;

$query = "select * from appointmenttb where fname ='$fname' and lname='$lname';";
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


      $doctor[] = $row["doctor"];
      
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
  echo " "; //"0 results";

}
$con->close();
?>




<!--Hidden Sorting Process-->
<script>



//assign to a js variable 

//main counter
var doctor_js_count = <?php echo json_encode($doctor); ?>;


var doctor_js = <?php echo json_encode($doctor); ?>;
var doctor_js_l = doctor_js.map(doctor_js => doctor_js.toLowerCase());
//document.write(doctor_js_l);
//document.write("<br> size of doctor name" + doctor_js_l.length + "<br>")


var status_js = <?php echo json_encode($status); ?>;
//document.write(status_js);
//document.write("<br> size of status" + status_js.length + "<br>")
/*
//diagnosing
document.write("content1: " + pid1_js64);


//diagnosing
document.write("          content2: " + status_js);*/
</script>


<script>
var i = 0 ;
var j = doctor_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doctor_js_count.length;
document.getElementById("SortBystatus").onclick = Oyelami_sort(status_js,doctor_js_l  ); //this is where to display

</script>

<!--
<button id="SortBystatus" onclick="cocktailSort(status_js,doctor_js_l ); Display13() ">Sort By Appointment Status</button>-->


<script>
function Display13() {
document.write("<br>");
document.write(doctor_js_l);
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
var doctor_js_count = <?php echo json_encode($doctor); ?>;


var doctor_js = <?php echo json_encode($doctor); ?>;
var doctor_js_l = doctor_js.map(doctor_js => doctor_js.toLowerCase());



var status_js = <?php echo json_encode($status); ?>;
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = doctor_js_count.length;
document.getElementById("SortByPID1").onclick = Oyelami_sort(doctor_js_l,status_js); //this is where to display

</script>
<!--<button id="SortByPID1" onclick="cocktailSort(doctor_js_l,status_js); Display14()" >Sort By Doctor's Name</button>
-->
<script>
function Display14() {
    document.write("<br>");
    document.write(doctor_js_l);
    document.write("<br>");
    document.write(status_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(status_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>














 <!--app history -->     
<div class="tab-pane fade" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
 

<div class="col-md-8">
                      
                      </div>
             
                      <div class = "frame">
             
                     <h2>Search by Doctor:</h2>
                     <button class="custom-btn btn-2" onclick="location.href='BinarySearch/P_doct_search_name.php?pingFPAT=<?php echo $fname ?>&pingLPAT=<?php echo $lname ?>'" >Name</button>
                     
           
                     <!--<button class="custom-btn btn-14">Read More</button>-->
                
                      </div>
                      <br><br>


<div class='title'>
<h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1>
</div>

<button id="btn1100" class="btn btn-primary">Original Order</button>
<button id="btn11" class="btn btn-primary">Sort by Appointment Status</button>
<button id="btn22" class="btn btn-primary">Sort by Doctor Name </button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>



<table id="table11" style="width:100%;display:none">

            <script>
              Oyelami_sort(status_js,doctor_js_l );
              cocktailSort(status_js,doctor_js_l);
  </script>
            <tr>
              <th>Doctor Name</th>
              <th>Appointment Status</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","myhmsdb");
              global $con;
              $query = "select * from appointmenttb where fname ='$fname' and lname='$lname';";
              //$query = "select  pid, appdate from prestb where doctor= '$doctor'; ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(doctor_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(status_js[counter]);
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
     
              Oyelami_sort(doctor_js_l, status );
              cocktailSort(doctor_js_l, status);
  </script>

<tr>
    <th>Doctor Name</th>
    <th>Appointment Status</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select * from appointmenttb where fname ='$fname' and lname='$lname';";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doctor_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(status_js[counter]);
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
<table id="table1100" style="width:100%;">
<tr>


                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","myhmsdb");
    global $con;
    $query = "select * from appointmenttb where fname ='$fname' and lname='$lname';";
    $result = mysqli_query($con,$query);
       
    

          while ($row = mysqli_fetch_array($result)){
              
              ?>
                  <tr>
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
                  echo "Cancelled by You";
                }

                if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                {
                  echo "Cancelled by Doctor";
                }
                    ?></td>

                    <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    { ?>

                      
                      <a href="admin-panel.php?ID=<?php echo $row['ID']?>&cancel=update" 
                          onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                          title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php } else {

                            echo "Cancelled";
                            } ?>
                    
                    </td>


          </tr>

    
        <?php }
        ?>
 
</div>





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

</div>

        <table class="table table-hover">
              </table>
      </div>























      

      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>


                    <th scope="col">Diseases</th>
                    <th scope="col">Allergies</th>
                    <th scope="col">Prescriptions</th>
                    <th scope="col">Bill Payment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","myhmsdb");
                    global $con;
                    $pid = $_SESSION['pid'];       
                      
                    //$query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prestb where pid='$pid';";
                    $query = "select * from prestb where pid = '$pid';";
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>

                        
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                        <td>
                          <form method="get">
                          <!-- <a href="admin-panel.php?ID=" 
                              onClick=""
                              title="Pay Bill" tooltip-placement="top" tooltip="Remove"><button class="btn btn-success">Pay</button>
                              </a></td> -->

                              <a href="admin-panel.php?ID=<?php echo $row['ID']?>">
                              <input type ="hidden" name="ID" value="<?php echo $row['ID']?>"/>
                              <input type = "submit" onclick="alert('Bill Paid Successfully');" name ="generate_bill" class = "btn btn-success" value="Pay Bill"/>
                              </a>
                              </td>
                              </form>

                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
        <br>
      </div>







      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="func.php">
          <label>Doctors name: </label>
          <input type="text" name="name" placeholder="Enter doctors name" class="form-control">
          <br>
          <input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
   </script>



  </body>
</html>
