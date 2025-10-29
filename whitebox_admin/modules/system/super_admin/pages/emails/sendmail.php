<div class="col-sm-12 col-xs-12" style="text-align:center;" id="refresh_msg"></div>

<?php
include "../../../../../connect.php";
$send_to=$_POST['send_to'];
$copy_email=$_POST['copy_email'];
$message_box=$_POST['message_box'];
$user_email=$_POST['user_email'];
 // attachment:attachment,
$subject=$_POST['subject'];
$mails="";
$date = time();


$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM data_table";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $allcounter=$allcounter+1;
    }
    $allcounter=$allcounter+5;
    $total_pages = ceil($allcounter / $no_of_records_per_page); 
?>
<script type="text/javascript">
    var sterpageno=1;
    var nextpi=1;
    var nexp=1;
    $(document).ready(function(){
        var sterpageno=0;
        var nextpi=1;
        var pageno=1;
      //alert()
      setInterval(function(){
       var sterpageno=1;
        refresh_messages()
         //},240000);
        },60000)
        
      refresh_messages()

    })

function refresh_messages(){
   var allcounter=parseInt('<?php echo $allcounter?>');
//var sterpageno=0;
var send_to='<?php echo $send_to?>';
var copy_email='<?php echo $copy_email?>';
var message_box='<?php echo $message_box?>';
var user_email='<?php echo $user_email?>';
 //alert(pageno)
 // attachment:attachment,
var subject='<?php echo $subject?>';
      $.post("modules/system/super_admin/pages/emails/send.php",{
            copy_email:copy_email,
            send_to:send_to,
            message_box:message_box,
            user_email:user_email,
            subject:subject,
            sterpageno:sterpageno
      },function(data){

            var tdata=parseInt($.trim(data))
          if(tdata>allcounter){
        
        
        $.post("modules/system/super_admin/pages/emails/emails.php",function(data){
            $("#home").html(data);
        });
       
        }else{

        }
      
      var nextpi=tdata;
      sterpageno=tdata;
        var nexpn=nextpi-5;
        nexp=nexpn+1;
        $("#refresh_msg").html(nexp+" to "+ nextpi+" Sent");
        //nexp=nexp+tdata;
      }) 
}

</script>