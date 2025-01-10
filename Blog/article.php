<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #F77D0A;
            --secondary: #2B2E4A;
            --light: #F4F5F8;
            --dark: #1C1E32;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            font-family: 'Inter', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, var(--dark), var(--secondary)) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .article-header {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0;
            color: rgba(255,255,255,0.9);
        }

        .article-content {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .comment-section {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .comment {
            border-left: 4px solid var(--primary);
            padding-left: 1rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .comment:hover {
            transform: translateX(5px);
        }

        .form-control {
            border: 2px solid #eee;
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(247, 125, 10, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e67509;
            transform: translateY(-2px);
        }

        footer {
            background: linear-gradient(to right, var(--dark), var(--secondary));
            color: var(--light);
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .social-links a {
            color: var(--light);
            margin: 0 10px;
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            color: var(--primary);
        }

        .breadcrumb {
            background: transparent;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>

<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-pen-fancy me-2"></i>BlogPlatform
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-home me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-book me-1"></i>Articles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Article Header -->
<header class="article-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home me-1"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-book me-1"></i>Articles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Article Title</li>
            </ol>
        </nav>
        <h1 class="display-4">Article Title</h1>
        <div class="article-meta">
            <span><i class="far fa-calendar-alt me-1"></i>January 8, 2025</span>
            <span><i class="far fa-user me-1"></i>Author Name</span>
            <span><i class="far fa-clock me-1"></i>5 min read</span>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Article Content -->
            <article class="article-content">
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.
                </p>
                <p>
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa.
                </p>
            </article>

            <!-- Comment Section -->
            <section class="comment-section">
                <h3 class="mb-4"><i class="far fa-comments me-2"></i>Comments</h3>

                <!-- Comment Form -->
                <form class="mb-4">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="3" placeholder="Your Comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-paper-plane me-2"></i>Submit Comment
                    </button>
                </form>

                <!-- Existing Comments -->
                <div class="comments mt-4">
                    <div class="comment">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0"><i class="far fa-user me-2"></i>John Doe</h6>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>January 7, 2025</small>
                        </div>
                        <p class="mb-0">This is a great article! Very informative and well-written.</p>
                    </div>

                    <div class="comment">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0"><i class="far fa-user me-2"></i>Jane Smith</h6>
                            <small class="text-muted"><i class="far fa-clock me-1"></i>January 6, 2025</small>
                        </div>
                        <p class="mb-0">I really enjoyed reading this. Keep up the good work!</p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user me-2"></i>About the Author</h5>
                    <p class="card-text">Author bio and description goes here. This section can include a brief introduction about the author.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-share-alt me-2"></i>Share this Article</h5>
                    <div class="social-links">
                        <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-outline-info me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-pen-fancy me-2"></i>BlogPlatform</h5>
                <p class="mb-0">Share your thoughts with the world.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="social-links mb-2">
                    <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
                <small>&copy; 2025 BlogPlatform. All rights reserved.</small>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>