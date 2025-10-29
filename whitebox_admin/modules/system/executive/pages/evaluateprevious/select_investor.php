
<style type="text/css">
  .assingn_innovations{
    margin-top: 10px;
  }
  #error_assignment{
    text-align: center;
  }
</style>
<div class="col-sm-12 col-xs-12 reports_project">
		<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$investor=$_POST['investors'];
$innovation=$_POST['innovation'];

$sqlx="SELECT * FROM investors where Innovation_Id='$investor'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Name=base64_decode(decrypt($row['Name'], $key));
      $Category=$row['Category'];
  $Company=base64_decode(decrypt($row['Company'], $key));
  $interest=base64_decode(decrypt($row['interest'], $key));
}
  ?>
<div class=" col-sm-12 col-xs-12 ">
	<div class="col-sm-12 col-xs-12 default_header">INVESTOR </div>
	<div class="col-sm-12 no_padding col-xs-12 display_titles">
  <div class="col-xs-6 col-sm-6 mobile_hidden content_h" >INVESTOR NAME</div>
  <div class="col-sm-6 col-xs-6" style="text-align: center;"> COMPANY </div>

</div>

</div>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
  <div class="col-xs-6 col-sm-6 mobile_hidden content_h" ><?php echo "Allan"?> </div>
  <div class="col-sm-6 col-xs-6"> NTSC</div>


</div>

<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn assingn_innovations theme_bg" role="back">Back</span> <span class="btn assingn_innovations theme_bg" role="Assign">Assign</span> </div>
<div class="col-sm-12 col-xs-12" id="error_assignment"></div>


	</div>
  <script type="text/javascript">
    $(document).ready(function(){
      var investor='<?php echo $investor?>';
      var loader=$("#loader").html();
      var innovation='<?php echo $innovation?>';
      $(".assingn_innovations").click(function(){
      
        var assignment_target="#error_assignment";
        $(assignment).html(loader)
        var role=$(this).attr("role");
        if(role=="Assign"){
          //alert(investor)
        var assignment="modules/system/executive/pages/evaluate/assign.php";
        $.post(""+assignment+"",{innovation:innovation,investor:investor},function(data){
         $(assignment_target).html(data);
        })

        }else{

        }
      })
    })
  </script>