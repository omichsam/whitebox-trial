var patn="";
var partners_involved=$("#partners_involved").val();
    if(partners_involved==""){
 patn="ready";
     $("#partners_involved").css("border","2px solid red")
        $("#submision_error").html("Required")
      }else if(partners_involved=="Yes"){

var number_partners=$("#number_partners").val()
        if(number_partners==0){
        $("#number_partners").css("border","2px solid red")
        $("#submision_error").html("Select a value greater than 0")
        }else{
    $("#number_partners").css("border","1px solid #ccc")
        $("#submision_error").html("")

var user_names=1;
    for(user_names=1;user_names<=number_partners;user_names++){
        var user_name="Member_"+user_names;
        var users=btoa(user_names);
        var members=btoa(number_partners)
        var rolei="role_"+user_names;
        var role=btoa($("#"+rolei).val());
        var member_name="name_"+user_names;
        var member_named=btoa($("#"+user_name).val());
        //alert(member_name+" "+member_named)
        if(member_named){
            $("#Member_"+user_names).css("border","1px solid #ccc")
            if(role){
             $("#role_"+user_names).css("border","1px solid #ccc")
            
        $("#submision_error").html("")
patn="ready";
}else{
  $("#role_"+user_names).css("border","1px solid red")   
   $("#submision_error").html("Required")
   patn="";
}}else{
    patn="";
$("#submision_error").html("Required")
  $("#Member_"+user_names).css("border","1px solid red");  
}
}
      }


}










            var patcheck="";

             var fund="";
            var commn="";
            var patner="";
            var implement="";

            var Communities="";
             if($("#implementers").prop("checked")){
               var  implementers="implementers";
               var implement=btoa(implementers)
             }else{

             }
             if($("#patnership").prop("checked")){
               var  patnership="patnership";
               var patner=btoa(patnership);
             }else{

             }
             if($("#funding").prop("checked")){
               var  funding="funding";
               var fund=btoa(funding);
             }else{

             }
             if($("#Others").prop("checked")){
                var commn="Others";
               var  Others=$("#user_defined").val();
               if(Others){
                $("#user_defined").css("border","1px solid #ccc")
               var commnd=btoa(Others);
           }else{
            $("#user_defined").css("border","2px solid red")

            $("#submision_error").html("Required")
           }
             }else{

             }
             
    if(fund || commn || implement || patner){
        $(".submit_radiosd").css("color","#000");
        $("#submision_error").html("")
     /*   patcheck="ready";
      var user_defined="";
         if($("#Others").prop("checked")){
               var  user_defined=$("#user_defined").val();
               if(user_defined){
                 patcheck="ready";
    //alert()
                $("#user_defined").css("border","1px solid #ccc")






}else{
 $("#user_defined").css("border","1px solid red")
  patcheck="";
}
}else{

}
*/
}else{
patcheck="";
$(".submit_radiosd").css("color","red");
$("#submision_error").html("Required!")
}






var property_ed="";

      var protection=$("#protection").val()

                $("#protection").css("border","1px solid #ccc")
               if(protection==""){
property_ed="ready";
              $("#fouthr_displaye").html("Required")
              $("#protection").css("border","2px solid red")
               }else{
               $("#protection").css("border","1px solid #ccc")

            if(protection=="Yes"){
                 var olderppt='<?php echo $older_ppt ?>';
                 if(olderppt){
                 property_ed="ready";
                 }else{
               property_ed="";
                 }
                var property_file=$(".property_protection").val()
                if(property_file){
               property_ed="ready";
//check links

             var attach_document=$("#attach_file").val();


}else{
var olderppt='<?php echo $older_ppt?>';
                 if(olderppt){
                 property_ed="ready";
                 }else{
               property_ed="";
                 }
}

}else{



}

}


var leafattach="";
   var attach_document=$("#attach_file").val();

             var attachment_link=$("#link").val();
             if(attach_document || attachment_link){
                //alert()
                leafattach="ready";
              $("#submision_error").html("")
              $("#link_datachments").css("border","0px solid black")

            //$("#fouthr_displaye").html(loader);

             }else{
                var docds='<?php echo $documenth ?>';
                if(docds){
                leafattach="ready";
              $("#submision_error").html("")
              $("#link_datachments").css("border","0px solid black")
                }else{
                leafattach="";
              $("#submision_error").html("Attach a file or add a link or add both").css("color","red")
              $("#link_datachments").css("border","2px solid red")
          }
             }



if(leafattach && property_ed && patcheck && patn){

var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_fourth.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){

            }else{
                
            }
        }
    })








           $("#submision_error").html("").css("color","#000");
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
            $('html, body').animate({scrollTop: '0px'}, 300);
          $("#currentpage").html(new_page);
         
}else{

 $("#submision_error").html("Required!").css("color","red") 
}

