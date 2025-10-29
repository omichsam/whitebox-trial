<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create new connection just for this file
$host = "localhost";
$username = "root";
$password = "";
$db_name = "whitebox";

$local_con = new mysqli($host, $username, $password, $db_name);

if ($local_con->connect_error) {
    die("Connection failed: " . $local_con->connect_error);
}

$innovations = $local_con->query("SELECT * FROM innovations ORDER BY title");
if (!$innovations) {
    die("Query failed: " . $local_con->error);
}

$local_con->close();
?>

<div class="innovations_pages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="margin-bottom: 30px;">Viable Innovations</h1>
                <p class="text-center" style="margin-bottom: 40px; font-size: 16px; color: #555;">
                    Discover the innovative solutions we're supporting through our program
                </p>
                
                <div class="innovations-grid">
                    <?php while($innovation = $innovations->fetch_assoc()): ?>
                        <?php
                            $logoFile = 'uploads/logos/' . $innovation['logo'];
                            $placeholder = 'whitebox/images/Whitebox.png';
                            $finalLogo = (!empty($innovation['logo']) && file_exists($logoFile)) ? $logoFile : $placeholder;
                        ?>
                    <div class="innovation-item">
                        <div class="innovation-card">
                            <?php if ($innovation['logo']): ?>
                                <div class="innovation-logo-container">
                                    <img src="<?= htmlspecialchars($finalLogo) ?>" 
                                        alt="<?= htmlspecialchars($innovation['title']) ?>" 
                                        class="innovation-logo">
                                </div>
                            <?php endif; ?>
                            
                            <div class="innovation-content">
                                <h3 class="innovation-title"><?= htmlspecialchars($innovation['title']) ?></h3>
                                
                                <div class="innovation-description">
                                    <?= nl2br(htmlspecialchars($innovation['description'])) ?>
                                </div>
                                
                                <div class="innovation-footer">
                                    <a href="<?= htmlspecialchars($innovation['website_link']) ?>" 
                                       target="_blank" 
                                       class="btn btn-primary innovation-link">
                                        Visit Website
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    
                    <?php if ($innovations->num_rows === 0): ?>
                    <div class="col-md-12 text-center">
                        <div class="alert alert-info">
                            No innovations available at the moment. Please check back later.
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.innovations-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
    padding: 0 15px;
}

@media (max-width: 768px) {
    .innovations-grid {
        grid-template-columns: 1fr; 
    }
}


.innovation-item {
    display: flex;
}

.innovation-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    width: 100%;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #eaeaea;
}

.innovation-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

.innovation-logo-container {
    padding: 20px;
    text-align: center;
    background: #f9f9f9;
    border-bottom: 1px solid #eee;
}

.innovation-logo {
    max-height: 80px;
    max-width: 100%;
    object-fit: contain;
    height: auto;
}

.innovation-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.innovation-title {
    color: #2c3e50;
    font-size: 1.2rem;
    margin-bottom: 10px;
    font-weight: 600;
    text-align: center;
}

.innovation-subtitle {
    color: #7f8c8d;
    font-size: 1rem;
    margin-bottom: 15px;
    font-weight: 500;
    text-align: center;
}

.innovation-description {
    color: #555;
    margin-bottom: 20px;
    line-height: 1.5;
    flex-grow: 1;
    text-align: justify;
}

.innovation-footer {
    text-align: center;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.innovation-link {
    padding: 10px 20px;
    font-weight: 500;
    border-radius: 4px;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    background-color: #0d6efd; /* Bootstrap primary blue */
    color: white !important;
    border-color: #0d6efd;
}

.innovation-link:hover {
    background-color: #0b5ed7; /* Slightly darker blue on hover */
    color: white !important;
    border-color: #0b5ed7;
}

@media (max-width: 576px) {
    .innovation-title {
        font-size: 1rem;
    }

    .innovation-subtitle {
        font-size: 0.95rem;
    }

    .innovation-description {
        font-size: 0.9rem;
    }

    .innovation-link {
        font-size: 0.85rem;
    }
}
</style>
