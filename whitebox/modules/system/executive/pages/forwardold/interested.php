<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$checkExist=mysqli_query($con,"SELECT * FROM investor_list") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
?>



		<div class="col-sm-12 col-xs-12 innovations_load">
		     	<?php
		     	

$count=0; 
$sqlxd="SELECT * FROM investor_list";
    $query_runxd=mysqli_query($con,$sqlxd) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
        $investor_id=$row['investor_id'];
       
$sqlx="SELECT * FROM investors where Investor_id='$investor_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Name=base64_decode(decrypt($row['Name'], $key));
      $Company=base64_decode(decrypt($row['Company'], $key));
     $count=$count+1;

				
				?>
				
	<div class="col-sm-12 no_padding col-xs-12 data_roewrs">
    <div class="col-sm-9 col-xs-9 no_padding"><?php echo $count.". ".$Name.", ".$Company?></div>
    <div class="col-sm-1 col-xs-1">
        <span class="btn sub_btnsa" id="<?php echo $investor_id?>">
            <i class="fa fa-minus-square"></i>
        </span>
    </div>
    </div>
           
           
           <?php
			}
          }
			?>
<div class="col-sm-12 col-xs-12  no_padding" id="total_menu">
<div class="col-sm-6 col-xs-6 "><span class="btn remove_all theme_bg" >Clear list</span></div>
<div class="col-sm-6 col-xs-6 ">
<span class="btn assingn_innovations theme_bg" role="Assign">Assign</span> </div>
</div>
		</div>
<script type="text/javascript">

    $(document).ready(function(){
        var innovation='<?php echo $innovation?>';
        var loader=$("#loader").html();
        $(".sub_btnsa").click(function(){
             $("#error_assignment").html(loader);
            var investor=btoa($(this).attr("id"));
             $.post("modules/system/executive/pages/forward/remove.php",{investor:investor},function(data){
	          if($.trim(data)=="success"){
                $.post("modules/system/executive/pages/forward/interested.php",{innovation:innovation},function(data){
                    
                     if($.trim(data)==""){
                         $.get("modules/system/executive/pages/forward/key.php",{
	              
	          },function(data){ $("#total_investors").html(data)
	               $(".lists_wraps").hide();
	          })
                        $(".lists_wraps").hide();
                    $("#total_investors").html("");
                      $("#total_menu").hide();
                      $("#error_assignment").html("");
                      
                    }else{
                    $(".lists_wraps").show();
                    $("#total_investors").html(data);
                      //$("#total_menu").show();
                      $("#error_assignment").html("");
                    }
                }) 
	          }else{
	              $("#error_assignment").html("An error occured"); 
	          }
	        })
        })
         $(".remove_all").click(function(){
	        $("#error_assignment").html(loader);
	       $.post("modules/system/executive/pages/forward/clear.php",{},function(data){
	          
	        if($.trim(data)=="success"){
	             $(".lists_wraps").hide();
	            $("#error_assignment").html("");
	        $("#total_investors").html("");
	        $("#total_menu").hide();
	        $.get("modules/system/executive/pages/forward/key.php",{
	              
	          },function(data){ $("#total_investors").html(data)
	               $(".lists_wraps").hide();
	          })
	        
	        }else{
	            $("#error_assignment").html("An error occured");
	        }
	       })
	        
	        //alert()
	    })
	     $(".assingn_innovations").click(function(){
		     
      var loader=$("#loader").html();
        var assignment_target="#error_assignment";
        $(assignment_target).html(loader)
        var role=$(this).attr("role");
        if(role=="Assign"){
          //alert(investor)
        var assignment="modules/system/executive/pages/forward/assign.php";
        $.post(""+assignment+"",{innovation:innovation},function(data){
         
         if($.trim(data)=="success"){
             
         $(assignment_target).html("");
          $.post("modules/system/executive/pages/forward/forward.php",{},function(data){$("#home").html(data)})   
         }else{
            
         $(assignment_target).html(data); 
         }
        })

        }else{

        }
      })
		
    })
    
</script>
	<?php
  }else{
  echo "";
  }
  ?>