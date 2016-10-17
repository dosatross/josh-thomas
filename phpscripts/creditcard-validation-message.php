<?php
include_once('../tools.php');
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>";
    echo '<response>';
        $creditcard = $_GET['creditcard'];
        
        if (!isValidCreditCard($creditcard))
        {
            echo 'Invalid Credit Card';
        }
        else
        {
            echo 'Valid Credit Card';
        }
    echo '</response>';
?>