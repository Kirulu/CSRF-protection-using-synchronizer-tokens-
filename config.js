

var csrf_token;

function retrive(method,url,htmlTag)
{
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() 
    {
        if(this.readyState==4 && this.status==200)
        {
            console.log("CSRF token fetching succuessfull : "+this.responseText);
            document.getElementById(htmlTag).value = this.responseText;
              
        }
    };

    request.open(method,url,true);
    request.send();
}

