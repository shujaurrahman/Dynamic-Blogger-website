
let fullName = document.getElementById("fullName");
let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");

fullName.addEventListener("blur",(e)=>{
 let fullNameData = fullName.value;
 let regex = /[A-Z]\w+/;

 console.log(regex.test(fullNameData));
 
 let mssg = fullName.nextElementSibling;

  if(fullNameData == ""){
    mssg.innerHTML = "Fullname Cannot be Empty";
    fullName.classList.add("error");
    mssg.style.display = "block";
  }
  else if(!regex.test(fullNameData)){
    mssg.innerHTML = "First letter Should be Capital";
    fullName.classList.add("error");
    mssg.style.display = "block";
  }
  else{
    fullName.classList.remove("error");
    mssg.style.display = "none";
  }

  
})

username.addEventListener("blur",()=>{
  let usernameData = username.value;
  let mssg = username.nextElementSibling;
  let regex = /\w{4,}/;
  if(usernameData == ""){
    mssg.innerHTML = "username field cannot be empty";
    username.classList.add("error");
    mssg.style.display = "block";
  }
  else if(!regex.test(usernameData)){
    mssg.innerHTML = "username cannot be less than 4";
    username.classList.add("error");
    mssg.style.display = "block";
  }
  else{
    username.classList.remove("error");
    mssg.style.display = "none";
 }

})


email.addEventListener("blur",()=>{  
  let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let emailData = email.value;
  let mssg = email.nextElementSibling;

  if(emailData == ""){
    mssg.innerHTML= "email field cannot be empty";
    email.classList.add("error");
    mssg.style.display = "block";
    
  }
  else if(!regex.test(emailData)){
    mssg.innerHTML = "Please Enter a valid Email address";
    email.classList.add("error");
    mssg.style.display = "block";
  }
  else{
    email.classList.remove("error")
    mssg.style.display = "none";
  }
})

password.addEventListener("blur",()=>{
  let PasswordData = password.value;
  let mssg = password.nextElementSibling;
  let regex = /\w{6,}/;

  if(PasswordData == ""){
    mssg.innerHTML = "Password Cannot be empty";
    password.classList.add("error");
    mssg.style.display = "block";
  }
  else if(!regex.test(PasswordData)){
    mssg.innerHTML = "Password too weak";
    password.classList.add("error");
    mssg.style.display = "block";
  }
  else{
    password.classList.remove("error");
    mssg.style.display = "none";

  }

})

confirmPassword.addEventListener("blur",()=>{
  let PasswordData = confirmPassword.value;
  let mssg = confirmPassword.nextElementSibling;

  if(PasswordData != password.value){
    mssg.innerHTML = "Password doesnt Match";
    confirmPassword.classList.add("error");
    mssg.style.display = "block";
  }
  else{
    confirmPassword.classList.remove("error");
    mssg.style.display = "none";

  }
})


