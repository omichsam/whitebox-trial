  <table class=" dataTable not_shown">
<tr>
      <th >NO</th>
      <th> NAME</th>
      <th> EMAIL ADDRESS</th>
      <th>PHONE NUMBER</th>

      <th> INSTITUTION</th>
      <th>POSITION</th>
      <th > ATTENDANCE MODE</th>
      <th>ROLE PLAYED</th>
      <th>MOST LIKED PART</th>
      <th>MY RECOMMENDATIONS</th>

        <!--<th>PROGRAMME</th>-->
      </tr>
      <?php

include("../../../../connect.php");
$counter=0;
$title="";

$sql="SELECT * FROM wp_feedback";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
  $phone=$row['phone'];
  $mails=$row['email'];
  $post_fname=$row['fname'];
  $post_lname=$row['lname'];
  $attendance=$row['attendance'];
  $role_played=$row['role_played'];
  $likemost=$row['likemost'];
  $recommendations=$row['recommendations'];
  $dateadded=$row['dateadded'];
   $title=$row['salute'];






















$sqlpiy="SELECT * FROM wp_register where email='$mails'";
    $query_runpo=mysqli_query($con,$sqlpiy)or die($query_runpo."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpo)){

  $institution=$row['institution'];
  $deligation=$row['deligation'];
  $participation=$row['participation'];
  $attending=$row['attending'];
  $Disability=$row['Disability'];
  $Disability_specy=$row['Disability_specy'];
   $position_held =$row['position_held'];
   $title=$row['title'];
   $date_added=$row['date_added'];
   $country =$row['country'];
   $city=$row['city'];
   $street_address=$row['street_address'];
   $user_id=$row['id'];
  }
  $counter=$counter+1;


        ?>
<tr>
      <td ><?php echo $counter; ?></td>
      <td> <?php echo $title." ".$post_fname." ".$post_lname; ?> </td>
      <td><?php echo $mails ?></td>
      <td > <?php echo "Ke ".$phone?></td>


      <td > <?php echo $institution ?></td>
        <td><?php echo $position_held ?></td>
      <td><?php echo $attendance?></td>
      <td > <?php echo $role_played?></td>
        <td > <?php echo $likemost?></td>
      <td><?php echo $recommendations?></td>
 
    
      </tr>
   <?php
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
  downloadLink.download = "Kippraconference.csv";

  /*
   * Actually download CSV
   */
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);


$.post("modules/system/coordinator/view/view.php",{

},function(data){
  $("#home").html(data);
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