function generatePDF(){
	const element=document.getElementById("certificateb");
	html2pdf()
	.from(element)
	.save();
}