const summaryTab = document.querySelector(".tab.is-summary");
const historyTab = document.querySelector(".tab.is-history");

const summaryContent = document.querySelector(".details.is-summary");
const historyContent = document.querySelector(".details.is-history");

summaryTab.onclick = ()=> {
	if (summaryTab.classList.contains("is-current")) return;

	historyTab.classList.remove("is-current");
	summaryTab.classList.add("is-current");

	//Switch main content.
	historyContent.classList.add("is-hidden");
	summaryContent.classList.remove("is-hidden");
}

historyTab.onclick = ()=> {
	if (historyTab.classList.contains("is-current")) return;

	historyTab.classList.add("is-current");
	summaryTab.classList.remove("is-current");

	//Switch main content.
	summaryContent.classList.add("is-hidden");
	historyContent.classList.remove("is-hidden");
}