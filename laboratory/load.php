<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "hms");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
           $sql = "SELECT * FROM laboratory WHERE patient = '".$_POST["brand_id"]."'";
      }  
      else  
      {  
           $sql = "SELECT * FROM laboratory";
      }  
      $result = mysqli_query($connect, $sql);
      $result = mysqli_query($connect,$sql) or die("Error: " . mysqli_error($connect));  
      if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_array($result))  
      {     

      
           $output .= '<tr>';
           $output .= '<td>'.$row["urine"].'</td>';
           $output .= '<td>'.$row["blood_group"].'</td>';
           $output .= '<td>'.$row["diabetes"].'</td>';
           $output .= '<td>'.$row["malaria"].'</td>';
           $output .= '<td>'.$row["diarrhoea"].'</td>';
           $output .= '<td>'.$row["cholera"].'</td>';
           $output .= '<td>'.$row["hiv_aids"].'</td>';
           $output .= '<td>'.$row["sickle_cell"].'</td>';

           
           $output .= '</tr>';
               
      }  
      echo $output;  
     }
 }  
 ?>  