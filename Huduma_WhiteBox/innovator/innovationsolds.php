<?php
include("../../base_connect.php");
include("../../connect.php");
$user=base64_decode($_POST['my_id']);
//$user=base64_decode($_SESSION["username"]);
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
 $last_name=$get['last_name'];
 $user_id=$get['id'];
?>
<!--<div class="breadcum">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a id="diredt_dash" style="cursor:pointer;"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d" id="livicon-11" style="width: 18px; height: 18px;"><svg height="18" version="1.1" width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;" id="canvas-for-livicon-11"><desc>Created with Raphaël 2.1.2</desc><defs></defs><path style="" fill="#3d3d3d" stroke="none" d="M29.719,15.469L24,9.751V5H21V6.752L17.414,3.167L16.424000000000003,2.1769999999999996C16.19,1.9429999999999996,15.810000000000002,1.9429999999999996,15.575000000000003,2.1769999999999996L14.585000000000003,3.167L2.282,15.469C2.048,15.703,2.048,16.083,2.282,16.317999999999998L2.847,16.883999999999997C3.081,17.116999999999997,3.461,17.118,3.6959999999999997,16.883999999999997L16,4.58L28.304000000000002,16.884C28.537000000000003,17.117,28.918000000000003,17.118000000000002,29.153000000000002,16.884L29.718000000000004,16.318C29.952,16.083,29.952,15.704,29.719,15.469ZM16,6.701L6,16.701V30H12V19.6C12,19.269000000000002,12.269,19,12.6,19H19.4C19.730999999999998,19,20,19.269,20,19.6V30H26V16.701L16,6.701ZM16,15.5L16,15.5L16,15.5L16,15.5L16,15.5ZM16,15.5L16,15.5L16,15.5L16,15.5L16,15.5ZM16,15.5L16,15.5L16,15.5L16,15.5L16,15.5ZM16,15.5L16,15.5L16,15.5L16,15.5L16,15.5Z" stroke-width="0" transform="matrix(0.5625,0,0,0.5625,0,0)"></path><path style="" fill="#3d3d3d" stroke="none" d="M18.4,20H13.599999999999998C13.267999999999997,20,12.999999999999998,20.269,12.999999999999998,20.6V30H19V20.6C19,20.269,18.731,20,18.4,20Z" transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0"></path></svg></i>Dashboard
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c" id="livicon-12" style="width: 18px; height: 18px;"><svg height="18" version="1.1" width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.53334px;" id="canvas-for-livicon-12"><desc>Created with Raphaël 2.1.2</desc><defs></defs><path style="" fill="#01bc8c" stroke="none" d="M13.273,6.551C13.039,6.785,13.041,7.166,13.273,7.4L21.9,16L13.272999999999998,24.698999999999998C13.038999999999998,24.933,13.040999999999999,25.313999999999997,13.272999999999998,25.549L13.624999999999998,25.875C13.858999999999998,26.109,14.237999999999998,26.109,14.472999999999999,25.875L23.825,16.424C24.059,16.189999999999998,24.059,15.809999999999999,23.825,15.575L14.472999999999999,6.1739999999999995C14.238999999999999,5.941,13.86,5.941,13.624999999999998,6.175L13.273,6.551Z" transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0"></path><path style="" fill="#01bc8c" stroke="none" d="M7.273,6.551C7.039,6.785,7.0409999999999995,7.166,7.273,7.4L15.9,16L7.273,24.698999999999998C7.039,24.933,7.0409999999999995,25.313999999999997,7.273,25.549L7.625,25.875C7.859,26.109,8.238,26.109,8.473,25.875L17.825000000000003,16.424C18.059000000000005,16.189999999999998,18.059000000000005,15.809999999999999,17.825000000000003,15.575L8.472,6.175C8.238,5.941,7.859,5.941,7.625,6.176L7.273,6.551Z" transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0"></path></svg></i>
                <a href="#">My Innovations</a>
            </li>
        </ol>
        <div class="pull-right">
            <i class="livicon icon3" data-name="user" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d" id="livicon-13" style="width: 20px; height: 20px;"><svg height="20" version="1.1" width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.516663px; top: -0.533333px;" id="canvas-for-livicon-13"><desc>Created with Raphaël 2.1.2</desc><defs></defs><path style="" fill="#3d3d3d" stroke="none" d="M21.291,21.271C20.116,20.788,19.645,19.452,19.645,19.452S19.116,19.756,19.116,18.908C19.116,18.058,19.645,19.452,20.176,16.179000000000002C20.176,16.179000000000002,21.644,15.753000000000002,21.351999999999997,12.238000000000003H20.997999999999998C20.997999999999998,12.238000000000003,21.880999999999997,8.479000000000003,20.997999999999998,7.206000000000003C20.115999999999996,5.933000000000003,19.763999999999996,5.085000000000003,17.820999999999998,4.477000000000003C15.879999999999997,3.8700000000000028,16.587999999999997,3.991000000000003,15.174999999999997,4.053000000000003C13.762999999999998,4.1140000000000025,12.585999999999997,4.902000000000003,12.585999999999997,5.325000000000003C12.585999999999997,5.325000000000003,11.703999999999997,5.386000000000003,11.351999999999997,5.750000000000003C10.998999999999997,6.1140000000000025,10.410999999999996,7.810000000000002,10.410999999999996,8.235000000000003S10.805999999999996,11.509000000000004,11.099999999999996,12.116000000000003L10.648999999999996,12.237000000000004C10.354999999999995,15.752000000000004,11.824999999999996,16.178000000000004,11.824999999999996,16.178000000000004C12.353999999999996,19.450000000000003,12.883999999999995,18.057000000000006,12.883999999999995,18.907000000000004C12.883999999999995,19.755000000000003,12.353999999999996,19.451000000000004,12.353999999999996,19.451000000000004S11.883999999999995,20.787000000000003,10.707999999999995,21.270000000000003C9.530999999999995,21.755000000000003,3.002999999999995,24.361000000000004,2.471999999999994,24.906000000000002C1.942,25.455,2.002,28,2.002,28H29.997999999999998C29.997999999999998,28,30.058999999999997,25.455,29.526999999999997,24.906C28.996,24.361,22.468,21.756,21.291,21.271Z" stroke-width="0" transform="matrix(0.625,0,0,0.625,0,0)"></path></svg></i>
                <a href="#" class="btn btn-primary" style="color: #fff; margin-right: 10px;"><?php echo "$first_name $last_name"?>
                </a><span></span>
                <a class="btn btn-danger" id="log_outer" style="color: #fff;cursor: pointer;">Logout</a>
        </div>
    </div>
