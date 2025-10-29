<?php
include "../../../../../connect.php";
$counter=0;

$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units where status='active'");
$Modules = mysqli_num_rows($Modulesd);
 $sqlx="SELECT * FROM e_learning_users";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=mysqli_real_escape_string($con,$row['id']);
 $name=mysqli_real_escape_string($con,$row['first_name'])." ".mysqli_real_escape_string($con,$row['Last_name']);
$Gender=mysqli_real_escape_string($con,$row['Gender']);
$phone=mysqli_real_escape_string($con,$row['phone']);
$email=mysqli_real_escape_string($con,$row['email']);
$not_scored="";
 
$checkprct=mysqli_query($con,"SELECT * FROM curriculum_practicles WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkprct)>0){
    
$videosource="videoplayer";
//$videosource="<i class='fa fa-television fa-3x' style='text-align:center'><i class='fa fa-youtube-play fa-1x'></i></i>";
$vid="found";
$practicle1="submited";
  }else{
   $videosource="";
   $vid="";
   $practicle1="";
  }

  for($p=1;$p<=$Modules;$p++){


   


    $get_user=mysqli_query($con,"SELECT covarege FROM curriculum_courses_coverage WHERE user_id='$user_id' AND unit_id='$p'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
   ${'module'.$p}=$get['covarege'];
  }else{
 ${'module'.$p}="";

}
  

}
//echo ${'module'.$p};

if( $module1 ||  $module2 ||  $module3 ||  $module4 ||  $module5 ||  $module6 ||  $module7){
 $pages=mysqli_query($con,"SELECT * FROM curriculum_coverage WHERE colm_2='$user_id'") or die(mysqli_error($con));

      if(mysqli_num_rows($pages)>=1){

for($d=1;$d<=$Modules;$d++){
  $pagec=$d+4;
  $colm=${'colm_'.$pagec};
  $checkExist=mysqli_query($con,"SELECT * FROM curriculum_coverage WHERE user_id='$user_id' AND $colm='$d'") or die(mysqli_error($con));

      if(mysqli_num_rows($checkExist)>=1){

      }else{
        $mud=${'module'.$d};
        if($mud){
 $update=mysqli_query($con,"UPDATE curriculum_coverage SET $colm='$mud' WHERE user_id='$user_id'");

}else{
  
}

      }



}
















}else{




   $addlist=mysqli_query($con,"INSERT INTO curriculum_coverage VALUES(
                          NULL,
                          '$name',
                          '$user_id',
                          '$phone',
                          '$email',
                          '$module1',
                          '$module2',
                          '$module3',
                          '$module4',
                          '$module5',
                          '$module6',
                          '$module7',
                          '',
                          '$practicle1',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '')");
 }
 }else{

 }



}
?>
