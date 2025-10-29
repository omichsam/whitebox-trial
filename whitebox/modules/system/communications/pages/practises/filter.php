<?php
include("../../../../connect.php");
$county_name=mysqli_real_escape_string($con,base64_decode($_POST['filter']));

  $sqlj="SELECT id FROM counties where county_name='$county_name'";

    $query_runll=mysqli_query($con,$sqlj) or die($query_runll."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runll)){
            $countyid=$row['id'];

}


$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM bestpractices where county_area='$countyid'";
 //$sqlx="SELECT * FROM innovations_table";
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









$sqlx="SELECT * FROM bestpractices where county_area='$countyid' ORDER BY rand() LIMIT $offset,$no_of_records_per_page ";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $reference_number=$row['refference_no'];
     // $Category=$row['Category'];
  $article_name=$row['article_name'];
  $department=$row['department'];
  // $Innovation_Id=$row['Innovation_Id'];
   $Author=$row['Author'];
   $volume=$row['volume'];
    $Description=$row['Description'];
   $Pubblished_year=$row['Pubblished_year'];
   $Subject_area=$row['Subject_area'];
   $sourcearea=$row['sourcearea'];
   $add_id=$row['id'];
   $county_area=$row['county_area'];
    $pdf_name=$row['Documet_dir'];
   $dateadded=strtotime($row['dateadded']);

  $counter=$counter+1;
/*
$result = mysqli_query($con,"SELECT id FROM article_views where article_id='$add_id'");
$num_rows = mysqli_num_rows($result);
*/

?>
<div class=" col-xs-6 col-sm-4 even_page">
<div class="col-sm-12 col-xs-12 pageevened">
    <h2 class="col-sm-12 col-xs-12" style="font-size: 100%;
margin-top: 10px;
line-height: 1.5;
font-weight: bold;
min-height: 70px;
max-height: 70px;
color: #666666;"><span style="font-family: 'Open Sans Condensed', 'Open Sans' !important;    border-bottom: 1px solid #A31D23;"><?php echo $article_name?></span></h2>
  <div class="row">
 
  <div class="col-sm-12 col-xs-12  justyfy " id="fulldisplay"  style="color: #545454;
line-height: 1.5;
font-size: 13px;
max-height: 205px;
min-height: 200px;
overflow: hidden;
font-weight: normal;font-family: 'Open Sans', sans-serif !important;">
  <p> <?php echo $Description?></p>

<!--
<div class="row row hidden_rows col-xs-12 col-sm-12 not_shown no_padding" id="<?php echo "hiden".$counter?>"></div>-->

  </div>
   <div class=" col-sm-12 col-xs-12" style="text-transform: capitalize;font-family: Times New Roman, Times, serif;">
    
       
       <!-- <p class="col-sm-12 col-xs-12 no_padding"> 
<embed class="col-xs-12 col-sm-12 no_padding" height="150" name="plugin" src="<?php echo "documents/articles/$pdf_name"?>" type="application/pdf">

        </p>-->
        <p class="col-sm-12 col-xs-12 " style="text-align: center;margin-top: 3px;"><button style="float: center" class="btn theme_bg hover details_btns " role="<?php echo $add_id?>" id="<?php echo $add_id?>"><i class="fa fa-book"></i> Read more..</button></p>
     
  </div>
</div>

</div>
</div>
<?php
}

?>