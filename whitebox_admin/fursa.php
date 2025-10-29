<canvas id="myCanvasp" width="600" height="600" >
 my new icta clock
</canvas>
<script>
var canvas = document.getElementById('myCanvasp');
var context = canvas.getContext('2d');

var clockImage = new Image();
var clockImageLoaded = false;
clockImage.onload = function(){
  clockImageLoaded = true;
}
clockImage.src = 'icta.jpg';

function addBackgroundImage(){
  context.drawImage(clockImage, canvas.width/2 * -1 ,canvas.height/2 * -1,canvas.width, canvas.height);
}

function degreesToRadians(degrees) {
  return (Math.PI / 180) * degrees
}

function drawHourHand(theDate){
  var hours = theDate.getHours() + theDate.getMinutes() / 60;

  var degrees = (hours * 360 / 12) % 360;

  context.save();
  context.fillStyle = 'green';
  context.strokeStyle = '#555';
  
  context.rotate( degreesToRadians(degrees));

  drawHand(110, 7, 3);

  context.restore();

}

function drawMinuteHand(theDate){
  var minutes = theDate.getMinutes() + theDate.getSeconds() / 60;

  context.save();
  context.fillStyle = 'black';
  context.strokeStyle = '#555';
  context.rotate( degreesToRadians(minutes * 6));

  drawHand(130, 7, 5);

  context.restore();
}

function drawHand(size, thickness, shadowOffset){
  thickness = thickness || 4;

  context.shadowColor = '#555';
  context.shadowBlur = 10;
  context.shadowOffsetX = shadowOffset;
  context.shadowOffsetY = shadowOffset;
  
  context.beginPath();
  context.moveTo(0,0); // center
  context.lineTo(thickness *-1, -10);
  context.lineTo(0, size * -1);
  context.lineTo(thickness,-10);
  context.lineTo(0,0);
  context.fill();
  context.stroke();
}

function drawSecondHand(theDate){
  var seconds = theDate.getSeconds();

  context.save();
  context.fillStyle = 'red';
  context.globalAlpha = 0.8;
  context.rotate( degreesToRadians(seconds * 6));

  drawHand(150, 4, 8);

  context.restore();
}

function writeBrandName(){
   context.font = "25pt Helvetica";
   var brandName = 'ICTA';
   var brandNameSize = context.measureText(brandName);
   context.strokeText("ICTA", 0 - brandNameSize.width / 2,-40);
}

function createClock(){

  addBackgroundImage();
  //writeBrandName();

  var theDate = new Date();
  drawHourHand(theDate);
  drawMinuteHand(theDate);
  drawSecondHand(theDate);
}

function clockApp(){
  if(!clockImageLoaded){
    setTimeout('clockApp()', 100);
    return;
  }
  context.translate(canvas.width/2, canvas.height/2);
  createClock();
  setInterval('createClock()', 1000)
}

clockApp();
  
</script>