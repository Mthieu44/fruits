function opendiv(id) {
	let element = document.getElementById(id)
	element.style.display = "block"
	element.style.overflow = "scroll"
	for (let child of element.children) {
		child.style.display = "block"
		for (let child2 of child.children) {
			child2.style.display = "block"
		}
	}
}

function closediv(id) {
	let element = document.getElementById(id)
	element.style.display = "none"
	for (let child of element.children) {
		child.style.display = "none"
		for (let child2 of child.children) {
			child2.style.display = "none"
		}
	}
}
