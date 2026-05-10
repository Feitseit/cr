<?php
session_start();
include('config.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD_HASH)) {
        $_SESSION["admin"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Vale kasutajanimi või parool!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(-45deg, #1a1a2e, #162447, #1f4068, #e43f5a);
            background-size: 400% 400%; 
            animation: gradientBG 15s ease infinite; 
        }
        @keyframes gradientBG { 
            0%{background-position:0% 50%} 
            50%{background-position:100% 50%} 
            100%{background-position:0% 50%} 
        }
        .card { border-radius: 15px; }
        #funMessages { margin-top: 15px; font-weight: bold; color: #ffdd57; text-align: center; min-height: 24px; }
        #funGif {
            display: none;
            width: 300px;      /* suurem GIF */
            max-width: 80%;    /* väiksematel ekraanidel korras */
            margin: 20px auto 0;  /* keskele vormi alla */
            display: block;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Auto Rent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center mb-2">Admin Login</h2>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" id="loginForm">
                    <div class="mb-3">
                        <label>Kasutajanimi</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Parool</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-dark w-100" type="button" id="loginBtn">Logi sisse</button>
                </form>
                <div id="funMessages"></div>

                <!-- GIF keskel login all -->
                <img id="funGif" src="https://media.giphy.com/media/l0MYt5jPR6QX5pnqM/giphy.gif" alt="Fun login GIF">
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const loginBtn = document.getElementById('loginBtn');
const form = document.getElementById('loginForm');
const funMessages = document.getElementById('funMessages');
const funGif = document.getElementById('funGif');

loginBtn.addEventListener('click', function() {
    const messages = [
        "Kas oled kindel? 🤔",
        "Tõesti kindel? 😎",
        "Väga kindel! 💪",
        "Oled täiesti kindel! 😁",
        "Viimane võimalus logida sisse! 🚀"
    ];

    let i = 0;

    function showNextMessage() {
        if (i < messages.length) {
            funMessages.innerText = messages[i];
            i++;
            setTimeout(showNextMessage, 800); // iga sõnum 0.8s
        } else {
            // Näita GIFi ja siis submit
            funGif.style.display = 'block';
            setTimeout(() => {
                funGif.style.display = 'none';
                form.submit();
            }, 2000);
        }
    }

    showNextMessage();
});
</script>
</body>
</html>