</div>-->


<section class="content paddingleft_right15">
    <div class="row">
          <div id="notific">
            </div>
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white" id="livicon-14" style="width: 16px; height: 16px;"><svg height="16" version="1.1" width="16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.5px;" id="canvas-for-livicon-14"><desc>Created with Raphaël 2.1.2</desc><defs></defs><path style="" fill="#ffffff" stroke="none" d="M27.4,10H12.6C12.269,10,12,9.731,12,9.4V6.6C12,6.269,12.269,6,12.6,6H27.4C27.731,6,28,6.269,28,6.6V9.399999999999999C28,9.731,27.731,10,27.4,10ZM27.4,14H12.6C12.267999999999999,14,12,14.269,12,14.6V17.4C12,17.730999999999998,12.269,18,12.6,18H27.4C27.730999999999998,18,28,17.731,28,17.4V14.599999999999998C28,14.269,27.731,14,27.4,14ZM27.4,22H12.6C12.267999999999999,22,12,22.269,12,22.6V25.4C12,25.730999999999998,12.269,26,12.6,26H27.4C27.730999999999998,26,28,25.731,28,25.4V22.6C28,22.269,27.731,22,27.4,22ZM7,5C5.343,5,4,6.343,4,8S5.343,11,7,11S10,9.657,10,8S8.657,5,7,5ZM7,13C5.344,13,4,14.343,4,16C4,17.656,5.344,19,7,19S10,17.656,10,16C10,14.343,8.656,13,7,13ZM7,21C5.344,21,4,22.344,4,24S5.344,27,7,27S10,25.656,10,24S8.656,21,7,21Z" stroke-width="0" transform="matrix(0.5,0,0,0.5,0,0)"></path></svg></i>
                    My Innovations List
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" id="new_submistion"><span class="glyphicon glyphicon-plus"></span> Create</a>
                </div>
            </div>
            <br>
            <div class="panel-body table-responsive">
                 <div id="innovations-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="innovations-table_length"><label>Show <select name="innovations-table_length" aria-controls="innovations-table" class="form-control input-sm"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="innovations-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="innovations-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-responsive table-striped table-bordered dataTable no-footer" id="innovations-table" role="grid" aria-describedby="innovations-table_info" style="width: 100%;" width="100%">
    <thead>
    <tr role="row">

      <th class="sorting_asc" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 32px;" aria-sort="ascending" aria-label="View: activate to sort column descending">No.</th>
      <th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 101px;" aria-label="Innovation Name: activate to sort column ascending">Innovation Name</th>
      <th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 129px;" aria-label="Sector: activate to sort column ascending">Sector</th>
      <th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 174px;" aria-label="Big 4 Sector: activate to sort column ascending">Big 4 Sector</th>
      <th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 102px;" aria-label="Evaluation Status: activate to sort column ascending">Submitted</th><th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 136px;" aria-label="Action: activate to sort column ascending">View</th><th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 103px;" aria-label="Date Submitted: activate to sort column ascending">Track innovation</th><th class="sorting" tabindex="0" aria-controls="innovations-table" rowspan="1" colspan="1" style="width: 103px;" aria-label="Date Submitted: activate to sort column ascending">Feedback</th></tr>
    </thead>
    <tbody>
  <?php
