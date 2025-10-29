<style type="text/css">
  
  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

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
    .innovations_holder{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
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
    text-align: center;
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
  .veiw_evaluate{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 500px;
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
    text-align:center;
    padding: 2px 16px;}


</style>
<?php
include "../../../../../connect.php";
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#Uploadnew").click(function(){
      var my_id=$("#user_email").val();
     $.post("modules/system/elearning_admin/pages/datapage/adddoc.php",{my_id:my_id},function(data){
      $("#home").html(data)
     })
    })
    $("#editusers").click(function(){
      var my_id=$("#user_email").val();
     $.post("modules/system/elearning_admin/pages/manageusers/manageusers.php",{my_id:my_id},function(data){
      $("#home").html(data)
     })
    })
  })
</script>
<div class="col-sm-12 col-xs-12">
  <span class="theme_bg btn" id="Uploadnew">Upload new</span><span style="float: right;" class="theme_bg btn" id="editusers">manage Learners</span>
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">Uploaded data files </h4></div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-4 col-sm-9 mobile_hidden content_h overflow_data" ><strong>NO. FILE NAME</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>SUBMITTED </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><strong>ACTION </strong> </div>
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">
<?php

$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM data_docs";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $allcounter=$allcounter+1;
    }
    $total_pages = ceil($allcounter / $no_of_records_per_page); 
    //$buttons=$total_pages-1;
    //echo $buttons;
   // echo $total_pages;
   //$total_pages=5;
   //$allcounter=55;









$sqlx="SELECT * FROM data_docs LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['tittle'];
  $date_added=strtotime($row['date_added']);
   $Innovation_Id=$row['id'];
   $user_id=$row['addedby'];
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
    $day=0;
$times=0;
$pitchmode="not_shown";
$pitchhide="";
$fulldate=0;
/*$get_event=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
$getevent=mysqli_fetch_assoc($get_event);
if($getevent){
$day=$getevent['planned_date'];
$times=$getevent['planned_time'];
$status=$getevent['status'];

}else{
  
}
*/

if($day && $times){

$fulldate=date('m/d/Y H:i:s', $day);
$pitchmode="";
$pitchhide="not_shown";
//echo $fulldate;
}else{

}


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

  
$message="";
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
  <div class="col-sm-9 col-xs-10"><?php echo $counter.".  ".$Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><!--<strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-gavel "></i><span class="mobile_hidden"> Evaluate</span></span> </strong>  <strong><span id="<?php echo $user_id ?>" class=" invite_pitch <?php echo $pitchhide?>"><i class="fa fa-envelope "></i><span class="mobile_hidden"> Invite</span></span> </strong>
<strong><span id="<?php echo $user_id ?>" class=" <?php echo $pitchmode?>"><span class="mobile_hidden"></span></span> </strong>-->
 <strong><span id="<?php echo $Innovation_Id ?>" class="view_evaluation "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"> View</span></span> </strong>

      <!--<strong><span id="<?php echo $Innovation_Id ?>" class="<?php echo $pitchmode?>"><span class="view_evaluation "><i class="fa fa-television"></i>Pitch</span><span class="mobile_hidden"><br>Pitch date: <?php echo $fulldate?></span></span> </strong>-->
   </div>
</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
  <div class="col-sm-9 col-xs-10"><?php echo $counter.".  ".$Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1">
   <!-- <strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-gavel "></i><span class="mobile_hidden"> Evaluate</span></span> </strong>
     <strong><span id="<?php echo $user_id ?>" class="invite_pitch <?php echo $pitchhide?>"><i class="fa fa-envelope "></i><span class="mobile_hidden"> Invite</span></span> </strong>
     <strong><span id="<?php echo $user_id ?>" class=" <?php echo $pitchmode?>"><span class="mobile_hidden"></span></span> </strong>-->
     <strong><span id="<?php echo $Innovation_Id ?>" class="view_evaluation "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"> View</span></span> </strong>
<!--
      <strong><span id="<?php echo $Innovation_Id ?>" class=" <?php echo $pitchmode?> "><span class="view_evaluation "><i class="fa fa-television"></i>Pitch</span><span class="mobile_hidden"><br>Pitch date: <?php echo $fulldate?></span></span> </strong>-->
      </div>

</div>
<?php
}
}


?>
</div>

</div>











