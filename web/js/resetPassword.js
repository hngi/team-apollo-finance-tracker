// Fetch API POST and GET request endpoint
const theForgUrl = "./backend/reset-password.php";
/* request function */
const loaderHTML ="<img class='spin-this' style='max-width:30px;' src='./images/loader.png'/>";

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


function resetPassword(){
let email = document.querySelector("input[name='email']").value;
let display = document.querySelector("span[class='display']");
let button = document.querySelector("button[name='login']");
let password = document.querySelector("input[name='password']").value;

button.innerHTML= loaderHTML;
let doAdd = sendRequest(theForgUrl,{email:email,password:password,submit:1});
doAdd.then(function(data){
  if (data.error == 1) {
//redirect to dashboard

//dislay error message
display.innerHTML= `<span style='color:red'>${data.errorMessage}</span>`;



  }else{

display.innerHTML= `<span style='color:green'>${data.successMessage}</span>`;

 setTimeout(function(){
   window.location.assign("./index.html");

},1000);
  }



 

});
return false;
}
