<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBasket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="joybasket.css">
    <style>
        .nav-address {
            height: 50px;
            text-decoration: none;
        }
        .search-icon {
            width: 45px;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            background-color: orange;
            border: none;
            color: #0f1111;
        }
    </style>
    <script>
        function searchContent() {
            var input = document.getElementById('searchInput').value.trim().toLowerCase();
            if (input === '') {
                alert('Please enter a search term.');
                return;
            }
            var url;
            switch (input) {
                case 'electronics':
                case 'laptop':
                case 'mobile':
                case 'camera':
                    url = 'content1.php#section1';
                    break;
                case 'beauty products':
                case 'makeup':
                case 'lipstick':
                case 'eye liner':
                    url = 'content1.php#section2';
                    break;
                case 'toys':
                case 'baby toys':
                case 'toy car':
                case 'soft toys':
                case 'doll':             
                    url = 'content1.php#section3';
                    break;
                case 'face wash':
                case 'shampoo':
                case 'soap':
                case 'soap and shampoo':
                case 'toothbrush':
                    url = 'content1.php#section4';
                    break;
                case 'kitchen appliances':
                case 'dinner set':
                case 'mixture grinder':
                case 'micro oven':
                case 'frying pan':
                case 'non stick cookware':
                    url = 'content1.php#section5';
                    break;
                case 'mouse':
                case 'keyboard':
                case 'ps5':
                case 'controller':
                case 'mouse and keyboard':
                    url = 'content1.php#section6';
                    break;
                case 'clock':
                case 'wall clock':
                case 'photo frame':
                case 'light':
                case 'wall hanging':
                case 'home and decor':
                    url = 'content1.php#section7';
                    break;
                case 'dress':
                case 'tshirt':
                case 'saree':
                case 'jeans':
                case 'shirt':
                case 'lahenga':
                case 'kurti':
                case 'dress for men':
                case 'dress for women':
                    url = 'content1.php#section8';
                    break;
                default:
                    alert('No matching category found.');
                    return;
            }
            window.open(url, '_blank');
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('searchInput').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    searchContent();
                }
            });

            document.getElementById('searchButton').addEventListener('click', function() {
                searchContent();
            });
        });
    </script>
