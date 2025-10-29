<?php
include"../../../../../../connect.php";
                 $parent_fname=$_POST['parent_fname'];
                 $parent_mname=$_POST['parent_mname'];
                 $parent_lname=$_POST['parent_lname'];
                 $parent_id_number=$_POST['parent_id_number'];
                 $parent_phone=$_POST['parent_phone'];
                 $parent_rasidence=$_POST['parent_rasidence'];
                 $parent_email=$_POST['parent_email'];
                 $student_no=$_POST['stadm_no'];
                 
$date = date('Y-m-d ');
if($parent_fname && $parent_mname && $parent_lname && $parent_phone && $parent_rasidence && $student_no){

$sql=mysqli_query($con,"INSERT INTO parents VALUE(Null,
											'$student_no',
											'$parent_fname',
											'$parent_mname',
											'$parent_lname',
											'$parent_email',
											'$parent_phone',
											'$parent_id_number',
											'$parent_rasidence',
											'$date')") or die(mysqli_error($con));
echo"success";


}else{
	echo "All fields required";
}

?>