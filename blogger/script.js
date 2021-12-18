let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});


// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}


readMore = (data)=>{
  let mainData = data.parentNode.parentNode;

  let description = mainData.children[2];
  let postData = description.parentNode;
  let card = postData.parentNode;
  let imageData = card.firstElementChild;
  let backgroundImage = imageData.firstElementChild;

  let readMore = description.children[1];
  
  description.classList.toggle('show-more');
  if (data.innerHTML=='Read more') {

    backgroundImage.style.position = "relative";
    backgroundImage.style.height = "250px";
    card.style.flexDirection = "column";
    postData.style.setProperty("--con","none");
    
    data.innerHTML='Read less';
  }
  else{
    data.innerHTML='Read more';
    
    backgroundImage.style.removeProperty("position");
    backgroundImage.style.removeProperty("height");
    card.style.removeProperty("flex-direction");
    postData.style.setProperty("--con","''");

  }
}


let allMoreText = document.querySelectorAll(".more-text");

let regex = /^\s+$/g;

for(i = 0 ; i<allMoreText.length ; i++){

  let description = allMoreText[i].parentNode;  
  let dots = description.firstElementChild;
  
  
  let postData = description.parentNode;
  let readMoreBtn = postData.children[3].firstElementChild;


  
  if ((allMoreText[i].innerHTML.length == 0) || (regex.test(allMoreText[i].innerHTML))) {
    dots.style.display="none";
    readMoreBtn.style.display = "none";

  }

  
}

