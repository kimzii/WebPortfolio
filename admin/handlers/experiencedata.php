<?php 
//load experience data
$experienceData = [];

$sql = "SELECT id, role, organization, experienceimage FROM experience";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $experienceData[] = [
            'id' => $row['id'],
            'role' => $row['role'],
            'organization' => $row['organization'],
            'experienceimage' => $row['experienceimage']    
        ];
    }
} else {
    echo "0 results for tech used section";
}
?>