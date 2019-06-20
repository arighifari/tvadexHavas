<?php
include('../config.php');


## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

$searchValue = mysqli_real_escape_string($conn, $_POST['search']['value']); // Search value

## Custom Field value
$searchByyear = $_POST['year'];
$searchBysection = mysqli_real_escape_string($conn, $_POST['section']);
$searchBybrand = mysqli_real_escape_string($conn, $_POST['brand']);

## Search 
$searchQuery = " ";
if($searchByyear != ''){
    $searchQuery .= " and (Year like '%".$searchByyear."%' ) ";
}
if($searchBysection != ''){
    $searchQuery .= " and (Section like '".$searchBysection."%') ";
}
if($searchBybrand != ''){
    $searchQuery .= " and (Brand like '".$searchBybrand."%') ";
}

if($searchValue != ''){
    $searchQuery .= " and (Brand like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from videos");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from videos WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT * FROM videos WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);

$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
            "video_Id"=>$row['video_Id'],
            "Signature"=>$row['Signature'],
            "Section"=>$row['Section'],
    		"Category"=>$row['Category'],
            "Media"=>$row['Media'],
            "Brand"=>$row['Brand'],
    		"Copyline"=>$row['Copyline'],
            "LaunchDate"=>$row['LaunchDate'],
            "Duration"=>$row['Duration'],
            "libsignature"=>$row['libsignature'],
            "advertiser"=>$row['advertiser'],
        );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
