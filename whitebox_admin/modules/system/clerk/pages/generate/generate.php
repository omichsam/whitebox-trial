<style type="text/css">

.report_tamplate{
	min-height:842px;
	background: #222; 
	
}
#paper_holder{
	min-height:842px;
	background: #fff; 
	margin-bottom: 20px;
}
#reportcontrols{
	height: 50px;
	color: #ddd;
	cursor: pointer;
	margin-top: 5px;
}
#report_footer{
	min-height: 50px;
}
#nmk_logo{
	min-height: 100px;
	background-repeat: no-repeat;
	background-position: center;
	background-size: contain;
	background-image: url('images/Whitebox.png');
}
.graphs_paper{
	min-height: 400px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="col-sm-12 col-xs-12">

<div class="col-sm-12 col-xs-12 report_tamplate">
	<div class="col-sm-12 col-xs-12" id="reportcontrols">
		<div class="col-sm-9 col-xs-12"></div>
<div class="col-sm-3 col-xs-12">
	<!--<div class="col-sm-4 col-xs-4 printed" role="print" ><i class="fa fa-print fa-2x"></i></div>-->

	<!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

	<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>
</div>

	</div>
<div class="col-xs-12 col-sm-12" id="paper_holder">
	
<div class="col-sm-12 col-xs-12 default_header"> INNOVATIONS REPORT</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-9 col-xs-12"></div>
<div class="col-sm-3 col-xs-12" id="nmk_logo"></div>
</div>
<div class="col-sm-12 col-xs-12 graphs_paper"></div>

</div>
</div>
<div class="col-sm-12 col-xs-12" id="report_footer">

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
 var url="modules/system/clerk/pages/generate/graph.php";
 var target=".graphs_paper";
$.get(""+url+"",function(data){$(target).html(data)})

var btng=".printed";
$(btng).click(function(){
var role=$(this).attr("role");
if(role=="export"){
	generatePDF()
	//alert(role)
 /*var url="modules/system/clerk/pages/generate/export.php";
 var target=".graphs_paper";
$.get(""+url+"",function(data){$(target).html(data)})*/



}else{
printDiv() 
}
})



	})
function printDiv() 
{
/*
  var divToPrint=document.getElementById('students_card');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
  */
   var prtContent = document.getElementById('paper_holder');
    var WinPrint = window.open('','','left=0,top=0,width=400,height=400,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();

}
   function generatePDF(){
        /*
    var element = document.getElementById('certbs');
html2pdf(element);

   var worker = html2pdf();
   var worker = html2pdf().from(element).save();
*/

var element = document.getElementById('paper_holder');
var opt = {
  margin:       0.3,
  filename:     'innovations.pdf',
  image:        { type: 'jpeg', quality: 1.98 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
};

// New Promise-based usage:
html2pdf().set(opt).from(element).save();

// Old monolithic-style usage:
html2pdf(element, opt);



}
</script>