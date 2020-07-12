<?php
require_once(__DIR__ . "/env.php");
if (is_set('DEVELOPMENT')) {
    phpinfo();
}
else {
    http_response_code(404);
}
?>