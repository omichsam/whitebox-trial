<link href="id.css" rel="stylesheet">
  <div class="col-sm-12 col-xs-12 no_padding " id="print_all">



<?php

//mysqli_close(@mysql_connect);
include"../../../../connect.php";
$adm_no=$_POST['stadm_no'];
$sql="SELECT * FROM register WHERE adm_no='$adm_no'";
		$query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_run)){
		$phone=$row['phone'];
		$mails=$row['email'];
	$post_fname=$row['fname'];
	$post_mname=$row['mname'];
	$post_lname=$row['lname'];
	$post_adm_no=$row['adm_no'];
	$School=$row['School'];
	$Registration_no=$row['Registration_no'];
	$family=$row['family'];
	$study_year=$row['study_year'];
	$post_myimage=$row['picture'];
	$national_id=$row['national_id'];
	$course_type=$row['course_type'];
	$faculty=$row['faculty'];
	
	$registered_date=$row['registered_date'];

		if(!$post_myimage){
      	
			$newimage="images/students/user.jpg";
		}else{

		    $newimage="http://portal.tumcathcom.com/".$post_myimage;
			
		}
		
					//echo $School." ".$course_id;
				//$year=$date+3;
		$sqldp="SELECT * FROM faculty WHERE id='$faculty'";
		$query_rundp=mysqli_query($con,$sqldp)or die($query_rundp."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rundp)){
					$faculty_name=$row['name'];

					}
					$sqld="SELECT * FROM courses WHERE id='$course_type'";
		$query_rund=mysqli_query($con,$sqld)or die($query_rund."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rund)){
					$max_period=$row['max_period'];

				$date=date("y");
				$new_lasty=$date+($max_period-$study_year);

}
	}			//echo "This is the image_ii".$post_myimage." _";
				//$sms="Confirmed, you are now fully registered as a TumCathcom member. name:".$post_fname." ".$post_lname.", Reg no:".$post_adm_no.", Family:".$family.", Technical university of mombasa.";
//mysqli_close(@mysql_connect);
?>

<div class="col-sm-12 col-xs-12">
<div class="col-sm-5 col-xs-12 no_padding" id="students_card">
<div class="col-sm-12 col-xs-12 ">
	<div class="col-sm-2 col-xs-2 no_padding">
     <div class="col-sm-12  col-xs-12 no_padding lo_gaa" id="id_logo" style="background-image: url('images/tumlog.jpg');"></div>

   <div class="col-sm-12 col-xs-12 no_padding lo_ga" id="id_profile_st" style="background-image: url(<?php echo $newimage?>);"></div>
	</div>
	<div class="col-sm-10 col-xs-10 " id="students_holder_cad">
	<div class="col-sm-12 col-xs-12 no_padding " id="students_holder_card" >
		<h4 id="schholl_card_school">TUMCATHCOM</h4>
		<div class="display_id_det"><div class="p_d_a col-sm-12 col-xs-12 no_padding"><?php echo $post_fname." ".$post_mname." ".$post_lname ?></div></div>
		<div class="col-sm-12 col-xs-12 no_padding">
		<div class="display_id_det col-sm-12 col-xs-12 no_padding"><div class="p_d_b col-sm-3 col-xs-3 no_padding">REG NO.</div><div class="p_d_c col-sm-1 col-xs-1 no_padding">:</div><div class="p_d_a col-sm-8 col-xs-8 no_padding"><?php echo $Registration_no ?></div></div>
		<div class="display_id_det col-sm-12 col-xs-12 no_padding"><div class="p_d_b col-sm-3 col-xs-3 no_padding">DATE</div><div class="p_d_c col-sm-1 col-xs-1 no_padding">:</div><div class="p_d_a col-sm-8 col-xs-8 no_padding"><?php echo $registered_date ?></div></div>
		<div class="display_id_det col-sm-12 col-xs-12 no_padding"><div class="p_d_b col-sm-3 col-xs-3 no_padding">SCHOOL</div><div class="p_d_c col-sm-1 col-xs-1 no_padding">:</div><div class="p_d_a col-sm-8 col-xs-8 no_padding"><?php echo $School ?></div></div>
		<div class="display_id_det col-sm-12 col-xs-12 no_padding"><div class="p_d_b col-sm-3 col-xs-3 no_padding">FAMILY</div><div class="p_d_c col-sm-1 col-xs-1 no_padding">:</div><div class="p_d_a col-sm-8 col-xs-8 no_padding"><?php echo $family?></div></div>
		</div>
		<div class="display_id_det">&nbsp;</div>
<p class="display_id_det"><div class="p_d_b col-sm-4 col-xs-4">valid to:</div><div class="p_d_a col-sm-8 col-xs-8"><?php echo "20th November"." "."20".$new_lasty; ?></div></p>
		<p class="display_id_det"><div class="p_d_b col-sm-9 col-xs-9">Chaplain's signature:</div><div class="p_sign col-sm-3 col-xs-3" style="background-image:url('images/sign.png')"></div></p>
</div>
	</div>
</div>
</div>
<div class="col-sm-1 col-xs-12" id="borde_ids"></div>
<div class="col-sm-5 col-xs-12 no_padding" id="students_card">
<div class="col-sm-12 col-xs-12 ">
	<div class="col-xs-12 col-sm-12" id="id_dd">
		This is a property of tumcathcom given to <?php echo $post_fname." ".$post_mname." ".$post_lname ?> as an identity card for church matters.
	</div>
	<div class="col-sm-12 col-xs-12 no_padding">
<h5 id="schholl_card_school"><?php echo $faculty_name ?></h5>
	</div>
	<div class="col-sm-12 col-xs-12 no_padding">
<h5 id="schholl_card_school"><?php echo "<<< Id >>><<< ".$national_id.">>><<< ".$Registration_no.">>>"?></h5>
	</div>
	<div class="col-sm-12 col-xs-12 no_padding">
<h5 id="schholl_card_school"><?php echo "<<< ".$post_fname." >>><<< ".$post_mname.">>><<< ".$post_lname.">>>"?></h5>
	</div>
</div>
</div>

</div>

<div class="col-sm-2 col-xs-2"></div>
<p class="col-sm-12 col-xs-12" id="print_card">
	<span class="btn theme_bg" id="btn_print_card"  onclick='PrintElem();'>PRINT</span>
</p>
</div>

<script type="text/javascript">



function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600','center');

    mywindow.document.write('<html><head>');
    mywindow.document.write("<link href=\"../../../../css/bootstrap.min.css\" rel=\"stylesheet\"><link href=\"../../../../css/id.css\" rel=\"stylesheet\">")
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById('print_all').innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/


    setTimeout(function () {
    mywindow.print();
    mywindow.close();
    }, 1000)
    return true;
}

</script>
</script>
