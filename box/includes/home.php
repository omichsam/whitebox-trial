<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 mb-4">Where Government Supports Your Innovation</h1>
                <p class="lead mb-5">WhiteBox is a platform for Kenyan innovators to grow their ideas with government
                    support and resources.</p>
                <div class="cta-buttons">
                    <a href="#loginmodal" class="btn btn-primary btn-lg mr-3" data-toggle="modal">Get Started</a>
                    <a href="index.php?page=about" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>How WhiteBox Works</h2>
            <p class="lead">A simple process to get your innovation supported</p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="step-number">1</div>
                        <h3 class="h4">Submit Your Idea</h3>
                        <p>Create an account and submit your innovation details through our secure portal.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="step-number">2</div>
                        <h3 class="h4">Evaluation</h3>
                        <p>Our team reviews your submission and provides feedback within 14 working days.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="step-number">3</div>
                        <h3 class="h4">Get Support</h3>
                        <p>Qualified innovations receive funding, mentorship and other support services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Featured Innovations</h2>
            <p class="lead">See what other Kenyan innovators are building</p>
        </div>

        <div class="owl-carousel innovation-carousel">
            <?php
            $innovations = fetch_all(query("SELECT * FROM innovations WHERE featured = 1 ORDER BY created_at DESC LIMIT 6"));

            foreach ($innovations as $innovation):
                $logo = !empty($innovation['logo']) ? 'uploads/logos/' . $innovation['logo'] : 'assets/images/default-innovation.png';
                ?>
                <div class="item">
                    <div class="card innovation-card">
                        <img src="<?php echo $logo; ?>" class="card-img-top"
                            alt="<?php echo htmlspecialchars($innovation['title']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($innovation['title']); ?></h5>
                            <p class="card-text">
                                <?php echo substr(htmlspecialchars($innovation['description']), 0, 100); ?>...</p>
                            <a href="innovation.php?id=<?php echo $innovation['id']; ?>" class="btn btn-sm btn-primary">View
                                Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="index.php?page=innovations" class="btn btn-outline-primary">View All Innovations</a>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Why Register With WhiteBox?</h2>
                <ul class="list-unstyled feature-list">
                    <li class="media mb-3">
                        <div class="mr-3"><i class="fas fa-check-circle text-primary"></i></div>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Government Support</h5>
                            <p>Get direct support from the Kenyan government for your innovation.</p>
                        </div>
                    </li>
                    <li class="media mb-3">
                        <div class="mr-3"><i class="fas fa-check-circle text-primary"></i></div>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Funding Opportunities</h5>
                            <p>Access to grants, investors and other funding opportunities.</p>
                        </div>
                    </li>
                    <li class="media mb-3">
                        <div class="mr-3"><i class="fas fa-check-circle text-primary"></i></div>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Mentorship</h5>
                            <p>Guidance from industry experts and successful entrepreneurs.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="video-container">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4TrxdOKxna0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>