$sqlx="SELECT * FROM innovations_table where user_id='$user_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
       $innovationName=$row['Innovation_name'];
      $sector_id=$row['sector_id'];
  $InnovationBig4Sector=$row['InnovationBig4Sector'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
   $Evaluation_status=$row['Status'];

$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];
$button_check="hidden";
$checkuser=mysqli_query($con,"SELECT * FROM feedback where Innovation_id='$Innovation_Id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){
$button_check="";
  }else{
$button_check="hidden";
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

  $counter=$counter+1;
  if($counter % 2 != 0){ 


    ?>
    <tr role="row" class="odd">
            <!-- <td>249</td> -->
           <td class="sorting_1">
           <!-- <a href="https://www.whitebox.go.ke/mkinitiative"> -->
           <!-- href="https://www.whitebox.go.ke/innovator" -->
               <?php echo $counter?>

           <!-- <a href="https://www.whitebox.go.ke/edit-innovation/249"><span class="fa fa-pencil"></span> -->
               
            <!-- <a href="#"><span class="fa fa-trash"></span></a> -->
           </td>      
           <td><?php echo $innovationName?></td>
            <td><?php echo $newsector?></td>          
            <td><?php echo $bg4id_name?></td>
            
             <td><?php echo $time_d?></td>
           
            <td>  <a class="btn view_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        View
                    </a></td>
                        <td> 

        <?php
        if($Evaluation_status=="pending"){
      ?>
         <a class="btn tsubmit_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Complete submission
                    </a> 
      <?php

        }else{
?>
    <a class="btn track_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Check
                    </a>
<?php
        }
        ?>

                         </td>
            
            <td><a class="btn <?php echo $button_check?> feedbacks"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Feedback
                    </a>
                            
                            </td>
        </tr>


        <?php

    }else{
      ?>
      <tr role="row" class="even">
          <td class="sorting_1">
           <!-- <a href="https://www.whitebox.go.ke/mkinitiative"> -->
           <!-- href="https://www.whitebox.go.ke/innovator" -->
               <?php echo $counter?>

           <!-- <a href="https://www.whitebox.go.ke/edit-innovation/249"><span class="fa fa-pencil"></span> -->
               
            <!-- <a href="#"><span class="fa fa-trash"></span></a> -->
           </td>      
           <td><?php echo $innovationName?></td>
            <td><?php echo $newsector?></td>          
            <td><?php echo $bg4id_name?></td>
            
             <td><?php echo $time_d?></td>
           
      
            <td>  <a class="btn view_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        View
                    </a></td>
                    <td> 

        <?php
        if($Evaluation_status=="pending"){
      ?>
         <a class="btn tsubmit_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Complete submission
                    </a> 
      <?php

        }else{
?>
    <a class="btn track_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Check
                    </a>
<?php
        }
        ?>

                         </td>
            
            <td><a class="btn <?php echo $button_check?>  feedbacks"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Feedback
                    </a>
                            
                            </td></tr>
<?php

}
}
?>

<!---covid-->
       
    <?php
