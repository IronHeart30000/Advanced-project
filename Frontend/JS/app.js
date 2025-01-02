/* -------------------------------------------------------------------------- */
/*                           Scroll Smooth behavior                           */
/* -------------------------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", function () {
    // Select all links with hashes
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});


let products = null;

$.ajax({
    type: "POST",
    url: "./products-control.php",
    data: "", 
    success: function(res) {
        products = JSON.parse(res);
        addDataToHTML();
    }
});


function addDataToHTML() {
    let listProductHTML = document.querySelector('.cards');
    // let listProductHTML_2 = document.querySelector('.cards_2');
    listProductHTML.innerHTML = '';
    // listProductHTML_2.innerHTML = '';

    if (products != null ) {
        products.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('card');
            newProduct.innerHTML = 
            `    <!-- first_section_image_type -->
            <section class="first_section">
                <a class="Product-image">
                    <img src="assets/${product.image}" alt="product" id="Imagee" onclick="showProductDetails(${product.id})">
                </a>
                <span>${product.title}</span>
            </section>
<!-- Stars_section -->
            <div class="starts">
                <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/star.svg" alt="star">
                <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/star.svg" alt="star">
                <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/star.svg" alt="star">
                <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/star.svg" alt="star">
                <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/star-space.svg" alt="star">
            </div>
            

<!-- Price -->
            <div class="Price_block">
                <span class="price">${product.price}$</span> 
            </div>

            <span>Sold: 50/50</span> <br>
<!-- Button -->
            <div class="div_btn">
                <button onclick="addCart(${product.id})"> 
                    <img src="https://abdelrahmanahmed20021.github.io/GROCY/images/icons/shopping-cart.svg" alt="icon">
                    Add to cart
                </button>
            </div>`;
                        listProductHTML.appendChild(newProduct);
        });
    }
}


let listCart =[];
/* -------------------------------------------------------------------------- */
/*                             and get cookie data                            */
/* -------------------------------------------------------------------------- */
function checkCart() {
    var cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}
checkCart();

function addCart($idProduct) {
    let productCopy;

    // Check if the product belongs to the first category
    if (products.some(product => product.id == $idProduct)) {
        productCopy = JSON.parse(JSON.stringify(products));
    } 
    // Check if the product belongs to the second category
    else if (products_2.some(product => product.id == $idProduct)) {
        productCopy = JSON.parse(JSON.stringify(products_2));
    } else {
        console.error("Product not found");
        return;
    }

    if (!listCart[$idProduct]) {
        let dataProduct = productCopy.filter(
            product => product.id == $idProduct
        )[0];
        listCart[$idProduct] = dataProduct;
        listCart[$idProduct].quantity = 1;
    } else {
        listCart[$idProduct].quantity++;
    }

    // Cookies
    let timeSave = "expires=Sun, 26 Nov 2025 20:33:00 UTC";
    document.cookie = "listCart=" + JSON.stringify(listCart) + "; " + timeSave + "; path=/;";
    addCartToHTML();
}


addCartToHTML();
function addCartToHTML() {
    let listCartHTML = document.querySelector('#cart-items');
    listCartHTML.innerHTML = '';

    let totalHTML = document.querySelector('#counter');
    let totalQuantity = 0;

    let totalPriceHTML = document.getElementById('total');
    totalPrice = 0;


    if (listCart) {
        listCart.forEach(product => {
            if (product) {
                let newCart = document.createElement('a');
                newCart.classList.add('item');
                newCart.innerHTML = `    
                
                    <img src="assets/${product.image}"></img>
                    <div class="pro-info">
                        <h6>${product.title}</h6>
                        <div class="price">
                            <strong>${product.price}</strong>
                            <span>
                                <del>10.00$</del>
                            </span> 
                        </div>
                    </div>
                    <div id="quantity">
                        <button onclick="changeQuantity(${product.id}, '-')" id="minus">-</button>
                        <span id="num">${product.quantity}</span>
                        <button onclick="changeQuantity(${product.id}, '+')" id="plus">+</button>
                    </div>`;
                listCartHTML.appendChild(newCart);
                totalQuantity = totalQuantity + product.quantity;
                totalPrice = totalPrice + (product.price * product.quantity);
            }
        });
        totalHTML.innerHTML = totalQuantity;
        totalPriceHTML.innerHTML =  " price: " + totalPrice + "$";
        
    }
}




function changeQuantity ($idProduct, $type){
    switch ($type) {
        case '-':
            listCart[$idProduct].quantity--;
            if (listCart[$idProduct].quantity <= 0) {
                delete listCart[$idProduct];
            }
            break;
        case '+':
            listCart[$idProduct].quantity++;
            break;
        default:
            break;
    }
    // save new data to cookie
    let timeSave = "expires=Sun, 26 Nov 2025 20:33:00 UTC"
    document.cookie = "listCart="+JSON.stringify(listCart)+"; "+timeSave+"; path=/;";

    addCartToHTML();
    // updateBuyButtonVisibility();
}
