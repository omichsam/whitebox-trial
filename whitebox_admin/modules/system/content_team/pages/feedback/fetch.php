<?php
include "../../../../../connected.php";

$unit_id=base64_decode($_POST['unit_id']);
$test_id=base64_decode($_POST['test_id']);
$oldname="";

$column = array('colm_1','colm_2','colm_3','colm_4','colm_5','colm_6','colm_7','colm_8','colm_9');

$query = "SELECT * FROM curriculum_feedback_report";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE colm_1 LIKE "%'.$_POST['search']['value'].'%" 
 OR colm_2 LIKE "%'.$_POST['search']['value'].'%" 
 OR colm_3 LIKE "%'.$_POST['search']['value'].'%" 
 OR colm_4 LIKE "%'.$_POST['search']['value'].'%"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY colm_1 DESC ';
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
    if($row['colm_5']==$unit_id){
$sub_array = array();
$sub_array[] = $counter;
 $sub_array[] = $row['colm_1'];
$sub_array[] = $row['colm_4'];
 $sub_array[] = $row['colm_3'];
 $sub_array[] = $row['colm_6'];
  $sub_array[] = $row['colm_7'];
   $sub_array[] = $row['colm_8'];
    $sub_array[] = $row['colm_9'];
$data[] = $sub_array;
 $counter++;
}else{

}
}

function count_all_data($connect)
{
 $query = "SELECT * FROM  curriculum_feedback_report";
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
