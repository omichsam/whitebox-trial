<!-- Content -->
<?php

include("connect.php");
$innovators = 0;
//$innovations=0;
//$data_status="pending";
$sqlx = "SELECT * FROM users";

$query_runx = mysqli_query($con, $sqlx) or die($query_runx . "<br/><br/>" . mysqli_error($con));

while ($row = mysqli_fetch_array($query_runx)) {
    $innovators = $innovators + 1;
}
$innovations = 0;
$Housing = 0;
$Manufacturing = 0;
$data_status = "pending";
$Housing = 0;
$Food_Security = 0;
$Healthcare = 0;
$Manufacturing = 0;
$others = 0;
$sqlx = "SELECT * FROM innovations_table Where status!='$data_status'";
$query_runx = mysqli_query($con, $sqlx) or die($query_runx . "<br/><br/>" . mysqli_error($con));
while ($row = mysqli_fetch_array($query_runx)) {
    $InnovationBig4Sector = $row['InnovationBig4Sector'];
    $innovations = $innovations + 1;
    // $Status="disapproved";
    if ($InnovationBig4Sector == "1") {
        $Healthcare = $Healthcare + 1;
    } else if ($InnovationBig4Sector == "2") {
        $Housing = $Housing + 1;
    } else if ($InnovationBig4Sector == "3") {
        $Food_Security = $Food_Security + 1;
    } else if ($InnovationBig4Sector == "4") {
        $Manufacturing = $Manufacturing + 1;
    } else if ($InnovationBig4Sector == "5") {
        $others = $others + 1;
    } else {

    }
}
$InnovationBig4Sector = "";
// $innovations=0;
$sqlx = "SELECT * FROM basic_informations";

$query_runx = mysqli_query($con, $sqlx) or die($query_runx . "<br/><br/>" . mysqli_error($con));

while ($row = mysqli_fetch_array($query_runx)) {
    $innovations = $innovations + 1;
    $InnovationBig4Sector = $row['InnovationBig4Sector'];
    if ($InnovationBig4Sector == "Universal and Affordable Healthcare") {
        $Healthcare = $Healthcare + 1;
    } else if ($InnovationBig4Sector == "Affordable Housing") {
        $Housing = $Housing + 1;
    } else if ($InnovationBig4Sector == "Food Security") {
        $Food_Security = $Food_Security + 1;
    } else if ($InnovationBig4Sector == "Manufacturing") {
        $Manufacturing = $Manufacturing + 1;
    } else if ($InnovationBig4Sector == "Other") {
        $others = $others + 1;
    } else {

    }

}
mysqli_close($con);
?>


