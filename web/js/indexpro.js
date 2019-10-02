// Fetch API POST and GET request endpoint
const theloginUrl = "./backend/route.php/login";


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


function loginNow(){
let password = document.querySelector("input[name='password']").value;
let email = document.querySelector("input[name='email']").value;
let submitBtn = document.querySelector("input[type='submit']");
let display = document.querySelector("span[class='display']");

let doLogin = sendRequest(theloginUrl,{password:password,email:email});
doLogin.then(function(data){
  if (data.error == 0) {
//redirect to dashboard
   window.location.assign("./dashboard.html")

  }else{
//dislay error message
display.innerHTML= `<span style='color:red'>${data.errorMessage}</span>`;


  }

})
return false;
}
