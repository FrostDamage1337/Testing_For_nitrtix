<?php
echo '<head>';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo '<link rel="stylesheet" href="font-awesome/all.css">';
echo '<link rel="stylesheet" href="style.css">';
echo '</head>';
echo '<div class="head"><img class=logo src="https://via.placeholder.com/60">';
echo '<div class="portfolio nav">PORTFOLIO</div><div class="career nav">CAREER</div>';
echo '<div class="blog nav active">BLOG</div><div class="contact nav">CONTACT</div>';
echo '</div>';
echo '<script type="text/javascript">';
echo '$(".blog.nav").on("click", () => {';
echo '  window.location.href = "index.php";';
echo '});';
echo '</script>';
