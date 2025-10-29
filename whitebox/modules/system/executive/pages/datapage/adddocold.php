<style>  
              
                .box  
                {  
                     width:900px;  
                     padding:20px;  
                     background-color:#fff;  
                     border:1px solid #ccc;  
                     border-radius:5px;  
                     margin-top:100px;  
                }  
           </style>  
    <?php
    $user=$_POST['my_id'];?>
           <div class="container box">  
                <h3 align="center">Add an new excel data file</h3>  
                <br /><br />  
                <br /><br />  
                <form method="post" class="col-sm-12 col-xs-12" id="export_excel"> 
                  <div class="col-sm-3 col-xs-12"></div>
                  <div class="col-sm-6 col-xs-12">
                 <label>Document name</label>  
                       <input class="splashinputs" type="text" name="docname"  id="docname" /> <br /><br /> 
                     <label>Select Excel</label>  
                     <input class="splashinputs" type="text" hidden="" value="<?php echo $user?>" name="user" id="users" />  
                     <input class="" type="file" name="excel_file" id="excel_file" /> 
                     <div class="col-sm-12 col-xs-12" style="text-align: center;"> 
                     <span class="theme_bg btn" id="submitdgb">Submit</span>
                   </div>
                   </div>
                </form>  
                <br />  
                <br />  
                <div class="col-sm-12 col-xs-12" style="text-align: center;" id="result">  
                </div>  
           </div>  
 
 <script>  
 $(document).ready(function(){  
      /*$('#excel_file').change(function(){  
           $('#export_excel').submit();  
      }); */ 
      
      $('#submitdgb').click(function(){  
           $('#export_excel').submit();  
      })
      $('#export_excel').on('submit', function(event){  
           event.preventDefault(); 
           var docname=$("#docname").val(); 
           var loader=$("#loader").html();
           if(docname){
            $("#result").html(loader)

           $.ajax({  
                url:"modules/system/executive/datapage/savedoc.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#result').html(data);  
                     $('#excel_file').val('');  
                }  
           });}else{
            $("#result").html('<label class="text-danger">Document name required!</label>')
           } 
      });  
 });  
 </script> 