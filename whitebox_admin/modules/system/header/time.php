
  <style>
  
    #digitalclock {
     
      color: #000;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      font-weight: bolder;
    
    }
  </style>

  <div class="col-sm-12 col-xs-13 "id="digitalclock">
  </div>
  <script>
      function clock() {
          var d = new Date();
  var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  var n = weekday[d.getDay()];

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
var prese='th';
if(mm==1){
var mont="January";
}else if(mm==2){
  var mont="February";

}else if(mm==3){
  var mont="March";
  }else if(mm==4){
    var mont="April";
    }else if(mm==5){
      var mont="May";
      }else if(mm==6){
        var mont="June";
        }else if(mm==7){
          var mont="July";
          }else if(mm==8){
            var mont="August";
            }else if(mm==9){
              var mont="September";
              }else if(mm==10){
                var mont="October";
                }else if(mm==11){
                  var mont="November";
                  }else if(mm==12){
                    var mont="December";
}else{

}





if(dd % 10==1){
prese='st';
}else if(dd % 10==2){
  prese='nd';

  }else if(dd % 10==3){
    prese='rd';

  }else{
prese='th';
  }

today =  dd+prese + ', '+mont + ' ' + yyyy;











      let date = new Date();
      let hrs = date.getHours();
      let mins = date.getMinutes();
      let secs = date.getSeconds();
      let period = "AM";
    
      if (hrs == 0) hrs = 12;
      if (hrs > 12) {
        hrs = hrs - 12;
        period = "PM";
      }
    
      hrs = hrs < 10 ? `0${hrs}` : hrs;
      mins = mins < 10 ? `0${mins}` : mins;
      secs = secs < 10 ? `0${secs}` : secs;
    
      let time = `${hrs}:${mins}:${secs} ${period}`;
      setInterval(clock, 1000);
      document.getElementById("digitalclock").innerText = n +" "+ today+" "+ time;
    }
    
    clock();

  </script>
