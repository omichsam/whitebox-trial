<style type="text/css">
  
  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

  }
  .innovations_holder{
    min-height: 50px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
  }
    .innovations_headers{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    background:#ccc;
    font-weight: bolder;
  }
  .content_ino{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .header_innov{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .in_headers{
    text-transform: uppercase;
    border-bottom: 1px solid #ccc;
  }
  .content_h{

    text-transform: uppercase;
    font-weight: bolder;
  }
  .innovation_attachements{
    min-height: 180px;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center !important;

  }
  .even_row{
    background: #e3edf0;
  }
  .viewed{
background: #ccc;
  }
  .view_process{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 450px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }
   /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
   border-radius:10px;
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
 text-align:center;
 border-radius:10px 10px 0px 0px;
  padding: 2px 16px;
  color:#000;
}

.modal-body {
    padding: 2px 16px;}
#data_holdmodal{
    min-height:300px;
}
#message_foot{
    border-top:2px solid #ccc;
}
.theme_bg{
  background: #e6b234 ;
}
</style>
<?php
include "../../../../../connect.php";
$my_user=base64_decode($_POST['my_id']);
include("../../../../functions/security.php");
//$my_userde=encrypt($my_user,$key);
 $new_messages=""; 
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">MY NOTIFICATIONS</h4></div> 

<div class="col-sm-12 col-xs-12" id="filtered_data">


<?php
$get_user=mysqli_query($con,"SELECT id FROM e_learning_users WHERE email='$my_user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['id'];
$oldstatus="pending";
 $new_status=$oldstatus;


?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-3 col-sm-3 mobile_hidden content_h overflow_data" ><strong>&nbsp;&nbsp;&nbsp; TITLE</strong></div>
  <div class="col-xs-3 col-sm-5 mobile_hidden content_h overflow_data" ><strong>MESSAGE</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>FROM </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong>RECIEVED </strong> </div>
</div>
<?php


$notification_tittle="Communications team!";
$sqlx="SELECT * FROM chartbot where status='general' order by time_added DESC";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    //$notification_tittle=$row['notification_tittle'];
    $message=$row['message'];
    $sender=$row['sender'];
    $Status=$row['status'];
    $chat_type=$row['chat_type'];
  $date_added=$row['time_added'];
  $notification=$row['id'];

     $get_mesage=mysqli_query($con,"SELECT id FROM chat_reads WHERE message_id='$notification' and  	user_id='$User_id'") or die(mysqli_error($con));
$getm=mysqli_fetch_assoc($get_mesage);
if($getm){

  $new_messages="";
}else{
$new_messages="theme_bg";   
}
 



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

 
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder <?php echo $new_messages?>" id="<?php echo $notification ?>">
  <div class="col-xs-3 col-sm-3  overflow_data" style="text-align:left"><?php echo $counter.". ".$notification_tittle?> </div>

  <div class="col-xs-3 col-sm-5 mobile_hidden no_padding col-xs-2"><?php echo $message ?></div>
   
 <div class="col-sm-2 mobile_hidden col-xs-2"><span id="<?php echo $sender ?>" class="view_process "><span class=""> <?php echo $sender?></span></span>  </div>

<div class="mobile_hidden col-sm-2 col-xs-1"><span id="<?php echo $time_d ?>" class="view_process "><span class=""> <?php echo $time_d ?></span></span> <span style="float:right;margin-top:5px;" id="<?php echo $notification?>" class="span_loaders"> <i style="float:right;margin-top:5px;" id="<?php echo $message ?>" tittle="<?php echo $notification_tittle?>" name="<?php echo $time_d ?>" role="<?php echo $sender?>" class="view_notify fa fa-file-pdf-o "></i></span></div>
</div>

<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder <?php echo $new_messages?>" id="<?php echo $notification ?>">
  <div class="col-xs-3 col-sm-3  overflow_data" style="text-align:left"><?php echo $counter.". ".$notification_tittle?> </div>

  <div class="col-xs-3 col-sm-5 mobile_hidden no_padding col-xs-2"><?php echo $message ?></div>
   
 <div class="col-sm-2 mobile_hidden col-xs-2"><span id="<?php echo $sender ?>" class="view_process "><span class=""> <?php echo $sender?></span></span>  </div>
<div class="mobile_hidden col-sm-2 col-xs-1"><span id="<?php echo $time_d ?>" class="view_process "><span class=""> <?php echo $time_d ?></span></span> <span style="float:right;margin-top:5px;" id="<?php echo $notification?>" class="span_loaders"> <i style="float:right;margin-top:5px;" id="<?php echo $message ?>" tittle="<?php echo $notification_tittle?>" name="<?php echo $time_d ?>" role="<?php echo $sender?>" class="view_notify fa fa-file-pdf-o "></i></span></div>

</div>

<?php
}
}


?>



</div>

<!-- Trigger/Open The Modal -->
<button id="myBtn" class="not_shown"></button>

<!-- The Modal -->
<div id="myModal" class="modal col-sm-12 col-xs-12">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <span class="not_shown" id="user_mailer"></span>
      <span class="close">&times;</span>
     <h3 id="Subject_headers"></h3>
    </div>
    <div class="modal-body" >
       <div class="modal-body" id="data_holdmodal">
        
    <div class="col-sm-12 col-xs-12" id="message_holder">

</div>
<div class="col-sm-12 col-xs-12" id="message_foot">
    <div class="col-sm-6 col-xs-6">
       <p>Sender:</p>
       <p id="sender_holder"></p>
        </div>
        <div class="col-sm-6 col-xs-6">
        <p>Recieved:</p>
        <p id="timer_holder"></p>
        </div>
    </div>

        
        
        
        
        
    </div>
      
      
    </div>
 
  </div>

</div>

<!--<div class="col-xs-12 col-sm-12 no_padding" id="graph_table"></div>-->
</div>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var my_id='<?php echo $_POST['my_id']?>';


       $.post("modules/system/external/control/refreshdata.php",{my_id:my_id},function(data){

        $(".notyholderpbk").html(data)
    });
      $(".close").click(function(){
          var my_id='<?php echo $_POST['my_id']?>';
  $.post("modules/system/external/pages/notifications/broadcasts.php",{my_id:my_id},function(data){
$("#learning_area").html(data)
$('html, body').animate({scrollTop: '0px'}, 300);
     

      }); 
 
  
      })
var view_evaluate=".view_notify";
//var target="#graph_table";
$(view_evaluate).click(function(){
      $("#sender_holder").html("");
      $("#timer_holder").html("");
    $("#Subject_headers").html("");
    $("#Subject_headers").html("")
    
       var header_d=$(this).attr("");
   var timer=$(this).attr("");
   var sender=$(this).attr("");
  var message=$(this).attr("");
    
   $("#message_holder").html("")
    var header_d=$(this).attr("tittle");
   var timer=$(this).attr("name");
   var sender=$(this).attr("role");
  var message=$(this).attr("id");
  //alert(innovation);
    //alert(data)
    
    $("#sender_holder").html(sender);
     $("#timer_holder").html(timer);
    $("#Subject_headers").html(header_d);
   $("#message_holder").html(message)
    $("#myBtn").click();

})
$(".span_loaders").click(function(){
    var notificationid=btoa($(this).attr("id"));
    $.post("modules/system/external/pages/notifications/viewpage.php",{notificationid:notificationid,my_id:my_id})
})
  })
</script>