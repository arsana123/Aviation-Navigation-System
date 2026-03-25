<?php

session_start();


$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/plane2.png" type="image/x-icon">
    <?php
    $currentFileName = basename($_SERVER['PHP_SELF'], '.php');
    $formattedFileName = $currentFileName;
    $formattedFileName === "index" ? $formattedFileName = "Home" :
        $formattedFileName = ucfirst($currentFileName);
    ?>
    <title><?php echo $formattedFileName; ?> - AviationNav</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hamburger-line {
            transition: all 0.3s ease-in-out;
        }

        .wrap {
            transition: all 0.3s ease-in-out;
        }
    </style>
    <?php if (isset($_SESSION['user_id'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
               
                function toggleProfilePopup(event) {
                    event.stopPropagation();
                    const popup = document.getElementById('profile-popup');
                    popup.classList.toggle('hidden');
                }

                
                const profileButton = document.getElementById('profile-button');
                if (profileButton) {
                    profileButton.addEventListener('click', toggleProfilePopup);
                }

                
                document.addEventListener('click', function(event) {
                    const popup = document.getElementById('profile-popup');
                    const profileButton = document.getElementById('profile-button');

                    if (popup && !popup.contains(event.target) && event.target !== profileButton) {
                        popup.classList.add('hidden');
                    }
                });
            });
        </script>
    <?php endif; ?>
</head>