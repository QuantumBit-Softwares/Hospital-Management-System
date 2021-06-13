<?php
require("db.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}





function add_location(){
    /*
    $con=mysqli_connect ("localhost", 'root', '','test');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $doctor = $_GET['doctor'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, lat, lng, doctor) " .
        " VALUES (NULL, '%s', '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$doctor));
  
  $result =  mysqli_query($con, $query);
    echo json_encode("Inserted Successfully in Database");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
*/

     $con=mysqli_connect ("localhost", 'root', '','myhmsdb');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $patient = $_GET['patient'];
    // Inserts new row with place data.

    /*
    $query = sprintf("INSERT INTO doctb WHERE username='arun'" .
        " (lat, lng) " .
        " VALUES ('%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));
        
  */
  $query = ("UPDATE patreg SET lat=$lat, lng=$lng WHERE pid='$patient'");

  $result =  mysqli_query($con, $query);
    echo json_encode("Inserted Successfully in Database");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }

}



function get_saved_locations(){
    $con=mysqli_connect ("localhost", 'root', '','myhmsdb');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select lng,lat from patreg ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>