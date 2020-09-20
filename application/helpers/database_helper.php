<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Capsule;
$ci = &get_instance();
$ci->load->database();
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $ci->db->hostname,
    'database'  => $ci->db->database,
    'username'  => $ci->db->username,
    'password'  => $ci->db->password,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
