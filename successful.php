<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Order Placed</title>
    <style>
        .order {
            text-align: center;
            color: green;
        }
        .r {
            width: 150px;
            height: 150px;
            align-items: center;
            animation: move-right 1s infinite alternate;
        }
        .image {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .done {
            display: flex;
            flex-direction: column;
            margin-top: 125px;
        }
        @keyframes move-right {
            0% {
                transform: translateX(-65px);
            }
            100% {
                transform: translateX(65px);
            }
        }
    </style>
</head>
<body>
    <div class="done">
        <div class="image">
            <img src="accept.png" class="r">
        </div>
        <div id="order" class="order">
            <h1>Order placed</h1>
        </div>
    </div>
</body>
</html>
