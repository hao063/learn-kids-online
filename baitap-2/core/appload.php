<?php
defined('PATHDEFAULT') OR exit('Không được quyền truy cập phần này');

// BASE FILE
require PATHDEFAULT . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'base.php';

// *********************__LOAD_FILES__*********************

// LOAD CONFIG
load_folder(PATHDEFAULT . DIRECTORY_SEPARATOR . 'config');

// LOAD AUTOLOAD => STOREGE
if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name) {
                load_storage($type, $name);
            }
        }
    }
}

// *********************__DEFAULT__*********************

// CONNECT DB
DB::connection(HOST, USER, PASSWORD, NAME);

// *********************__APP__*********************

// ROUTER
require PATHDEFAULT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'router.php';
