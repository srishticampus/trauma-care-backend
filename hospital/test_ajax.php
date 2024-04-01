<?php 
// Include the database config file 
require 'connection.php';

 $dept=$_POST["department"];

//if(!empty($_POST["semester"])){ 
    // Fetch state data based on the specific country 

    $query = " SELECT *
FROM test where department_id='$dept'"; 
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">---------Select Test---------</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Test not available</option>'; 
    } 
//}
?>