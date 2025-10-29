<?php
// Your PHP logic for counting (same as your snippet)

$innovators = 0;
$sqlx="SELECT * FROM users";
$query_runx=mysqli_query($con,$sqlx) or die(mysqli_error($con));
while($row=mysqli_fetch_array($query_runx)){
    $innovators++;
}

$innovations=0;
$Housing=0;
$Manufacturing=0;
$data_status="pending";
$Food_Security=0;
$Healthcare=0;
$others=0;

$sqlx="SELECT * FROM innovations_table WHERE status!='$data_status'";
$query_runx=mysqli_query($con,$sqlx) or die(mysqli_error($con));
while($row=mysqli_fetch_array($query_runx)){
    $InnovationBig4Sector=$row['InnovationBig4Sector'];
    $innovations++;
    if($InnovationBig4Sector=="1"){
        $Healthcare++;
    } else if($InnovationBig4Sector=="2"){
        $Housing++;
    } else if($InnovationBig4Sector=="3"){
        $Food_Security++;
    } else if($InnovationBig4Sector=="4"){
        $Manufacturing++;
    } else if($InnovationBig4Sector=="5"){
        $others++;
    }
}

$sqlx="SELECT * FROM basic_informations";
$query_runx=mysqli_query($con,$sqlx) or die(mysqli_error($con));
while($row=mysqli_fetch_array($query_runx)){
    $innovations++;
    $InnovationBig4Sector=$row['InnovationBig4Sector'];
    if($InnovationBig4Sector=="Universal and Affordable Healthcare"){
        $Healthcare++;
    } else if($InnovationBig4Sector=="Affordable Housing"){
        $Housing++;
    } else if($InnovationBig4Sector=="Food Security"){
        $Food_Security++;
    } else if($InnovationBig4Sector=="Manufacturing"){
        $Manufacturing++;
    } else if($InnovationBig4Sector=="Other"){
        $others++;
    }
}

mysqli_close($con);

// Send counts to JavaScript
echo "<script>
    const numberTargets = {
        'user-count': $innovators,
        'innovation-count': $innovations,
        'project-count': $innovations,
        'housing-count': $Housing,
        'manufacturing-count': $Manufacturing,
        'healthcare-count': $Healthcare,
        'agriculture-count': $Food_Security,
        'sme-count': $others
    };
</script>";
?>

<section id="stats" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
         <!-- <h2 class="text-3xl font-bold text-center text-secondary mb-4">Our
            Partners</h2> -->
        <h2 class="text-3xl font-bold text-center text-accent mb-4">Innovation
            Statistics</h2>
        <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">Tracking
            the growth of innovation in
            Kenya's key economic sectors</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 ">
            <!-- Card 1 -->

            <div
                class="animate-on-scroll gradient-light p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-users  text-blue-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Registered
                    Users</h4>
                <p class="text-3xl font-bold text-danger" id="user-count">0</p>
            </div>

            <!-- Card 2 -->

            <div
                class="animate-on-scroll  gradient-light p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-lightbulb text-green-600 text-xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Submitted
                    Innovations</h4>
                <p class="text-3xl font-bold text-danger" id="innovation-count">0</p>
            </div>

            <!-- Card 3 -->

            <div
                class="animate-on-scroll gradient-light p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-check-circle text-purple-600 text-xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Approved
                    Projects</h4>
                <p class="text-3xl font-bold text-danger" id="project-count">0</p>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-center text-accent mb-4">BETA
            Innovations</h2>
            
        <p class="text-lg text-gray-600 text-center mb-8 max-w-2xl mx-auto">Innovations
            supporting Kenya's Bottom-Up
            Economic Transformation Agenda</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <div
                class="animate-on-scroll bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-home text-blue-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Affordable
                    Housing</h4>
                <p class="text-3xl font-bold text-danger" id="housing-count">0</p>
            </div>

            <div
                class="animate-on-scroll bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-industry text-green-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Manufacturing</h4>
                <p class="text-3xl font-bold text-danger" id="manufacturing-count">0</p>
            </div>

            <div
                class="animate-on-scroll bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heartbeat text-red-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Healthcare</h4>
                <p class="text-3xl font-bold text-danger" id="healthcare-count">0</p>
            </div>

            <div
                class="animate-on-scroll bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-seedling text-yellow-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">Agriculture</h4>
                <p class="text-3xl font-bold text-danger" id="agriculture-count">0</p>
            </div>

            <div
                class="animate-on-scroll bg-white p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-store text-purple-600 text-2xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-primary mb-2">SMEs</h4>
                <p class="text-3xl font-bold text-danger" id="sme-count">0</p>
            </div>
        </div>
    </div>
</section>