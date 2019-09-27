const summaryTab = document.querySelector(".tab.is-summary");
const historyTab = document.querySelector(".tab.is-history");

const summaryContent = document.querySelector(".details.is-summary");
const historyContent = document.querySelector(".details.is-history");
appState = {url:"./backend/",
loaderHTML :"<img class='spin-this' style='max-width:30px;' src='./images/loader.png'/>"
,screen:"summary"
};


//default funtion onload
populateSummaryScreen();
let time=document.querySelector('select[name="period"]');
time.onchange= function(){
	if (appState.screen == "summary") {
		populateSummaryScreen();
	}else{
		populateHistoryScreen();
	}
}

summaryTab.onclick = ()=> {
	if (summaryTab.classList.contains("is-current")) return;

	historyTab.classList.remove("is-current");
	summaryTab.classList.add("is-current");

	//Switch main content.
	historyContent.classList.add("is-hidden");
	summaryContent.classList.remove("is-hidden");
	appState.screen = "summary";
populateSummaryScreen();
  
}

historyTab.onclick = ()=> {
	if (historyTab.classList.contains("is-current")) return;

	historyTab.classList.add("is-current");
	summaryTab.classList.remove("is-current");

	//Switch main content.
	summaryContent.classList.add("is-hidden");
	historyContent.classList.remove("is-hidden");
   	appState.screen = "history";
    populateHistoryScreen();

}

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


function populateSummaryScreen() {
let spendingLimit = document.querySelector("span[data-limit]");
let totalExpenditure = document.querySelector("span[data-total]");
let deficit = document.querySelector("span[data-deficit]");
let time=document.querySelector('select[name="period"]').value;

totalExpenditure.innerHTML = appState.loaderHTML;
spendingLimit.innerHTML = appState.loaderHTML;
deficit.innerHTML = appState.loaderHTML;

reqTotalExpenditure = sendRequest(appState.url+"route.php/dashboard/totalExpenses",{});

reqTotalExpenditure.then(function(data){
    totalExpenditure.innerHTML= "&#8358;"+data[time];
    spendingLimit.innerHTML= "&#8358;"+data["limit"];
    deficit.innerHTML=data[time]-data["limit"];
});

}

function populateHistoryScreen(){
let displayList = document.querySelector("ul[class='history-list']");
let time=document.querySelector('select[name="period"]').value;

	
reqHistory = sendRequest(appState.url+"route.php/dashboard/getExpensesHistory",{sort:time});

reqHistory.then(function(data){
	if(data.error == 1){
		displayList.innerHTML = `<span>${data.errorMessage}</span>`;
	}else{
       let theList="";
       data.histories.forEach((eachList)=>{

    theList += `<li class="history-item is-service">
						<i class="history-item__icon fas fa-hammer"></i>
						<span class="history-item__name">
							${eachList.item}
							<small class="history-item__date">
								${eachList.time}
							</small>
						</span>
						<span class="history-item__cost">&#8358;${eachList.cost}</span>
					</li>`
       });

    
		displayList.innerHTML = theList;

	}
});
}