<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Platform</title>
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
        }

        .navbar {
            background: var(--dark) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e67509;
            border-color: #e67509;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transition: all 0.3s ease;
        }

        .btn-outline-secondary {
            color: var(--secondary);
            border-color: var(--secondary);
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: var(--secondary);
            color: var(--light);
            transform: translateY(-2px);
        }

        .theme-indicator {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-radius: 12px 12px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
        }

        .search-bar {
            position: relative;
        }

        .search-bar .form-control {
            border-radius: 20px;
            padding-left: 1rem;
            border: 2px solid var(--light);
        }

        .search-bar .btn {
            border-radius: 20px;
            padding: 0.375rem 1.5rem;
        }

        footer {
            background: linear-gradient(to right, var(--dark), var(--secondary));
            margin-top: 4rem;
        }

        .social-links a {
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            transform: translateY(-3px);
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
                    <a class="nav-link active" href="#home">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-palette me-1"></i>Themes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-microchip me-2"></i>Technology</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-plane me-2"></i>Travel</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i>Lifestyle</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex search-bar">
                <input class="form-control me-2" type="search" placeholder="Search articles...">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search me-1"></i>Search
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Theme Indicator -->
<div class="container mt-4">
    <div class="theme-indicator">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="fas fa-bookmark fa-2x"></i>
            </div>
            <div class="col">
                <h4 class="mb-0">Current Theme: Technology</h4>
                <p class="mb-0">Exploring the latest in tech innovations and digital trends</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-4">
    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h5 class="mb-3"><i class="fas fa-tags me-2"></i>Filter by Tags</h5>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-microchip me-1"></i>technology
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-plane me-1"></i>travel
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-heart me-1"></i>lifestyle
                </button>
            </div>
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <img src="/api/placeholder/400/320" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Latest Tech Trends 2025</h5>
                    <p class="card-text">Exploring the revolutionary changes in technology that will shape our future.</p>
                    <div class="d-flex gap-2 mb-3">
                        <span class="badge bg-secondary"><i class="fas fa-tag me-1"></i>Technology</span>
                        <span class="badge bg-secondary"><i class="fas fa-code me-1"></i>Innovation</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted"><i class="far fa-calendar-alt me-1"></i>January 8, 2025</small>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-pen-fancy me-2"></i>BlogPlatform</h5>
                <p class="mb-0">Share your thoughts with the world.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="social-links mb-2">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
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