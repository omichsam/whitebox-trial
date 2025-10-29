<?php
 session_start();
//upload.php
include "../../../../../connect.php";
$user=$_POST['user'];
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){

$userid=$get['id'];

}else{

$userid="";
}
$docmname=mysqli_real_escape_string($con,$_POST['docmname']);
$today=date("Y-m-d");
if(isset($_POST['hidden_field']))
{
 $error = '';
 $total_line = '';

 if($_FILES['file']['name'] != '')
 {
  $allowed_extension = array('csv');
  $file_array = explode(".", $_FILES["file"]["name"]);
  $extension = end($file_array);
  if(in_array($extension, $allowed_extension))
  {
$new_file_name = rand() . '.' . $extension;
//$new_file_name = rand(1,99999) . '.' . end(explode(".", $_FILES["file"]["name"])
$_SESSION['csv_file_name'] = $new_file_name;
move_uploaded_file($_FILES['file']['tmp_name'], '../../../../../uploads/'.$new_file_name);
//$file_content = file('../../../../../documents/articles/'. $new_file_name);
/*$file_content = array_filter(array_map("trim",file('../../../../../documents/articles/'. $new_file_name,, ))"strlen");
$total_line = count($file_content);
*/

$rowCount=0;
if (($fp = fopen('../../../../../uploads/'. $new_file_name, "r")) !== FALSE) {
  while(!feof($fp)) {
    $data = fgetcsv($fp , 0 , ',' , '"', '"' );
    if(empty($data)){

    }else{
    $rowCount++;
    } 
  }
  fclose($fp);
}
$total_line=$rowCount;

$sql=mysqli_query($con,"INSERT INTO data_docs VALUE(null,
                                            '$docmname',
                                            '20',
                                            '$total_line',
                                            'csv',
                                            '$new_file_name',
                                            '$userid',
                                            '$today')") or die(mysqli_error($con));

$get_userp=mysqli_query($con,"SELECT * FROM data_docs WHERE file_name='$new_file_name'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$doc_id=$getr['id'];
}else{
$doc_id='';
}


  }
  else
  {
   $error = 'Only CSV file format is allowed';
  }
 }
 else
 {
  $error = 'Please Select File';
 }

 if($error != '')
 {
  $output = array(
   'error'  => $error
  );
 } 
 else
 {
  $output = array(
   'success'  => true,
   'doc_id'  => $doc_id,
   'total_line' => ($total_line - 1)
  );
 }

 echo json_encode($output);
}

?>