<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;

$submission="second_evaluation";
$sqlx="SELECT * FROM innovations_table where Status='$submission' LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
   $user_id=$row['user_id'];
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
     $time_d="Just now";
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
  	$time_d="";
  }

    }



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
  	$image='images/icons/heritage.jpg';
  }
$message="E.g You have been invited to pitch your innovation to the Evaluation committee on 3/11/2019 at 10:00am. Kindly prepare a brief 3 slide PowerPoint presentation of your project. The pitching session will be 5 minutes.\r\n\r\nRegards,\r\nNMK Innovation Team";
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
  <div class="col-sm-7 col-xs-10"><?php echo $counter.".  ".$Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-3 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-gavel "></i><span class="mobile_hidden"> Evaluate</span></span> </strong>  <strong><span id="<?php echo $user_id ?>" class=" invite_pitch "><i class="fa fa-envelope "></i><span class="mobile_hidden"> Invite</span></span> </strong>

 <strong><span id="<?php echo $Innovation_Id ?>" class="view_evaluation "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"> View</span></span> </strong>
   </div>
</div>


<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
  <div class="col-sm-7 col-xs-10"><?php echo $counter.".  ".$Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-3 col-xs-1">
    <strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-gavel "></i><span class="mobile_hidden"> Evaluate</span></span> </strong>
     <strong><span id="<?php echo $user_id ?>" class="invite_pitch "><i class="fa fa-envelope "></i><span class="mobile_hidden"> Invite</span></span> </strong>
     <strong><span id="<?php echo $Innovation_Id ?>" class="view_evaluation "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"> View</span></span> </strong>
      </div>

</div>
<?php
}
}


?>
<script type="text/javascript">
  $(document).ready(function(){
      
      
      var loader=$("#loader").html()
      $("#invitation_send").click(function(){
          //alert()
          var mailer=$("#user_mailer").html();
          var subject=$("#subject").val()
          var message=$("#message").val()
          if(subject){
              $("#subject").css("border","1px solid #000");
            if(message){
                
              $("#errors_mails").html(loader).css("color","#000");
              $("#message").css("border","1px solid #000");
            var new_message=btoa(message);
            var new_mail=btoa(mailer);
            var new_subject=btoa(subject);
            $.post("modules/mails/send_mails.php",{
              new_message:new_message,
              new_mail:new_mail,
              new_subject:new_subject
            },function(data){
                if($.trim(data)=="success"){
                    modal.style.display = "none";
                }else{
                 
              $("#errors_mails").html(data).css("color","black");   
                }    
            })
            
            
            
            
            }else{
              $("#message").css("border","2px solid red");
              $("#errors_mails").html("Message required").css("color","red"); 
                }
          }else{
              $("#subject").css("border","2px solid red");
             $("#errors_mails").html("Subject required").css("color","red");  
          }
      })
$(".filter_fields").change(function(){
var filter_role=$(this).attr("role");
var filter_value=$(this).val();

if(filter_value==""){

}else{
  var loader=$("#loader").html();
  var my_role=btoa(filter_role);
  var my_value=btoa(filter_value);
  var header_data="";
  if(filter_role=="county"){
header_data="innovations recieved from "+filter_value+" county";
  }else if(filter_role=="gender"){
header_data="innovations Submited by "+filter_value+" gender";
  }else if(filter_role=="category"){
header_data="innovations in "+filter_value+" category";
  }else{
header_data="innovations submited by "+filter_value+" holders";
  }
$("#filter_headers").html(header_data);
  $("#filtered_data").html(loader)
$.post("modules/system/executive/pages/view/filter.php",{
my_role:my_role,
my_value:my_value
},function(data){
$("#filtered_data").html(data)
})
}

})

var view_evaluate=".veiw_evaluate";
var target="#home";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/executive/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
$(".invite_pitch").click(function(){
    $("#errors_mails").html("").css("color","#000");
     $("#subject").css("border","1px solid #000").val("");
   $("#message").css("border","1px solid #000").val("");
    var data_role=$(this).attr("id");
    $("#user_mailer").html(data_role);
   $("#myBtn").click()
})

$(".view_evaluation").click(function(){

var innovation=$(this).attr("id");
   //alert(innovation);
  //alert(innovation);
//var url="modules/system/executive/pages/view/feedback_view.php";
$.post("modules/system/executive/pages/view/report_view.php",{innovation:innovation},function(data){
  $("#home").html(data);
  //alert(data);

})

})

  })
</script>