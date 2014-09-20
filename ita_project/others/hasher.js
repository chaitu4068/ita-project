function hashPassword()
{

var passwd = document.getElementById("passwd").value; 
var username = document.getElementById("username").value; 

if(length(username)!=0)
{ 
 var hash = CryptoJS.SHA3(passwd,{outputLength: 256});
 document.getElementById("password").value = hash;
}

else
{
 alert("Fill the username field also");
 document.getElementById("password").value = ""; 
}

}