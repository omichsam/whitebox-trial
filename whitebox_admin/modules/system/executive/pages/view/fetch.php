<?php

//fetch.php

include "../../../../../connected.php";

$column = array('Email','Phone','Innovation_name','stage','innovator_type','need','solution','impact','busines_model','target','Research_sources','requirements','Status');

$query = "SELECT Innovation_name,stage,innovator_type,need,solution,impact,busines_model,target,Research_sources,requirements,Status,email,phone FROM innovations_table INNER JOIN users ON innovations_table.user_id=users.id AND innovations_table.Status='second_evaluation'";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE Innovation_name LIKE "%'.$_POST['search']['value'].'%" 
 OR stage LIKE "%'.$_POST['search']['value'].'%" 
 OR innovator_type LIKE "%'.$_POST['search']['value'].'%" 
 OR Status LIKE "%'.$_POST['search']['value'].'%"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY Innovation_name DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['email'];
 $sub_array[] = $row['phone'];
 $sub_array[] = $row['Innovation_name'];
 $sub_array[] = $row['stage'];
 $sub_array[] = $row['innovator_type'];
 $sub_array[] = $row['need'];
 $sub_array[] = $row['solution'];
 $sub_array[] = $row['impact'];
 $sub_array[] = $row['busines_model'];
  $sub_array[] = $row['target'];
 $sub_array[] = $row['Research_sources'];
 $sub_array[] = $row['requirements'];
 $sub_array[] = $row['Status'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT Innovation_name,stage,innovator_type,need,solution,impact,busines_model,target,Research_sources,requirements,Status,email,phone FROM innovations_table INNER JOIN users ON innovations_table.user_id=users.id AND innovations_table.Status='second_evaluation'";
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
