let btn = document.getElementById("btn");
let btnIcon = document.getElementById("btn-icon");
let details = document.getElementById("details");

const toggleDetails = () => {
  if (btnIcon.name === "add-outline") {
    btnIcon.name = "add";
    details.style.height = "max-content";
  } else {
    btnIcon.name = "add-outline";
    details.style.height = 0;
  }
};

btn.addEventListener("click", toggleDetails);