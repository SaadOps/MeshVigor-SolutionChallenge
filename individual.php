<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Icon css link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  css file --> 
    <link rel="stylesheet" type="text/css" href="form.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function toggleElements() {
            var selectElement = document.getElementById("Donatething");
            var specifyThings = document.getElementById("specify-things");
            var specifyOthers = document.getElementById("specify-others");
            var amount = document.getElementById("donate-amount");
            var date = document.getElementById("pickup-date");

            if (selectElement.value === "stripe") {
                specifyThings.style.display = "none";
                specifyOthers.style.display = "none";
                amount.style.display = "none";
                date.style.display = "none";
            } else {
                specifyThings.style.display = "block";
                specifyOthers.style.display = "block";
                amount.style.display = "block";
                date.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="row">
        <div class="column" >
        
            <img src="http://shots.jotform.com/elton/logo_thanksgiving.png" alt />
            <div id="donation"><strong>Donation form</strong></div>
            <div id="make"><strong>Make a donation to support us</strong></div>
        </div>
       <div class="column1" >
            <p style="text-align: center;font-family: Brush Script MT;font-weight: bold;margin-bottom: 0px;color: black;"><span style="font-size: 55px;">Individual Form</span></p>
            <p><span style="font-size: 14pt;">Please fill this form for required details.</span></p>
        
    
            <div class="container">
                <form method="POST">
                    <div class="row">
                        <div class="col-25">
                        <label for="fname">Full Name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="fname" name="fname" placeholder="Your name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="Mobile">Mobile no</label>
                        </div>
                        <div class="col-75">
                        <input type="number" id="mobile" name="mobileno" placeholder="Your mobile no" size="10" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="address">Full Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="address" name="address" placeholder="Your address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">          
                            <label for="city"> City</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="city" name="city" placeholder="New York">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">          
                            <label for="state">State</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="state" name="state" placeholder="Maharashtra">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">          
                        <label for="donation">Donate Thing</label> 
                        </div>
                        <div class="col-75">
                            <select name="Donatething" id="Donatething" onchange="toggleElements()" required>
                                <option value="">Select</option>
                                <option value="Items">Items</option>
                                <option value="Cloths">Cloths</option>
                                <option value="books">Books</option>
                                <option value="money">Money</option>
                                <option value="shoes">Shoes</option>
                                <option value="other">Other thing</option>
                                <option value="stripe">Pay with Stripe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="specify-things">
                        <div class="col-25">          
                            <label for="city">Please specify the things</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="thing1" name="thing1" placeholder="shirt" required>
                        </div>
                    </div>
                    <div class="row" id="specify-others">
                        <div class="col-25">          
                            <label for="city">Others,Please specify</label>
                        </div>
                        <div class="col-75">
                        <input type="text" id="thing2" name="thing2" placeholder="any thing">
                        </div>
                    </div>
                    <div class="row" id="donate-amount">
                        <div class="col-25">
                        <label for="amount">Any Amount</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="donate-amount-input" name="amount" placeholder="donate amount" required>
                        </div>
                    </div>
                    <div class="row" id="pickup-date">
                        <div class="col-25">
                            <label for="date">Pickup date</label>
                        </div>
                        <div class="col-75">
                            <input type="date" id="pickup-date-input" name="date" required>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Register" name="submit">
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</div>
</body>
</html>
