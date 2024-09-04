<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="logo.png">
	<link rel="stylesheet" href="card.css">
	<title>Payment</title>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const t = getTotal();
			document.getElementById("payment").textContent = 'Rs: ' + String(t);
		});

		function getTotal() {
			return localStorage.getItem('total') || 0;
		}

		function clearLocalStorage() {
			localStorage.clear();
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="left">
			<p>Payment methods</p>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<div class="methods">
				<div onclick="doFun()" id="tColorA" style="color: rgb(147, 158, 223);">
					<i class="fa-solid fa-credit-card" style="color: greenyellow;"></i> Payment by card
				</div>
			</div>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
		</div>
		<div class="center">
			<a href="#"><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" width="250" height="auto"/></a>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<div class="card-details">
				<form method="post" action="">
					<p>Card number</p>
					<div class="c-number" id="c-number">
						<input id="number" class="cc-number" placeholder="Card number" maxlength="19" name="card_number" required>
						<i class="fa-solid fa-credit-card" style="margin: 0;"></i>
					</div>
					<div class="c-details">
						<div>
							<p>Expiry date</p>
							<input id="e-date" class="cc-exp" placeholder="MM/YY" maxlength="5" name="date" required>
						</div>
						<div>
							<p>CVV</p>
							<div class="cvv-box" id="cvv-box">
								<input id="cvv" class="cc-cvv" placeholder="CVV" maxlength="3" name="cvv" required>
								<i class="fa-solid fa-circle-question" title="3 digits on the back of the card" style="cursor: pointer;"></i>
							</div>
						</div>
					</div>
					<div class="email">
						<p>Email</p>
						<input type="email" placeholder="example@email.com" id="email" name="mail" required>
					</div>
					<button type="submit" id="pay" name="paynow">PAY NOW</button>
				</form>
			</div>
		</div>
		<div class="right">
			<p>Total price:</p>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<div class="details" id="payment">
				<div style="font-weight: bold; padding: 3px 0;"></div>
			</div>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<a href="#"><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" width="100%" height="auto" /></a>
		</div>
	</div>
	<script src="content.js"></script>
</body>
</html>
<?php
if (isset($_POST['paynow'])) {
    echo '<script>
        const total = localStorage.getItem("total") || 0;
        clearLocalStorage();
        alert("Payment Successful!");
        window.location.href = "successful.php?total=" + encodeURIComponent(total);
    </script>';
    exit();
}
?>
