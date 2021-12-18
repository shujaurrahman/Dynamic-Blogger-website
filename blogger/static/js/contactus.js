let contactusName = document.getElementById("contactusName");
let contactusEmail = document.getElementById("contactusEmail");
let contactusMssg = document.getElementById("contactusMssg");
let contactusBtn = document.getElementById("contactusBtn");

let contactusNameError = true;
let contactusEmailError = true;
let contactusMssgError = true;

let contactRegex = /^\s+$/

contactusName.addEventListener("blur",()=>{
  let contactData = contactusName.value;
  let regexCheck = contactData.match(contactRegex)
  
  if(regexCheck || contactData==""){
    contactusName.style.background="red";
    contactusBtn.style.background="grey";
    contactusBtn.disabled = "true";

    contactusNameError=true;
  }
  else{
    contactusNameError=false;
    contactusName.style.removeProperty("background")
  }

  if(!contactusNameError&& !contactusEmailError  && !contactusMssgError){
    contactusBtn.disabled = false;
    contactusBtn.style.removeProperty("background")
}
})

contactusEmail.addEventListener("blur",()=>{
  let contactData = contactusEmail.value;
  let regexCheck = contactData.match(contactRegex)
  
  if(regexCheck || contactData==""){
    contactusEmail.style.background="red";
    contactusBtn.style.background="grey";
    contactusBtn.disabled = "true";

    contactusEmailError = true;
  }
  else{
    contactusEmailError = false;
    contactusEmail.style.removeProperty("background")
  }


  if(!contactusNameError && !contactusEmailError  && !contactusMssgError){
    contactusBtn.disabled = false;
    contactusBtn.style.removeProperty("background")
}
})

contactusMssg.addEventListener("blur",()=>{
  let contactData = contactusMssg.value;
  //let regexCheck = contactRegex.test(contactData)
  let regexCheck = contactData.match(contactRegex)
  //console.log(regexCheck);  
  
  if(regexCheck || contactData==""){
    contactusMssg.style.background="red";
    contactusBtn.style.background="grey";
    contactusBtn.disabled = "true";

    contactusMssgError = true;
  }
  else{
    contactusMssgError = false;
    contactusMssg.style.removeProperty("background")

  }

  if(!contactusNameError && !contactusEmailError  && !contactusMssgError){
    contactusBtn.disabled = false;
    contactusBtn.style.removeProperty("background")
  }

})

