<?php
require_once '../../../../../connect.php';
// include "../../../../../plugins/php_functions/security.php";
session_start();

$formSubmitted = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formSubmitted = true;
    
    // Initialize variables
    $logo = null;
    $title = '';
    $description = '';
    $website_link = '';
    $id = null;
    
    // Check if delete action
    if (isset($_POST['delete'])) {
        $stmt = $con->prepare("DELETE FROM innovations WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $_POST['id']);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        // Get form data
        $title = isset($_POST['title']) ? $con->real_escape_string($_POST['title']) : '';
        $description = isset($_POST['description']) ? $con->real_escape_string($_POST['description']) : '';
        $website_link = isset($_POST['website_link']) ? $con->real_escape_string($_POST['website_link']) : '';
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        
        // Handle file upload
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "../../../uploads/logos/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            
            $fileExt = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $newFilename = uniqid() . '.' . $fileExt;
            $targetFile = $targetDir . $newFilename;
            
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['logo']['type'], $allowedTypes)) {
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
                    $logo = $newFilename;
                }
            }
        }
        
        // Validate and save
        if (!empty($title) && !empty($description) && !empty($website_link)) {
            if (empty($id)) {
                // Insert new
                $stmt = $con->prepare("INSERT INTO innovations (logo, title, description, website_link) VALUES (?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ssss", $logo, $title, $description, $website_link);
                    $stmt->execute();
                    $stmt->close();
                }
            } else {
                // Update existing
                if ($logo) {
                    $stmt = $con->prepare("UPDATE innovations SET logo=?, title=?, description=?, website_link=? WHERE id=?");
                    if ($stmt) {
                        $stmt->bind_param("ssssi", $logo, $title, $description, $website_link, $id);
                    }
                } else {
                    $stmt = $con->prepare("UPDATE innovations SET title=?, description=?, website_link=? WHERE id=?");
                    if ($stmt) {
                        $stmt->bind_param("sssi", $title, $description, $website_link, $id);
                    }
                }
                if ($stmt) {
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }
}

// Get all innovations
$innovations = $con->query("SELECT * FROM innovations ORDER BY title");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Innovations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .logo-preview { 
            max-width: 100px; 
            max-height: 100px;
            border-radius: 4px;
        }
        .card { 
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: none;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
        }
        .btn-add-new {
            transition: all 0.3s;
        }
        .btn-add-new:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .innovation-card {
            transition: all 0.3s;
        }
        .innovation-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .form-section {
            transition: all 0.3s ease-out;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Manage Innovations</h1>
            <button class="btn btn-success btn-add-new" onclick="toggleForm()">
                <i class="fas fa-plus"></i> Add New Innovation
            </button>
        </div>

        <!-- Add/Edit Form Section -->
        <div id="innovationForm" class="card form-section" style="display: none;">
            <div class="card-header">
                <h2 class="mb-0">Add/Edit Innovation</h2>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" id="innovationFormElement">
                    <input type="hidden" name="id" id="edit_id" value="">
                    
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo:</label>
                        <input type="file" class="form-control" name="logo" id="logo" accept="image/jpeg, image/png, image/gif">
                        <div class="mt-2">
                            <img id="logo_preview" class="logo-preview" src="" style="display: none;">
                        </div>
                        <small class="text-muted">Max size: 2MB. Formats: JPEG, PNG, GIF</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="website_link" class="form-label">Website Link <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" name="website_link" id="website_link" required>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-secondary me-2" onclick="toggleForm()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Innovation</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Innovations List -->
        <h2 class="mt-5 mb-3">Current Innovations</h2>
        
        <?php if ($innovations && $innovations->num_rows > 0): ?>
            <div class="row">
                <?php while($innovation = $innovations->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 innovation-card">
                        <div class="card-body">
                            <div class="d-flex">
                                <?php if ($innovation['logo']): ?>
                                <div class="flex-shrink-0 me-3">
                                    <img src="../../../uploads/logos/<?= htmlspecialchars($innovation['logo']) ?>" class="logo-preview">
                                </div>
                                <?php endif; ?>
                                <div class="flex-grow-1">
                                    <h3 class="h5"><?= htmlspecialchars($innovation['title']) ?></h3>
                                    <p class="text-muted"><?= nl2br(htmlspecialchars($innovation['description'])) ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?= htmlspecialchars($innovation['website_link']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                            Visit Website
                                        </a>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-outline-warning me-1" onclick="editInnovation(
                                                <?= $innovation['id'] ?>, 
                                                '<?= str_replace("'", "\\'", $innovation['title']) ?>', 
                                                '<?= str_replace("'", "\\'", $innovation['description']) ?>', 
                                                '<?= $innovation['website_link'] ?>', 
                                                '<?= $innovation['logo'] ?>')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <form method="post" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $innovation['id'] ?>">
                                                <input type="hidden" name="delete" value="1">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this innovation?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                No innovations found. Click "Add New Innovation" to get started.
            </div>
        <?php endif; ?>
    </div>

    <script>
    // Toggle form visibility
    function toggleForm() {
        const form = document.getElementById('innovationForm');
        if (form.style.display === 'none') {
            // Clear form when opening
            document.getElementById('edit_id').value = '';
            document.getElementById('title').value = '';
            document.getElementById('description').value = '';
            document.getElementById('website_link').value = '';
            document.getElementById('logo_preview').style.display = 'none';
            document.getElementById('logo_preview').src = '';
            form.style.display = 'block';
            // Smooth scroll to form
            form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            form.style.display = 'none';
        }
    }

    // Edit innovation - populate form
    function editInnovation(id, title, description, website_link, logo) {
        document.getElementById('edit_id').value = id;
        document.getElementById('title').value = title;
        document.getElementById('description').value = description;
        document.getElementById('website_link').value = website_link;

        const logoPreview = document.getElementById('logo_preview');
        if (logo) {
            logoPreview.src = '../../../uploads/logos/' + logo;
            logoPreview.style.display = 'block';
        } else {
            logoPreview.style.display = 'none';
        }

        // Show the form
        const form = document.getElementById('innovationForm');
        form.style.display = 'block';
        form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Auto-hide form after submission if needed
    <?php if ($formSubmitted): ?>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('innovationForm').style.display = 'none';
    });
    <?php endif; ?>

    // Preview logo when selected
    document.getElementById('logo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('logo_preview');
                preview.src = event.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
    </script>
</body>
</html>