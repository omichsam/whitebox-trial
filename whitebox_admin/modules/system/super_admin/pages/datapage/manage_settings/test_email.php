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
<div class="col-sm-12 col-xs-12" style="text-transform: uppercase;font-weight: bold;"></div>
<form class="col-sm-12 col-xs-12 no_padding" id="myform">
<div class="col-sm-12 col-xs-12 no_padding">
    RECEIPENT:
    <input type="text" name="emailaddress " class="splashinputs" placeholder="e.g abc@example.com" id="emailaddress">
  </div>
  <div class="col-sm-12 col-xs-12 no_padding">
    SUBJECT:
    <input type="text" name="subjectb " placeholder="e.g test email" class="splashinputs" id="subjectb">
  </div>
  <div class="col-sm-12 col-xs-12 no_padding">

   MESSAGE:
 </div>
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


    <textarea rows="5" cols="50" style="display:none;" ><?php echo $more_information?></textarea>
   <iframe name="richTextField" id="richTextField"  class="col-sm-12 colxs-12" style="border:#000000 1px solid; height:200px;background: #fff;margin-top: 1px;" onload="feeddata()"></iframe>
   
 </form>

</div>
<div class="col-sm-12 col-xs-12">
     <div class=" col-sm-1 col-xs-1"></div>
     <div class=" col-sm-4 col-xs-4 btn-danger btn" id="backtosettings">Back</div>
      <div class=" col-sm-2 col-xs-2"></div>
     <div class=" col-sm-4 col-xs-4 btn-success btn" id="submitinformation">Send Email</div>
      <div class="col-sm-12 col-xs-12" id="error_loading" style="text-align:center;color:red"></div>
   </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#backtosettings").click(function(){
      $(".testmailer").hide();
$("#formData").show()
    })
    var loader=$("#loader").html();
    $("#submitinformation").click(function(){
      var nsubject=btoa($("#subjectb").val());
      var nemailaddress=btoa($("#emailaddress").val());
      var richTextField=window.frames['richTextField'].document.body.innerHTML;
      if(richTextField && nsubject && nemailaddress){
        var txt;
  var r = confirm("Do you wish to submit this test email?, click OK to proceed or CANCEL to stop?");
  if (r == true) {
$("#error_loading").html("submiting data.. "+loader)

  var theForm = document.getElementById("myform");
  var form_data = btoa(window.frames['richTextField'].document.body.innerHTML);

    $.post("modules/system/super_admin/pages/manage_settings/sendmail.php",{form_data:form_data,
      nsubject:nsubject,
      nemailaddress:nemailaddress},function(data){
      if($.trim(data)=="success"){
      $("#error_loading").html("Test Email successfully sent, check from the email you provided");
      }else{
      $("#error_loading").html(data)
      }
  
   })

  }else{

  }
      }else{
     $("#error_loading").html("All fields required!");
      }
    })
  })
</script>