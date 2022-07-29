<?php

function current_age($birthDate)
{
    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($birthDate), date_create($currentDate));
    return $age->format("%y");
}
