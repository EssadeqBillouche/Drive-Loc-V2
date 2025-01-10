<?php
session_start();
require '../classes/Autoloader.php';
use classes\Autoloader;
Autoloader::AutoloaderFunction();
use classes\article;

if (isset($_POST['AddPost'])) {
    $tags = $_POST['tags'];
    $title = $_POST['PostTitle'];
    $description = $_POST['PostContent'];


}

?>




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
            --primary-fallback: orange;
            --secondary: #2B2E4A;
            --secondary-fallback: #444;
            --light: #F4F5F8;
            --light-fallback: #fff;
            --dark: #1C1E32;
            --dark-fallback: #000;
        }

        body {
            background-color: var(--light, var(--light-fallback));
            color: var(--dark, var(--dark-fallback));
        }

        .modal-content {
            background-color: var(--light, var(--light-fallback));
            color: var(--dark, var(--dark-fallback));
            border: 1px solid var(--secondary, var(--secondary-fallback));
        }

        .btn-primary {
            background-color: var(--primary, var(--primary-fallback));
            border-color: var(--primary, var(--primary-fallback));
        }

        .btn-primary:hover {
            background-color: #e67509;
            border-color: #e67509;
        }

        .bg-secondary {
            background-color: var(--secondary, var(--secondary-fallback)) !important;
        }

        .text-white {
            color: var(--light, var(--light-fallback)) !important;
        }

        #themeSelector {
            background-color: var(--light, var(--light-fallback));
            color: var(--dark, var(--dark-fallback));
            border: 1px solid var(--secondary, var(--secondary-fallback));
        }

        .navbar {
            background: var(--dark) !important;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">BlogPlatform</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Themes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-theme="technology">Technology</a></li>
                        <li><a class="dropdown-item" href="#" data-theme="travel">Travel</a></li>
                        <li><a class="dropdown-item" href="#" data-theme="lifestyle">Lifestyle</a></li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                        Create New Post
                    </button>
                </li>
            </ul>
            <form class="d-flex me-3" id="searchForm">
                <input class="form-control me-2" type="search" placeholder="Search articles..." id="searchInput">
                <button class="btn" style="background-color: var(--primary, var(--primary-fallback)); color: white;" type="submit">Search</button>
            </form>

            <!-- User profile dropdown when logged in -->
            <?php
            if (!empty($_SESSION['name'])) {
                echo '<div class="nav-item dropdown" id="userProfileSection" style="display: block;">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                        <span class="text-dark" id="userInitials">JD</span>
                    </div>
                    <span class="text-light" id="userName">'.htmlspecialchars($_SESSION['name']). '</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#profile">My Profile</a></li>
                    <li><a class="dropdown-item" href="#settings">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logout.php" id="logoutBtn">Logout</a></li>
                </ul>
            </div>';

            }else{
                echo '<!-- Login/Signup buttons when logged out -->
            <div id="authButtons">
                <button class="btn btn-outline-light me-2" id="loginBtn">Login</button>
                <button class="btn btn-primary" id="signupBtn">Sign Up</button>
            </div>';
            }
            ?>

        </div>
    </div>
</nav>
<!-- Hero Section -->
<div class="bg-secondary text-white py-5">
    <div class="container text-center">
        <h1 class="display-4">Welcome to BlogPlatform</h1>
        <p class="lead">Discover, Create, and Share Stories That Inspire the World.</p>
        <a href="#createPostModal" class="btn btn-primary btn-lg" data-bs-toggle="modal">
            Start Writing Now
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <!-- Button to Open Modal -->
<!--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">-->
<!--        Create New Post-->
<!--    </button>-->

    <!-- Modal -->
    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newPostForm" method="post" action="">
                        <div class="mb-3">
                            <label for="themeSelector" class="form-label">Select Theme</label>
                            <select class="form-select" name='selectedTheme' id="themeSelector">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Post Title</label>
                            <input type="text" name = "PostTitle" class="form-control" id="postTitle" placeholder="Enter post title" required>
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Post Content</label>
                            <textarea class="form-control" name= "PostConntent" id="postContent" rows="4" placeholder="Write your content here" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="postTags" class="form-label">Tags</label>
                            <input type="text" name ="Tags" class="form-control" id="postTags" placeholder="Add tags (comma-separated)">
                        </div>

                        <div class="mb-3">
                            <label for="postImage" class="form-label">Add Image</label>
                            <input type="file" class="form-control" id="postImage" accept="image/*">
                        </div>
                        <div class="text-end">
                            <button type="submit" name= "AddPost" class="btn btn-primary">Publish Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Filter by Tags</h5>
            <div class="d-flex flex-wrap gap-2" id="tagFilters">
                <button class="btn btn-sm btn-outline-secondary" data-tag="technology">#technology</button>
                <button class="btn btn-sm btn-outline-secondary" data-tag="travel">#travel</button>
                <button class="btn btn-sm btn-outline-secondary" data-tag="lifestyle">#lifestyle</button>
            </div>
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="row" id="blogPosts">
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Sample Post Title</h5>
                    <p class="card-text">This is a sample description for the post card. Add your content here.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary">#Tag1</span>
                        <span class="badge bg-secondary">#Tag2</span>
                    </div>
                    <p class="text-muted">Posted on January 7, 2025</p>
                    <a href="#" class="btn btn-primary">See Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>BlogPlatform</h5>
                <p>Share your thoughts with the world.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="mb-2">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
                <small>&copy; 2024 BlogPlatform. All rights reserved.</small>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
