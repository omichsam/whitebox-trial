

<div class="col-sm-12 col-xs-12 no_padding" >

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$my_role=base64_decode($_POST['my_role']);
$my_value=$_POST['my_value'];

$submission="submission";
if($my_role=="education"){

$sqld="SELECT User_id FROM external_users where education_level='$my_value'";
  $query_rund=mysqli_query($con,$sqld) or die($query_rund."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_rund)){
      $User_id=$row['User_id'];


$sqlx="SELECT * FROM innovations_table where Status='$submission'and user_id='$User_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      //$Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

      	$time_d="One minute ago";
      }else{
      	$time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
   	$time_d="An hour ago";
   }else{
   	$time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
    	$time_d="Yesterday";
    }else{
    	$time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
     	$time_d="A week ago";
     }else{
     	$time_d="$weeks weeks ago";
     }

    }else if($months<=12){

    	if($months==1){
    		$time_d="A month ago";
    	}else{

    		$time_d="$months months ago";
    	}
    }else{
  if($years==1){

  	$time_d="A year ago";
  }else{
  	$time_d="$years years ago";
  }

    }




  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>

<?php
}else{
	?>
<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>
<?php
}
}

}
}else if($my_role=="gender"){

$myvalue=$my_value,$key));
$sqld="SELECT User_id FROM external_users where Gender='$myvalue'";
  $query_rund=mysqli_query($con,$sqld) or die($query_rund."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_rund)){
      $User_id=$row['User_id'];



$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="$years years ago";
  }

    }



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
    $image='images/icons/heritage.jpg';
  }
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>

<?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>
<?php
}
}

}
















}else if($my_role=="county"){
$my_county=$my_value;
$sql="SELECT * FROM county_table ORDER BY County_name ='$my_county'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $county_id=$row['id'];
     


}







$sqld="SELECT User_id FROM external_users where County_id='$county_id'";
  $query_rund=mysqli_query($con,$sqld) or die($query_rund."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_rund)){
      $User_id=$row['User_id'];


$sqlx="SELECT * FROM innovations_table where Status='$submission'and user_id='$User_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="$years years ago";
  }

    }



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
    $image='images/icons/heritage.jpg';
  }
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>
<?php
}else{

?>
<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>
<?php
}

}
}



}else if($my_role=="category"){



$sqlx="SELECT * FROM innovations_table where Category='$my_value'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="$years years ago";
  }

    }



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
    $image='images/icons/heritage.jpg';
  }
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>

<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-2 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-7 col-xs-9"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>

  <div class="col-sm-1 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>
<?php
}
}



}else{

}

?>


</div>
<script type="text/javascript">
  $(document).ready(function(){
    var view_evaluate=".veiw_evaluate";
var target="#home";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/executive/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
  })
</script>