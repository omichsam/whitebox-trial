<style type="text/css">
  .assingn_innovations{
  }
  #error_assignment{
    text-align: center;
  }
  .cout_projects{
color:#e7663c;
font-size: 19px;
font-weight:bolder;
padding: 2px 11px;
border-radius:10px;
background:#fff;
  }
  .cout_projectsd{
padding: 0px 5px;
border-radius:10px;
  }
  .add_to_select{
     /* color:#e6b234;*/
  }
  .add_to_select:hover{
      color:green;
  }
  .not_assigned{
      min-height:20px;
      margin-top;5px;
      background:#fff;
      border-bottom:2px solid #ccc;
  }
  .orange{
       min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#f7c976;
  }
  .pending{
       min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#daf;
  }
  .rejects{
      min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#fb9595;
      color:#000;
  }
  .clean_sheet{
   min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#7ab97a;
      color:#000;   
  }
  .More_pending{
    min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#dea;
      color:#000;  
  }
  .avarage{
      min-height:20px;
      margin-top;5px;
      border-bottom:2px solid #ccc;
      background:#cae;
  }
</style>
<div class="col-sm-12 col-xs-12 reports_project">
    <?php
  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
//$interest=base64_decode($_post['interest']);
$innov=base64_decode($innovation);
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innov'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
    }

//$category=base64_decode($_POST['category']);
$assignments="pending";
$accepted="accepted";
$declined="declined";
//$sqlx="SELECT * FROM investors where Investor_id='$investor'";

  ?>
<div class=" col-sm-12 col-xs-12 no_padding">
    
    <div class="col-sm-12 col-xs-12 default_header" style="border-bottom:2px solid #ccc;"><?php echo $Innovation_name?> </div>
  <div class="col-sm-12 col-xs-12 default_header">POTENTIAL INVESTORS/IMPLEMENTORS/PARTNERS </div>
  <div class="col-sm-12 no_padding col-xs-12 display_titles">
  <div class="col-xs-4 col-sm-2  content_h" ><span class="mobile_hidden">&nbsp;&nbsp;&nbsp;&nbsp; </span>NAME</div>
  <div class="col-sm-2 col-xs-1 mobile_hidden" > COMPANY </div>
  <div class="col-sm-3 col-xs-3 mobile_hidden" > SECTOR INTERESTED</div>
  <div class="col-sm-1 col-xs-1 mobile_hidden" > PHONE </div>
      <div class="col-sm-3 col-xs-8 ">&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="cout_projectsd" >FW</span>    
       <span class="cout_projectsd" >AC</span> 
       <span class="cout_projectsd" >PE</span>
       <span class="cout_projectsd" >DC</span>
       </div>
       <div class="col-sm-1 col-xs-1 mobile_hidden"></div>
</div>

</div>
<?php
$counter=0;
$sub_query="";
$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));
/*if($interest=="petnership_implementors"){
   // $my_role="Implementer";
    $sub_query='and role=Implementer';
}else if($interest=="patnership_innovators"){
$sub_query='and role=Partnership';
    //$my_role="Partnership";
}else if($interest=="funding"){
    $sub_query='and role=Investor';
   // $my_role="Investor";
}else if($interest=="communities"){
   
    $sub_query='and role=Other';
}else{
    
}*/
$aggrement="agreed";
$aggrementstatus="Approved";

//$sqlx="SELECT * FROM investors where aggrement='$aggrement' and agrement_status ='$aggrementstatus' and interest='$category' $sub_query";
$sqlx="SELECT * FROM investors";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $investor_id=$row['id'];
  
  $checkExist=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id='$investor_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      
  }else{
      $counter=$counter+1;
      $innovationsdaa=0;
$rejects=0;
$pendings=0;
$accepts=0;
  $innovationsdaa=0;
         $Name=$row['investorName'];
     // $Category=$row['Category'];
  $Company=$row['company_name'];
  $Contact=$row['PhoneNumber'];
   $interest=$row['sector_id'];
   $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$interest'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);
 $newsector=$getid['name'];


  
?>
  <div class="col-sm-12 col-xs-12  no_padding not_assigned">
 <div class="col-xs-4 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
  <div class="col-sm-3 col-xs-4 mobile_hidden"> <?php echo $newsector?> </div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
    <div class="col-sm-3 col-xs-7 ">&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="cout_projects" ><?php echo $innovationsdaa?></span>
       <span class="cout_projects" ><?php echo $accepts?></span>  
       <span class="cout_projects" ><?php echo $pendings?></span>
       <span class="cout_projects" ><?php echo $rejects?></span>
       </div>
   <div class="col-sm-1 col-xs-1"> <span class="btn add_to_select" role="<?php echo $Name.", ".$Company?>" id="<?php echo $investor_id ?>"><i  class="fa fa-plus-square fa-2x"></i></span></div>

</div>
<?php
}
}



