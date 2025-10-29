<style type="text/css">
  .reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
  }
  .innovations_load{
    min-height: 200px;
    margin-top: 5px;
    max-height: 200px;
    overflow: auto;

  }
  .innovations_bn{
    min-height: 20px;
    cursor: pointer;
    margin-top: 4px;
    box-shadow: 0 0 3px #ccc;

  }
  .coment_d{
    border: 1px solid #ccc;
    resize: none;
    min-height: 420px;
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .evaluate_btns{
    margin-top: 10px;
  }
  #approved_part{
    text-align: center;
    margin-top: 100px;
  }
  .error_datas{
    text-align: center;
  }
  .infor_ps{
    min-height: 50px;
    box-shadow: 0px 0px 2px #ccc;
  }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
$questions="question";
$my_decision="waiting";


    $date = time();
  $new_time=$date;
$checkquestions=mysqli_query($con,"SELECT * FROM covid_feedback WHERE Innovation_Id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)>=1){
 $sqlx="SELECT user_id FROM covid19_innovations where id='$innovation'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $user_id=$row['user_id'];
      
    }
   $get_user=mysqli_query($con,"SELECT email,last_name,first_name FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
  $newFirst_name=$get['first_name'];
$newLast_name=$get['last_name']; 
$email=$get['email'];  
 $update=mysqli_query($con,"UPDATE covid19_innovations SET Status='$my_decision' WHERE id='$innovation'") or die(mysqli_error($con));
 $update=mysqli_query($con,"UPDATE covid19innovation_stamps SET first_evaluation='$new_time' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));

 $subject="First Level Innovation Evaluation";
 $message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>Your Innovation has successfully gone through the first level evaluation.</p><p>Kindly log into your portal account to view the feedback from the evaluation team.</p><p>Link https://www.tumcathcom.com/new_whitebox</p><p>&nbsp;</p><p>Regards,</p><p>Huduma WhiteBox</p>";

include "../../../../../modules/mails/general.php"; 

 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(null,
                      '$user_id',
                      'Clerk',
                      'First evaluation',
                      '$message',
                      'Evaluation Clerk',
                      'new',
                      '$new_time')") or die(mysqli_error($con));


?>
<div class="col-sm-12 col-xs-12 " id="">
<div class=" col-sm-12 col-xs-12 default_header">WRITE REPORT</div>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 reports_body">
    
<div class=" col-sm-12 col-xs-12 default_header" id="dynamic_header"></div>

<div class=" col-sm-12 col-xs-12 ">
  
<textarea id="report_datadbd" class="coment_d col-sm-12 col-xs-12"  maxlength="700" onkeyup="comme_reportds(this.value)" placeholder="Type your report here about the subject here max(700 characters)"></textarea>



</div>

<div class="colsm-12 col-xs-12" style="text-align: center; " id="report_dcountds">&nbsp;</div>
  </div>  


  </div>
  <!--<div class="col-sm-3 col-xs-12 reports_body" id="innovations_gradients">
<h3 class='default_header' style="border-bottom: 1px solid #ccc;">NOTE</h3>
<div class="infor_ps col-sm-12 col-xs-12">This innovation will not proceed to the next stage untill the innovator answers the questions you provided</div>
<p>&nbsp;</p>
<div class="infor_ps col-sm-12 col-xs-12">You will recive the information from the innovator once the questions are answered from the innovator's account</div>

  </div>-->

</div>


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg back_tos" id="back_to">Back</span> <span class="btn evaluate_btns theme_bg" id="sendd_buttonds">Send</span> </div>


</div>

<?php



}else{
?>
<div class=" col-sm-12 col-xs-12 default_header decide_head">What is your decision on this innovation?</div>

<div class=" col-sm-12 col-xs-12 default_header">&nbsp;</div>
<div class="col-sm-12 col-xs-12" id="approved_part">

  <span class="btn theme_bg approve_btns " role="disapproved">I Decline</span> 
    <span class="btn theme_bg approve_btns" role="approved">I Accept</span> 
</div>
<div class="col-sm-12 col-xs-12 not_shown" id="approved_disaprove">
<div class=" col-sm-12 col-xs-12 default_header">WRITE REPORT</div>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 reports_body">
    
<div class=" col-sm-12 col-xs-12 default_header" id="dynamic_header"></div>

<div class=" col-sm-12 col-xs-12 ">
  
<textarea id="report_datadb" class="coment_d col-sm-12 col-xs-12"  maxlength="700" onkeyup="comme_report(this.value)" placeholder="Type your report here about the subject here max(700 characters)"></textarea>



</div>

<div class="colsm-12 col-xs-12" style="text-align: center; " id="report_dcount">&nbsp;</div>
  </div>  


  </div>
 <!-- <div class="col-sm-3 col-xs-12 reports_body" id="innovations_gradients">

<h3 class='default_header' style="border-bottom: 1px solid #ccc;">NOTE</h3>
<div class="infor_ps col-sm-12 col-xs-12">The decision you gave will determine wether this innovation proceeds or not</div>
<p>&nbsp;</p>
<div class="infor_ps col-sm-12 col-xs-12">The innovator will be notified accordingly</div>

  </div>-->

</div>


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg back_tos" id="back_to">Back</span> <span class="btn evaluate_btns theme_bg" id="send_button">Send</span> </div>


</div>




  <?php
}
?>

<div class="col-sm-12 col-xs-12 error_datas" id="error_datas"></div>
<script type="text/javascript">
    function comme_report(str) {
  var lng = str.length;
  document.getElementById("report_dcount").innerHTML = lng + ' out of 700 characters';
}
    function comme_reportds(str) {
  var lng = str.length;
  document.getElementById("report_dcountds").innerHTML = lng + ' out of 700 characters';
}
  $(document).ready(function(){
      var loader=$("#loader").html();
   $("#send_button").click(function(){

      var user=$("#user_email").val();
    var innovation=btoa('<?php echo $innovation ?>');
    var update="modules/system/clerk/pages/covid/save_report.php";
    var next_destination="modules/system/clerk/pages/covid/covid.php";
 var report_datadb=btoa($("#report_datadb").val())
 if(report_datadb){
$("#report_datadb").css("border","1px solid #ccc");
$.post(""+update+"",{user:user,innovation:innovation,report_datadb:report_datadb},function(data){
  if($.trim(data)=="success"){
      
   $.post(""+next_destination+"",{},function(data){
    $("#home").html(data);
   })
  }else{

  }
})
 }else{
  $("#report_datadb").css("border","2px solid red");
  $(".error_datas").html("Please write a report").css("color","red");
 }
   })


   $("#sendd_buttonds").click(function(){

      var user=$("#user_email").val();
    var innovation=btoa('<?php echo $innovation ?>');
    var update="modules/system/clerk/pages/covid/save_report.php";
    var next_destination="modules/system/clerk/pages/covid/covid.php";
 var report_datadb=btoa($("#report_datadbd").val())
 if(report_datadb){
$("#report_datadbd").css("border","1px solid #ccc");
$.post(""+update+"",{user:user,innovation:innovation,report_datadb:report_datadb},function(data){
  if($.trim(data)=="success"){
      
   $.post(""+next_destination+"",{},function(data){
    $("#home").html(data);
   })
  }else{

  }
})
 }else{
  $("#report_datadbd").css("border","2px solid red");
  $(".error_datas").html("Please write a report").css("color","red");
 }
   })



    $(".back_tos").click(function(){
         
          
    $(".evaluation_class").hide();
    $("#sixth_page").show();
    })


$(".approve_btns").click(function(){
     $("#error_datas").html(loader);
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
  var decision_url="modules/system/clerk/pages/evaluate/decision.php";
  var query_less="modules/system/clerk/pages/evaluate/list.php";
  var rolet=$(this).attr("role");
  var decision="";
 
  if(rolet=="approved"){
    decision=btoa("second_evaluation");
    $("#dynamic_header").html("WRITE A REPORT ON THIS INNOVATION")
  }else{
     $("#dynamic_header").html("WRITE A REPORT ON THIS INNOVATION")
    decision=btoa("first_disapproved");
  }
$.post(""+decision_url+"",{decision:decision,innovation:innovation},function(data){
  if($.trim(data)=="success"){
      $("#error_datas").html("")
 $.post(""+query_less+"",{innovation:innovation},function(data){
     $("#innovations_gradients").html(data);
  $("#approved_part").hide();
  $(".decide_head").hide();
  
  $("#approved_disaprove").show();
})
  }else{
 $("#error_datas").html("")
  }
})
  
})

  })
</script>