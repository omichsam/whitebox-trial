
<?php
include "../../../../connect.php";
$counter=0;
$notificationshow="not_shown";
$my_user=base64_decode($_POST['my_id']);
include("../../../functions/security.php");
//$my_userde=encrypt($my_user,$key);
$get_user=mysqli_query($con,"SELECT id FROM users WHERE email='$my_user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['id'];
//echo $User_id;
$sqlx="SELECT * FROM notifications where user_id='$User_id' and Status='new'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runx)){
     $counter=$counter+1;   
    }
    if($counter==0){
        
    }else{
      $notificationshow="";  
    }
    ?>
     <span class="<?php echo $notificationshow?> notify">&nbsp;<?php echo $counter?>&nbsp;</span></i>
     <script type="text/javascript">
         $(document).ready(function(){
              var notificationshow='<?php echo $notificationshow?>';
              if(notificationshow=="not_shown"){
                $(".notificationbtn").hide();
              }else{
              $(".notificationbtn").show();
              }
  })
 
     </script>