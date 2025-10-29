<?php
include "../../../../../connect.php";
include "../../../../../connected.php";

$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units where status='active'");
$Modules = mysqli_num_rows($Modulesd);

$oldname="";


$column = array('first_name','Last_name','phone', 'email','covarege');
$query = "SELECT * FROM e_learning_users INNER JOIN curriculum_courses_coverage ON curriculum_courses_coverage.user_id= e_learning_users.id LIMIT 0,1";
if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE first_name LIKE "%'.$_POST['search']['value'].'%" 
 OR Last_name LIKE "%'.$_POST['search']['value'].'%" 
 OR phone LIKE "%'.$_POST['search']['value'].'%" 
 OR email LIKE "%'.$_POST['search']['value'].'%"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY first_name DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$counter=$_POST['start'];
if($counter==0){
$counter=1;
}else{

}
$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();
$countn=0;
foreach($result as $row)
{
$sub_array = array();
$sub_array[] = $counter;
$sub_array[] = $row['first_name']." ".$row['Last_name'];
 $sub_array[] = $row['email'];
  $sub_array[] = $row['phone'];
 
   $sub_array[] = $row['covarege'];
$data[] = $sub_array;
 $counter++;
}

function count_all_data($connect)
{
$query = "SELECT * FROM e_learning_users INNER JOIN curriculum_courses_coverage ON curriculum_courses_coverage.user_id= e_learning_users.id LIMIT 0,1";

 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>
