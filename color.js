const Redbtn = document.getElementById('Red');
const Orange = document.getElementById('orange');
const Green = document.getElementById('Green');
const Yellow = document.getElementById('Yellow');
const Body = document.body;
const des = document.getElementById('inp');
const submit = document.getElementById('submit');


let res ;
let fd = 0;

submit.addEventListener('click', ()=>{
    console.log(des.value);
    Body.style.backgroundColor = des.value;

})

const prev = ()=>{
    if(res === 'Red')
    Redbtn.textContent = 'Red';
    else if(res === 'Orange')
    Orange.textContent = 'Orange';
    else if(res === 'Green')
    Green.textContent = 'Green';
    else if(res === 'Yellow')
    Yellow.textContent = 'Yellow';


}

Redbtn.addEventListener('click', ()=>{
    Body.style.backgroundColor = 'red';
    Redbtn.textContent = 'Set';
    if(fd !=0)
    prev();
    res = 'Red';
    fd++;
})

Orange.addEventListener('click', function(){
    Body.style.backgroundColor = 'orange';
    Orange.textContent = 'Set';
    if(fd !=0)
    prev();
    res='Orange'
    fd++;
})
Green.addEventListener('click', function(){
    Body.style.backgroundColor = 'green';
    Green.textContent = 'Set';
    if(fd!=0)
    prev();
    res = 'Green';
    fd++;
})
Yellow.addEventListener('click', function(){
    Body.style.backgroundColor = ' yellow';
    Yellow.textContent = 'Set';
    if(fd!=0)
    prev();
    res = 'Yellow';
    fd++;

})

