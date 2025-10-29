
<?php

include("../../../../connect.php");
//$my_user=$_POST['my_id'];
$reg_no=$_POST['reg_no'];

?>

<div class="col-sm-12 col-xs-12">

<div class="col-xs-12 col-sm-12 default_header" style="border-bottom:2px solid #000; ">Filter Out This content</div>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-3 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12 no_padding">
Give a reason fo filtration of content
<textarea class="splashinputs" id="text_reaason" style="min-height: 300px;resize: none" placeholder="E.g this is a duplicate content"></textarea>
       
<div class="col-sm-12 col-xs-12" style="text-align: center;"><span class="btn theme_bg" id="confrimforward">confirm</span></div>
<div class="col-sm-12 col-xs-12" style="text-align: center;" id="erroerpages"></div>
    </div>
  </div>
   <div class="col-sm-6 col-xs-12"></div>



</div>


  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#confrimforward").click(function(){
      var user=btoa($("#user_email").val());
     var text_reaason=btoa($("#text_reaason").val());
     var reg_no=btoa('<?php echo $reg_no ?>')

     if(text_reaason){
      var loader=$("#loader").html()
        $("#erroerpages").html(loader)
 $.post("modules/system/callcenter/view/savefilter.php",{
  text_reaason:text_reaason,
  reg_no:reg_no,
  user:user
       },function(data){
        
         $("#erroerpages").html(atob(data));
        
       })
}else{
  $("#erroerpages").html("All values required!")
}

    })
  })
</script>