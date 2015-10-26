var categories = document.getElementsByClassName('widget-title');
categories.addEventListener("mouseover", mousein, false);
function mouseIn() {
	categories.setAttribute("style", "font-size: 3em");
}