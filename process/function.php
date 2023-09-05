<?php
// function is_active($u_arr)
// {
//     if (is_array($u_arr)) {
//         $u_arr = array_map(function ($val) {
//             $val = SCRIPT_BASE . $val;
//             return trim($val, '/');
//         }, $u_arr);
//     } else {
//         $u_arr = [SCRIPT_BASE . trim($u_arr, '/')];
//     }
//     return in_array(trim("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/'), $u_arr) ? 'active' : null;
// }
// Above function is for navgation changes, and active the current nav item
?>
