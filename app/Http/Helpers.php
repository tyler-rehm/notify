<?php

function formatPhone($phone)
{
    $phone = preg_replace("/[^0-9,.]/", "", $phone);
    return "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
}
