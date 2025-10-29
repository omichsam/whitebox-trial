<?php
include "../../../../../connect.php";

$sqlxp="SELECT * FROM curriculum_test WHERE type='feedback'";
    $query_runxy=mysqli_query($con,$sqlxp) or die($query_runxy."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxy)){

$test_id=$row['id'];
$unit_id=$row['unit_id'];

$sqlx="SELECT * FROM e_learning_users";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $userid=$row['id'];
$name=$row['first_name']." ".$row['Last_name'];
$Gender=$row['Gender'];
$phone=$row['phone'];
$email=$row['email'];

$questionb1="";
$questionb2="";
$questionb3="";
$questionb4="";
$questions=0;

$records=mysqli_query($con,"SELECT * FROM curriculum_feedback_report WHERE colm_4='$email' and colm_5='$unit_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($records)!=0){

}else{

  //echo $my_pass;

$checkExist=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_id='$test_id' and user_id='$userid'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
    $counter++;

    $sqlpok="SELECT * FROM curriculum_test_questions Where test_id='$test_id'";
    $query_runpok=mysqli_query($con,$sqlpok) or die($query_runpok."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpok)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $next_question="";
        $questions= $questions+1;
     // echo $question_id;
            
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$userid' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
      if($questions==1){
        $questionb1=$row['answer_id'];

      }elseif($questions==2){
$questionb2=$row['answer_id'];
      }elseif($questions==3){
        $questionb3=$row['answer_id'];

          }elseif($questions==4){
            $questionb4=$row['answer_id'];


          }else{

          }


}
}
   

   $addlist=mysqli_query($con,"INSERT INTO curriculum_feedback_report VALUES(
                          NULL,
                          '$name',
                          '$Gender',
                          '$phone',
                          '$email',
                          '$unit_id',
                          '$questionb1',
                          '$questionb2',
                          '$questionb3',
                          '$questionb4',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '')");




}else{

}
}


}
}

?>