<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_form.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header('location: index.html');
  }
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CheckOut Page</title>
  <style>
    body {
    font-family: 'Roboto', sans-serif!important;
	margin:0;
	padding:0;
	box-sizing: border-box;
}

.mainscreen
{
	min-height: 100vh;
	width: 100%;
	display: flex;
    flex-direction: column;
    background-color: #DFDBE5;
    background-image: url("https://wallpaperaccess.com/full/3063067.png");
    color:#963E7B;
}

.card {
	width: 60rem;
    margin: auto;
    background: white;
    position:center;
    align-self: center;
    top: 50rem;
    border-radius: 1.5rem;
    box-shadow: 4px 3px 20px #3535358c;
    display:flex;
    flex-direction: row;
    
}

.leftside {
	background: #030303;
	width: 25rem;
	display: inline-flex;
    align-items: center;
    justify-content: center;
	border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}

.product {
    object-fit: cover;
	width: 20em;
    height: 20em;
    border-radius: 100%;
}

.rightside {
    background-color: #ffffff;
	width: 35rem;
	border-bottom-right-radius: 1.5rem;
    border-top-right-radius: 1.5rem;
    padding: 1rem 2rem 3rem 3rem;
}

p{
    display:block;
    font-size: 1.1rem;
    font-weight: 400;
    margin: .8rem 0;
}

.inputbox
{
    color:#030303;
	width: 100%;
    padding: 0.5rem;
    border: none;
    border-bottom: 1.5px solid #ccc;
    margin-bottom: 1rem;
    border-radius: 0.3rem;
    font-family: 'Roboto', sans-serif;
    color: #615a5a;
    font-size: 1.1rem;
    font-weight: 500;
  outline:none;
}
select {
      font-size: 16px; 
      padding: 10px; 
      margin: 20px;
      width: 200px; 
      border-radius: 5px; 
      border: 1px solid #0c7fdd; 
      background-color: #ffffff; 
      cursor: pointer; 
    }

.expcvv {
    display:flex;
    justify-content: space-between;
    padding-top: 0.6rem;
}

.expcvv_text{
    padding-right: 1rem;
}
.expcvv_text2{
    padding:0 1rem;
}

.button{
    background: linear-gradient(
135deg
, #753370 0%, #298096 100%);
    padding: 15px;
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 400;
    font-size: 1.2rem;
    margin-top: 10px;
    width:100%;
    letter-spacing: .11rem;
    outline:none;
}

.button:hover
{
	transform: scale(1.05) translateY(-3px);
    box-shadow: 3px 3px 6px #38373785;
}

@media only screen and (max-width: 1000px) {
    .card{
        flex-direction: column;
        width: auto;
      
    }

    .leftside{
        width: 100%;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
      border-top-right-radius:0;
      border-radius:0;
    }

    .rightside{
        width:auto;
        border-bottom-left-radius: 1.5rem;
        padding:0.5rem 3rem 3rem 2rem;
      border-radius:0;
    }
}

  </style>
</head>
<body>
<div class="mainscreen">
    <div class="card">
        <div class="leftside">
          <img src="https://static.vecteezy.com/system/resources/previews/016/865/208/non_2x/online-donation-line-gradient-circle-background-icon-vector.jpg" class="product" alt="Shoes" />
        </div>
        <div class="rightside">
          <form action="payments.php" method="POST">
            <h1>CheckOut</h1>
            <h2>Payment Information</h2>
            <p>Your full name</p>
            <input type="text" class="inputbox" name="name" required />
            <p>Your email ID</p>
            <input type="email" class="inputbox" name="email" required />
            <p>Your Phone Number</p>
            <input type="text" class="inputbox" name="mobile" required />
            <p>Category</p>
            <select  name="category">
                <option value="individual">Individual</option>
                <option value="organization">Organization</option>
                <option value="emergency">Emergency</option>
              </select>
            <p>Amount</p>
            <input type="number" class="inputbox" name="amount" required />
            <button type="submit" class="button">Pay Now</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>
