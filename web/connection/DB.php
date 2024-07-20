<?php
   define('HOST','localhost');
   define('PWD','');
   define('USERNAME','root');
   define('DB','notifications');
   
   $connection = mysqli_connect(HOST,USERNAME,PWD,DB);
   if($connection){
       return $connection;
   }else{
       echo "Connect problem".mysqli_connect_error();
   }

?>
     <?php
     
     $find_notifications = "SELECT * from inf where active = 1";
     $result = mysqli_query($connection,$find_notifications);
     $count_active = '';
     $notifications_data = array(); 
     $deactive_notifications_dump = array();
      while($rows = mysqli_fetch_assoc($result)){
              $count_active = mysqli_num_rows($result);
              $notifications_data[] = array(
                          "n_id" => $rows['n_id'],
                          "notifications_name"=>$rows['notifications_name'],
                          "message"=>$rows['message'],
                          "date"=>$rows['date'],
                          "heure"=>$rows['heure'],
              );
      }
      //only five specific posts
      $deactive_notifications = "SELECT * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
      $result = mysqli_query($connection,$deactive_notifications);
      while($rows = $result->fetch_assoc()){
        $deactive_notifications_dump[] = array(
                    "n_id" => $rows['n_id'],
                    "notifications_name"=>$rows['notifications_name'],
                    "message"=>$rows['message'],
                    "date"=>$rows['date'],
                    "heure"=>$rows['heure'],
        );
      }

   ?>