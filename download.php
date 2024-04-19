<?php
// Include database connection and functions
require_once("admin/include/DB.php");
require_once("admin/include/function.php");
require_once("admin/include/session.php");

// Retrieve the file name from the database
$sql = "SELECT cv_name FROM homepage LIMIT 1"; // Assuming there's only one record in the homepage table
$stmt = $ConnectingDB->query($sql);

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $fileName = $row['cv_name'];
    $filePath = 'admin/upload/' . $fileName;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output its contents
        readfile($filePath);
        exit;
    } else {
        // File not found
        die('File not found');
    }
} else {
    // Error fetching CV from the database
    die('Error fetching CV from the database');
}
?>