const modalOut = document.querySelector('#cerrar');
const modalDiv = document.querySelector('#modal');
const admin = document.querySelector('#admin');

modalOut.addEventListener('click',()=>{
modalDiv.style.display = 'none';
});
admin.addEventListener('click',()=>{
modalDiv.style.display = 'flex';
});


