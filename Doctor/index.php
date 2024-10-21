<?php
include '../connect.php';


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

if($role=="doctor"){

$doctor_id = $id;

// SQL query to fetch patients related to the specified doctor
$sql = "SELECT p.*
        FROM patient p
        INNER JOIN doc_reg dr ON p.ID = dr.Pid
        WHERE dr.Did = $doctor_id";

$result = mysqli_query($conn, $sql);

$patients = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $patients[] = $row;
    }
}
}
// Close the database connection
mysqli_close($conn);
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
        .container {
            display: flex;
            justify-content: space-between;
        }

        aside {
            flex: 0 0 250px;
        }

        .sidebar {
            width: 100%;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-left: -40px;
        }

        table {
            border-collapse: collapse;
            width: calc(100% + 20px);
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-weight: bold;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        th {
            background-color: #f2f2f2;
        }

        #appointments table,
        #prescriptions table {
            width: 100%;
        }

        #appointments table th,
        #prescriptions table th,
        #appointments table td,
        #prescriptions table td {
            width: 25%;
        }

        

        

        .tab-content.active {
            display: block;
        }

        .custom-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 15px;
            background-color: #f5f5f5;
            width: 300%;
            margin-left: -200%;
        }

        .custom-item:hover {
            background-color: #e0e0e0;
        }

        .custom-item h3 {
            margin: 0;
        }

        .custom-item p {
            margin: 5px 0 0;
        }

        .custom-list {
            text-align: left;
        }
    

        /* Styles for the form */
        .form-container {
            margin-top: 20px;
            width: 80%;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        /* Align left in main */
        .form-container select,
        .form-container textarea {
            width: 100%;
            margin-left: 0;
        }

        .form-container button {
            margin-left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.png" alt="Logo">
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
                    <h3>Patients</h3>
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
                <h2>Patients</h2>
                <div class="custom-list">
                    <?php if (!empty($patients)) { ?>
                        <?php foreach ($patients as $patient) { ?>
                            <div class="custom-item">
                                <h3><?php echo $patient["firstName"]; ?></h3>
                                <p><strong>Gender:</strong> <?php echo $patient["gender"]; ?></p>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No patients found for this doctor.</p>
                    <?php } ?>
                </div>
            </div>

            <!-- Appointments tab content -->
            <div id="appointments" class="tab-content" style="display: none;">
    <h2>Appointments</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Date & Time</th>
                    <th>Telephone</th>
                    <th>Action</th> <!-- New column for delete button -->
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "medical";

                $conn = new mysqli($host, $user, $pass, $db);

                if ($conn->connect_error) {
                    die("Failed to connect database: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("SELECT ID, patient_Name, description, date_time, telephone FROM appointments");
                $stmt->execute();
                $result = $stmt->get_result(); // Get result set from prepared statement

                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['patient_Name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="appointment_id" value="<?php echo $row['ID']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


            <!-- Prescriptions tab content -->
            <div id="prescriptions" class="tab-content" style="display: none;">
                <h2>Prescriptions</h2>
                <div class="form-container">
                    <form action="presciption.php" method="post">
                        <label for="patient_name">Patient Name:</label>
                        <select name="patient_name" id="patient_name">
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient['ID']; ?>"><?php echo $patient['firstName']; ?></option>
                            <?php } ?>
                        </select>

                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="4"></textarea>

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <!-- Right section content -->
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
                        
                        <small class="text-muted">Doctor</small>
                        <h2><?php
                        
                        if($role=="doctor")
                        {
                            echo $name;
                        }

                        ?></h2>
                    </div>
                   
                </div>

            </div>

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Your scripts -->
    <script src="orders.js"></script>
    <script src="index.js"></script>

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
</body>
</html>
