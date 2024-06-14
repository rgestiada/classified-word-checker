<?php

class ClassifiedWordChecker {
    private $classifiedWords;

    public function __construct($classifiedWords) {
        $this->classifiedWords = $classifiedWords;
    }

    public function check($emailText) {
        $containsClassified = false;

        foreach ($this->classifiedWords as $word) {
            if (stripos($emailText, $word) !== false) {
                $containsClassified = true;
                $emailText = str_ireplace($word, '*****', $emailText);
            }
        }

        return array("success" => true, "containsClassified" => $containsClassified, "emailText" => $emailText);
    }
}