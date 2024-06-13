<?php
require_once 'ClassifiedWordChecker.php';
require_once 'Validator.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $classifiedWords = explode(",", $_POST["classifiedWords"]);
        $emailText = $_POST["emailText"];

        // Validate input data
        Validator::validateInput($_POST["classifiedWords"], $emailText);

        // Create ClassifiedWordChecker
        $checker = new ClassifiedWordChecker($classifiedWords);

        // Check for classified words/phrases
        $result = $checker->check($emailText);

        // Return result
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_encode(array("success" => false, "error" => $e->getMessage()));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Invalid request method"));
}
