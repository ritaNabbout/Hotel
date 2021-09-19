<?php


?>
<html>
    <head>
        <style type='text/css'> 
        body{ background-image: url(hotel2.jpg);
              position: no repeat;
             background-size: cover ;

  
        }
        input:hover{
            background:grey
        }
        .b{
            height:50px;
            width: 350px;
            font-size:12pt;
            background-color:wheat;
            
        }
        h2{color:black}
        
        .hotel{color:black;
        }
        
    </style></head>
    
    <body> 
        <form action="addbook.php" Method="GET" > 
        <table>
            
            <p style="color:wheat">
            <tr> 
                <th> <h2> <strong> Enter Your Name  </strong> </h2></th>  
                <td><input type="text" placeholder="Name" id="name" name="name" required/> </td> 
            <th> </th>
            <th> </th>
            <th> <h2> <strong>   Duration </strong> </h2> </th> 
            <td> <input type="number" placeholder="Duration" id="duration" name="duration" required/> </td> 
            </tr>
            
            <tr>
                <th> <h2> <strong>Enter Your SSN </strong> </h2> </th>
                <td> <input type="text" placeholder="SSN" id="ssn" name="ssn" required/> </td> 
                <th> </th>
                <th> </th>
             <th> <h2> <strong>Select The Room's Type </strong> </h2> </th> 
             
        <td><select name="room">
<option value="-1" placeholder="Room's Type" > </option>
            <option value="Suite Room 200$" > Suite Room 200$</option>
            <option value="Single Room 70$"> Single Room 70$</option>
            <option value= "Double Room 50$"> Double Room 50$</option>
            <option value="Triple Room 35$"> Triple Room 35$</option>
            <option value="Queen Room 150$"> Queen Room 150$ </option>
            </select> </td> </tr>
            
            <tr>
              <th> <h2> <strong>Enter Your Address </strong> </h2> </th>  
              <td> <input type="text"  placeholder="Address" id="address" name="address" required/> </td> 
             <th> </th>
             <th> </th>
             <th class="hotel"> <h2> <input type="radio" id="QR" name="QR" required value="Without Jacuzzi 0$"   /> <h4> <strong> Without Jacuzzi 0$ </strong> </h4> </h2></th> 
             <th class="hotel"> <input type="radio" id="QR" name="QR" required value="With Jacuzzi 30$" /> <h4> <strong> With Jacuzzi 30$ </strong> </h4> </th></tr>
             
         <tr>
            <th> <h2> <strong>Enter Your Phone Number </strong> </h2> </th>  
            <td> <input type="tel" placeholder="xx-xxxxxx" id="phone" name="phone"  pattern ="[0-9]{2}-[0-9]{6}" title =" You have to entered dd-dddddd"/> </td>
            <th> </th>
            <th> </th>
            <th class="hotel"> <input type="checkbox" id="food" name='food'   value="Breakfast 7$"  /> <h4> <strong> Breakfast 7$ </strong> </h4> </th> 
             <th class="hotel"> <input type="checkbox"  id="food" name='food'  value="Lunch 12$" /> <h4> <strong> Lunch 12$</strong> </h4> </th>
             <th class="hotel"> <input type="checkbox"  id="food" name='food'  value="Dinner 7$" /> <h4> <strong>  Dinner 7$</strong> </h4> </th> 
            <th> </th>
            <th> </th>
          <th> <input type="submit"  class="b" value="Reserve "/> </th></tr></tr>
         
        <tr>
            <th> <h2> <strong>Number Of Room </strong> </h2> </th>  
            <td> <input type="number" placeholder="#OfRoom" required id="nbroom" name="nbroom"/> </td> </tr>
        
         <tr>
             <th> <h2> <strong>Date of Reservation </strong> </h2> </th> 
             <td> <input type="date" min="02/1/2021"  required placeholder="Start Date" id="date" name="date"/> </td> 
           </table>
           </form>
            </body>
                       <script type="text/javascript">
   function validateform(){
var name=document.getElementById("name").value;


if(name==""){
    alert("You have to fill name")
return true;
}
else return false;


                            }
                 
                            
       
        
        
        
    </script>
        
    