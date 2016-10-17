<?php

define("s1price",17);
define("s2price",22.50);
define("s3price",26.75);
define("regulardeliveryprice", 0);
define("regularcourierprice", 7);
define("expresscourierprice", 10.50);
define("plmcount",3); //number of seasons
    
    function unsetCart()
    {
        foreach($_SESSION['cart']['plm'] as $key => $value)
		{
			$_SESSION['cart']['plm'][$key] = array_fill_keys($key,0);
		}
    }

    function isValidCart($plm)
    {
        $totalQty = 0;
        foreach($plm as $key => $value)
		{
			if(isSetAndNonEmpty($value) == true && isValidQty($value) == true)
			{
				$totalQty += $value;
			}
		}
		if(isPositiveTotalQty($totalQty) ==  true)
		{
		    return true;
		}
		else
		{
		    return false;
		}
    }

    function isSetAndNonEmpty($input)
    {
    	if(!isset($input) || empty($input))
    	{
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }
    
    function isValidQty($qty)
    {
        if(!is_numeric($qty) || $qty > 5 || $qty <= 0)
		{
			return false;
		}
		else
		{
		    return true;
		}
    }
    
    function isPositiveTotalQty($total)
    {
        if(isPositive($total))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function isPositive($num)
    {
        if($num > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function getPlmTotal()
    {
        $total = 0;
        foreach($_SESSION['cart']['plm'] as $key => $value)
    	{
    		if(isPositive($value) == true)
    		{
    		    if($key == "s1")
    		    {
    		        $s1sub = $value*s1price;
    		        $total += $s1sub;
    		    }
    		    else if($key == "s2")
    		    {
    		        $s2sub = $value*s2price;
    		        $total += $s2sub;
    		    }
    		    else if($key == "s3")
    		    {
    		        $s3sub = $value*s3price;
    		        $total += $s3sub;
    		    }
    		}
    	}
    	return $total;
    }
    
    function printOrder()
    {
        $total = 0;
        foreach($_SESSION['cart']['plm'] as $key => $value)
    	{
    		if(isPositive($value) == true)
    		{
    		    echo "$value x  ";
    		    if($key == "s1")
    		    {
    		        $s1sub = $value*s1price;
    		        $total += $s1sub;
    		        $s1sub = number_format($s1sub,2);
    		        echo "Please Like Me - Season 1 - $$s1sub<br>";
    		        
    		    }
    		    else if($key == "s2")
    		    {
    		        $s2sub = $value*s2price;
    		        $total += $s2sub;
    		        $s2sub = number_format($s2sub,2);
    		        echo "Please Like Me - Season 2 - $$s2sub<br>";
    		    }
    		    else if($key == "s3")
    		    {
    		        $s3sub = $value*s3price;
    		        $total += $s3sub;
    		        $s3sub = number_format($s3sub,2);
    		        echo "Please Like Me - Season 3 - $$s3sub<br>";
    		    }
    		}
    	}
        echo "Subtotal - $<span id='checkoutSubtotal'>$total</span><br>";
    }
    
    function printOrderTableRows()
    {
        $total = 0;
        foreach($_SESSION['cart']['plm'] as $key => $value)
    	{
    		if(isPositive($value) == true)
    		{
    		    echo "<tr>\n";
    	        echo "<td>\n";
    	        echo "$value x  ";
    		    if($key == "s1")
    		    {
    		        $s1sub = $value*s1price;
    		        $total += $s1sub;
    		        $s1sub = number_format($s1sub,2);
    		        echo "Please Like Me - Season 1</td><td>$$s1sub</td>\n";
    		        
    		    }
    		    else if($key == "s2")
    		    {
    		        $s2sub = $value*s2price;
    		        $total += $s2sub;
    		        $s2sub = number_format($s2sub,2);
    		        echo "Please Like Me - Season 2</td><td>$$s2sub</td>\n";
    		    }
    		    else if($key == "s3")
    		    {
    		        $s3sub = $value*s3price;
    		        $total += $s3sub;
    		        $s3sub = number_format($s3sub,2);
    		        echo "Please Like Me - Season 3</td><td>$$s3sub</td>\n";
    		    }
    		}
    		echo "</tr>\n";
    	}
    	
    	echo "<tr>\n";
    	echo "<td>\n";
    	
    	if ($_SESSION['customer']['deliverytype'] == "regulardelivery")
    	{
            $total += regulardeliveryprice;
            $deliveryprice = number_format(regulardeliveryprice,2);
        	echo "Shipping costs - Regular Delivery </td><td>$$deliveryprice</td>\n";
    	}
    	else if ($_SESSION['customer']['deliverytype'] == "regularcourier")
    	{
            $total += regularcourierprice;
            $deliveryprice = number_format(regularcourierprice,2);
        	echo "Shipping costs - Regular Courier </td><td>$$deliveryprice</td>\n";
    	}
    	else if ($_SESSION['customer']['deliverytype'] == "expresscourier")
    	{
            $total += expresscourierprice;
            $deliveryprice = number_format(expresscourierprice,2);
        	echo "Shipping costs - Express Courier </td><td>$$deliveryprice</td>\n";
    	}
    	
    	$total = number_format($total,2);
    	echo "<tr><td></td><td>Total: $$total</td></tr>";
    }

    function isValidOrder($creditcard,$expiryYear,$expiryMonth)
    {
        if (isValidExpiry($expiryYear,$expiryMonth) && isValidCreditCard($creditcard))
        {
            return true; 
        }
        else 
        {
            return false;
        }
    }
    
    function isValidMonth($month) 
    {
        if ($month>0 && $month<=12) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function isValidExpiry($expiryYear,$expiryMonth)
    {
        $currentMonth= date('m');
        $currentYear= date('y');
        
        if ($expiryYear>$currentYear && isValidMonth($expiryMonth))
        {
            return true;
        }
        elseif ($expiryYear==$currentYear)
        {
            if ($expiryMonth>=$currentMonth && isValidMonth($expiryMonth))
            {
                return true;
            }
            else 
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
    }
    
    //Luhn Algorithm, reference link in README.md
    function luhn_validate($s)
    {
        if(0==$s)
        {
            return false;// Don't allow all zeros// Don't allow all zeros
        } 
        $sum=0;
        $i=strlen($s);     // Find the last character
        while ($i-- > 0) // Iterate all digits backwards
        {
            $sum+=$s[$i];    // Add the current digit
            // If the digit is even, add it again. Adjust for digits 10+ by subtracting 9.
            (0==($i%2)) ? ($s[$i] > 4) ? ($sum+=($s[$i]-9)) : ($sum+=$s[$i]) : false;
        }     
        return (0==($sum%10));
    } 
    
    function isValidCreditCard($creditcard)
    {
        if (luhn_validate($creditcard))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>