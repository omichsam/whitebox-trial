

COURSE TYPE:
<select class="splashinputs" required="required" id="schools">

<?php
$faculty=$_POST['faculty'];

include"../../../../connect.php";
					$sqld="SELECT * FROM faculty WHERE name='$faculty'";
		$query_rund=mysqli_query($con,$sqld)or die($query_rund."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rund)){
					$faculty_id=$row['id'];
					
$sql="SELECT * FROM courses where faculty='$faculty_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $school=$row['course_type'];
            ?>

<option><?php echo $school ?></option>
<?php
}
}
//mysqlii_close(@mysqli_connect);
?>
</select>