<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myhmsdb";
include('func1.php');
?>



<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->
<!--FOR DOCTOR LOCATION RETRIEVAL INFORMATION TO ARRAY PHP-->



<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$patient = $_SESSION['pid'];
echo "Who is logged-in patient: ";
echo $patient;

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, lat, lng FROM doctb";
$result = $conn->query($sql);

//echo "Doctor Location details:"; echo "<br><br>";
if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array
  for ($i = 0; $i < $num; $i++){
      //defining the array name
      $doc_lat[] = $row["lat"];
      $doc_lng[] = $row["lng"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
   // echo $doc_lat[$i] . " ".  $doc_lng[$i] .  "<br />";
}

/*
        while($row = $result->fetch_assoc()) {
            echo "username: " . $row["username"]. " - lat: " . $row["lat"]. " lng" . $row["lng"];
        //echo "lat: " . $row["lat"] . " lng: " . $row["lng"];
        echo "<br>";
        }*/
}

else {
  echo "0 results";

}
//$conn->close();
?>




<script>
var spage = '<?php echo $row["lat"] ;?>';
var spage = 's';
//then
//alert (spage);

</script>

<?php 
$conn -> close();
?>



<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->
<!--FOR pATIENT LOCATION RETRIEVAL INFORMATION  TO ARRAY PHP-->


<!---asds-->
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname, lname, lat, lng FROM patreg";
$result = $conn->query($sql);
echo "<br>";
//echo "Patient  Location details:"; echo "<br><br>";
if ($result->num_rows > 0) {
  // output data of each row
   //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array
  for ($i = 0; $i < $num; $i++){
      //defining the array name
      $pat_lat[] = $row["lat"];
      $pat_lng[] = $row["lng"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
  //  echo $pat_lat[$i] . " ".  $pat_lng[$i] .  "<br />";
}



/*

        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["fname"]. " " .$row["lname"] . "- lat: " . $row["lat"]. " lng" . $row["lng"];
        //echo "lat: " . $row["lat"] . " lng: " . $row["lng"];
        echo "<br>";
        }*/
}

else {
  echo "0 results";

}
$conn->close();
?>








<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT lat, lng FROM patreg WHERE pid='$patient'";
$result = $conn->query($sql);
//defining row
$row = $result->fetch_assoc();
$pat_lat = $row["lat"];
$pat_lng = $row["lng"];
?>

<script>
var spage = '<?php echo $row["lat"] ;?>';
var spage = 's';
//then
//alert (spage);
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//Assigning php index values each to js index values each
//var doc_lat_js = <**php echo json_encode($php_array); ?>;


//var pat_lat_js = <**?php echo json_encode($pat_lat); ?>;
//var pat_lng_js = <**?php echo json_encode($pat_lng); ?>;




var pat_lat_js = "<?php echo $pat_lat; ?>";
var pat_lng_js = "<?php echo $pat_lng; ?>";

document.write("PATIEEENTTT LAT" + pat_lat_js + "<br>");
document.write("PATIEEENTTT LNG" + pat_lng_js);

var doc_lat_js = <?php echo json_encode($doc_lat); ?>;
var doc_lng_js = <?php echo json_encode($doc_lng); ?>;


document.write("<br>" + "Latitude of the Doctors: " + "<br>");
 //print the content of the array to debug
 for(let i = 0; i < doc_lat_js.length; i++){ 
    //console.log(doc_lat_js[i]);
    document.write(doc_lat_js[i]);
    document.write("<br>");
    
    }

document.write("<br>" +  "Longitude of the Doctors:" + "<br>" )
 //print the content of the array to debug
 for(let i = 0; i < doc_lng_js.length; i++){ 
    //console.log(doc_lat_js[i]);
    document.write(doc_lng_js[i]);
    document.write("<br>");
    
    }

 
</script>

<?php 
$conn -> close();
?>
<!-- dfd -->


<script>
document.write("hello1111111111111111111");
</script>


<!--TEST-->
<!--TEST-->
<!--TEST-->




<script type="text/javascript">


//pass another value refresh

//var distance = distance(51.5112139, -0.119824, 48.8567, 2.3508, 'K');



//var distance = distance(51.5112139, -0.119824, 48.8567, 2.3508, 'K');
function distance(lat1, lon1, lat2, lon2, unit) {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var radlon1 = Math.PI * lon1/180;
        var radlon2 = Math.PI * lon2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        if (unit=="K") { dist = dist * 1.609344 };
        if (unit=="N") { dist = dist * 0.8684 };
        return dist;
}

document.write("hello");
document.write("hello1");

var size = doc_lat_js.length;
document.write("<br>");
document.write(size);
var distance_km = new Array(size);






//var test;

for (var i = 0; i <= size; i++) {
    distance_km[i] = distance(doc_lat_js[i], doc_lng_js[i], pat_lat_js, pat_lng_js, 'K');
    document.write("<br>");
    document.write(distance_km[i]);
  }



</script>



<script>






//declare an array name distance
document.write("pineng");
document.write("<br>");
//for loop distance

function createVariables(){
  var distance = [];

  for (var i = 0; i <= size; i++) {
      distance[i] = distance(doc_lat_js[i], doc_lng_js[i], pat_lat_js, pat_lng_js, 'K');
  }

  return distance;
}



for(let i = 0; i < size; i++)
{ 
document.write(distance[i]);
document.write("<br>");
}




document.write("pineng");
document.write("<br>");
</script>









<!--TEST-->
<!--TEST-->
<!--TEST-->





















<!--HARVESINE-->
<!--HARVESINE-->
<!--HARVESINE-->
<!--HARVESINE-->
<!--HARVESINE-->
<!--HARVESINE-->
<!--HARVESINE-->
<script type="text/javascript">
//var distance = distance(51.5112139, -0.119824, 48.8567, 2.3508, 'K');
function distance(lat1, lon1, lat2, lon2, unit) {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var radlon1 = Math.PI * lon1/180;
        var radlon2 = Math.PI * lon2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        if (unit=="K") { dist = dist * 1.609344 };
        if (unit=="N") { dist = dist * 0.8684 };
        return dist;
}

//assigning the value
var distance = new Array();

for(let i = 0; i < doc_lng_js.length; i++)
{ 
distance[i] = distance(doc_lat_js[i], doc_lng_js[i], pat_lat_js, pat_lng_js, 'K');
document.write(distance[i]);
document.write("hello");
}

</body>
</html>
