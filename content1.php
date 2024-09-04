<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="logo.png">
    
        <script>
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
    t = total; 
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
    }
}
window.onload = updateCart;
</script>
<style>
       * {
    margin: 0;
}
.type{
   padding: 10px;
   text-shadow:0px 2px 3px #5134ce;
   background-color: white;
}
body {
    background-color: rgb(211, 219, 236);
    font-family: 'Roboto', sans-serif;
}
.body1, .body2 {
    display: flex;
    justify-content: space-evenly;
    padding-bottom: 50px;
}
.heading {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 1px;
    text-shadow: 1.1px 1.1px 5px rgba(66, 3, 110, 0.6);
    font-size: 1rem;
    font-family: Arial, Helvetica, sans-serif;
    background-color: rgb(236, 220, 247);
}
.box {
    background-color: rgb(255, 255, 255);
    margin-top: 1rem;
    height: 450px;
    width: 350px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 3px solid #acbee1;
    border-radius: 10px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.2s ease;
}
.box:hover {
    box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.5);
    /* transform: scale(1.1);
    transition: 0.5ease; */
}
.cart {
    border: none;
    color: #0a0906;
    font-weight: bold;
    position: absolute;
    right: 0;
    display: grid;
}
.cart:hover {
    border: 1px solid black;
}
#cart {
    border: none;
}
.area {
    display:none;
    position: absolute;
    right: 0;
    margin: 1rem;
    /* background: linear-gradient(to bottom, rgb(202, 179, 245), rgb(116, 63, 221)); */
    background-color:rgb(241, 243, 247);
    width: 550px;
    height: 600px;
    color: rgb(15, 4, 1);
    border: 2px solid rgb(106, 130, 207);
    box-shadow: 3px 3px 3px rgb(106, 130, 207);
    text-align: center;
    font-style: oblique;
    z-index: 999;

    border-radius: 5px;
    overflow: auto;
    font-family: 'Roboto', sans-serif;
}
#cart_text {
    font-size: larger;
    text-align: center;
    font-weight: bold;
}
.cart_button {
    background-color: white;
    border: none;
    width: 50px;
    height: 30px;
}
.cart_button:hover{
    background-color: rgb(211, 219, 236);
    border: none;
}
.add-to-cart {
    border: none;
    width: 5rem;
    height: 2.5rem;
    font-size: small;
    color: white;
    background-color: rgb(35, 52, 146);
    box-shadow: 2px 3px 3px black;
    border-radius: 3px;
    font: bold;
    text-align: center;
    font-family:'Roboto', sans-serif;
}
.add-to-cart:hover {
    background-color: rgb(108, 108, 189);
}
.box {
    margin-top: 1rem;
    height: 450px;
    width: 350px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
h3 {
    margin-top: 0.1rem;
    color: rgb(1, 1, 39);
    text-shadow: 1px 1px 1px rgb(82, 113, 251);
}
.f {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.box_img {
    width: 300px;
    height: 300px;
    background-size: cover;
    background-position: center;
}
.cart .item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
.item img {
    width: 50px;
    height: 50px;
}
.quantity span {
    display: inline-block;
    width: 30px;
    height: 20px;
    background-color: white;
    border-radius: 50px;
    text-align: center;
    cursor: pointer;
}
.buy{
    display: none;
    background-color: #d08d07;
    color: white;
    border: 2px solid white;
    border-radius: 5px;
    padding:5px;
    position:relative;
    width:100%;
    height: 50px;
    bottom: 0;
    text-align: center;
}
.buy:hover{
    background-color: #2c1e01;
}
.close{
    position:absolute;
    right: 0;
    top: 0;
    padding: 5px;
    padding-left: 10px;
    padding-right: 10px;
    color: white;
    background-color: rgb(0, 0, 0);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    cursor: pointer;
}
.card{
    text-decoration: none;
    color: white;
}
    </style>
</head>
<body>
    <div class="heading"><h1>JoyBasket</h1></div>
    <div class="cart">
        <button type="button" class="cart_button" onclick="cartshow()"><i class="fa-solid fa-cart-shopping"></i></button>
        <div class="area" id="cart_area">
            <div id="cart_text">Cart</div>
            <div id="cart_items"></div>
            <div id="cart_total">Total: ₹0 </div><br>
            <div class="buy" id="buynow"><a href="card.php" class="card"><h2 >Buy Now</h2></a></div>
            <div class="close" onclick="cartshow()">x</div>
        </div>
    </div>
<h1 class="type" id="section1">Electronics</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('TV.png');"></div>
            <div class="f">
                <h3>LED TV ₹50,000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(1, 'Samsung LED TV', 50000, 'TV.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('iphone.png');"></div>
            <div class="f">
                <h3>Iphone 14 pro max ₹1,50,000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(2, 'Iphone 14 pro max', 150000, 'iphone.png')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('laptop.png');"></div>
            <div class="f">
                <h3>Laptop ₹75,000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(3, 'hp Laptop', 75000, 'laptop.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('camera.png');"></div>
            <div class="f">
                <h3>Camera ₹1,25,000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(4, 'Cannon Camera', 125000, 'camera.png')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section2">Beauty Products</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('b3.png');"></div>
            <div class="f">
                <h3>Foundation ₹499</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(5, 'Foundation', 499, 'b3.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('lipstick.png');"></div>
            <div class="f">
                <h3>Lipstick ₹250</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(6, 'Lipstick', 250, 'lipstick.png')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('blush.png');"></div>
            <div class="f">
                <h3>Blush ₹750</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(7, 'blush', 750, 'blush.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('b4.png');"></div>
            <div class="f">
                <h3>Eye Liner ₹349</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(8, 'Eye Liner', 349, 'b4.png')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section3">Toys</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('t1.jpg');"></div>
            <div class="f">
                <h3>Teddy Bear ₹500</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(9, 'Teddy Bear', 500, 't1.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('toy2.png');"></div>
            <div class="f">
                <h3>Transformers ₹1020</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(10, 'Transformers', 1020, 'toy2.png')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('barbie.png');"></div>
            <div class="f">
                <h3>Barbie Dall ₹399</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(11, 'Barbie Dall', 399, 'barbie.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('car.png');"></div>
            <div class="f">
                <h3>Car ₹559</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(12, 'Toy Car', 559, 'car.png')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section4">Health & Care</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('h3.png');"></div>
            <div class="f">
                <h3>Fresh Wash ₹599</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(13, 'Fresh Wash', 599, 'h3.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('h4.jpg');"></div>
            <div class="f">
                <h3>Hand wash ₹350</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(14, 'Hand Wash', 350, 'h2.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('h2.jpg');"></div>
            <div class="f">
                <h3>Tooth Brash&Paste ₹250</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(15, 'Tooth Brash&Paste', 250, 'h2.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('h1.jpg');"></div>
            <div class="f">
                <h3>Shoap$Shampoo ₹299</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(16, 'Shoap&Shampoo', 299, 'h1.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section5">Kitchen Appliances</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('k1.jpg');"></div>
            <div class="f">
                <h3>Non Stick Cookware ₹1799</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(17, 'Non Stick Cookware', 1799, 'k1.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('k2.jpg');"></div>
            <div class="f">
                <h3>Micro Oven ₹6,500</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(18, 'Micro Oven', 6500, 'k2.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('k3.jpg');"></div>
            <div class="f">
                <h3>Mixture Grinder ₹2,399</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(19, 'Mixture Grinder', 2399, 'k3.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('k4.jpg');"></div>
            <div class="f">
                <h3>Dinner Set ₹1250</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(20, 'Dinner Set', 1250, 'k4.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section6">Gaming Accessories</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('g2.jpg');"></div>
            <div class="f">
                <h3>Keyboard&Mouse ₹1560</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(21, 'Keyboard&Mouse', 1560, 'g2.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('g1.jpg');"></div>
            <div class="f">
                <h3>PS5 ₹49,000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(22, 'PS5', 49000, 'g1.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('g3.jpg');"></div>
            <div class="f">
                <h3>Gaming Gear ₹8000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(23, 'Gaming Gear', 8000, 'g3.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('g4.jpg');"></div>
            <div class="f">
                <h3>Controller ₹3000</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(24, 'Controller', 3000, 'g4.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section7">Home Decors&Lights</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('w1.jpg');"></div>
            <div class="f">
                <h3>Wall Hanging ₹699</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(25, 'Wall Hanging',699, 'w1.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('w2.jpg');"></div>
            <div class="f">
                <h3>Wall Clock ₹999</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(26, 'Wall Clock',999, 'w2.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('w3.jpg');"></div>
            <div class="f">
                <h3>Star Light ₹579</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(27, 'Star light',579, 'w3.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('w4.jpg');"></div>
            <div class="f">
                <h3>Photo Frame ₹799</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(28, 'Photo Frame',799, 'w4.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <h1 class="type" id="section8">Trendy Fashions</h1>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('d1.jpg');"></div>
            <div class="f">
                <h3>Jeans ₹1399</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(29, 'Jeans', 1399, 'd1.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('d2.jpg');"></div>
            <div class="f">
                <h3>Shirt ₹750</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(30, 'Shirt',750, 'd2.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('d3.png');"></div>
            <div class="f">
                <h3>Tshirt ₹499</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(31, 'Tshirt',499, 'd3.png')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('d8.jpg');"></div>
            <div class="f">
                <h3>Chinos ₹859</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(32, 'Chinos',859, 'd8.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>
    <div class="body1">
        <div class="box">
            <div class="box_img" style="background-image: url('d5.jpg');"></div>
            <div class="f">
                <h3>Saree ₹1999</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(33, 'Saree',1999, 'd5.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('d6.jpg');"></div>
            <div class="f">
                <h3>Western Top ₹850</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(34, 'Western Top',850, 'd6.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="box">
            <div class="box_img" style="background-image: url('d7.jpg');"></div>
            <div class="f">
                <h3>Western Dress ₹1299</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(35, 'Western Dress',1299, 'd7.jpg')">Add to cart</button></div>
            </div>
        </div>
        <div class="box">
            <div class="box_img" style="background-image: url('d4.jpg');"></div>
            <div class="f">
                <h3>Kurti ₹999</h3><br>
                <div class="add"><button type="button" class="add-to-cart" onclick="addToCart(36, 'Kurti',999, 'd4.jpg')">Add to cart</button></div>
            </div>
        </div>
    </div>

    <script src="content.js"></script>
</body>
</html>
