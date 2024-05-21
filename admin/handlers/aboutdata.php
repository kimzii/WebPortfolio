<?php 
//load data for about
$aboutimage = $introduction = "";
$sql = "SELECT aboutimage, introduction FROM about";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aboutimage = $row['aboutimage'];
        $introduction = $row['introduction'];
    }
} else {
    echo "0 results";
}

// Load data for tech used
$techData = [];

$sql = "SELECT techname, techimage FROM techused";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $techData[] = [
            'techname' => $row['techname'],
            'techimage' => $row['techimage']
        ];
    }
} else {
    echo "0 results for tech used section";
}
?>

