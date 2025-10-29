<?php

include"../../../../connect.php";
$description=mysqli_real_escape_string($con,$_POST['description']);
$tagno=strtoupper(mysqli_real_escape_string($con,$_POST['tagno']));
$devivesd=mysqli_real_escape_string($con,$_POST['devivesd']);
$depart=mysqli_real_escape_string($con,$_POST['depart']);
$sql="SELECT id FROM departments where name='$depart'";

    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['id'];

}
$criticality=mysqli_real_escape_string($con,$_POST['criticality']);

$user=base64_decode(mysqli_real_escape_string($con,$_POST['user']));	
$get_account=mysqli_query($con,"SELECT * FROM raise_issues WHERE description='$description' AND department ='$school' AND posted_by='$user'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){
		echo "issue already posted";
}else{
	$date=date("Y-m-d");
$sql=mysqli_query($con,"INSERT INTO raise_issues VALUE(Null,
											'$school',
											'$devivesd',
											'$tagno',
											'$description',
											'$criticality',
											'',
											'new',
											'$date',
											'',
											'',
											'',
											'$user')") or die(mysqli_error($con));

	
echo "success";
}