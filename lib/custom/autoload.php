<?php
/**
 * Подключения набора обязательных классов для корректной работы решения
 *
 * @author Bad Wolf
 * @date 07.09.2018 14:06
 * @version 20190227
 */

define( 'ROOT', dirname(__FILE__) );
define( 'TEST_MODE_FACTORY', false );
//define( 'TEST_MODE_ORM', false );

define( 'COURSE_CATEGORY_PROGRAM', 2 );
define( 'COURSE_CATEGORY_OLYMPIAD', 3 );

define( 'STR_PROGRAMS', 'Подготовительные курсы' );
define( 'STR_OLYMPIADS', 'Олимпиады' );

require_once 'model/db.php';
require_once 'model/orm.php';
require_once 'model/core/entity/model.php';
require_once 'model/core/entity.php';
require_once 'model/core/core.php';
require_once 'model/core/array.php';
require_once 'model/user.php';
require_once 'functions.php';
require_once 'observers.php';

Orm::Debug( false );