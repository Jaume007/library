<?php
function sanitize($data)
{
    if (!is_array($data)) {

        $data = trim(htmlentities($data, ENT_QUOTES, 'UTF-8', false));
    } else {
        //Self call function to sanitize array data
        $data = array_map('sanitize', $data);
    }
    return $data;
}

function checkPrivileges($controller, $action)
{
    $array = json_decode(file_get_contents("files/settings.json"), true);
    $levels = $array['privileges'];
    extract($levels);
    $controllerP = ["adminController" => $admin, "librarianController" => $librarian, "bookingController" =>$member, "catalogController" => 0, "indexController" => 0, "userController" => 0, "bookController" => 0];
    $actionP = [
        "adminController" => ["indexAction" => $admin, "updateAction" => $admin],
        "librarianController" => ["indexAction" => $librarian],
        "bookingController" => ["indexAction" => $member, "getReturn" => $member, "bookAction" => $member, "todayAction" => $librarian, "retAction" => $librarian],
        "catalogController" => ["indexAction" => 0, "searchAction" => 0],
        "indexController" => ["indexAction" => 0, "registerAction" => 0],
        "userController" => ["newAction" => 0, "delAction" => $member, "showAction" => $member, "editAction" => $member, "updateAction" => $member, "logAction" => $member, "histAction" => $member],
        "bookController" =>["indexAction"=>0,"newBAction"=>$librarian,"updateAction"=>$librarian,"histAction"=>$librarian]];

    $userLevel=isset($_SESSION['type'])?$_SESSION['type']:0;
    if($userLevel>=$controllerP[$controller]) {
        if($userLevel>=$actionP[$controller][$action]){
            return true;
        }else return false;

    }else return false;
}