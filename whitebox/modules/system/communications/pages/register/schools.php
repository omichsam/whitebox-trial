
COURSE:
<select class="splashinputs" required="required" id="schools">

<?php
$my_school=$_POST['my_school'];
$faculty=$_POST['faculty'];

include"../../../../connect.php";

	$sqldp="SELECT * FROM faculty WHERE name='$faculty'";
		$query_rundp=mysqli_query($con,$sqldp)or die($query_rundp."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rundp)){
					$faculty_id=$row['id'];

					}
					$sqld="SELECT * FROM courses WHERE course_type='$my_school' and faculty='$faculty_id'";
		$query_rund=mysqli_query($con,$sqld)or die($query_rund."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rund)){
					$course_id=$row['id'];
					}
$sql="SELECT * FROM schools where course='$course_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['name'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>
</select>