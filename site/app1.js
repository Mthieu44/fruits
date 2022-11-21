let btn1 = document.getElementById("btn1");
let btnIcon1 = document.getElementById("btn-icon1");
let details1 = document.getElementById("details1");

const toggleDetails = () => {
  if (btnIcon1.name === "add-outline") {
    btnIcon1.name = "add";
    details1.style.height = "max-content";
  } else {
    btnIcon1.name = "add-outline";
    details1.style.height = 0;
  }
};

btn1.addEventListener("click", toggleDetails);