//$sqlx="SELECT * FROM investors where aggrement='$aggrement' and agrement_status ='$aggrementstatus' and interest='$category'";
$sqlx="SELECT * FROM investors";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $investor_id=$row['id'];

  $checkExist=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id='$investor_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      $innovationsdaa=0;
$rejects=0;
$pendings=0;
$accepts=0;
 $datavalues="";
      $sqlxd="SELECT * FROM innovation_investors WHERE investor_id='$investor_id'";

    $query_runxd=mysqli_query($con,$sqlxd) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($rowed=mysqli_fetch_array($query_runxd)){
      
        $status=$rowed['status'];
        if($status==$assignments){
            $pendings=$pendings+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$accepted){
            $accepts=$accepts+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$declined){
            $rejects=$rejects+1;
           $innovationsdaa=$innovationsdaa+1; 
        }else{
            
        }
        
    }
   if($accepts>=$innovationsdaa){
     $datavalues="clean_sheet";  
   
    
    
      $counter=$counter+1;
         $Name=$row['investorName'];
     // $Category=$row['Category'];
  $Company=$row['company_name'];
  $Contact=$row['PhoneNumber'];
   $interest=$row['sector_id'];
   $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$interest'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);
 $newsector=$getid['name'];


  
?>
  <div class="col-sm-12 col-xs-12  no_padding <?php echo $datavalues?>">
 <div class="col-xs-5 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
  <div class="col-sm-3 col-xs-4 mobile_hidden"> <?php echo $newsector?> </div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
   <div class="col-sm-3 col-xs-5 ">&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="cout_projects" ><?php echo $innovationsdaa?></span>
       <span class="cout_projects" ><?php echo $accepts?></span>  
       <span class="cout_projects" ><?php echo $pendings?></span>
       <span class="cout_projects" ><?php echo $rejects?></span>
       </div>
   <div class="col-sm-1 col-xs-1"> <span class="btn add_to_select" role="<?php echo $Name.", ".$Company?>" id="<?php echo $investor_id ?>"><i  class="fa fa-plus-square fa-2x"></i></span></div>

</div>
<?php
}else{
        
   }
}else{
    
}
}



//$sqlx="SELECT * FROM investors where aggrement='$aggrement' and agrement_status ='$aggrementstatus' and interest='$category'";

$sqlx="SELECT * FROM investors";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $investor_id=$row['id'];

  $checkExist=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id='$investor_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      $innovationsdaa=0;
$rejects=0;
$pendings=0;
$accepts=0;
 $datavalues="";
      $sqlxd="SELECT * FROM innovation_investors WHERE investor_id='$investor_id'";

    $query_runxd=mysqli_query($con,$sqlxd) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($rowed=mysqli_fetch_array($query_runxd)){
      
        $status=$rowed['status'];
        if($status==$assignments){
            $pendings=$pendings+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$accepted){
            $accepts=$accepts+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$declined){
            $rejects=$rejects+1;
           $innovationsdaa=$innovationsdaa+1; 
        }else{
            
        }
        
    }
  
        if($pendings>=1){
     $datavalues="More_pending";  
       
    
      $counter=$counter+1;
         $Name=$row['investorName'];
     // $Category=$row['Category'];
  $Company=$row['company_name'];
  $Contact=$row['PhoneNumber'];
   $interest=$row['sector_id'];
   $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$interest'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);
 $newsector=$getid['name'];


  
?>
  <div class="col-sm-12 col-xs-12  no_padding <?php echo $datavalues?>">
 <div class="col-xs-5 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
  <div class="col-sm-3 col-xs-4 mobile_hidden"> <?php echo $newsector?> </div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
   <div class="col-sm-3 col-xs-5 ">&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="cout_projects" ><?php echo $innovationsdaa?></span>
       <span class="cout_projects" ><?php echo $accepts?></span>  
       <span class="cout_projects" ><?php echo $pendings?></span>
       <span class="cout_projects" ><?php echo $rejects?></span>
       </div>
   <div class="col-sm-1 col-xs-1"> <span class="btn add_to_select" role="<?php echo $Name.", ".$Company?>" id="<?php echo $investor_id ?>"><i  class="fa fa-plus-square fa-2x"></i></span></div>

</div>
<?php
}else{
    
}
}else{
    
}
}

