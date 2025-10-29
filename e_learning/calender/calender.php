
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {

   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'e_learning/calender/load.php',
  
   });
  });
   
  </script>
  <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;font-weight: bold;text-transform: uppercase;">Whitebox events calendar</div>
  <div class="container no_padding">
   <div id="calendar"></div>
  </div>