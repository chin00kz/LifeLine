


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <style>
        
        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn_container {
            text-align: center;
        }

        .btn5 {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 20px;
            outline: none;
            border: none;
            width: 100%;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn5:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>


<h1>Doctors</h1>
<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Gender</th>
                                <th>Telephone</th>
                                <th>Action</th> <!-- Add this column for delete button -->
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

                            $stmt = $conn->prepare("SELECT ID, firstName, lastName, email, username, gender, telephone FROM doctor");
                            $stmt->execute();
                            $result = $stmt->get_result(); // Get result set from prepared statement

                            while ($row = $result->fetch_assoc()) {
                                // Check if the row data is valid
                                if ($row['ID'] && $row['firstName'] && $row['lastName'] && $row['email'] && $row['username'] && $row['gender'] && $row['telephone']) { ?>
                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['firstName']; ?></td>
                                        <td><?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['telephone']; ?></td>
                                        <td>
                                            <form method="post" action="delete.php">
                                                <input type="hidden" name="doctor_id" value="<?php echo $row['ID']; ?>">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                    </table>

<h1>Patients</h1>
<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Gender</th>
                                <th>Telephone</th>
                                <th>Action</th> <!-- Add this column for delete button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->prepare("SELECT ID, firstName, lastName, email, username, gender, telephone FROM Patient");
                            $stmt->execute();
                            $result = $stmt->get_result(); // Get result set from prepared statement

                            while ($row = $result->fetch_assoc()) {
                                // Check if the row data is valid
                                if ($row['ID'] && $row['firstName'] && $row['lastName'] && $row['email'] && $row['username'] && $row['gender'] && $row['telephone']) { ?>
                                    <tr>
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['firstName']; ?></td>
                                        <td><?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['telephone']; ?></td>
                                        <td>
                                            <form method="post" action="delete2.php">
                                                <input type="hidden" name="patient_id" value="<?php echo $row['ID']; ?>">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                    </table>

                    <h1>Add A Doctor</h1>

                    <form method="post" action="doctor.php">
                            <div>
                                <label for="fName">First Name:</label>
                                <input type="text" id="fName" name="fName" required>
        
                                <label for="lName">Last Name:</label>
                                <input type="text" id="lName" name="lName" required>
        
                                <label for="username">User name:</label>
                                <input type="text" id="username" name="username" required>
        
                                <label for="password">password:</label>
                                <input type="password" id="password" name="password" required>
        
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" required>
        
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>

                                <label for="telephone">Telephone:</label>
                                <input type="number" id="telephone" name="telephone" required>
        
                                <label for="gender">Gender:</label>
                                <input type="text" id="gender" name="gender" required>
        
                                <div class="btn_container">
                                <button type="submit" class="btn5" name="submit">Submit</button>
                               </div>

                        </form>

    
</body>
</html>