//rejects

//$sqlx="SELECT * FROM investors where aggrement='$aggrement' and agrement_status ='$aggrementstatus' and interest='$category'";
$sqlx="SELECT * FROM investors";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $investor_id=$row['id'];

  $checkExist=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id='$investor_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      $innovationsdaa=0;
$rejects=0;
$pendings=0;
$accepts=0;
 $datavalues="";
      $sqlxd="SELECT * FROM innovation_investors WHERE investor_id='$investor_id'";

    $query_runxd=mysqli_query($con,$sqlxd) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($rowed=mysqli_fetch_array($query_runxd)){
      
        $status=$rowed['status'];
        if($status==$assignments){
            $pendings=$pendings+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$accepted){
            $accepts=$accepts+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$declined){
            $rejects=$rejects+1;
           $innovationsdaa=$innovationsdaa+1; 
        }else{
            
        }
        
    }
  
       if($rejects>=$innovationsdaa) {
           $datavalues="rejects";
       
    
    
      $counter=$counter+1;
         $Name=$row['investorName'];
     // $Category=$row['Category'];
  $Company=$row['company_name'];
  $Contact=$row['PhoneNumber'];
   $interest=$row['sector_id'];
   $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$interest'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);
 $newsector=$getid['name'];


  
?>
  <div class="col-sm-12 col-xs-12  no_padding <?php echo $datavalues?>">
 <div class="col-xs-5 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
  <div class="col-sm-3 col-xs-4 mobile_hidden"> <?php echo $newsector?> </div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
   <div class="col-sm-3 col-xs-5 ">&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="cout_projects" ><?php echo $innovationsdaa?></span>
       <span class="cout_projects" ><?php echo $accepts?></span>  
       <span class="cout_projects" ><?php echo $pendings?></span>
       <span class="cout_projects" ><?php echo $rejects?></span>
       </div>
   <div class="col-sm-1 col-xs-1"> <span class="btn add_to_select" role="<?php echo $Name.", ".$Company?>" id="<?php echo $investor_id ?>"><i  class="fa fa-plus-square fa-2x"></i></span></div>

</div>
<?php
}else{
    
}
}else{
    
}
}

?>

  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        var innovation='<?php echo $innovation?>';
        $("#total_investors").html("");
         $("#total_menu").hide();
         $("#error_assignment").html("");
        
         var loader=$("#loader").html();
        $(".add_to_select").click(function(){
            var investor=btoa($(this).attr("id"));
           /* var role=$(this).attr("role");
            var infor="<div class='col-sm-12 no_padding col-xs-12 data_roewrs'><div class='col-sm-1 col-xs-1'></div><div class='col-sm-8 col-xs-8'>"+role+"</div><div class='col-sm-2 col-xs-2'><span class='btn sub_btnsa'><i class='fa fa-minus'></i></span></div></div>";
            $("#total_menu").show()
            
            $("#total_investors").append(infor);
            */
            
            $.post("modules/system/executive/pages/forward/list.php",{investor:investor},function(data){
                if($.trim(data)=="success"){
                    $("#error_assignment").html(loader);
                $.post("modules/system/executive/pages/forward/interested.php",{innovation:innovation},function(data){
                    if($.trim(data)==""){
                        
                    $("#total_investors").html("");
                      $("#total_menu").hide();
                      $("#error_assignment").html("");
                      $(".lists_wraps").hide();
                    }else{
                    $(".lists_wraps").show();
                    $("#total_investors").html(data);
                      $("#total_menu").show();
                      $("#error_assignment").html("");
                    }
                })    
                }else{
                    
                }
            })
        })
     
    })
  </script>

