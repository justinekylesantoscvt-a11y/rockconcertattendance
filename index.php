<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Concert Management</title>
</head>
<body>

    <h3>Section: fetchAll() with print_r and <pre></h3>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM concert_attendance");
    if ($stmt->execute()) {
        $allAttendees = $stmt->fetchAll();
        echo "<pre>";
        print_r($allAttendees); 
        echo "</pre>";
    }
    ?>

    <hr>

    <h3>Section: fetch() with print_r and <pre></h3>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM concert_attendance WHERE id = 1");
    if ($stmt->execute()) {
        $singleAttendee = $stmt->fetch(); 
        echo "<pre>";
        print_r($singleAttendee); 
        echo "</pre>";
    }
    ?>

    <hr>

    <h3>Section: Insertion of Record</h3>
    <?php
    $insertSql = "INSERT INTO concert_attendance (fan_name, band_name, venue_name, ticket_price, concert_date) 
                  VALUES (?,?,?,?,?)";
    $insertStmt = $pdo->prepare($insertSql);
    echo "<p>Insert query is ready in the source code.</p>";
    ?>

    <hr>

    <h3>Section: Deletion of Record</h3>
    <?php
    $deleteSql = "DELETE FROM concert_attendance WHERE id = ?";
    $deleteStmt = $pdo->prepare($deleteSql);
   
    echo "<p>Delete query is ready in the source code.</p>";
    ?>

    <hr>

    <h3>Section: Updating of Record</h3>
    <?php
    $updateSql = "UPDATE concert_attendance SET fan_name = ?, is_vip = ? WHERE id = ?";
    $updateStmt = $pdo->prepare($updateSql);
    
    echo "<p>Update query is ready in the source code.</p>";
    ?>

    <hr>

    <h3>Rock Concert Attendance Table</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Fan Name</th>
                <th>Band</th>
                <th>Venue</th>
                <th>Price</th>
                <th>VIP?</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tableStmt = $pdo->prepare("SELECT * FROM concert_attendance");
            $tableStmt->execute();
            $rows = $tableStmt->fetchAll(); // [cite: 19]

            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['fan_name'] . "</td>";
                echo "<td>" . $row['band_name'] . "</td>";
                echo "<td>" . $row['venue_name'] . "</td>";
                echo "<td>" . $row['ticket_price'] . "</td>";
                echo "<td>" . ($row['is_vip'] ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>