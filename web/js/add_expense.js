// Fetch API POST and GET request endpoint
const theAddUrl = "./backend/route.php/dashboard/addExpense";
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


function addExpense(){
let item = document.querySelector("input[name='item']").value;
let cost = document.querySelector("input[name='cost']").value;
let details = document.querySelector("input[name='details']").value;
let display = document.querySelector("span[class='display']");
let button = document.querySelector("button[class='button']");

button.innerHTML= loaderHTML;
let doAdd = sendRequest(theAddUrl,{details:details,cost:cost,item:item});
doAdd.then(function(data){
  if (data.error == 1) {
//redirect to dashboard

//dislay error message
display.innerHTML= `<span style='color:red'>${data.errorMessage}</span>`;



  }else{

display.innerHTML= `<span style='color:green'>${data.successMessage}</span>`;


  }

  button.innerHTML="+ Add";

})
return false;
}
