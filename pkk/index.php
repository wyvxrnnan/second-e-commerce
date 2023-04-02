<?php
session_start();

unset($_SESSION['stat_login']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['password']);

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>knock, knock. who's there?</title>
    <link rel="stylesheet" href="style/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
</head>
<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <a href="">ayaysnack</a>
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        
        <div class="nav-links">
            <a href="#about">about</a>
            <a href="pages/product.php">food</a>
            <a href="#contact">contact</a>
            <a href="pages/logreg.php">login</a>
        </div>
    </div>

    <div class="landing">
        <div class="left">
            <div class="transparent">チッ</div>
            <div class="wrapper">
                <div class="nippon" id="parallax">チップス</div>
                <img src="img/chips.png" alt="chips" id="parallax2">
            </div>
        </div>
    
        <div class="right">
            <div class="header">
                <span class="title">potato chips kinda stuff.</span>
                <a href="pages/product.php"><button class="butt">order now</button></a> 
            </div>

            <div class="footer">
                <div class="wrapper">
                    <span>1K+</span>
                    <div class="text">happy customer</div>
                    <div class="vr"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="about" id="about">
        <div class="left">
            <div class="title">about us.</div>
        </div>

        <div class="right">
            <div class="container">
                <div class="title">our story</div>
                <div class="desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, fugit! Odit quasi aperiam aliquam omnis adipisci optio excepturi quia ex vitae dolores nostrum culpa, accusantium dolorem autem eaque enim blanditiis libero dignissimos minima porro eligendi! Quisquam earum veritatis dolor neque eius exercitationem tempora ducimus! Sed sit dicta reprehenderit laboriosam fugit?
                </div>
                <div class="hr"></div>
                <div class="rect"></div>
         
                <img src="img/chips2.png" alt="chipswithonion" id="parallax3">
     
            </div>
        </div>
    </div>

    <!-- <div class="food">

    </div> -->

    <div class="contact" id="contact">
        <div class="content">
            <div class="title">Let's Start a Conversation</div>
            <div class="sub">Ask how we can help you.</div>
            <div class="wrapper">
                <input type="text" placeholder="Type here">
                <a href="pages/logreg.php"><button type="submit">Submit</button></a>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <span class="title"><span class="red">ayay</span>snack</span>
            <div class="socials">
                <div class="wrapper"><ion-icon name="logo-instagram"></ion-icon></div>
                <div class="wrapper"><ion-icon name="logo-facebook"></ion-icon></div>
                <div class="wrapper"><ion-icon name="logo-twitter"></ion-icon></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/index.js" type="text/javascript"></script>
</body>
</html>