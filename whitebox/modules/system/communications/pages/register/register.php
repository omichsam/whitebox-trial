<style type="text/css">
    #h_heade{
border-bottom: 3px solid #000;
text-align: center;
  }
</style>
<?php
include("../../../../connect.php");
$user=$_POST['user'];
?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-2 mobile_hidden no_padding"></div>
<div class="col-sm-8 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 no_padding"><h4 id="h_heade">ADD A NEW ARTICLE</h4></div>
<div class="col-sm-3 col-xs-12 no_padding">
</div>

  <form id="commentForm" action="" method="POST" enctype="multipart/form-data" class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-6">
	Article name:
	<input type="text" id="article_name" class="splashinputs" name="article_name">
	Field:
	<select class="splashinputs" name="field_study" id="field_study">
		<?php
$sql="SELECT * FROM article_subject_arreas";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $subjecet_name=$row['subjecet_name'];
     
?>
<option><?php echo $subjecet_name?></option>
<?php
}
?>
	</select>
	Refference no:
	<input type="text" id="refferenceno" name="refferenceno" class="splashinputs">
	Volume number:
	<input type="text" id="volume" name="volume" class="splashinputs">
	Published year:
	<select class="splashinputs" id="published" name="published">
		<?php
		$yeard=date('Y');
      for($d=$yeard;$d>1970;$d--){
		?>
		<option><?php echo $d ?></option>
		<?php
	}
		?>
	</select>

		<input type="text" name="user" hidden="true" value="<?php echo $user?>">
	Author:
	<input type="text" id="author" name="author" class="splashinputs">
</div>
<div class="col-sm-6">
	Description:
	<textarea class="splashinputs" id="Description" name="Description" style="min-height: 200px;resize: none;"></textarea>
	
	<div class="col-sm-6 col-xs-12">
		Source/involvement:
	<select class="splashinputs " name="Source" id="Source">
		<option>National</option>
		<option>County</option>
	</select>
</div>
	<div class="col-sm-6 col-xs-12 not_shown " id="county_help">
	County:
	<select class="splashinputs " name="field_county" id="field_county">
		<?php
$sql="SELECT * FROM counties where id<48 order by serial_no asc";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $county_name=$row['county_name'];
     
?>
<option><?php echo $county_name?></option>
<?php
}
?>
	</select>
</div>
	<div class="col-sm-12 col-xs-12 no_padding ">
	File:
	<input type="File" name="fileholder" id="fileholder">
</div>
</div>
<div class="col-xs-12 col-sm-12" style="text-align: center;"><span class="btn theme_bg" id="submitarticle">Submit</span></div>
<div class="col-sm-12" style="text-align: center;color:red;min-height: 20px;" id="loadings_erro"></div>

</form>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#Source").change(function(){
			var Source=$(this).val()
			if(Source=="National"){
         
            $("#county_help").hide();
			}else{
            $("#county_help").show();
			}
		})
		$("#submitarticle").click(function(){
			let loader=$("#loader").html()
			var article_name=$("#article_name").val()
			
		   var field_study=$("#field_study").val()
		   var refferenceno=$("#refferenceno").val()
		   var volume=$("#volume").val()
		   var author=$("#author").val()

		   var published=$("#published")
		   var fileholder=$("#fileholder").val()
		   if(article_name && field_study && refferenceno && volume && author && published){

          var txt;
  var r = confirm("Dou you wish to submit?, click OK to proceed or CANCEL to stop?");
  if (r == true) {
			$("#loadings_erro").html(loader)
			var formData = new FormData($("#commentForm")[0]);
			$.ajax({
        url : 'modules/system/callcenter/register/savearticle.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){
            	$("#loadings_erro").html("Record successfully added")

            }else{
                $("#loadings_erro").html(responsed)
            }
        }
    })
		}else{

		}

		    }else{

			$("#loadings_erro").html("All fields required!")
		    }
		})
	})
</script>
