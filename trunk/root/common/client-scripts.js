function scrollTo(elementID) {
	document.getElementById(elementID).scrollIntoView();
}

function setUpScrollNav() {
	var scrollNav = document.createElement("ul");
	scrollNav.setAttribute("id", "scrollnav");
	
	var children = document.body.children;
	var numSections = 0;
	
	for (var i = 0; i < children.length; i++) {
		section = children[i];
	
		if (section.tagName == "DIV" && section.id != "") {
			var li = document.createElement("li");
			var link = document.createElement("a");
			link.setAttribute("onclick", "scrollTo('" + section.id + "');");
			
			li.appendChild(link);
			scrollNav.appendChild(li);
			
			numSections++;
		}
	}
	
	if (numSections > 1) {
		document.body.appendChild(scrollNav);
	}
}