</head>
<body>
   <header>
    <div class="navbar">
        <div class="nav-logo">
            <div class="logo">JoyBasket</div>
        </div>
        <div class="nav-address border">
            <a href="https://www.bing.com/maps?mepi=24~~TopOfPage~Map_Image&ty=18&q=Barrackpur-I%2C+West+Bengal+743129&ppois=22.875459671020508_88.41627502441406_Barrackpur-I%2C+West+Bengal+743129_~&cp=22.875543~88.58757&v=2&sV=1&FORM=MIRE&lvl=11.0" target="_blank" class="map">
                <p class="add-f">Deliver to</p>
                <div class="add-icon"><br>
                 <div class="add-s">India</div>
                </div>
            </a>
        </div>
        <div class="nav-search">
            <select name="" id="search-select">
                <option class="search-option">All</option>
                <option class="search-option">Baby Product</option>
                <option class="search-option">Beauty & Personal Care</option>
                <option class="search-option">Home & Kitchen</option>
                <option class="search-option">Home Decor</option>
                <option class="search-option">Women's Wear</option>
                <option class="search-option">Men's Wear</option>
                <option class="search-option">Computers</option>
                <option class="search-option">Sound & Music</option>
            </select>
            <input type="text" placeholder="Search On JoyBasket" class="search-input" id="searchInput">
            <div class="search-icon">
                 <button class="search-icon" id="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <br>
        <div class="nav-lang border">
            <select name="lang" id="lang-select">
                <option value="English">ENG</option>
                <option value="French">FR</option>
                <option value="Spanish">SP</option>
                <option value="Bengali">BEN</option>
            </select>
        </div>

        <div class="nav-signin border">
            <?php if (isset($_SESSION['email'])): ?>
                <a href="loggedin.php?email=<?php echo $_SESSION['email']; ?>" class="login"><h4 id="log">User</h4></a>
            <?php else: ?>
                <a href="login.php" class="login"><h4 id="log">Sign-in</h4></a>
            <?php endif; ?>
        </div>
        <div class="nav-cart border">
            <a href="content1.php" target="_blank" class="shop">Shop</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-ops">
            <a href="#" class="border">Today's Deal</a>
        </div>
    </div>
   </header>
   <div class="hero-section">
    <div class="hero-msg"><marquee width="45%">You are on JoyBasket.com. You can also shop on JoyBasket India for millions of products with fast local delivery.</marquee>    <A href="#">Click here to go to JoyBasket.in</A></div>
   </div>
         <div class="shop-section">
            <div class="box1 box" id="boxscale">
                <h2>Health & Personal Care</h2>
                <div class="box-img1"></div>
                <a href="content1.php#section4" target="_blank">See More</a>
            </div>
            <div class="box2 box" id="boxscale"><h2>Home & Kitchen </h2>
              <div class="box-img2"></div>
              <a href="content1.php#section5" target="_blank" >See More</a>
            </div>
            <div class="box3 box" id="boxscale">
                <h2>Beauty Picks </h2>
                <div class="box-img3"></div>
                <a href="content1.php#section2" target="_blank">See More</a>
            </div>
            <div class="box4 box" id="boxscale">
                <h2>Shop Toys</h2>
                <div class="box-img4"></div>
                <a href="content1.php#section3" target="_blank">See More</a>
            </div>
            <div class="box5 box" id="boxscale">
                <h2>Electronics</h2>
                <div class="box-img5"></div>
                <a href="content1.php#section1" target="_blank">See More</a>
            </div>
            <div class="box6 box" id="boxscale">
                <h2>Discover Fashion</h2>
                <div class="box-img6"></div>
                <a href="content1.php#section8" target="_blank">See More</a>
            </div>
            <div class="box7 box" id="boxscale">
                <h2>Gaming Accessories</h2>
                <div class="box-img7" ></div>
                <a href="content1.php#section6" target="_blank">See More</a>
            </div>
            <div class="box8 box" id="boxscale">
                <h2>Create with strip lights</h2>
                <div class="box-img8"></div>
                <a href="content1.php#section7" target="_blank">See More</a>
            </div>

         </div>
   <footer>
   <div class="foot-panel"><a href="#" class="Back"><h4>Back To Top</h4></a>
            </div>
            <div class="foot-panel2">
             <ul> <p>Get to Know Us</p> 
            <a href="#">Careers</a>
               <a href="#">Blog</a>
               <a href="#">About JoyBasket</a>
             <a href="#">Investor Relations</a>
             <a href="#">JoyBasket Devices</a>
              <a href="#">JoyBasket Science</a>
            </ul> 

            <ul><p>Connect with Us</p>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
               <a href="#">Instagram</a>
               <a href="about.php" target="_blank">About us</a>
            </ul>

            <ul><p>Make Money with Us</p>
                <a href="#">Sell products on JoyBasket</a>
                   <a href="#">About JoyBasket</a>
                 <a href="#">Investor Relations</a>
                 <a href="#">JoyBasket Devices</a>
                  <a href="#">JoyBasket Science</a>
                </ul>

                <ul><p>Let Us Help You</p>
                    <a href="#">Your Account</a>
                       <a href="#">Returns Centre</a>
                     <a href="#">100% Purchase Protection</a>
                     <a href="#">JoyBasket App Download</a>
                      <a href="#">Help</a>
                    </ul>
            </div>
            
            <div class="foot-panel3">
                <div class="logo">JoyBasket</div>
            </div>

            <div class="foot-panel4">
                <div class="pages">
                    <a href="copywright.php" target="_blank">Conditions Of Use</a>
                    <a href="privacy.php" target="_blank">Privacy Notice</a>
                    <a href="copywright.php" target="_blank">Your Ads Privacy Choice</a>
                    <div class="copywrite">
                        © 2024-upcoming, JoyBasket.com, Inc. or its affiliates
                </div>
            </div>
   </footer>
</body>
</html>
<?php
?>
