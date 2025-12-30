<?php
$orderMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $flavor = $_POST["flavor"];
    $size = $_POST["size"];
    $message = $_POST["message"];
    $orderMsg = "Thank you $name! Your $flavor cake ($size) order received.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Custom Cake Shop</title>
<style>
body{margin:0;font-family:Arial;background:#fff5f7}
header{background:#ff5c8a;color:white;padding:20px;text-align:center}
nav{background:#ff85a2;padding:10px;text-align:center}
nav a{color:white;text-decoration:none;margin:15px;font-weight:bold}
.hero{padding:60px;text-align:center;background:#ffe0e9}
.hero h1{color:#ff2f6e}
.section{padding:40px;text-align:center}
.cakes{display:flex;justify-content:center;gap:20px}
.card{background:white;padding:20px;width:200px;border-radius:10px}
.card img{width:100%;border-radius:10px}
form{max-width:400px;margin:auto;background:white;padding:20px;border-radius:10px}
input,select,textarea,button{width:100%;padding:10px;margin:8px 0}
button{background:#ff5c8a;color:white;border:none;font-size:16px}
footer{background:#ff85a2;color:white;text-align:center;padding:15px;margin-top:40px}
.msg{color:green;font-weight:bold}
</style>
</head>
<body>

<header>
<h1>Sweet Custom Cakes</h1>
<p>Design Your Dream Cake</p>
</header>

<nav>
<a href="#">Home</a>
<a href="#cakes">Cakes</a>
<a href="#custom">Customize</a>
<a href="#contact">Contact</a>
</nav>

<div class="hero">
<h1>Fresh & Personalized Cakes</h1>
<p>Perfect for Birthdays, Weddings & Events</p>
</div>

<div class="section" id="cakes">
<h2>Our Cakes</h2>
<div class="cakes">
<div class="card">
<img src="https://via.placeholder.com/200">
<h3>Chocolate</h3>
</div>
<div class="card">
<img src="https://via.placeholder.com/200">
<h3>Vanilla</h3>
</div>
<div class="card">
<img src="https://via.placeholder.com/200">
<h3>Strawberry</h3>
</div>
</div>
</div>

<div class="section" id="custom">
<h2>Customize Your Cake</h2>
<?php if($orderMsg!=""){ ?>
<p class="msg"><?php echo $orderMsg; ?></p>
<?php } ?>
<form method="post">
<input type="text" name="name" placeholder="Your Name" required>
<select name="flavor">
<option>Chocolate</option>
<option>Vanilla</option>
<option>Strawberry</option>
</select>
<select name="size">
<option>Small</option>
<option>Medium</option>
<option>Large</option>
</select>
<textarea name="message" placeholder="Cake Message"></textarea>
<button type="submit">Order Cake</button>
</form>
</div>

<footer id="contact">
<p>Sweet Custom Cakes | Contact: 9876543210</p>
</footer>

</body>
</html>
