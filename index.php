<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog_website");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === "signup") {
            $username = $conn->real_escape_string($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql)) {
                echo json_encode(["status" => "success", "message" => "Sign-up successful!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
            }
        } elseif ($action === "login") {
            $username = $conn->real_escape_string($_POST['username']);
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $username;
                    echo json_encode(["status" => "success", "message" => "Login successful!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Invalid password."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "User not found."]);
            }
        } elseif ($action === "createPost") {
            if (isset($_SESSION['user'])) {
                $category = $conn->real_escape_string($_POST['category']);
                $title = $conn->real_escape_string($_POST['title']);
                $description = $conn->real_escape_string($_POST['description']);

                $sql = "INSERT INTO posts (category, title, description) VALUES ('$category', '$title', '$description')";
                if ($conn->query($sql)) {
                    echo json_encode(["status" => "success", "message" => "Post created successfully!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Please log in first."]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" href="css.css">
    <title>Blog Website</title>
</head>

<body>
    <!-- Sign-up & Login Form Layer -->
    <div id="loginForm" class="container">
        <div class="button-container">
            <h1>Welcome! Please Sign Up or Log In</h1>
            <form id="signUpForm">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <br><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <button onclick="loginPage()">Login</button></p>
        </div>
    </div>

    <!-- Blog Content Layer, Hidden Initially -->
    <div id="blogContent" class="post-container" style="display: none;">
        <header>
            <h1 class="logo"><a href="#">Your Blog</a></h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#" id="createPostBtn">Create Post</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>

        <h2>Welcome to Your Blog!</h2>
        <p>Here, you can create and view your blog posts.</p>
        <div id="createPostModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span id="closeModal" class="close">&times;</span>
                <h2>Create New Post</h2>
                <form id="postForm">
                    <label for="postCategory">Category</label>
                    <input type="text" id="postCategory" required><br>
                    <label for="postTitle">Title</label>
                    <input type="text" id="postTitle" required><br>
                    <label for="postDescription">Description</label>
                    <textarea id="postDescription" required></textarea><br>
                    <button type="submit" id="postSubmitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="ber.js"></script>
        
</body>

</html>

