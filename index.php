<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$connect = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "sensors";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connect, $query);

$data = array();
while($row = mysqli_fetch_assoc($response)) {
    $data['Level'] = $row['Level']; // Assuming 'Level' is the column name in your sensors table
}

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
