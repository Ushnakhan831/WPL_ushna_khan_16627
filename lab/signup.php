<?php
$data = [];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $data = $_POST;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup Form</title>
<style>
body{font-family:Arial;background:#f2f2f2}
.container{width:500px;margin:30px auto;background:white;padding:20px}
input,select,button{width:100%;padding:8px;margin:6px 0}
table{width:100%;border-collapse:collapse;margin-top:20px}
th,td{border:1px solid #000;padding:8px;text-align:left}
button{background:#007bff;color:white;border:none}
</style>
</head>
<body>

<div class="container">
<h2>Signup Form</h2>

<form method="post">
<input type="text" name="fname" placeholder="First Name" required>
<input type="text" name="lname" placeholder="Last Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="date" name="dob" required>

<label>Gender</label>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female

<label>Interested Courses</label>
<input type="checkbox" name="course[]" value="Web"> Web
<input type="checkbox" name="course[]" value="Design"> Design
<input type="checkbox" name="course[]" value="AI"> AI

<select name="country">
<option>Pakistan</option>
<option>India</option>
<option>USA</option>
</select>

<input type="text" name="city" placeholder="City">

<button type="submit">Submit</button>
</form>

<?php if(!empty($data)){ ?>
<h2>Submitted Data</h2>
<table>
<tr><th>Field</th><th>Value</th></tr>
<tr><td>First Name</td><td><?= $data["fname"] ?></td></tr>
<tr><td>Last Name</td><td><?= $data["lname"] ?></td></tr>
<tr><td>Email</td><td><?= $data["email"] ?></td></tr>
<tr><td>DOB</td><td><?= $data["dob"] ?></td></tr>
<tr><td>Gender</td><td><?= $data["gender"] ?? "" ?></td></tr>
<tr><td>Courses</td><td><?= isset($data["course"])?implode(", ",$data["course"]):"" ?></td></tr>
<tr><td>Country</td><td><?= $data["country"] ?></td></tr>
<tr><td>City</td><td><?= $data["city"] ?></td></tr>
</table>
<?php } ?>

</div>

</body>
</html>
