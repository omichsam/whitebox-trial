<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=whiteboxnew2020live", "white44boxlive", "hdhj akass hsh34 f fajJHJ!!!");

//$connect = new PDO("mysql:host=localhost;dbname=new_whitebox", "root", "");
$column = array('first_name','last_name','gender','email','phone','country','county_id','address','');

$query = "SELECT * FROM ((users INNER JOIN countries ON users.country=countries.sortname) INNER JOIN county_table ON users.county_id=county_table.id)";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE first_name LIKE "%'.$_POST['search']['value'].'%" 
 OR gender LIKE "%'.$_POST['search']['value'].'%" 
 OR last_name LIKE "%'.$_POST['search']['value'].'%" 
 OR gender  LIKE "%'.$_POST['search']['value'].'%"
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

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row){
 $sub_array = array();
 $sub_array[] = $row['first_name'];
 $sub_array[] = $row['last_name'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['phone'];
 $sub_array[] = $row['name'];
 $sub_array[] = $row['County_name'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['created_at'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM ((users INNER JOIN countries ON users.country=countries.sortname) INNER JOIN county_table ON users.county_id=county_table.id)";
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
