<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


if(!empty($_FILES['csv_file']['name']))
{
    $name_id="";
        $target_dir = "../../../../../uploads/";
   $target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
/*
   $uploadOk = 1;
   $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($FileType != "csv" || $FileType != "xlsx" || $FileType != "xltx" || $FileType != "xltm" || $FileType != "xlsm" || $FileType != "xls"){
        echo "Sorry, only csv files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      */
        if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
            $file_data = fopen($target_file,'r');
            if($file_data){
            fgetcsv($file_data);

            while($row = fgetcsv($file_data))
            {
             $data[] = array(
              'First_name'=> $row[0],
              'Last_name'=> $row[1],
              'Email_address'=> $row[2],
              'phone_number'=> $row[3],
           	  'Account_type'=> $row[4]
 
             );
             $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
             $code=substr(str_shuffle($chars),0,10);
             $new_password=hashword(base64_encode($code),$salt);
             $names=$row[0]." ".$row[1];
             $name=$names;
             $email=$row[2];
             $Account_type="";
             if($row[4]=="Executive team"){
              $Account_type="executive";
             }else{
           $Account_type="clerk";
             }
             $account=$Account_type;

             $phone=$row[3];
            $date = time();
         $new_time=$date;
         $checkExist=mysqli_query($con,"SELECT user_name FROM administrators WHERE user_name='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){

  }else{
             mysqli_query($con,"SELECT * FROM administrators");

           $query=mysqli_query($con,"INSERT INTO administrators
           VALUES (null,
                   '$name',
                   '$account',
                   '$phone',
                   '$email',
                   '$new_password',
                   '',
                   '',
                   '',
                   '$new_time')") or die(mysqli_error($con));
                    //echo "sucess";
           if($query){
            //$message='<p>Your innovation portal acoount has been created, Kindly access the Whitebox innovation portal,Your account cridentials are:</p><p><strong> Username:'  .$row[2].'</strong></p><p><strong> password:  '.$code.'</strong></p><p>link:  https://www.tumcathcom.com/whitebox_admin</p>';
          $message="<p>Dear $names</p><p>Your innovation portal acoount has been created. Kindly access the WhiteBox Innovation portal  via the link: https://www.tumcathcom.com/whitebox_admin.</p><p>Your account cridentials are:</p><p> Username: $row[2] </p><p> password: $code</p><p>Regards</p><p>Huduma WhiteBox</p>";  

	



//Remember to install postfix in linux before using
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
*/
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='ssl';
$mail->Host ='mail.tumcathcom.com';
$mail->Port= '465';
$mail->isHTML(true);
$mail->Username ='coordinator@tumcathcom.com';
$mail->Password = 'A073955@am';
$mail->SetFrom('coordinator@tumcathcom.com');
$mail->Subject='<p><strong>Portal Account Credentials</strong></p>';
$mail->Body =$message;
$mail->AddAddress($row[2]);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}

           

           }else{
               echo "Sorry!, something went wrong";
           }
}
            }
            echo "success";
           // mysql_close();
           // unlink($target_file);
            //echo $data;
            //echo json_encode($data);
           }else{
               echo "Failed to open csv file";
           }

            //echo "The file ". basename( $_FILES["csv_file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    //}


}else{

}

?>
