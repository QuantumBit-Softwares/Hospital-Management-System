<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css_text_effects.css" rel="stylesheet">


<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #0000;
}
</style>

<style>
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
</head>
<body>



<div class="animate three" style="width:1600px; margin:0 auto;">
      <span>S</span><span>e</span><span>a</span><span>r</span><span>c</span><span>h</span> &nbsp;
      <span>f</span><span>o</span><span>r</span>&nbsp;
      <span>D</span><span>o</span><span>c</span><span>t</span><span>o</span><span>r</span>&nbsp;
      by wecare4u.tk



<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctor names.." title="Type in a number">

<table id="myTable">


  <tr class="header">

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
//access then display to table
    $con=mysqli_connect("localhost","root","","myhmsdb5000");
    global $con;
    //sort
    $query = "select * from doctb ORDER BY username";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
        $username = strtoupper($row['username']);
        $spec = strtoupper($row['spec']);
        $email = strtoupper($row['email']);
        $password = strtoupper($row['password']);
        $docFees = strtoupper($row['docFees']);
        $gender = strtoupper($row['gender']);
        $docContact = strtoupper($row['docContact']);
        $docAddress = strtoupper($row['docAddress']);
  
        
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
function myFunction() {

  var input, filter, table, tr, td, td1, i, txtValue, txtValue1; //declare var so it doesn't need to redeclare
  input = document.getElementById("myInput"); // search input by user (ex. one or 1)
  filter = input.value.toUpperCase(); // filtering input if string (one become ONE) and (two becomes TWO) and (aswfdf becomes ASWFDF)
  table = document.getElementById("myTable"); // reference myTable to javascript variable = table
  
  tr = table.getElementsByTagName("tr"); //assign value of tr ex. [one][1] <-- one entity

  
  
  //set to array
   txtValue = [];
   txtValue1 = [];
  
  //key is 'filter'
  
     //assigning first value to txtValue and txtValue1 AND td and td1

   	for (i = 1; i < tr.length; i++) {
  
       td = tr[i].getElementsByTagName("td")[0]; //search input by user (choose from one, two, three, four, four)

       td1 = tr[i].getElementsByTagName("td")[1];  //search input by user (choose 1, 2, 3, 4, 4)

        
        txtValue[i] = td.textContent || td.innerText; //assign txtValue to value of column 0 which is Names
        
     	//txtValue1[i] = parseInt(td1.textContent) || parseInt(td1.innerText);  //assign txtValue to value of column 0 which is Number || if on I can find names
          
          txtValue1[i] = td1.textContent || td1.innerText;  //assign txtValue to value of column 0 which is Number || if on I can find number and names
        
      }
      
    let start = 1;
  let end = tr.length-1; //5
  
  
  /**************Starting binary search *************************/

  while (start<=end) {

    var t0 = performance.now();
    
  	let middle = Math.floor((start + end) / 2); // defining the middle 
    
    if ((txtValue[middle] === filter)) { //let filter = 3 || txtValue[2] = 1 and txtValue1[2] = 2
      var t1 = performance.now();

alert("Performance time: " + (t1 - t0));
    /*
            // found the key
            tr[middle].style.display = ""; 
            tr[middle-1].style.display = "none"; 
            tr[middle-2].style.display = "none"; 
            
            tr[middle+1].style.display = "none"; 
            tr[middle+2].style.display = "none"; */
//remove the layer that is not middle
            
            
            
            //propose solution this will add to the time complexity
            //but this is an displayer use case, not necessary to be
            //a binary search responsibility
         
         
         /*
            document.write("Debugger: Value txtval:   " + txtValue[middle] + "<br>");
             document.write("Debugger: Value txtval1:   " + txtValue1[middle] + "<br>");
             
         */
         
         var tracker = 0; //0 means it is not displayed yet //1 displayed already
          
            for (var z = 1; z<=tr.length-1 ; z++){
            
            
            
                    if ( (txtValue[z] == txtValue[middle])  )

                                  { //wrong since iterator which make middle true, so we need to change middle after coming here
                                 tr[middle].style.display = ""; //display row
                                  // middle = 5654323254634563465433456898078678456456342345324256573425;
                                 
                                 

                                   } //correct close
                    //else if ( (txtValue[z] != txtValue[middle] || (txtValue1[z] != txtValue1[middle]) ) {

                    else {
                                 tr[z].style.display = "none";
                                 tr[z].style.display = "not found";
                                 } //correct close


            //else {};
            
            //propose solution this will add to the time complexity
            //but this is an displayer use case, not necessary to be
            //a binary search responsibility
            
    //}//end for if statement
    
        
          
        } //end for for loop z
            
            //document.write("<br>hi");
              
            break;
     } // end for if equivalent middle
        
        
        
     else if ((txtValue[middle] > filter) ) {
            // continue searching to the right
            
        
                //for strings different method
                 end = middle -1;
              
                                 

            
        } //end of less than
        
        
        
     else if   ((txtValue[middle] < filter) )  {
        

            //for strings different method
              start = middle + 1;
            
                
        }//end of greater than
  
  
 	 else {
    	 tr[1].style.display = "none";
         tr[2].style.display = "none";
         tr[3].style.display = "none";
         tr[4].style.display = "none";
         tr[5].style.display = "none";
    
    break;
    }


        
        
  
  } //end of while loop for binary search 
  
  
  
  
  
  
  
  /*
  
  
  
  //original
  for (i = 0; i < tr.length; i++) {
  
  
    td = tr[i].getElementsByTagName("td")[0];
     td1 = tr[i].getElementsByTagName("td")[1];
    
    
    if (td||td1) {
      txtValue = td.textContent || td.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      if ((txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue1.toUpperCase().indexOf(filter) > -1) ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }*/
 
}

</script>


</div><!--end of table -->
</body>
</html>
