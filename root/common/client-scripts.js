var currentlyActiveScrollLink = null;

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
			var link = createScrollNavLink(section.id);
			scrollNav.appendChild(link);
			
			section.addEventListener("mouseover", function() { setActiveScrollLink(this.id); });
			
			numSections++;
		}
	}
	
	if (numSections > 1) {
		document.body.appendChild(scrollNav);
	}
}

function createScrollNavLink(targetID) {
	var li = document.createElement("li");
	var link = document.createElement("a");
	link.addEventListener("click", function() { scrollTo(targetID); setActiveScrollLink(targetID); });
	link.id = getLinkID(targetID);
	
	li.appendChild(link);
	
	return li;
}

function setActiveScrollLink(sectionID) {
	if (currentlyActiveScrollLink !== null) {
		currentlyActiveScrollLink.className = "";
	}
	
	var linkID = getLinkID(sectionID);
	currentlyActiveScrollLink = document.getElementById(linkID);
	currentlyActiveScrollLink.className = "active";
}

function getLinkID(sectionID) {
	return sectionID + "_link";
}