function createXmlHttpRequestObject()
{
    var xmlHttp;
    if(window.ActiveXObject)
    {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            return xmlHttp;
        }
        catch(e) {
            xmlHttp = false;
        }
        
    }
    else
    {
        try {
            xmlHttp = new XMLHttpRequest();
            return xmlHttp;
        }
        catch(e) {
            xmlHttp = false;
        }
    }
    
    if(!xmlHttp)
    {
        alert("Can't create xmlHttp object");
    }
}

function requestExpiryValidationMessage()
{
    var xmlHttp = createXmlHttpRequestObject();
    xmlHttp.onreadystatechange = function() {
        if(this.readyState==4 && this.status==200)
        {
            handleServerResponse(this);
        }
        else
        {
            document.getElementById("creditcardmessage").innerHTML = "Loading..";
        }
    }
    var expiryMonth;
    var expiryYear;
    
    expiryMonth = document.getElementById("expiryMonth").value;
    expiryYear = document.getElementById("expiryYear").value;
    xmlHttp.open("GET","phpscripts/expiry-validation-message.php?expiryMonth="+expiryMonth+"&"+"expiryYear="+expiryYear,true);
    xmlHttp.send(null);
    
}


function handleServerResponse(xmlHttp)
{
    if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
            var xmlResponse;
            var xmlDocumentElement;
            var message;
            console.log(xmlHttp);

            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            message = xmlDocumentElement.firstChild.data;
            
            document.getElementById("creditcardmessage").innerHTML = message;
        }
    }
}


