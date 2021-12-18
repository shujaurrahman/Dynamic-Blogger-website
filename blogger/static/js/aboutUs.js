const readMoreBtn = document.querySelector('.read-more-btn');
const text = document.querySelector('.text');

//read more btn//
readMoreBtn.addEventListener('click',()=>{
text.classList.toggle('show-more');
if (readMoreBtn.innerHTML=='Read more'){
readMoreBtn.innerHTML='Read less';
}
else{
readMoreBtn.innerHTML='Read more';
}
})