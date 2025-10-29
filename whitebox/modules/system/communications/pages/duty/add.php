<?php
include("../../../../connect.php");
            $group=$_POST['group'];
			$starttdate=$_POST['starttdate'];
			$enddate=$_POST['enddate'];


		if($group && $starttdate && $enddate){
        

$counter=0;
$family_name="";
$date=date('Y-m-d');
$famid=1;
$sql="SELECT * FROM dutycount";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$famid=$famid+1;
    }
$sql="SELECT * FROM study_years where status='active'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$yearid=$row['id'];
    	$yearname=$row['name'];
    }
    $sql="SELECT * FROM launch_semesters where status='active'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$semid=$row['id'];
    }
$get_account=mysqli_query($con,"SELECT * FROM duty_rota where description='$group' and status='waiting'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){
echo "Data exists";
}else{


			$sql=mysqli_query($con,"INSERT INTO duty_rota VALUE(Null,
														'$yearid',
														'$semid',
														'$famid',
														'$group',
													   '$starttdate',
														'$enddate',
														'waiting',
														'$date')") or die(mysqli_error($con));
			echo "success";


}

		}else{
			echo "All fields required";
		}

 ?>