<?php

class Validator {
    public static function validateInput($classifiedWords, $emailText) {
        if (empty($classifiedWords) || empty($emailText)) {
            throw new Exception("Please provide both classified words/phrases and email text");
        }
    }
}