<?php

define('VG_ACCESS', true);
session_start();

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';

use core\base\controllers\RouteController;
use core\base\exceptions\DbException;
use core\base\exceptions\RouteException;

try {
    RouteController::instance()->route();
} catch (RouteException $e) {
    exit($e->getMessage());
} catch (DbException $e) {
    exit($e->getMessage());
}
