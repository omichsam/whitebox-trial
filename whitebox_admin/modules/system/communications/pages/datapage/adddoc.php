<!--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 <?php
$my_id=$_POST['my_id'];
 ?>
  <br />
  <br />
  <div class="container">
   <!--<h1 align="center">Import CSV File Data with Progress Bar in PHP using Ajax - 3</h1>-->
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Import CSV Data file</h3>
    </div>
      <div class="panel-body">
       <span id="message"></span>
       <form id="sample_form" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12 col-xs-12" style="margin-bottom: 5px;">
             <div class="col-sm-4 col-xs-12">
              <label class="col-md-12 control-label">Document name</label>
             </div>
              <div class="col-sm-4 col-xs-12">
         
         <input type="text" class="splashinputs" name="docmname" id="name" />
          <input type="text" name="user" value="<?php echo $my_id?>" hidden="hidden" id="user" />
       </div>
          <div class="col-sm-12 col-xs-12">
         <label class="col-md-4 control-label">Select CSV File</label>
         <input type="file" name="file" id="file" />
       </div>
        </div>
        <div class="form-group" align="center">
         <input type="hidden" name="hidden_field" value="1" />
          <input type="hidden" name="hidden_docid" id="hidden_docid" />
         <input type="submit" name="import" id="import" class="btn btn-info" value="Import" />
        </div>
       </form>
       <div class="col-sm-12 col-xs-12">
       <div class="form-group" id="process" style="display:none;">
        <div class="progress">
         <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
          <span id="process_data">0</span> - <span id="total_data">0</span>
         </div>
        </div>
       </div>
     </div>
      </div>
     </div>
  </div>

<script>
 
 $(document).ready(function(){

  var clear_timer;

  $('#sample_form').on('submit', function(event){
   $('#message').html('');
   event.preventDefault();
   $.ajax({
    url:"modules/system/callcenter/datapage/upload.php",
    method:"POST",
    data: new FormData(this),
    dataType:"json",
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function(){
     $('#import').attr('disabled','disabled');
     $('#import').val('Importing');
    },
    success:function(data)
    {
     if(data.success)
     {
      $('#total_data').text(data.total_line);
      $('#hidden_docid').val(data.doc_id);
     // var hidden_docid=data.doc_id;
      start_import();

      clear_timer = setInterval(get_import_data, 2000);

      //$('#message').html('<div class="alert alert-success">CSV File Uploaded</div>');
     }
     if(data.error)
     {
      $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
      $('#import').attr('disabled',false);
      $('#import').val('Import');
     }
    }
   })
  });

  function start_import()
  {
   $('#process').css('display', 'block');
   $.ajax({
    url:"modules/system/callcenter/datapage/import.php",
    success:function()
    {

    }
   })
  }

  function get_import_data()
  {
    var doc_id=$('#hidden_docid').val();
   $.post("modules/system/callcenter/datapage/process.php",{doc_id:doc_id},function(data){


     var total_data = $('#total_data').text();
     var width = Math.round((data/total_data)*100);
     $('#process_data').text(data);
     $('.progress-bar').css('width', width + '%');
     if(width >= 100)
     {
      clearInterval(clear_timer);
      $('#process').css('display', 'none');
      $('#file').val('');
      $('#message').html('<div class="alert alert-success">Data Successfully Imported</div>');
      $('#import').attr('disabled',false);
      $('#import').val('Import');
     }
    
   })
  }

 });
</script>

