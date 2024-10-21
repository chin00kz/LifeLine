<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Viewport meta tag -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="register.php" method="POST">
            <!-- First Section -->
            <div class="section" id="firstSection">

                <input type="text" placeholder="First Name" id="fName" name="fName" required>
                <input type="text" placeholder="Last Name" id="lName" name="lName" required>
                <input type="text" placeholder="Username" id="username" name="username" required>
                <input type="email" placeholder="Email" id="email" name="email" required>
                <input type="password" placeholder="Password" id="password" name="password">
                <input type="password" placeholder="Confirm Password" >
                <input type="tel" placeholder="Phone Number" id="telephone" name="telephone" required>
                
                
           
            
            
                <div class="horizontal">
                   <h5>Gender</h5>
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                </div>
                
                <h5>Your Date Of Birth </h5>
                <input type="date" placeholder="Date of Birth">
                
                <input type="text" placeholder="Height (cm)" id="height" name="height" >
                
                <input type="text" placeholder="Weight (kg)" id="Weight" name="weight" required>
                
                <div class="horizontal">
                    <input type="checkbox" id="tos" name="tos"> 
                    <label for="tos" class="tos-label">I accept the Terms of Service</label>
                </div>
                
              
                <button type="submit" class="btt" value="sign UP" name="signUp">Sign Up</button>

            </div>
        </form>

        <div class="member">
            Already have an account? <a href="loginin.php">Log In</a>
        </div>
    </div>

</body>
</html>
