<?php
 
 function send_email($from,$sender_name,$to,$subject,$message){
			@$mail=mail($to, $subject, $message,
			     "From: ".$sender_name." <".$from.">\r\n"
			    ."Reply-To: ".$from."\r\n"
			    ."X-Mailer: PHP/" . phpversion());
			if($mail)
			{}else{}
 }
 

/*get profile_pic*/
 function get_user_prof($user_id){
	$get_prof=mysqli_query($con,"SELECT prof_name,prof_dir FROM users WHERE user_id='$user_id'") or die(mysqli_error($con));
	$get=mysqli_fetch_assoc($get_prof);
	$prof_dir=$get['prof_dir'];
	$prof_name=$get['prof_name'];
	$prof="";
	if($prof_name==""){
	$prof="images/default_user.jpg";
	}else{
		$prof="$prof_dir/$prof_name";
	}
	return "$prof";
}

function get_email($role,$user_id){
	if($role=="admin"){
			$getEmail=mysqli_query($con,"SELECT email FROM admin_tbl WHERE category='general'") or die(mysqli_error($con));
			$get=mysqli_fetch_assoc($getEmail);
			$email=$get['email'];
			return "$email";
	}else{
			$getEmail=mysqli_query($con,"SELECT email FROM users WHERE user_id='$user_id'") or die(mysqli_error($con));
			$get=mysqli_fetch_assoc($getEmail);
			$email=$get['email'];
			return "$email";
	}
 }
 
function get_phone($role,$user_id){
	if($role=="admin"){
			$getPhone=mysqli_query($con,"SELECT phone FROM admin_tbl WHERE category='general'") or die(mysqli_error($con));
			$get=mysqli_fetch_assoc($getPhone);
			$phone=$get['phone'];
			return "$phone";
	}else{
			$getPhone=mysqli_query($con,"SELECT phone FROM users WHERE user_id='$user_id'") or die(mysqli_error($con));
			$get=mysqli_fetch_assoc($getPhone);
			$phone=$get['phone'];
			return "$phone";
	}
}

function send_groupsms($contactlist,$subject,$msg){
		 Send_SMS_To_Many($contactlist, $msg);
}
function send_groupemail($contactlist,$subject,$msg){
	 	$from=get_email('admin','general');
	 	$sender_name="ADMIN";
	 	$to=$contactlist;
		send_email($from,$sender_name,$to,$subject,$msg);
}
function send_group_emails_and_sms($contactlist,$maillist,$subject,$msg){
		$from=get_email('admin','general');
	 	$sender_name="ADMIN";
	 	$to=$maillist;
		send_email($from,$sender_name,"$to",$subject,$msg);
		Send_SMS_To_Many($contactlist, $msg);

}

function get_contact_list($option,$type){
	switch ($option) {
	case 'ActiveUsers':
			# code...
			$getList=mysqli_query($con,"SELECT email,phone,first_name FROM users WHERE status='active' GROUP BY phone ") or die(mysqli_error($con));
			$num=mysqli_num_rows($getList);
			$list="";
			while($get=mysqli_fetch_assoc($getList)){
				$phone=$get['phone'];
				$email=$get['email'];
				$fname=$get['first_name'];
				if($type=="sms")
				{
					if($list==""){
						$list="$phone";
					}else{
						$list="$list,$phone";
					}
				}else{
					if($list==""){
						$list="$email";
					}else{
						$list="$list,$email";
					}
				}		

				
			}

			return $list;
		break;

		case 'Inactive':
			$getList=mysqli_query($con,"SELECT email,phone,first_name FROM users WHERE status='active' GROUP BY phone ") or die(mysqli_error($con));
			$num=mysqli_num_rows($getList);
			$list="";
			while($get=mysqli_fetch_assoc($getList)){
				$phone=$get['phone'];
				$email=$get['email'];
				$fname=$get['first_name'];
				if($type=="sms")
				{
					if($list==""){
						$list="$phone";
					}else{
						$list="$list,$phone";
					}
				}else{
					if($list==""){
						$list="$email";
					}else{
						$list="$list,$email";
					}
				}
				
			}

			return $list;
		break;

		case 'Borrowers':
			$getList=mysqli_query($con,"SELECT email,phone,first_name FROM users WHERE status='active' GROUP BY phone ") or die(mysqli_error($con));
			$num=mysqli_num_rows($getList);
			$list="";
			while($get=mysqli_fetch_assoc($getList)){
				$phone=$get['phone'];
				$email=$get['email'];
				$fname=$get['first_name'];
				if($list==""){
					$list="$phone";
				}else{
					$list="$list,'$phone'";
				}
				
			}

			return $list;
		break;

		case 'Lenders':
			$getList=mysqli_query($con,"SELECT email,phone,first_name FROM users WHERE status='active' GROUP BY phone ") or die(mysqli_error($con));
			$num=mysqli_num_rows($getList);
			$list="";
			while($get=mysqli_fetch_assoc($getList)){
				$phone=$get['phone'];
				$email=$get['email'];
				$fname=$get['first_name'];
				if($type=="sms")
				{
					if($list==""){
						$list="$phone";
					}else{
						$list="$list,$phone";
					}
				}else{
					if($list==""){
						$list="$email";
					}else{
						$list="$list,$email";
					}
				}
				
			}

			return $list;
		break;

		 case 'All':
		 	$getList=mysqli_query($con,"SELECT email,phone,first_name FROM users WHERE status='active' GROUP BY phone ") or die(mysqli_error($con));
			$num=mysqli_num_rows($getList);
		 	$list="";
			while($get=mysqli_fetch_assoc($getList)){
				$phone=$get['phone'];
				$email=$get['email'];
				$fname=$get['first_name'];
				if($type=="sms")
				{
					if($list==""){
						$list="$phone";
					}else{
						$list="$list,$phone";
					}
				}else{
					if($list==""){
						$list="$email";
					}else{
						$list="$list,$email";
					}
				}
				
			}

			return $list;
		 	break;
	
	default:
		# code...
		break;
}
}

?>