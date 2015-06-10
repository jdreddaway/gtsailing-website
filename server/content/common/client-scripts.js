var currentlyActiveScrollLink = undefined;

$.ajaxSetup({
	accepts: "application/json",
});

function scrollTo(elementID) {
	var element = document.getElementById(elementID);
	$.scrollTo(element, 1000);
}

function setUpScrollNav() {
	sections = findSections()
	
	if (sections.length > 1) {
		var scrollNav = document.createElement("ul");
		scrollNav.setAttribute("id", "scrollnav");
		
		for (var i = 0; i < sections.length; i++) {
			sections[i].addEventListener("mouseover", function() { setActiveScrollLink(this.id); });
			
			var link = createScrollNavLink(sections[i].id);
			scrollNav.appendChild(link);
		}
		
		document.body.appendChild(scrollNav);
		
		setActiveScrollLink(sections[0].id)
	}
}

function hasClass( elem, klass ) {
	return (" " + elem.className + " " ).indexOf( " "+klass+" " ) > -1;
}

function findSections() {
	var children = document.body.children;
	var sections = [];
	
	for (var i = 0; i < children.length; i++) {
		section = children[i];
	
		if (section.tagName == "DIV" && (hasClass(section, "fixed") || hasClass(section, "dynamic"))) {
			sections.push(section);
		}
	}
	
	return sections;
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
	if (currentlyActiveScrollLink !== undefined) {
		currentlyActiveScrollLink.className = "";
	}
	
	var linkID = getLinkID(sectionID);
	currentlyActiveScrollLink = document.getElementById(linkID);
	currentlyActiveScrollLink.className = "active";
}

function getLinkID(sectionID) {
	return sectionID + "_link";
}