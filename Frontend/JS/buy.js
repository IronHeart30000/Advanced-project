let listCart = [];

function checkCart() {
    var cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('listCart='));
    if(cookieValue){
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}

checkCart();
addCartToHTML();
function addCartToHTML() {
    let listCartHTML = document.querySelector('.sec_2')
    // let form = document.querySelector('.form_Container');
    // form.innerHTML = "";
    listCartHTML.innerHTML = '';
    let totalQuantityHTML = document.getElementById('total-Quant')
    let totalPriceHTML = document.getElementById('total_price');

    let totalQuantity = 0;
    let totalPrice = 0;
    if(listCart){
        listCart.forEach(product => {
            if (product){
                let newP = document.createElement('div'); // <-------->
                newP.classList.add('product');
                newP.innerHTML = `            
                <img src="${product.image}" alt="product">  
                <div class="title">${product.title}</div>
                <div class="quantity">${product.quantity}</div>
                <div class="price">${product.price}</div>`;
        listCartHTML.appendChild(newP);
        totalQuantity = totalQuantity + product.quantity;
        totalPrice = totalPrice + (product.price * product.quantity);
// form.appendChild(newP);
            }
        })
    }
    totalQuantityHTML.innerHTML = totalQuantity;
    totalPriceHTML.innerHTML = totalPrice + '$' ;
}

function delElement($idProduct) {
    // Find the index of the product with the matching API ID
    listCart.forEach(product => {

        if (product.id === $idProduct) {
            document.querySelector('.product').innerHTML = '';
        }
    })
}
