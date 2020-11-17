jQuery(document).ready(($) => {
    $('.socials br').remove();
})

const button = document.createElement('button');
button.innerHTML = 'ещё';
button.style.cursor = 'pointer';
const footer = document.querySelector('.footer-policy ');
if (footer) {
    const p = footer.querySelector('p');
    p.appendChild(button);
    button.addEventListener('click', () => {
        const text = footer.querySelectorAll('p');
        text[1].style.display = 'grid';
        text[2].style.display = 'grid';
        button.style.opacity = '0';
    
    });
}