<div class="container-fluid home_pages">
    <section class="purchas-main ">
        <div class="container  bg-border wow pulse" data-wow-duration="2.5s"
            style="visibility: visible; animation-duration: 2.5s;">
            <div class="row ">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <h1 class="purchae-hed">Patents that you can use to innovate</h1>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12"><a href="https://www.kipi.go.ke/index.php/bottom-up-agenda"
                        target="_blank" class="btn-sm btn-primary purchase-styl pull-right">Read more</a></div>
            </div>
        </div>
    </section>
    <hr class="text-primary home_pages">
    <!-- Service Section Start-->
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-3 wow bounceInLeft" data-wow-duration=".5s"
            style="visibility: hidden; animation-duration: 0.5s; animation-name: none;">
            <div class="box" style="background-color: #204565">
                <div class="box-icon">
                    <i class="livicon icon" data-name="users" data-size="55" data-loop="true" data-c="#BC0000"
                        data-hc="#000000" id="livicon-11" style="width: 55px; height: 55px;"></i>
                </div>
                <div class="info" style="color: #ffffff">
                    <h3 class="primary text-center" style="color: #ffffff">Registered Users</h3>
                    <div class="count text-center" id="shiva" style="font-weight: 600;  color: #ffffff; margin: -8px;">
                        <?php echo $innovators ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 wow bounceInLeft" data-wow-duration=".5s"
            style="visibility: hidden; animation-duration: 0.5s; animation-name: none;">
            <div class="box" style="background-color: #204565">
                <div class="box-icon">
                    <i class="livicon icon" data-name="clock" data-size="55" data-loop="true" data-c="#6d9e42"
                        data-hc="#BC0000" id="livicon-12" style="width: 55px; height: 55px;"></i>
                </div>
                <div class="info" style="color: #ffffff">
                    <h3 class="primary text-center" style="color: #ffffff">Innovations supporting Bottom-Up Economic
                        Transformation Agenda (BETA)</h3>
                    <div class="row" style="font-weight: bold;font-size: 15px;">
                        <div class="col-md-2 col-sm-6 col-xs-6 text-center">
                            <div class="count " id="shiva" style="font-weight: 600; color: #ffffff; margin: -30px;">
                                <?php echo $Housing ?></div>
                            <label style="color: #ffffff;">Affordable Housing</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                            <div class="count " id="shiva" style="font-weight: 600; color: #ffffff; margin: -30px;">
                                <?php echo $Manufacturing ?></div>
                            <label style="color: #ffffff;">Manufacturing</label>
                        </div>
                        <div class="col-md-2  col-sm-6 col-xs-6 text-center">
                            <div class="count " id="shiva" style="font-weight: 600; color: #ffffff; margin: -30px;">
                                <?php echo $Healthcare ?></div>
                            <label style="color: #ffffff;">Health</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 text-center">
                            <div class="count " id="shiva" style="font-weight: 600; color: #ffffff; margin: -30px;">
                                <?php echo $Food_Security ?></div>
                            <label style="color: #ffffff;">Agriculture</label>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-6 text-center">

                            <div class="count " id="shiva" style="font-weight: 600; color: #ffffff; margin: -30px;">
                                <?php echo $others ?></div>
                            <label style="color: #ffffff;">SMEs</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 wow bounceInLeft" data-wow-duration=".5s"
            style="visibility: hidden; animation-duration: 0.5s; animation-name: none;">
            <div class="box" style="background-color: #204565">
                <div class="box-icon">
                    <i class="livicon icon" data-name="rocket" data-size="55" data-loop="true" data-c="#f89a14"
                        data-hc="#4F65B3" id="livicon-13" style="width: 55px; height: 55px;"></i>
                </div>
                <div class="info" style="color: #ffffff">
                    <h3 class="primary text-center" style="color: #ffffff">Submitted Innovations</h3>
                    <div class="count text-center" id="shiva" style="font-weight: 600;  color: #ffffff; margin: -8px;">
                        <?php echo $innovations ?></div>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration=".5s">
                <div class="box" style="background-color: #418BCA">
                    <div class="box-icon">
                        <i class="livicon icon" data-name="users" data-size="55" data-loop="true" data-c="#BC0000" data-hc="#000000"></i>
                    </div>
                    <div class="info" style="color: #ffffff">
                        <h3 class="primary text-center" style="color: #ffffff">Registered Innovators</h3>
                         <div class="count text-center"  id="shiva" style="font-weight: 600;  color: #ffffff;">667</div>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration=".5s">
                <div class="box" style="background-color: #204565">
                    <div class="box-icon">
                        <i class="livicon icon" data-name="clock" data-size="55" data-loop="true" data-c="#6d9e42" data-hc="#BC0000"></i>
                    </div>
                    <div class="info"style="color: #ffffff">
                        <h3 class="primary text-center" style="color: #ffffff">Innovations in BIG 4 Agenda</h3>
                         <div class="count text-center" id="shiva" style="font-weight: 600; color: #ffffff;">667</div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration=".5s">
                <div class="box" style="background-color: #0D1B28">
                    <div class="box-icon">
                        <i class="livicon icon" data-name="rocket" data-size="55" data-loop="true" data-c="#f89a14" data-hc="#4F65B3"></i>
                    </div>
                    <div class="info" style="color: #ffffff">
                        <h3 class="primary text-center" style="color: #ffffff">Submitted Innovations</h3>
                        <div class="count text-center" id="shiva" style="font-weight: 600;  color: #ffffff;"> 259</div>
                    </div>
                </div>
            </div>
 -->

        <!-- //20+ Page Section End -->
    </div>

    <!-- //Services Section End -->