$sqlx="SELECT * FROM covid19_innovations where user_id='$user_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
       $innovationName="Covid 19 innovation";
      $newsector=$row['sector'];
  $bg4id_name=$row['maturity'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['id'];
   $Evaluation_status=$row['Status'];
/*
$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];*/
$button_check="hidden";
$checkuser=mysqli_query($con,"SELECT * FROM feedback where Innovation_id='$Innovation_Id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){
$button_check="";
  }else{
$button_check="hidden";
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

  $counter=$counter+1;
  if($counter % 2 != 0){ 


    ?>
    <tr role="row" class="odd">
            <!-- <td>249</td> -->
           <td class="sorting_1">
           <!-- <a href="https://www.whitebox.go.ke/mkinitiative"> -->
           <!-- href="https://www.whitebox.go.ke/innovator" -->
               <?php echo $counter?>

           <!-- <a href="https://www.whitebox.go.ke/edit-innovation/249"><span class="fa fa-pencil"></span> -->
               
            <!-- <a href="#"><span class="fa fa-trash"></span></a> -->
           </td>      
           <td><?php echo $innovationName?></td>
            <td><?php echo $newsector?></td>          
            <td><?php echo $bg4id_name?></td>
            
             <td><?php echo $time_d?></td>
           
            <td>  <a class="btn view_covid"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        View
                    </a></td>
                        <td> 

        <?php
        if($Evaluation_status=="pending"){
      ?>
         <a class="btn tsubmit_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Complete submission
                    </a> 
      <?php

        }else{
?>
    <a class="btn track_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Check
                    </a>
<?php
        }
        ?>

                         </td>
            
            <td><a class="btn <?php echo $button_check?> feedbacks"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Feedback
                    </a>
                            
                            </td>
        </tr>


        <?php

    }else{
      ?>
      <tr role="row" class="even">
          <td class="sorting_1">
           <!-- <a href="https://www.whitebox.go.ke/mkinitiative"> -->
           <!-- href="https://www.whitebox.go.ke/innovator" -->
               <?php echo $counter?>

           <!-- <a href="https://www.whitebox.go.ke/edit-innovation/249"><span class="fa fa-pencil"></span> -->
               
            <!-- <a href="#"><span class="fa fa-trash"></span></a> -->
           </td>      
           <td><?php echo $innovationName?></td>
            <td><?php echo $newsector?></td>          
            <td><?php echo $bg4id_name?></td>
            
             <td><?php echo $time_d?></td>
           
      
            <td>  <a class="btn view_covid"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        View
                    </a></td>
                    <td> 

        <?php
        if($Evaluation_status=="pending"){
      ?>
         <a class="btn tsubmit_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Complete submission
                    </a> 
      <?php

        }else{
?>
    <a class="btn track_btnsa"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Check
                    </a>
<?php
        }
        ?>

                         </td>
            
            <td><a class="btn <?php echo $button_check?>  feedbacks"  id="<?php echo $Innovation_Id?>" style="color:#fff;background: #418BCA; ">
                        Feedback
                    </a>
                            
                            </td></tr>
<?php

}
}
?>

    </tbody>
</table>
</div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="innovations-table_info" role="status" aria-live="polite">Showing 1 to <?php echo $counter?> of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="innovations-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="innovations-table_previous"><a href="#" aria-controls="innovations-table" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="innovations-table" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="innovations-table_next"><a href="#" aria-controls="innovations-table" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div>



 <div class="col-sm-12" id="graphed_data"></div>
</div>
                 
            </div>

        </div>
 </div>
</section>

    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

$(".tsubmit_btnsa").click(function(){
  /*
  var innovation=btoa($(this).attr("id"));
      $.post("Huduma_WhiteBox/innovator/track.php",{innovation:innovation},function(data){
      $("#graphed_data").html(data);
      })
      */
        $.post("Huduma_WhiteBox/innovator/submit.php",function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
            })
})



    $(".track_btnsa").click(function(){
      var innovation=btoa($(this).attr("id"));
      $.post("Huduma_WhiteBox/innovator/track.php",{innovation:innovation},function(data){
      $("#graphed_data").html(data);
      })
    })
    $("#diredt_dash").click(function(){

         $("#home_display").hide().html("");
  $(".dashboard_holder").show(); 
    })
    $("#log_outer").click(function(){
            $.post("login/logout.php",function(data){
                var ddata=atob(data)
                if(ddata=="success"){
             location.replace("index.php");
                }else{

                }
            });
        })


    $(".view_btnsa").click(function(){
      var innovation=btoa($(this).attr("id"));
     $.post("Huduma_WhiteBox/innovator/view.php",{innovation:innovation},function(data){

    $("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
            })
    })

$(".view_covid").click(function(){
   var innovation=btoa($(this).attr("id"));
     $.post("Huduma_WhiteBox/innovator/view_covid.php",{innovation:innovation},function(data){

    $("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
            }) 
})



        $("#new_submistion").click(function(){
           $.post("Huduma_WhiteBox/innovator/submit.php",function(data){

$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
            })
        })
        $(".feedbacks").click(function(){
        var innovation=btoa($(this).attr("id"));

var my_id=$("#global_u_email").val();
        $.post("Huduma_WhiteBox/innovator/feedback.php",{my_id:my_id,innovation:innovation},function(data){

    $("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
            })
        })
  })
</script>