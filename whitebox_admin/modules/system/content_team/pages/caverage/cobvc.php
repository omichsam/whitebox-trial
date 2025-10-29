<?php
include "../../../../../connect.php";

$counter=0;
$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units");
$Modules = mysqli_num_rows($Modulesd);
 $sqlx="SELECT * FROM data_table Where id>='2'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $name=mysqli_real_escape_string($con,$row['colm_4']);
$Gender=mysqli_real_escape_string($con,$row['colm_5']);
$phone=mysqli_real_escape_string($con,$row['colm_10']);
$email=mysqli_real_escape_string($con,$row['colm_9']);
/*
$sqlx="SELECT * FROM e_learning_users";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=mysqli_real_escape_string($con,$row['id']);
 $name=mysqli_real_escape_string($con,$row['first_name'])." ".mysqli_real_escape_string($con,$row['Last_name']);
$Gender=mysqli_real_escape_string($con,$row['Gender']);
$phone=mysqli_real_escape_string($con,$row['phone']);
$email=mysqli_real_escape_string($con,$row['email']);


*/
 $get_userid=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$email'") or die(mysqli_error($con));
$getp=mysqli_fetch_assoc($get_userid);
if($getp){
    $user_id=mysqli_real_escape_string($con,$getp['id']);



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
$module1="";
$module2="";
$module3="";
$module4="";
$module5="";
$module6="";
$module7="";


for($a=1;$a<=7;$a++){
  $unit_id=$a;



$sqlxp="SELECT * FROM  curriculum_test where type='feedback' and unit_id='$unit_id'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$test_id=$row['id'];


    }

$contentb="";
if($a==1){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='1'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){
    $datedone="";
    $get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='1'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
  $datedone=$geter['date_added'];
}

$contentb="completed ".$datedone;
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){

 $datedone="";
    $get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
  $datedone=$geter['date_added'];
}

$contentb="completed ".$datedone;


}else{



   $contentb="";
  }
}
}elseif($a==3){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='4'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){
   $datedone="";
    $get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='4'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
  $datedone=$geter['date_added'];
}

$contentb="completed ".$datedone;
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='5'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){
$datedone="";
    $get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='5'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
  $datedone=$geter['date_added'];
}

$contentb="completed ".$datedone;

}else{



   $contentb="";
  }
}
}else{
 $checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){
    $datedone="";
    $get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
  $datedone=$geter['date_added'];
}

$contentb="completed ".$datedone;


  }else{
   $contentb="";
  } 
}



  

    
if($a==1){
  $module1=$contentb;

}else if($a==2){

$module2=$contentb;
   if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{

              }



  }else if($a==3){
    $module3=$contentb;
    if($module3){
              if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{
              $module2=$module3;
              $module1=$module2;
              }

            }else{
            }
            
     }else if($a==4){

      $module4=$contentb;
      if($module4){
            if($module3){
              if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{
                $module2=$module3;
              }

            }else{
              $module3=$module4;
              $module2=$module3;
              $module1=$module2;
            }
            }else{
            
            }



      }else if($a==5){
        $module5=$contentb;
      if($module5){

            if($module4){
            if($module3){
              if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{
                $module2=$module3;
              }

            }else{
              $module3=$module4;
            }
            }else{
            
              $module4=$module5;
              $module3=$module4;
              $module2=$module3;
              $module1=$module2;
            }
            }else{
            }
        }else if($a==6){
          $module6=$contentb;

          if($module6){
            if($module5){

            if($module4){
            if($module3){
              if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{
                $module2=$module3;
              }

            }else{
              $module3=$module4;
            }
            }else{
             $module4=$module5;
            }
            }else{

              $module5=$module6;
              $module4=$module5;
              $module3=$module4;
              $module2=$module3;
              $module1=$module2;
            }
            }else{
            }

          }else if($a==7){
            $module7=$contentb;
            if($module7){
            if($module6){
            if($module5){

            if($module4){
            if($module3){
              if($module2){
                if($module1){

                }else{
                  $module1=$module2;
                }

              }else{
                $module2=$module3;
              }

            }else{
              $module3=$module4;
            }
            }else{
             $module4=$module5;
            }


            }else{
              $module5=$module6;
            }





            }else{
              $module6=$module7;
              $module5=$module6;
              $module4=$module5;
              $module3=$module4;
              $module2=$module3;
              $module1=$module2;
            }

         }else{

         }

}else{

}
}


  }else{
  $user_id="";

}




for($d=1;$d<=$Modules;$d++){

/*

$addlist=mysqli_query($con,"INSERT INTO curriculum_coverage VALUES(
                          NULL,
                          '$name',
                          '$Gender',
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



*/

  $checkExist=mysqli_query($con,"SELECT * FROM curriculum_courses_coverage WHERE user_id='$email' AND unit_id='$d'") or die(mysqli_error($con));

      if(mysqli_num_rows($checkExist)>=1){

      }else{
        $mud=${'module'.$d};
        //if($mud){
 $addlist=mysqli_query($con,"INSERT INTO curriculum_courses_coverage VALUES(
                          NULL,
                          '$email',
                          '$d',
                          '',
                          '$mud',
                          '',
                          '$Today')");






      }


}










}

?>
