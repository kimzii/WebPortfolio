<?php 
//load data for project
$projectData = [];

$sql = "SELECT id, projectname, projectdetails, projectlink, githublink, projectimage FROM projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projectData[] = [
            'id' => $row['id'],
            'projectname' => $row['projectname'],
            'projectdetails' => $row['projectdetails'],
            'projectlink' => $row['projectlink'],
            'githublink' => $row['githublink'],
            'projectimage' => $row['projectimage']
        ];
    }
} else {
    echo "0 results for tech used section";
}

?>