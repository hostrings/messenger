<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lukas
 * Date: 29.05.13
 * Time: 13:51
 */

include "dbMessenger.php";

function show_contacts($pUser_id)
{

    if (isset($pUser_id)) {
        $user_id = $pUser_id;
    } else {
        return '{
                 "contacts": {
                    "message": "ERROR : No valid user",
                    "data": {
                        "elements": []
                    }
                 }
                }';
    }

    $aContacts = getContactsForUserID($user_id);

    if (count($aContacts) > 0) {
        return buildJSONForArray($aContacts);
    } else {
        return '{
                 "contacts": {
                    "message": "No contacts for user with id: ' . var_dump($pUser_id) . '",
                    "data": {
                        "elements": []
                    }
                 }
                }';
    }
}

function buildJSONForArray($contacts)
{
    $JSONString = '{
                 "contacts": {
                    "message": "OK : Data for user with id: ' . var_dump($pUser_id) . '",
                    "data": {
                        "elements": [';

    $isFirst = true;
    while (empty($contacts) == false) {
        if ($isFirst){
            $JSONString .= array_pop($contacts);
            $isFirst = false;
        } else {
            $JSONString .= ', ' . array_pop($contacts);
        }
    }

    // close JSON
    $JSONString .= ']}}}';
    return $JSONString;
}