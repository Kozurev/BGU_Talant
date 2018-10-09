<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = '127.0.0.1';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8_general_ci',
);

$CFG->wwwroot   = 'http://moodle';
$CFG->dataroot  = 'W:\domains\moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->courseCategoryLogo = [
    "filepath" => "courses/categories",
    "filearea" => "draft",
    "component" => "user",
    "contextid" => 5
];

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
