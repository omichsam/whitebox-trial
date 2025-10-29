<!DOCTYPE html>
<!-- code by webdevtrick ( https://webdevtrick.com ) -->
<html>
 <style type="text/css">

  
/** code by webdevtrick ( https://webdevtrick.com ) **/
body {
  background-color: #31A9F5;
}
.pen {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  height: 100vh;
}
.text {
  color: whitesmoke;
  font-family: 'Roboto', sans-serif;
  padding: 1em 2em;
  text-align: center;
  font-size: 3.5em;
}
 </style>
<head>
  <meta charset="UTF-8">
  <title>Auto Type</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
      <link rel="stylesheet" href="style.css">
 
</head>
 
<body>
 
  <section class="pen">
<h1 class="text">Webdevtrick.com IsFirst, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.First, talk a little bit about the program. This auto type program is in pure javascript. I used a google font and an external CSS library called normalize ( get info ). There is very less code in HTML and CSS file, mostly used javascript.
  <span
     class="txt-rotate"
     data-period="2000"
     data-rotate='[ "Awesome.", "Amezing.", "Very Informative.", "Source Code Sharing Blog.", "Great!" ]'></span>
</h1>
</section>
 
    <script  src="function.js"></script>
 
</body>
 
</html>
<script type="text/javascript">
  var TxtRotate = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};
 
TxtRotate.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];
 
  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }
 
  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
 
  var that = this;
  var delta = 300 - Math.random() * 100;
 
  if (this.isDeleting) { delta /= 2; }
 
  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }
 
  setTimeout(function() {
    that.tick();
  }, delta);
};
 
window.onload = function() {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-rotate');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtRotate(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
  document.body.appendChild(css);
};
</script>