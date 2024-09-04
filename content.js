let cart = JSON.parse(localStorage.getItem('cart')) || {};
let t = 0;

function cartshow() {
    const cartArea = document.getElementById("cart_area");
    if (cartArea.style.display === "none" || cartArea.style.display === "") {
        cartArea.style.display = "block";
    } else {
        cartArea.style.display = "none";
    }
    updateCart();
}

function addToCart(id, name, price, image) {
    if (!cart[id]) {
        cart[id] = { id, name, price, image, quantity: 1 };
    } else {
        cart[id].quantity += 1;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
    storeCartIds();  // Store the cart IDs whenever an item is added
}

function updateCart() {
    const cartItems = document.getElementById("cart_items");
    cartItems.innerHTML = "";
    let total = 0;
    for (const id in cart) {
        const item = cart[id];
        total += item.price * item.quantity;
        const cartItem = document.createElement("div");
        cartItem.className = "item";
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <span>${item.name}</span>
            <span>₹${item.price}</span>
            <div class="quantity">
                <span class="minus" onclick="changeQuantity(${item.id}, -1)">-</span>
                <span>${item.quantity}</span>
                <span class="plus" onclick="changeQuantity(${item.id}, 1)">+</span>
            </div>
        `;
        cartItems.appendChild(cartItem);           
    }
    t = total; // Update the global variable 't' with the total value
    document.getElementById("cart_total").innerText = `Total: ₹${total}`;
    localStorage.setItem('total', JSON.stringify(total));
    
    let buy = document.getElementById('buynow');
    if(total > 0){
        buy.style.display = 'block';
    } else {
        buy.style.display = 'none';
    }
}

function changeQuantity(id, delta) {
    if (cart[id]) {
        cart[id].quantity += delta;
        if (cart[id].quantity <= 0) {
            delete cart[id];
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
        storeCartIds();  
    }
}


function storeCartIds() {
    const cartIds = Object.keys(cart);
    localStorage.setItem('cartIds', JSON.stringify(cartIds));
}


document.addEventListener('DOMContentLoaded', function() {
    updateCart();
    const total = getTotal(); 
    document.getElementById("payment").textContent = 'Rs: ' + String(total);
});


function getTotal() {
    return JSON.parse(localStorage.getItem('total')) || 0;
}

window.onload = updateCart;
