
<link rel="stylesheet" href="css/about.css">
    <h1>We Offer Different Services To Improve Your Health</h1>
    <p>We provide comprehensive range of medical specialties to improve your health.</p>
    <section class="specialties">
        <?php 
        include "conn.php";
        $sql="SELECT * FROM `medical_specialties` ORDER BY `sp_id` ASC";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
         if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <a href="detail_view.php?id=<?php echo $row['sp_id']; ?>" target="_self">
            <h3 ><?php echo $row['sp_title']; ?></h3>
            <img src="icon/<?php echo $row['sp_icon']; ?>" >
            </a>
            <p><?php echo substr($row['sp_description'], 0, 71)."...";?></p>
            
        </div>
        <?php } } ?>
    </section>
   