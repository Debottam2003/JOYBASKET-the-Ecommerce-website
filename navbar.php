<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBasket</title>
    <link rel="icon" href="logo.png">
    <style>
        *{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    border: border-box;

}
.navbar{
    height: 60px;
    background-color: rgb(236, 220, 247);
    color:#0f1111;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}
.nav-logo{
    height: 50px;
    width: 100px;
}
.logo{
    text-align: center;
    margin-top: 13px;
    height: 50px;
    width: 100px;
    text-shadow: 1.1px 1.1px  rgba(7, 7, 7, 0.997);
    text-shadow: 1.1px 1.1px 5px rgba(66, 3, 110, 0.6);
    font-size: 1.37rem;
    font-family: Arial, Helvetica, sans-serif;
    font: bold;
}
.border{
    border: 1.6px solid transparent;
}
.border:hover{
    border:1.6px solid rgb(11, 11, 11);
}
/*box2*/
.nav-address{
    height: 50px;
}
.add-f{
    color: #0a0a0a;
    font-size: 0.8rem ;
    margin: 1.5px;
    margin: 4px;
}
.add-s{
     font-size: 1rem;
}
.add-icon{
    display: flex;
    align-items: center;
}
/*box3*/
.nav-search{
    display: flex;
    justify-content: space-evenly;
    width: 690px;
    height: 40px;
    border: 1px solid orange;
    border-radius: 5px;
}
#search-select{
    background-color: #f3f3f3;
    width: 50px;
    height: 40px;
    text-align: center;
    border-top-left-radius: 5px;
    border-bottom-left-radius:5px;
    border: none;
    font-size: 1rem;
    color: rgb(97, 97, 97);
}
.search-input{
    width: 100%;
    font-size: 1rem;
    border: none ;
}
.search-icon{
    width: 45px;
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    background-color:orange;
    border-top-right-radius: 5px;
    border-bottom-right-radius:5px;
    color: #0f1111;
}
/*box4*/
.nav-lang{
    display: flex;
    text-align: center;
    width: 50px;
    height: 40px;
}
.nav-search:hover{
    border:2.9px solid #febd68;
}
.login{
    text-decoration: none;
    color: black;
}
span{
    font-size: 0.7rem;
}
.nav-second{
    font-size: 0.85rem;
    font-weight: 700;
}
.panel{
    height: 40px;
    display: flex;
    background-color: #cdd4f6;
    color: black;
    align-items: center;
    padding-left: 30px;
}
.panel-ops a{
    color: #cdd4f6;
    display: inline;
    margin-left: 10px;
    text-decoration: none;
}
.panel-ops{
    width: 85%;
    font-size:  0.85em; 
}
.panel-deals a{
    color: #0a0906;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 700;
    text-align: right;
}
.panel-deals:hover{
    border: 1px solid black;
}
.nav-cart {
    font-weight: 700;
}
.shop{
    text-decoration: none;
    color: black;
}
    </style>
</head>
<body>
    <div class="navbar">
        <div class="nav-logo">
            <div class="logo">JoyBasket</div>
        </div>
        <div class="nav-address border">
        <a href=https://www.bing.com/maps?mepi=24~~TopOfPage~Map_Image&ty=18&q=Barrackpur-I%2C+West+Bengal+743129&ppois=22.875459671020508_88.41627502441406_Barrackpur-I%2C+West+Bengal+743129_~&cp=22.875543~88.58757&v=2&sV=1&FORM=MIRE&lvl=11.0 target="_blank" class="map"><p class="add-f">Deliver to</p>
            <div class="add-icon">
                <i class="fa-solid fa-location-dot"></i>
                <p class="add-s">India</p>
            </div>
        </a>
        </div>
        <div class="nav-search">
            <select name="" id="search-select">
                <option class="search-option">All</option>
                <option class="search-option">Baby Product</option>
                <option class="search-option">Beauty & Personal Care</option>
                <option class="search-option">Home & Kitchen </option>
                <option class="search-option">Home Decor</option>
                <option class="search-option">Women's Wear</option>
                <option class="search-option">Men's Wear</option>
                <option class="search-option">Kindle Stores</option>
                <option class="search-option">Computers</option>
                <option class="search-option">Sound & Music</option>
            </select>
            <input type="text" placeholder="Search On JoyBasket" class="search-input">
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
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
                <a href="loggedin.php" target="_blank" class="login"><h4  id="log">User</h4></a>
            </div>
         <div class="nav-cart border">
                  <a href="content1.php" target="_blank" class="shop">Shop </a>                
                    </div>    
                </div>
        </div>
    </div>
</body>
</html>