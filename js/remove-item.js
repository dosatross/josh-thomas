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

function removeSeasonFromCart(season)
{
    
    var xmlHttp = createXmlHttpRequestObject();
    xmlHttp.onreadystatechange = function() {
        if(this.readyState==4)
        {
            if(this.status==200)
            {
                handleServerResponse(this,season);
            }
        }
    }
    xmlHttp.open("GET","phpscripts/remove-item.php?season=s"+season,true);
    xmlHttp.send(null);
    
    
    
    
}

function handleServerResponse(xmlHttp,season)
{
    if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
            var xmlResponse;
            var xmlDocumentElement;
            var message;
            
            var season;
            
            season = "s" + season + "qty-cart";
        
            xmlResponse = xmlHttp.responseXML;
            
            xmlDocumentElement = xmlResponse.documentElement;
            message = xmlDocumentElement.firstChild.data;

            document.getElementById(season).value = parseInt(message);
        }  
    }
}