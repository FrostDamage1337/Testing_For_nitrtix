<?php
echo '<script type="text/javascript">';
echo '$(".open.menu.button").on("click", () => {';
echo "  if ($('.menu.list').css('margin-left') == '0px')";
echo '  {';
echo '    $(".menu.list").css("margin-left", "-200px");';
echo '  } else {';
echo '    $(".menu.list").css("margin-left", "0px");';
echo '  }';
echo '});';
echo '</script>';
