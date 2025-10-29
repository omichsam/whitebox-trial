
<?php

include("../../../../connect.php");
//$my_user=$_POST['my_id'];
$reg_no=$_POST['reg_no'];

?>

<div class="col-sm-12 col-xs-12">

<div class="col-xs-12 col-sm-12 default_header" style="border-bottom:2px solid #000; ">Forward issue to resource persons</div>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-3 col-xs-12"></div>
    <div class="col-sm-6 col-xs-12 no_padding">
Select Department:


      <Select class="splashinputs" id="selectdepartment">
        <option></option>
<?php
$sqlx="SELECT * FROM  departments";
   $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $placename=$row['name'];
      
?>

<option><?php echo $placename?></option>
<?php
}
?>
</Select>


Include existing Departments:


      <Select class="splashinputs" id="existdepartment">
        <option>yes</option>
          <option>no</option>
        </Select>
Due Date:


      <input type="date" name="" class="splashinputs" id="duedate">
       
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
     var selectdepartment=btoa($("#selectdepartment").val());
     var existdepartment=btoa($("#existdepartment").val());
     
     var reg_no=btoa('<?php echo $reg_no ?>')
     var duedate=btoa($("#duedate").val());
     //alert(selectdepartment)
     if(selectdepartment && duedate){
      var loader=$("#loader").html()
        $("#erroerpages").html(loader)
 $.post("modules/system/callcenter/view/savereforward.php",{
  selectdepartment:selectdepartment,
  duedate:duedate,
  reg_no:reg_no,
  user:user,
  existdepartment:existdepartment
       },function(data){
        
         $("#erroerpages").html(atob(data));
        
       })
}else{
  $("#erroerpages").html("All values required!")
}

    })
  })
</script>