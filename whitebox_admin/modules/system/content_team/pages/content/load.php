<script type="text/javascript">
  /*function iFrameOn(){
 richTextField.document.designMode = 'On';

}
*/
function iBold(){
  richTextField.document.execCommand('bold',false,null); 
}
function iUnderline(){
  richTextField.document.execCommand('underline',false,null);
}
function iItalic(){
  richTextField.document.execCommand('italic',false,null); 
}
function iFontSize(){
  var size = prompt('Enter a size 1 - 7', '');
  richTextField.document.execCommand('FontSize',false,size);
}
function iForeColor(){
  var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
  richTextField.document.execCommand('ForeColor',false,color);
}
function iHorizontalRule(){
  richTextField.document.execCommand('inserthorizontalrule',false,null);
}
function iUnorderedList(){
  richTextField.document.execCommand("InsertOrderedList", false,"newOL");
}
function iOrderedList(){
  richTextField.document.execCommand("InsertUnorderedList", false,"newUL");
}
function iLink(){
  var linkURL = prompt("Enter the URL for this link:", "http://"); 
  richTextField.document.execCommand("CreateLink", false, linkURL);
}
function iUnLink(){
  richTextField.document.execCommand("Unlink", false, null);
}
function iImage(){
  var imgSrc = prompt('Enter image location', '');
    if(imgSrc != null){
        richTextField.document.execCommand('insertimage', false, imgSrc); 
    }
}

/*function submit_form(){
  var theForm = document.getElementById("myform");
  theForm.elements["myTextArea"].value = window.frames['richTextField'].document.body.innerHTML;
  theForm.submit();
}
*/
</script>
<?php 
$role=base64_decode($_POST['role']);
include "../../../../../connect.php";
  $sql="SELECT * FROM curriculum_units_details Where id='$role'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_name=$row['unit_name'];
           $unit_field =$row['unit_field'];
           $more_descript  =$row['unit_description'];

           $supporting_link=$row['supporting_link'];
          // if($supporting_link){
          //$more_information=$more_descript."\n <iframe src='$supporting_link' width='100%' height='300px'></iframe>";
          // }else{
           $more_information=$more_descript;
          // }

       }
?>
<script>
    function feeddata(){
      var myFrameoriginal = $("#richTextField").contents().find('body').addClass('mytextareas');
        var textareaValue = $("textarea").val();
      myFrameoriginal.html(textareaValue);
       richTextField.document.designMode = 'On';
      //alert(myFrameoriginal)
    }
  
</script>
<style>
    textarea, iframe{
        display: block;
    margin: 10px 0;
    }
    iframe{
        width: 500px;
        border: 1px solid #a9a9a9;
    }
</style>
<div class="col-sm-12 col-xs-12" style="text-transform: uppercase;font-weight: bold;"><?php echo $unit_field?></div>
<div class="col-sm-12 col-xs-12 no_padding" style="background: #fff;">
<div id="wysiwyg_cp" class="col-sm-12 col-xs-12" style="padding:8px; width:100%;border: 1px solid #000;">
  <input type="button" onClick="iBold()" value="B"> 
  <input type="button" onClick="iUnderline()" value="U">
  <input type="button" onClick="iItalic()" value="I">
  <input type="button" onClick="iFontSize()" value="Text Size">
  <input type="button" onClick="iForeColor()" value="Text Color">
  <input type="button" onClick="iHorizontalRule()" value="HR">
  <input type="button" onClick="iUnorderedList()" value="UL">
  <input type="button" onClick="iOrderedList()" value="OL">
  <input type="button" onClick="iLink()" value="Link">
  <input type="button" onClick="iUnLink()" value="UnLink">
  <input type="button" onClick="iImage()" value="Image">
</div>
<form class="col-sm-12 col-xs-12 no_padding" id="myform">
    <textarea rows="5" cols="50" style="display:none;" ><?php echo $more_information?></textarea>
   <iframe name="richTextField" id="richTextField"  class="col-sm-12 colxs-12" style="border:#000000 1px solid; height:400px;background: #fff;margin-top: 1px;" onload="feeddata()"></iframe>
   <div class="col-sm-12 col-xs-12">
     <div class=" col-sm-3 col-xs-2"></div><div class=" col-sm-6 col-xs-8 btn-primary btn" id="submitinformation">SAVE</div>
      <div class="col-sm-12 col-xs-12" id="error_loading" style="text-align:center;color:red"></div>
   </div>
 </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var loader=$("#loader").html();
    $("#submitinformation").click(function(){
      var richTextField=window.frames['richTextField'].document.body.innerHTML;
      if(richTextField){
        var txt;
  var r = confirm("Do you wish to submit your information?, click OK to proceed or CANCEL to stop?");
  if (r == true) {
$("#error_loading").html("submiting data.. "+loader)
var role=btoa('<?php echo $role?>');
  var theForm = document.getElementById("myform");
  var form_data = btoa(window.frames['richTextField'].document.body.innerHTML);

    $.post("modules/system/content_team/pages/content/save.php",{form_data:form_data,role:role},function(data){
   $("#error_loading").html(data)
   })

  }else{

  }
      }else{
     var r = confirm("Do you wish to clear the information?, click OK to proceed or CANCEL to stop?");
  if (r == true) {

  }else{

  }
      }
    })
  })
</script>