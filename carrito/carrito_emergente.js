const cartIcon = document.querySelector('.fa-shopping-cart');
const wholeCartWindow = document.querySelector('.whole-cart-window');
wholeCartWindow.inWindow = 0;

cartIcon.addEventListener('mouseover', () => {
    if (wholeCartWindow.classList.contains('hide'))
        wholeCartWindow.classList.remove('hide');
});

cartIcon.addEventListener('mouseleave', () => {
    setTimeout(() => {
        if (wholeCartWindow.inWindow === 0) {
            wholeCartWindow.classList.add('hide');
        }
    }, 500);

});

wholeCartWindow.addEventListener('mouseover', () => {
    wholeCartWindow.inWindow = 1;
});

wholeCartWindow.addEventListener('mouseleave', () => {
    wholeCartWindow.inWindow = 0;
    wholeCartWindow.classList.add('hide');
});
