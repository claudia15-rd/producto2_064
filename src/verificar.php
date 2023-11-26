<?php
if (in_array('mod_rewrite', apache_get_modules())) {
    echo 'mod_rewrite está habilitado en este servidor.';
} else {
    echo 'mod_rewrite no está habilitado en este servidor.';
}
?>
