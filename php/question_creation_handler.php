<?php include '../view/partials/helper.php'; ?>

<?php
$res = [
    "error" => null,
    "success" => null,
    "redirect" => null,
    "msg" => null
];



if (!$user) {
    $res["redirect"] = "login";

    echo json_encode($res);
    exit();
}

if ($user) {
    if ($user['user_type'] !== 'teacher') {
        $res["msg"] = "you cant create question unless you are a teacher";
        echo json_encode($res);

        exit();
    }
}

if (!isset($_POST['json'])) {
    $res["msg"] = "There was no data send here ";
    echo json_encode($res);

    exit();
}

$value = json_decode($_POST['json'], true);

if (!(isset($value["problemStatement"]) ||
    isset($value["difficulty"]) ||
    isset($value["lastSubmissionDate"])
    || isset($value["totalMark"]) ||
    isset($value["expectedOutput"]))) {

    $res["msg"] = "There was no data send here ";
    echo json_encode($res);
    exit();
}

if (
    empty(trim($value["problemStatement"])) ||
    empty(trim($value["difficulty"])) ||
    empty(trim($value["totalMark"])) ||
    empty(trim($value["expectedOutput"])) ||
    empty(trim($value["lastSubmissionDate"]))
) {

    $res["msg"] = "some of the field was empty";
    echo json_encode($res);
    exit();
}


$problemStatement = $value["problemStatement"];
$difficulty = $value["difficulty"];
$totalMark = $value["totalMark"];
$expectedOutput = $value["expectedOutput"];
$lastSubmissionDate = $value["lastSubmissionDate"];

if (strtotime($lastSubmissionDate) < time()) {
    $res["msg"] = "Last submission date must be after today";
    echo json_encode($res);
    exit();
}

if (strlen($problemStatement) < 20) {
    $res["msg"] = "Problem Statement at least 20 character long ";
    echo json_encode($res);
    exit();
}

if (number_format($totalMark) < 0  || number_format($totalMark) > 500) {
    $res["msg"] = "Total must be between 0 and 500 ";
    echo json_encode($res);
    exit();
}
