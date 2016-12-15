<?php
require_once "utilities.php";
echo $_POST["user"];
if (!isset($_POST["user"])) echo "tot buit";
if (isset($_POST["user"]) and isset($_POST["password"])) utilities::login($_POST["user"],$_POST["password"]);