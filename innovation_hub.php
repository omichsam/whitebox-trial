<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>innovation Hubs - Huduma WhiteBox</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="sources/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .table-card {
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            overflow: hidden;
        }

        .filter-section {
            background-color: #f8fafc;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
        }

        .filter-select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: white;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <?php include 'sections/header.php'; ?>

    <!-- Database Connection -->
    <?php
    include 'config/connect.php';

    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Create table if it doesn't exist
    $table_check = mysqli_query($con, "SHOW TABLES LIKE 'institutions_hubs'");
    $table_exists = mysqli_num_rows($table_check) > 0;

    if (!$table_exists) {
        $create_table_sql = "CREATE TABLE institutions_hubs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            region VARCHAR(100) NOT NULL,
            county VARCHAR(100) NOT NULL,
            constituency VARCHAR(100) NOT NULL,
            institution_number INT,
            institution_name VARCHAR(255) NOT NULL
        )";

        mysqli_query($con, $create_table_sql);
    }

    // Fetch all institutions
    $query = "SELECT * FROM institutions_hubs ORDER BY region, county, constituency, institution_number";
    $result = mysqli_query($con, $query);

    // Fetch filter values
    $regions_query = "SELECT DISTINCT region FROM institutions_hubs ORDER BY region";
    $counties_query = "SELECT DISTINCT county FROM institutions_hubs ORDER BY county";
    $constituencies_query = "SELECT DISTINCT constituency FROM institutions_hubs ORDER BY constituency";

    $regions_result = mysqli_query($con, $regions_query);
    $counties_result = mysqli_query($con, $counties_query);
    $constituencies_result = mysqli_query($con, $constituencies_query);
    ?>



    <!-- Hubs Hero Section -->
    <section class="about-hero py-16 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">County Innovation Hubs</h1>
            <p class="text-xl max-w-3xl mx-auto">Find details for county innovation hubs across Kenya</p>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="table-card p-4">
                <!-- <h2 class="text-2xl font-bold text-center mb-4">County Innovation Hubs</h2>
                <p class="text-gray-600 text-center mb-6">Find details for county innovation hubs across Kenya</p> -->

                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block mb-1 font-medium">Region</label>
                            <select id="regionFilter" class="filter-select">
                                <option value="">All Regions</option>
                                <?php
                                if ($regions_result) {
                                    while ($row = mysqli_fetch_assoc($regions_result)): ?>
                                        <option value="<?php echo htmlspecialchars($row['region']); ?>">
                                            <?php echo htmlspecialchars($row['region']); ?>
                                        </option>
                                    <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">County</label>
                            <select id="countyFilter" class="filter-select">
                                <option value="">All Counties</option>
                                <?php
                                if ($counties_result) {
                                    mysqli_data_seek($counties_result, 0);
                                    while ($row = mysqli_fetch_assoc($counties_result)): ?>
                                        <option value="<?php echo htmlspecialchars($row['county']); ?>">
                                            <?php echo htmlspecialchars($row['county']); ?>
                                        </option>
                                    <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Constituency</label>
                            <select id="constituencyFilter" class="filter-select">
                                <option value="">All Constituencies</option>
                                <?php
                                if ($constituencies_result) {
                                    mysqli_data_seek($constituencies_result, 0);
                                    while ($row = mysqli_fetch_assoc($constituencies_result)): ?>
                                        <option value="<?php echo htmlspecialchars($row['constituency']); ?>">
                                            <?php echo htmlspecialchars($row['constituency']); ?>
                                        </option>
                                    <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button id="resetFilters"
                                class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                                Reset Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table id="contactTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Region</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">County</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Constituency
                                </th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Institution
                                    Name</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 whitespace-nowrap text-md">
                                            <?php echo htmlspecialchars($row['institution_number']); ?>
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            <span
                                                class="inline-block px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm fw-bold">
                                                <?php echo htmlspecialchars($row['region']); ?>
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm">
                                            <?php echo htmlspecialchars($row['county']); ?>
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-sm">
                                            <?php echo htmlspecialchars($row['constituency']); ?>
                                        </td>
                                        <td class="px-4 py-2 text-sm">
                                            <?php echo htmlspecialchars($row['institution_name']); ?>
                                        </td>
                                    </tr>
                                <?php endwhile;
                            } else {
                                echo '<tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">No institutions found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include 'sections/footer.php';
    include 'chatbot.php';

    if ($con) {
        mysqli_close($con);
    }
    ?>

    <script>
        $(document).ready(function () {
            // Initialize DataTable with pagination
            var table = $('#contactTable').DataTable({
                paging: true,
                pageLength: 10,
                searching: true,
                ordering: true,
                responsive: true,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        previous: "←",
                        next: "→"
                    }
                }
            });

            // Filter functionality
            $('#regionFilter').on('change', function () {
                table.column(1).search(this.value).draw();
            });

            $('#countyFilter').on('change', function () {
                table.column(2).search(this.value).draw();
            });

            $('#constituencyFilter').on('change', function () {
                table.column(3).search(this.value).draw();
            });

            // Reset filters
            $('#resetFilters').on('click', function () {
                $('#regionFilter, #countyFilter, #constituencyFilter').val('');
                table.columns().search('').draw();
            });
        });
    </script>

    <!-- scripts -->
    <script src="sources/scripts/script.js"></script>
</body>

</html>