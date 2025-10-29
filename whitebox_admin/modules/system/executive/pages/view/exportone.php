 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->


  <div class="container box">
   <h3 align="center">Innovations Received From First Evaluation</h3>
   <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <!--<th>No.</th>
       <th>INNOVATOR NAME</th>-->
       <th>EMAIL ADDRESS</th>
       <th>PHONE NUMBER</th>
       <th>INNOVATION NAME</th>
       <!--<th>SECTOR</th>
       <th>BIG FOUR AGENDA</th>-->
       <th>STAGE</th>
       <th>SUBMITED AS</th>
       <th>GAP IDENTIFIED</th>
       <th>SOLUTION PROVIDED</th>
       <th>INNOVATION IMPACT</th>
       <th>BUSINESS MODEL</th>
       <th>CUSTOMER TARGET</th>
       <th>RESEARCH SOURCES</th>
       <th>TECHNICAL REQUIREMENTS</th>
       <th>STATUS</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>

  <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:"modules/system/executive/pages/view/fetch.php",
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