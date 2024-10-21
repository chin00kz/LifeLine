<?php 
session_start();
include("../connect.php");



if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_role']) && isset($_COOKIE['user_ID'] )) 
{
    $name = $_COOKIE['user_name'];
    $role = $_COOKIE['user_role'];
    $id = $_COOKIE['user_ID'];

} 
else 
{
    echo "Cookie not found!";
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>

    <style>
            form 
            {
                max-width: 400px;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            input,
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            .btn5 {
                font-size: 1rem;
                padding: 10px 20px;
                border-radius: 20px;
                outline: none;
                border: none;
                width: 100%;
                background-color: lightblue;
                color: black;
                cursor: pointer;
            }

            .btn_container {
                text-align: center;
            }
            .input[type=text]
             {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
             }
             .prescription-.active {
            display: block;
        }

        .prescription {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 15px;
            background-color: #f5f5f5;
            width: 100%;
            margin-left: 0;
        }

        .prescription:hover {
            background-color: #e0e0e0;
        }

        .prescription h3 {
            margin: 0;
        }

        .prescription p {
            margin: 5px 0 0;
        }

        .prescription {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>LIFE<span class="danger">LINE</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#home">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Home</h3>
                </a>
                <a href="#appointments">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Appointments</h3>
                </a>
                <a href="#prescriptions">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Prescriptions</h3>
                </a>
                
                <a href="logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3 >Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <!-- Home tab content -->
            <div id="home" class="tab-content">
                <div class="analyse">
                    

                    <form >
                    <h2 style="margin-bottom: 20px;">Register For a Doctor</h2>
                    <label for="doctor">Doctor's Name</label>
                        <select id="doctor" name="doctor" placeholder="select a Doctor" required>
                            <option value="">Select A Doctor</option>
                            <option value="Dr.Mallikandara">Dr.Mallikandara</option>
                            <option value="DR.Senawirathn">DR.Senawirathn</option>
                            <option value="Dr.Kamaldhasa">Dr.Kamaldhasa</option>
                        </select>
                        <label for="des">Reason(Medical)</label>
                        <input type="text" id="des" name="des">

                        <div class="btn_container">
                        <button type="submit" class="btn5" name="register">Register</button>
                    </div>

                    </form>
                    
                    
                </div>
            </div>

            <!-- Appointments tab content -->
            <div id="appointments" class="tab-content" style="display: none;">
                <h2>Appointments</h2>

               <h3>Make An Appointment</h3>
                <div class="form1">

                <form method="post" action="appointment.php">
                <div>
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="patientName" placeholder="Enter your full name" required>
                </div>

                <div>
                    <label for="doctor">Doctor's Name</label>
                    <select id="doctor" name="doctor" placeholder="select a Doctor" required>
                        <option value="">Select A Doctor</option>
                        <option value="Dr.Mallikandara">Dr.Mallikandara</option>
                            <option value="DR.Senawirathn">DR.Senawirathn</option>
                            <option value="Dr.Kamaldhasa">Dr.Kamaldhasa</option>
                    </select>
                </div>

                <div>
                    <label for="reason">Reason For Appointment:</label>
                    <input type="text" id="reason" name="reason" placeholder="Enter reason for appointment" required>
                </div>

                <div>
                    <label for="dateTime">Date And Time:</label>
                    <input type="datetime-local" id="dateTime" name="dateTime" required>
                </div>

                <div>
                    <label for="telephone">Contact Number:</label>
                    <input type="tel" id="telephone" name="telephone" placeholder="Enter your contact number" required>
                </div>

                <div class="btn_container">
                    <button type="submit" class="btn5" name="submit">Submit</button>
                </div>
            </form>



                </div>
               
            </div>

            <!-- Prescriptions tab content -->
            <div id="prescriptions" class="tab-content" style="display: none;">
    <h2>Prescriptions</h2>

    <?php
    if($role=="patient"){
        $patient_Name = $id;
        $sql = "SELECT * FROM prescriptions WHERE patient_Name = '$patient_Name'";

        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                // Output data of each prescription
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="prescription">
                        <p> <?php echo $row["description"]; ?></p>
                        <!-- Add more fields as needed -->
                        <form method="post" action="delete.php">
                            <input type="hidden" name="prescription_id" value="<?php echo $row["ID"]; ?>">
                            <button type="submit" name="delete_prescription">Delete</button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No prescriptions found for this patient.</p>";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

</div>


            
</div>

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        
                        <small class="text-muted">Patient</small>
                    </div>

                    <h2><?php
                        
                        if($role=="patient")
                        {
                            echo $name;
                        }

                        ?></h2>
                   
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo.png">
                </div>
            </div>


        </div>


    </div>

    <script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>



    <script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll(".sidebar a");

    sidebarLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            const targetId = this.getAttribute("href").replace("#", "");
            showTab(targetId);
        });
    });

    // Additional event listener for the "Home" button
    const homeButton = document.querySelector('.sidebar a[href="#home"]');
    homeButton.addEventListener("click", function (event) {
        event.preventDefault();
        showTab("home");
    });

    function showTab(tabId) {
        const tabContents = document.querySelectorAll(".tab-content");
        
        tabContents.forEach(content => {
            if (content.id === tabId) {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        });
    }
});



    </script>