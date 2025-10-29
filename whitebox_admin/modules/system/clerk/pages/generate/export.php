  <table class=" dataTable not_shown">
<tr>
     
      <th> NAME</th>
      <th> INNOVATION</th>
      <th>SECTOR</th>
      <th>BIG 4 SECTOR</th>
      <th>STAGE</th>
      <th>DATE</th>
      </tr>
      <?php

include "../../../../../connect.php";

include "../../../../../plugins/php_functions/security.php";
$counter=0;
$sqlx="SELECT * FROM innovations_table";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      //$Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
   $user_id=$row['user_id'];
    $sector_id=$row['sector_id'];
     $InnovationBig4Sector=$row['InnovationBig4Sector'];
  
 
           $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="$years years ago";
  }

    }
 $counter=$counter+1;
   $sqldp="SELECT * FROM users WHERE id='$user_id'";
    $query_rundp=mysqli_query($con,$sqldp)or die($query_rundp."<br/><br/>".mysqli_error($con));
        while($row=mysqli_fetch_array($query_rundp)){
          $First_name=$row['first_name'];
          $Last_name=$row['last_name'];

       $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];  
        ?>
<tr>

      <td> <?php echo $First_name."  ".$Last_name; ?> </td>
      <td><?php echo $Innovation_name ?></td>
      <td><?php echo $newsector ?></td>
     <td><?php echo $bg4id_name ?></td>
      <td > <?php echo $stage ?></td>
        <td><?php echo $time_d ?></td>
      </tr>


        <?php
      }
      }
      ?>
      </table>



<script type="text/javascript">
 $(document).ready(function(){
  var titles = [];
  var data = [];

  /*
   * Get the table headers, this will be CSV headers
   * The count of headers will be CSV string separator
   */
  $('.dataTable th').each(function() {
    titles.push($(this).text());
  });

  /*
   * Get the actual data, this will contain all the data, in 1 array
   */
  $('.dataTable td').each(function() {
    data.push($(this).text());
  });
  
  /*
   * Convert our data to CSV string
   */
  var CSVString = prepCSVRow(titles, titles.length, '');
  CSVString = prepCSVRow(data, titles.length, CSVString);

  /*
   * Make CSV downloadable
   */
  var downloadLink = document.createElement("a");
  var blob = new Blob(["\ufeff", CSVString]);
  var url = URL.createObjectURL(blob);
  downloadLink.href = url;
  downloadLink.download = "data.csv";

  /*
   * Actually download CSV
   */
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);


 $.post("modules/system/clerk/pages/generate/graph.php",{

},function(data){
  $(".graphs_paper").html(data);
//alert(data)
})






});


   /*
* Convert data array to CSV string
* @param arr {Array} - the actual data
* @param columnCount {Number} - the amount to split the data into columns
* @param initial {String} - initial string to append to CSV string
* return {String} - ready CSV string
*/
function prepCSVRow(arr, columnCount, initial) {
  var row = ''; // this will hold data
  var delimeter = ','; // data slice separator, in excel it's `;`, in usual CSv it's `,`
  var newLine = '\r\n'; // newline separator for CSV row

  /*
   * Convert [1,2,3,4] into [[1,2], [3,4]] while count is 2
   * @param _arr {Array} - the actual array to split
   * @param _count {Number} - the amount to split
   * return {Array} - splitted array
   */
  function splitArray(_arr, _count) {
    var splitted = [];
    var result = [];
    _arr.forEach(function(item, idx) {
      if ((idx + 1) % _count === 0) {
        splitted.push(item);
        result.push(splitted);
        splitted = [];
      } else {
        splitted.push(item);
      }
    });
    return result;
  }
  var plainArr = splitArray(arr, columnCount);
  // don't know how to explain this
  // you just have to like follow the code
  // and you understand, it's pretty simple
  // it converts `['a', 'b', 'c']` to `a,b,c` string
  plainArr.forEach(function(arrItem) {
    arrItem.forEach(function(item, idx) {
      row += item + ((idx + 1) === arrItem.length ? '' : delimeter);
    });
    row += newLine;
  });
  return initial + row;
}










</script>