<?php
function is_admin () 
{
    return isset($_SESSION['user']['role_id']) && $_SESSION['user']['role_id'] == 1 ?  true :  false;
}

function is_user () 
{
    return isset($_SESSION['user']['role_id']) && $_SESSION['user']['role_id'] == 2 ?  true :  false;
}
