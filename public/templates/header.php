<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scarlet News</title>
    <script src="https://kit.fontawesome.com/e98cacf2a5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
  <?php session_start(); ?>
 <header>
    <div class="header-container">
      <div class="logo">
        <a href=<?php Redirect("/"); ?>>Logo</a>
      </div>
      <div class="search-bar">
        <button type="button">Filters</button>
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
      </div>
      <div class="user-options">
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){?>
        <a href=<?php Redirect("/porfile"); ?>><img src=<?php echo $_SESSION['photo'];?> alt='user' width=20 height=20><?php echo $_SESSION['fullname']; ?></a>
        <a href=<?php Redirect("/Logout"); ?>><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i> Log out</a>
        <?php
          }
          else{
        ?>
        <a href=<?php Redirect("/Login"); ?>><i class="fa-solid fa-user" style="color: #ffffff;"></i> Login</a>
        <a href=<?php Redirect("/SignUp"); ?>><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i> Sign Up</a>
        <?php } ?>
      </div>
    </div>
    <center>
        <div class='categories-items'>
            <ul>
                <li class='categories-text'>Categories:</li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Tecnology</a></li>
                <li><a href="#">Videogames</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Pets</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Clothes</a></li>
            </ul>
        </div>
    </center>
  </header>
