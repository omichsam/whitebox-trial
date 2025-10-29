 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<?php
include "../../../../../connect.php";
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$test_id=mysqli_real_escape_string($con,base64_decode($_POST['test_id']));
$sno=0;
?>

  <div class="container box">
   <h3 align="center">FEEDBACK MODULE:<?php echo $unit_id?> </h3>
   <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>No.</th>
       <th>NAME</th>
       <th>EMAIL ADDRESS</th>
       <th>PHONE NUMBER</th>
       <th style="text-transform: uppercase;">On a scale of 1 to 10 1 being not at all 10 being extremely how useful did you find this module in helping you to grow your business?</th>
     
       <th style="text-transform: uppercase;">Are you planning to proceed to the next module on the Whitebox Platform?</th>
       <th style="text-transform: uppercase;">What is the main learning point you will take away from this session to apply to your business?</th>
       <th style="text-transform: uppercase;">How could we improve this module?</th>
      
      </tr>
     </thead>
    </table>
   </div>
  </div>

  <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
       var test_id=btoa('<?php echo $test_id?>');
      var unit_id=btoa('<?php echo $unit_id?>');

  $('#customer_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:"modules/system/content_team/pages/feedback/fetch.php",
    data:{test_id:test_id,unit_id:unit_id},
    type:"POST"
   },
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>