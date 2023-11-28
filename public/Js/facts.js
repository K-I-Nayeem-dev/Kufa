let fonts = document.querySelector('input[name="icon"]');
let icons = document.querySelectorAll('.icons p');
let icon_i = document.querySelectorAll('.icons p i');
let set_icons = document.querySelector('.set_icon i');


for (let i = 0; i < icons.length; i++) {
    document.querySelectorAll('.icons p')[i].addEventListener('click',()=>{
        fonts.innerHTML = icon_i[i].getAttribute('class');
        set_icons.setAttribute('class', icon_i[i].getAttribute('class'));
        fonts.setAttribute('value', icon_i[i].getAttribute('class'));
    })
}