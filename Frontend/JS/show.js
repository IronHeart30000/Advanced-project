
/* -------------------------------------------------------------------------- */
/*                        Apearance of shopping window                        */
/* -------------------------------------------------------------------------- */
const Icon = document.getElementById('CartIcon');
const cart_box = document.getElementById('cart-modal')
const close = document.getElementById('close-btn')
Icon.addEventListener('click', () => {
    if (cart_box.style.left == '-100%'){
        cart_box.style.left = '0';
    }
    else {
        cart_box.style.left = '-100%';
    }
});

close.addEventListener('click', () => {
    cart_box.style.left = '-100%';
})