<div class="col-sm-12 col-xs-12" style="text-align:center" id="loadingdd"></div>
<div class="col-sm-12 col-xs-12" id="pagination_controls" style="text-align:center;margin-top:4px;">
   <?php
   for($bd=1;$bd<$total_pages;$bd++){
        
        ?>
        
    <span class="btn theme_bg not_shown back_paged " id="<?php echo "back_paged".$bd?>" role="<?php echo $bd?>"><i class="fa fa-arrow-left"></i></span>
    <?php
    
   }
   ?>
    
    <span id="records_display">Page <span id="numberring">1</span> <span id="recordsd">record no. <span id="startpages">1</span> to <span id="endpages">10</span></span></span>
    <?php
    
    for($fd=1;$fd<$total_pages;$fd++){
        //echo "all valeus".$fd;
        if($fd>1){
            
            $hide_pagesd="not_shown";
        }else{
            $hide_pagesd="";
        }
        ?>
    <span class="btn theme_bg next_paged <?php echo $hide_pagesd?>" id="<?php echo "next_paged".$fd?>" role="<?php echo $fd?>"><i class="fa fa-arrow-right"></i></span>
    <?php
    } 
    ?>
    
</div>

 <!-- Trigger/Open The Modal -->
<button id="myBtn" class="not_shown"></button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <span class="not_shown" id="user_mailer"></span>
      <span class="close">&times;</span>
     <h3 >Invitation to pitch</h3>
    </div>
    <div class="modal-body">
        <p style="text-align:left">Subject:</p>
      <p><textarea rows="1" maxlength="100" id="subject" cols="50" placeholder="E.g Invitation to Pitch" style="width:90%; resize: none;"></textarea></p>
      <p>&nbsp;</p>
      <p style="text-align:left">Message:</p>
      <p><textarea id="message"  maxlegnth="400" placeholder="<?php echo $message?> " style="width:90%; resize: none; min-height:170px;color:#000;border:2px solid #ddd;"></textarea></p>
      <p>&nbsp;</p>
      <p><span class="btn theme_bg" id="invitation_send">Send Invitation</span></p>
      <p >&nbsp;</p>
      <p id="errors_mails" style="text-align:center">&nbsp;</p>
      <p >&nbsp;</p>
    </div>
 
  </div>

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
      
       $(".next_paged").click(function(){
        var loader=$("#loader").html()
        $("#loadingdd").html(loader);
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page+1;
        var endpages=parseInt($("#endpages").html());
        var offset=endpages;
       // alert(offset)
        $.post("modules/system/elearning_admin/pages/loadmore.php",{
            offset:offset
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("");
        var new_start=endpages+1;
        
        var new_endpages=records_perpage*new_page;
        var recodes="";
        if(new_endpages>allcounter){
            recodes=allcounter;
        }else{
            recodes=new_endpages;
        }
       // alert(recodes);
        $(".next_paged").hide();
        $("#next_paged"+new_page).show();
        $(".back_paged").hide();
        $("#back_paged"+next_page).show();
       
      $("#numberring").html(new_page);
        $("#endpages").html(recodes);
        $("#startpages").html(new_start);
        });
    })  
      
     $(".back_paged").click(function(){
        var loader=$("#loader").html()
        $("#loadingdd").html(loader);
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page-1;
        // var newn_page=next_page;
        var endpages=parseInt($("#startpages").html());
        var offset=new_page*records_perpage;
       // alert(offset)
        $.post("modules/system/elearning_admin/pages/loadmore.php",{
            offset:offset
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("");
        var new_start=offset+1;
        
        var new_endpages=records_perpage*next_page;
        var recodes="";
        if(new_endpages>allcounter){
            recodes=allcounter;
        }else{
            recodes=new_endpages;
        }
       // alert(recodes);
        $(".next_paged").hide();
        $("#next_paged"+next_page).show();
        $(".back_paged").hide();
        $("#back_paged"+new_page).show();
       
      $("#numberring").html(next_page);
        $("#endpages").html(recodes);
        $("#startpages").html(new_start);
        });
    })    
      
      
      
      
      
      
      
      
      
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
$.post("modules/system/elearning_admin/pages/filter.php",{
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
var url="modules/system/executive/evaluate/evaluate.php";
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
//var url="modules/system/elearning_admin/pages/feedback_view.php";
$.post("modules/system/elearning_admin/pages/datapage/view.php",{innovation:innovation},function(data){
  $("#home").html(data);
  //alert(data);

})

})

  })
</script>