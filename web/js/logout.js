// Fetch API POST and GET request endpoint
const theLogOutUrl = "./backend/logout.php";
/* request function */

async function sendRequest(url,data){

function formEncode(obj) {
var str = [];
for(var p in obj)
str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
return str.join("&");
}

var dat = await fetch(url, {
method: 'POST',
headers: { "Content-type": "application/x-www-form-urlencoded"},
 credentials: "include",
body: formEncode(data)
}).then(res => res.json())
.then(response => JSON.stringify(response))
.catch(error => console.error('Error: '+error));

return JSON.parse(dat);

}


function logOut(){

let doLogOUt = sendRequest(theLogOutUrl,{});
doLogOUt.then(function(data){
  
alert(data.successMessage);
   window.location.assign("./index.html");
  

})
return false;
}
