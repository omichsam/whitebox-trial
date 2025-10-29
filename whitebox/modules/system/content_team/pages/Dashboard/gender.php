
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">E-learners by gender</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$female = mysqli_query($con,"SELECT * FROM e_learning_users where status='active' and Gender ='female' or status='active' and Gender ='Female'");
$femalegender = mysqli_num_rows($female);


$male = mysqli_query($con,"SELECT * FROM e_learning_users where status='active' and Gender ='Male' or Gender ='male' and status='active'");
$malegender = mysqli_num_rows($male);

?>
<canvas class="col-sm-12 col-xs-12" id="genders"></canvas>

<script type="text/javascript">
   
var ctxd = document.getElementById('genders').getContext('2d');
var male='<?php echo $malegender?>';
 var female='<?php echo $femalegender?>';
var chartd = new Chart(ctxd, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Innovations By Gender',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(255, 99, 132, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
            data: [male, female]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>
</div>