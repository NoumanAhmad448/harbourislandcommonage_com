<?php

$img_val_rules = ["image/jpeg", "image/jpg", "image/png"];

return [
    "first_name" => "first_name",
    "lastname" => "lastname",
    "email" => "email",
    "password" => "password",
    "c_password" => "c_password",
    "g-recaptcha-response" => "g-recaptcha-response",
    "name" => "name",
    "img_val_rules_str" => implode(",",$img_val_rules),
    "img_val_rules_json" => json_encode($img_val_rules),
];
?>