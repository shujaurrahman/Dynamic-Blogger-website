let Count =0;
let blogTitle = document.getElementById("blogTitle");
if(Count==0){
    blogTitle.addEventListener("click",()=>{
        console.log(`hey`);
        
        Count = 1;
        blogTitle.classList.remove("error");
        let label = blogTitle.nextElementSibling;
        label.innerHTML = "Blog Title";
    })
}


function blogDelFunc(user,blogSno){    
    
    let confirmation = confirm("Do you Really Want to Delete this Blog? ");
    //console.log(confirmation);

    if(confirmation){
        window.location = `?delBlog=${blogSno}&username=${user}`;
    }
    

    
    
}

function blogEditFunc(user,blogSno,blogTitle,blogSubtitle,blogContent){
    // console.log(blogTitle);
    // console.log(blogSubtitle);
    // console.log(blogContent);
    let myHtml = document.querySelector("html");
    let modal = document.getElementById("modal");

    modal.style.setProperty("--modalDisplay","block");
    myHtml.style.setProperty("--modalbackDisplay","block");


    let modalTitleName = document.getElementById("modalTitleName");
    let modalSubtitle = document.getElementById("modalSubtitle");
    let modalContent = document.getElementById("modalContent");
    let edit = document.getElementById("edit");
    let modalUser = document.getElementById("modalUser");


    modalTitleName.value = blogTitle;
    modalSubtitle.value = blogSubtitle;
    modalContent.value = blogContent;
    edit.innerHTML = blogSno;
    modalUser.innerHTML = `${user}`;


    
}


function modalCancelFunc(){
    let myHtml = document.querySelector("html");
    let modal = document.getElementById("modal");

    modal.style.setProperty("--modalDisplay","none");
    myHtml.style.setProperty("--modalbackDisplay","none");
}

function modalEditFunc(thiss){

    let modalTitleName = document.getElementById("modalTitleName").value;
    let modalSubtitle = document.getElementById("modalSubtitle").value;
    let modalContent = document.getElementById("modalContent").value;
    let blogSno = document.getElementById("edit").innerHTML;
    let modalUser = document.getElementById("modalUser").innerHTML;
    
    console.log(modalUser);
    



    let confirmation = confirm("Do you Really Want to Edit this Blog? ");

    if(confirmation){
        window.location = `?editBlog=${blogSno}&username=${modalUser}&title=${modalTitleName}&subtitle=${modalSubtitle}&content=${modalContent}`;
    }
    
    
}

