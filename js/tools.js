function updateShopFromItemCards() 
{

    var s1qty = document.getElementById("s1qty-itemcard").value;
    var s2qty = document.getElementById("s2qty-itemcard").value;
    var s3qty = document.getElementById("s3qty-itemcard").value;
    
    updateShop(s1qty,s2qty,s3qty);
}

function updateShopFromSummary() 
{
   var s1qty = document.getElementById("s1qty-summary").value; 
   var s2qty = document.getElementById("s2qty-summary").value;
   var s3qty = document.getElementById("s3qty-summary").value;
   
    updateShop(s1qty,s2qty,s3qty);
}

function updateShop(s1qty,s2qty,s3qty) 
{
    var s1price = 17.00;
    var s2price = 22.00;
    var s3price = 26.75;
    
   document.getElementById("s1qty-summary").value = s1qty;
   document.getElementById("s2qty-summary").value = s2qty;
   document.getElementById("s3qty-summary").value = s3qty;
    
    document.getElementById("s1sub-summary").innerHTML = "$" + (s1qty * s1price).toFixed(2);
   document.getElementById("s2sub-summary").innerHTML = "$" + (s2qty * s2price).toFixed(2);
   document.getElementById("s3sub-summary").innerHTML = "$" + (s3qty * s3price).toFixed(2);
   
   document.getElementById("s1qty-itemcard").value = s1qty;
   document.getElementById("s2qty-itemcard").value = s2qty;
   document.getElementById("s3qty-itemcard").value = s3qty;
   
   document.getElementById("s1sub-itemcard").innerHTML = "$" + (s1qty * s1price).toFixed(2);
   document.getElementById("s2sub-itemcard").innerHTML = "$" + (s2qty * s2price).toFixed(2);
   document.getElementById("s3sub-itemcard").innerHTML = "$" + (s3qty * s3price).toFixed(2);
   
   
    var total = s3qty * s3price + s2qty * s2price + s1qty * s1price;
    
    document.getElementById("shopTotal").innerHTML = "$" + total.toFixed(2);
}

function updateCart() 
{
    var s1qty = document.getElementById("s1qty-cart").value; 
   var s2qty = document.getElementById("s2qty-cart").value;
   var s3qty = document.getElementById("s3qty-cart").value;
   
   var s1price = 17.00;
    var s2price = 22.00;
    var s3price = 26.75;
   
   document.getElementById("s1sub-cart").innerHTML = "$" + (s1qty * s1price).toFixed(2);
   document.getElementById("s2sub-cart").innerHTML = "$" + (s2qty * s2price).toFixed(2);
   document.getElementById("s3sub-cart").innerHTML = "$" + (s3qty * s3price).toFixed(2);
   
   
    var total = s3qty * s3price + s2qty * s2price + s1qty * s1price;
    
    document.getElementById("cartTotal").innerHTML = "$" + total.toFixed(2);
}




function updateFlexibility() 
{
    var flexibility = document.getElementById("flexibilityInput").value;

    if (flexibility == 0)
    {
        document.getElementById("flexibility").innerHTML = "inflexible";
    }
    else if (flexibility == 1)
    {
        document.getElementById("flexibility").innerHTML = "flexible";
    }
    else if (flexibility == 2)
    {
        document.getElementById("flexibility").innerHTML = "super-flexible";
    }
}

function handleCustomerDetails()
{
    
    if(document.getElementById("rememberMe").checked == true)
    {
        storeCustomerDetails();
    }
    else
    {
        removeCustomerDetails();
    }
}

function storeCustomerDetails()
{
    window.localStorage.setItem("firstname",document.getElementById("firstname").value);
    window.localStorage.setItem("lastname",document.getElementById("lastname").value);
    window.localStorage.setItem("shippingaddress",document.getElementById("shippingaddress").value);
    window.localStorage.setItem("email",document.getElementById("email").value);
    window.localStorage.setItem("phonenumber",document.getElementById("phonenumber").value);
    window.localStorage.setItem("creditcard",document.getElementById("creditcard").value);
    window.localStorage.setItem("expiryMonth",document.getElementById("expiryMonth").value);
    window.localStorage.setItem("expiryYear",document.getElementById("expiryYear").value);
    window.localStorage.setItem("rememberMe",document.getElementById("rememberMe").checked);
}

function removeCustomerDetails()
{
    window.localStorage.removeItem("firstname");
    window.localStorage.removeItem("lastname");
    window.localStorage.removeItem("shippingaddress");
    window.localStorage.removeItem("email");
    window.localStorage.removeItem("phonenumber");
    window.localStorage.removeItem("creditcard");
    window.localStorage.removeItem("expiryMonth");
    window.localStorage.removeItem("expiryYear");
    window.localStorage.removeItem("rememberMe");
}

function printCustomerDetails()
{
    document.getElementById("firstname").value = window.localStorage.getItem("firstname");
    document.getElementById("lastname").value = window.localStorage.getItem("lastname");
    document.getElementById("shippingaddress").value = window.localStorage.getItem("shippingaddress");
    document.getElementById("email").value = window.localStorage.getItem("email");
    document.getElementById("phonenumber").value = window.localStorage.getItem("phonenumber");
    document.getElementById("creditcard").value = window.localStorage.getItem("creditcard");
    document.getElementById("expiryMonth").value = window.localStorage.getItem("expiryMonth");
    document.getElementById("expiryYear").value = window.localStorage.getItem("expiryYear");
    document.getElementById("rememberMe").checked = window.localStorage.getItem("rememberMe");
}

// Luhn Algorithm, reference link in REDME.md
function checkLuhn(input)
{
  var sum = 0;
  var numdigits = input.length;
  var parity = numdigits % 2;
  for(var i=0; i < numdigits; i++) 
  {
    var digit = parseInt(input.charAt(i));
    if(i % 2 == parity) digit *= 2;
    if(digit > 9) digit -= 9;
    sum += digit;
  }
  return (sum % 10) == 0;
}

function validateCreditCard() 
{
    document.getElementById("creditcardmessage").style.visibility = 'hidden';

   if (checkLuhn(document.forms['checkoutForm']['creditcard'].value))
   {
       return true; 
   }
   else 
   {
        return false;
   }
}


function validateExpiry()
{
    document.getElementById("expirymessage").style.visibility ='hidden';
    var date = new Date();
    var currentYear = parseInt(date.getFullYear().toString().substr(2,2));
    var year = document.forms['checkoutForm']['expiryYear'].value;
    var month = document.forms['checkoutForm']['expiryMonth'].value-1;
    if (year<currentYear)
    {
        return false;
    }
    else if (year==currentYear) 
    {
        if (month<date.getMonth())
        {
            return false; 
        }
        else 
        {
            return true; 
        }
    }
    else
    {
        return true; 
    }
}



function formValidate() 
{
    if (validateCreditCard())
    {
        if (validateExpiry())
        {
            return true;
        }
            else 
            {
                document.getElementById("expirymessage").style.visibility ='visible';
                return false;
            }
        }
    else 
    {
        document.getElementById("creditcardmessage").style.visibility ='visible';
        if (!validateExpiry())
        {
            document.getElementById("expirymessage").style.visibility ='visible';
            return false;
        }
        else 
        {
            return false;
        }
    }
}