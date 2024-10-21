<?php include "header.php"; ?>
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/aboutpage_details.css">
</head>

<?php 
include "conn.php";
$id = $_GET['id'];
$sql = "SELECT doctor_details.dr_name, doctor_details.dr_description, doctor_details.dr_img, medical_specialties.sp_id
        FROM doctor_details 
        INNER JOIN medical_specialties ON doctor_details.dr_specialities = medical_specialties.sp_id 
        WHERE medical_specialties.sp_id='$id' ORDER BY medical_specialties.sp_id ASC";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
?>

<section class="containt-page">
    <div class="details_view">
        <h1 class="h1_pagedataview"><?php echo $title; ?></h1>
        <p class="page_p"><?php echo $description; ?></p>
    </div>
    <div>
        <div class="spec_details">
            <h2>Our Specialists</h2>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <!-- Doctor Details -->
                    <div class="spec_subdetails">
                        <div class="spc_col1">
                            <img src="icon/<?php echo $row['dr_img']; ?>" >
                        </div>
                        <div class="spc_col2">
                            <div><?php echo $row['dr_name']; ?></div>
                            <p><?php echo $row['dr_description']; ?></p>
                        </div>
                    </div>
                    <!-- Doctor Details End -->
                <?php endwhile; ?>
            <?php else: ?>
                <p>No doctors found for this medical specialty.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>
