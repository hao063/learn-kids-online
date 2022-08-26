<?php
defined('PATHDEFAULT') OR exit('Không được quyền truy cập phần này');

global $autoload;

$autoload['libraries'] = [
    'route',
    'database',
    'mail',
    'jwt'
];

$autoload['helper'] = [
    'data', 
    'format', 
    'prem'
];