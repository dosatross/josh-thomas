<?php
    session_start();
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>";
    echo '<response>';
        $season = $_GET['season'];
        $_SESSION['cart']['plm'][$season] = 0;
        $qty = $_SESSION['cart']['plm'][$season];
        echo "$qty";
    echo '</response>';
?>