</div>
<hr class="text-primary home_pages">
<div class="container-fluid home_pages">
    <div class="row">
        <h3 class=" border-primary text-center "><span class="heading_border bg-primary">How It Works</span>
        </h3>
        <div class="col-md-12">

            <div class="main-timeline">
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="circle"><span><i class="fa fa-clipboard"></i></span></div>
                        <div class="content">
                            <span class="year">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Tell us who you are</font>
                                </font>
                            </span>
                            <h4 class="title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Stage 1</font>
                                </font>
                            </h4>
                            <p class="description">
                                <font></font>
                                Create an account, tell us who are, and
                                submit details of your innovation and/or product/solution.<font></font>
                            </p>
                            <div class="icon"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="circle"><span>
                                <i class="fa fa-edit "></i></span></div>
                        <div class="content">
                            <span class="year">Evaluation</span>
                            <h4 class="title">Stage 2</h4>
                            <p class="description">
                                <font></font>
                                Your innovation will be evaluated to determine its viability and the support
                                required<br>
                                Priority will be given to products that focus on the Bottom-Up Economic Transformation
                                Agenda (BETA).<font></font>
                            </p>
                            <div class="icon"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="circle"><span><i class="fa fa-gears"></i></span></div>
                        <div class="content">
                            <span class="year">Development &amp; Growth</span>
                            <h4 class="title">Stage 3</h4>
                            <p class="description">
                                <font></font>
                                Viable innovations will be considered for further support to be developed into product,
                                service.<font></font>
                            </p>
                            <div class="icon"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="circle"><span><i class="fa fa-rocket"></i></span></div>
                        <div class="content">
                            <span class="year">Scale &amp; Transformation</span>
                            <h4 class="title">Stage 4</h4>
                            <p class="description">
                                <font></font>
                                Work with the Huduma Whitebox team and
                                partners to role out approved products or services guided by Government
                                procurement law.<font></font>
                            </p>
                            <div class="icon"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="text-primary home_pages">

<div class="container-fluid home_pages">

    <!-- Testimonial Section -->
    <div class="text-center" id="facility">
        <h3 class=" border-primary text-center"><span class="heading_border bg-primary">Huduma WhiteBox Services </span>
        </h3>
    </div>
    <section class="purchas-main" style="background-color: #418BCA
         ; color: #fff;">
        <div class="container bg-border wow pulse" data-wow-duration="1.0s"
            style="background-color: rgb(65, 139, 202); color: rgb(255, 255, 255); visibility: hidden; animation-duration: 1s; animation-name: none;">

            <div class="col-md-7 col-sm-7 col-xs-12">
                <h4 style="color: #fff;">The <strong> Huduma WhiteBox Program </strong> will
                    provide the following services:
                </h4>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">

                <ol>
                    <li>
                        Government reception for your ideas/products/innovations
                    </li>
                    <li>
                        Promotion and networking opportunities
                    </li>
                </ol>
            </div>

        </div>
    </section>

    <!--  
    
            -->
    <hr class="text-primary">
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img src="Huduma_WhiteBox/whiteboxlab.png" alt="WhiteBox Lab" class="img-responsive img-circle pull-left">
            <h4 style="color: #418BCA
               ;">Facilities </h4>
            <span>Equipped working spaces with administration support, to qualified startups.</span>
        </div>
    </div>
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img class="img-responsive img-circle pull-left" src="Huduma_WhiteBox/tech.png" alt="Technical">
            <h4 style="color: #418BCA
               ;">Technical Assistance</h4>
            <span> Access to expert guidance from a network of industry, legal, management and finance experts to
                provide guidance on
                financing opportunities and access to market strategies.

            </span>
        </div>
    </div>
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img src="Huduma_WhiteBox/financial.png" alt="Financial Support"
                class="img-responsive img-circle pull-left">
            <h4 class="text-left" style="color: #418BCA
               ;">Financial Support</h4>
            <span> Professional guidance and support to participating ventures to attract relevant financial support
            </span>
        </div>
    </div>
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img src="Huduma_WhiteBox/business.png" alt="Networking" class="img-responsive img-circle pull-left">
            <h4 style="color: #418BCA
               ;">Access to Markets</h4>
            <span>The Government will support the WhiteBox Program
                by promoting the use of local products and innovations within Government
                and in the Private Sector.
            </span>
        </div>
    </div>
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img src="Huduma_WhiteBox/networking.png" alt="Mentoring" class="img-responsive img-circle pull-left">
            <h4 style="color: #418BCA
               ;">Linkage to Investors </h4>
            <span>
                Business growth opportunities through conferences, seminars,
                meetups, investment forums and targeted networking opportunities
            </span>
        </div>
    </div>
    <div class="col-md-4 wow bounceInLeft" data-wow-duration=".3s"
        style="visibility: hidden; animation-duration: 0.3s; animation-name: none;">
        <div class="author" style="height: 180px;">
            <img src="Huduma_WhiteBox/mentor.png" alt="Financial Support" class="img-responsive img-circle pull-left">
            <h4 style="color: #418BCA
               ;">Incubation and Acceleration </h4>
            <span>At the very least, appropriate MOUs may be entered with relevant bodies such as the Youth
                Fund for support. <br>In clear instances of product success in the market, financial support
                maybe considered.</span>
        </div>
    </div>

</div>