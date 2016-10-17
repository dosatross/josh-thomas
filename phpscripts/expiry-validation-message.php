<?php
include_once('../tools.php');
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>";
    echo '<response>';
        $expiryMonth = $_GET['expiryMonth'];
        $expiryYear = $_GET['expiryYear'];
        
        if (!isValidExpiry($expiryYear,$expiryMonth))
        {
            echo 'Invalid Expiry';
        }
        else
        {
            echo 'Valid Expiry';
        }
    echo '</response>';
?>