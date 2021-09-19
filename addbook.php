<html>
    <head> <style type='text/css'> 
            body{ background-image: url(Capture1.PNG);
            position: no repeat;
            background-size:cover} 
            table{background-color: black;
            opacity: 0.8;
            font-size: 20pt;
            margin-top: 90px;
            
        
           color: white;}
            .button{
                width: 150px;
                height: 80px;
                margin-left:1300px;
                margin-top: 70px;
               background-color:greenyellow;
               color:white;
                font-size: 40px;
                }
                p{font-size: 50pt;
                background-color: blanchedalmond;
                 width: 500px;
              font-size: 50pt;
              opacity: 0.8;
                }
                div{
              
                 font-size: 15px;
                 position:center;
                 font-style: italic;
                 color: lightgrey;
                 margin-top: 500px;
                }
        </style> </head>

    <body> <form action="addbook.php" Method="GET">
<?php
require_once 'db1.php';


if( isset($_GET['name']) && isset($_GET['ssn']) && isset($_GET['address']) && isset($_GET ['phone'])&& isset($_GET ['nbroom']) && isset($_GET ['date'])  && isset($_GET ['duration'])  ){
$n = $_GET['name'];
$s = $_GET['ssn'];
$add =$_GET['address'];
$ph =$_GET['phone'];
$nbroom=$_GET['nbroom'];
$date =$_GET['date'];
$dur=$_GET['duration'];
$r =$_GET['room'];
$qr =$_GET['QR'];
$f=$_GET['food'];


$totalCost=0;
$costF=0;
$costJ=0;
$costR=0;

if($f=='Breakfast 7$'){
    $costF+=7;
}

else if($f=='Lunch 12$'){
   $costF+=12;
}
else if($f=='Dinner 7$'){
   $costF+=7;
}


if($qr=='Without Jacuzzi 0$'){
    $costJ+=0;
}
else if($qr=='With Jacuzzi 30$'){
$costJ+=30;
}


 if($r=='Suite Room 200$'){
    $costR+=200;
  
}

else if($r=='Single Room 70$'){
    $costR+=70;
   
}

else if($r=='Double Room 50$'){
    $costR+=50;
}

else if($r=='Triple Room 35$'){
    $costR+=35;
}
else if($r=='Queen Room 150$'){
    $costR+=150;
}
$totalCost=($costF + $costJ + $costR)* $dur *$nbroom ;
if($n!=" " && $s!=" "  && $add !=" " && $ph !=" " && $date !=" " && $dur !=" " ){
    $conn = mysqli_connect("localhost","root","");
    if(!$conn)
      die("Could not connect to the server. " .mysqli_connect_error());
    $DBcon = mysqli_select_db($conn, 'project');
    if(!$DBcon)
    die("Could not find the database");
$query = "INSERT INTO booking VALUES('$n','$s','$add', '$ph','$nbroom', '$date', '$dur', '$r','$qr', '$f' ,null)";
mysqli_query($conn, $query);
     echo "<p> You have to pay ". $totalCost. "$</p>";}

else{
   $message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
    
}
     
$query = "select * from booking where SSN='$s'";
$result = mysqli_query($conn, $query);
$nofrows = mysqli_num_rows($result);
if($nofrows==0){
echo '<span style="color:wheat;">No Reservation Yet!!!</span>';
echo "<a href='booking.php'>Add a book</a>";
}

else { ?> </form>
            <form action="Welcome.html">   
        
            </form>
<table border="1" class="table">
<tr>
<th>Name</th>
 <th>SSN</th>
<th>Address</th>
<th>Phone Number</th>
<th>NbOfRoom</th>
<th>Date Of Reservation</th>
<th>Duration</th>
<th>Room's Type</th>
<th>With/Without Jaccuzi</th>
<th>Meal</th>
<th>Room's Code</th>
</tr>
<?php
for($i=0; $i<$nofrows; $i++){
$row = mysqli_fetch_assoc($result);
echo "<tr>";
echo "<td>".$row['Name']."</td>";
echo "<td>".$row['SSN']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['Phone']."</td>";
echo "<td>".$row['NbOfRoom']."</td>";
echo "<td>".$row['Date Of Reservation']."</td>";
echo "<td>".$row['Duration']."</td>";
echo "<td>".$row["Room's Type"]."</td>";
echo "<td>".$row['With/Without Jaccuzi']."</td>";
echo "<td>".$row['Meal']."</td>";
echo "<td>".$row["Room's Code"]."</td>";
$ssn= $row['SSN'];


echo "</tr>";
}
}
}
?>

</table>
    </form>
    <div>
   <button> <a href="overview.html">Home Page  </a></button>
    </div>
     </body> </html>


