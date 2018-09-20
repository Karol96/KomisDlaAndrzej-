<?php
$conf->debug = true; # set true during development and use in your code (for instance check if true to send additional message)

# ---- Main webapp configuration
$conf->server_name = 'localhost';   # server address and port
$conf->protocol = 'http';           # http or https
$conf->app_root = '/komis/public';   # project subfolder in domain (relative to main domain)

$conf->clean_urls = true;           # turn on pretty urls
$conf->action_param = 'a';          # action parameter name (not needed for clean_urls)
$conf->action_script = '/ctrl.php'; # front controller with location

# ---- Database config - values required by Medoo
$conf->db_type = 'mysql';
$conf->db_server = 'localhost';
$conf->db_name = 'komis';
$conf->db_user = 'root';
$conf->db_pass = '';
$conf->db_charset = 'utf8';

# ---- Database config - optional values
$conf->db_port = '3306';
#$conf->db_prefix = '';
$conf->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];