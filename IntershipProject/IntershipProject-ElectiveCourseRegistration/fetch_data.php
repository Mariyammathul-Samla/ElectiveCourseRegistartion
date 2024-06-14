<?php
include 'config.php';

$query = "SELECT department, COUNT(*) AS course_count FROM course GROUP BY department";

$result4 = $connection->query($query);

$data = array();

if ($result4->num_rows > 0) {
    while ($row = $result4->fetch_assoc()) {
        $data[] = $row;
    }
}



// Send the data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
