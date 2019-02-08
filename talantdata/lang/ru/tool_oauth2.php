<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'tool_oauth2', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   tool_oauth2
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authconfirm'] = 'Это действие предоставит постоянный доступ API к Moodle для аутентифицированной учетной записи. Это предназначено для использования в качестве системной учетной записи для управления файлами, принадлежащими Moodle.';
$string['authconnected'] = 'Системная учетная запись теперь подключена для автономного доступа';
$string['authnotconnected'] = 'Системная учетная запись не была подключена для автономного доступа';
$string['configured'] = 'Настроенные';
$string['configuredstatus'] = 'Настроенные';
$string['connectsystemaccount'] = 'Подключение к системной учетной записи';
$string['createfromtemplate'] = 'Создать службу OAuth 2 из шаблона';
$string['createfromtemplatedesc'] = 'Выберите ниже один из шаблонов службы OAuth 2, чтобы создать службу OAuth с допустимой конфигурацией одного из известных типов служб. Он создаст службу OAuth 2 со всеми правильными конечными точками и параметрами, необходимыми для аутентификации, хотя вам все равно потребуется ввести ID пользователя и ключ для новой службы, прежде чем она сможет использоваться.';
$string['createnewfacebookissuer'] = 'Создать новую службу Facebook';
$string['createnewgoogleissuer'] = 'Создать новую службу Google';
$string['createnewissuer'] = 'Создание новой персонализированной службы';
$string['createnewmicrosoftissuer'] = 'Создание новой службы Microsoft';
$string['discovered'] = 'Успешное открытие службы';
$string['edituserfieldmappings'] = 'Настройка сопоставлений полей пользователя';
$string['endpointname'] = 'Имя';
$string['endpointurl'] = 'URL';
$string['issueralloweddomains_help'] = 'Этот установленный параметр представляет собой разделенный запятыми список доменов, которым будет разрешен вход при использовании этого провайдера.';
$string['issuerbaseurl'] = 'Базовый URL-адрес службы';
$string['issuerbaseurl_help'] = 'Базовый URL-адрес, используемый для доступа к службе.';
$string['issuerclientid'] = 'ID пользователя';
$string['issuerclientsecret'] = 'Пароль пользователя';
$string['issuerimage'] = 'URL-адрес логотипа';
$string['issuerloginparams'] = 'Дополнительные параметры, включенные в запрос на вход.';
$string['issuerloginparams_help'] = 'Для чтения основного профиля пользователя некоторые системы требуют дополнительных параметров запроса на вход.';
$string['issuerloginparamsoffline'] = 'Дополнительные параметры, включенные в запрос на вход для автономного доступа.';
$string['issuerloginparamsoffline_help'] = 'Каждая система OAuth определяет различный способ запроса автономного доступа. Например. Google требует дополнительных параметров: "access_type=offline&prompt=consent". Эти параметры должны быть в формате  запроса URL.';
$string['issuerloginscopes'] = 'Области, включенные в запрос на вход.';
$string['issuerloginscopes_help'] = 'Некоторые системы требуют дополнительных областей для запроса на вход, чтобы прочитать основной профиль пользователя. Стандартными областями для системы, совместимой с OpenID Connect, являются «электронная почта с открытым доступом».';
$string['issuerloginscopesoffline'] = 'Области, включенные в запрос на вход для автономного доступа.';
$string['issuerloginscopesoffline_help'] = 'Каждая система OAuth определяет свой способ запроса автономного доступа. Например. Microsoft требует дополнительной области «offline_access».';
$string['issuername'] = 'Название';
$string['issuername_help'] = 'Название эмитента. Может отображаться на странице входа в систему.';
$string['issuers'] = 'Эмитенты';
$string['issuersetup'] = 'Подробные инструкции по настройке общих служб OAuth 2';
$string['issuersetuptype'] = 'Подробные инструкции по настройке поставщика OAuth 2 {$a}';
$string['issuershowonloginpage'] = 'Показать на странице входа';
$string['issuershowonloginpage_help'] = 'Если включен плагин аутентификации OAuth 2, этот идентификатор входа будет указан на странице входа, чтобы пользователи могли войти в систему с учетными записями от этого эмитента.';
$string['loginissuer'] = 'Вход разрешен';
$string['notconfigured'] = 'Не настроено';
$string['notdiscovered'] = 'Не удалось обнаружить службу';
$string['notloginissuer'] = 'Вход не разрешен';
$string['pluginname'] = 'Службы OAuth 2';
$string['savechanges'] = 'Сохранить изменения';
$string['serviceshelp'] = 'Инструкции по настройке поставщика службы.';
$string['systemaccountconnected'] = 'Системная учетная запись подключена';
$string['systemaccountconnected_help'] = 'Системные учетные записи используются для обеспечения расширенной функциональности для плагинов.  Только для функций входа в систему они не требуются, но другие плагины, использующие службу OAuth, могут предлагать уменьшенный набор функций, если системная учетная запись не была подключена. Например,  без системной учетной записи репозитории не могут поддерживать «управляемые ссылки» для выполнения операций с файлами.';
$string['systemaccountnotconnected'] = 'Системная учетная запись не подключена';
$string['systemauthstatus'] = 'Системная учетная запись подключена';
$string['userfieldexternalfield'] = 'Имя внешнего поля';
$string['userfieldexternalfield_help'] = 'Имя поля, предоставленного внешней системой OAuth.';
$string['userfieldinternalfield'] = 'Имя внутреннего поля';
$string['userfieldinternalfield_help'] = 'Имя поля пользователя Moodle, которое должно отображаться из внешнего поля.';
$string['userfieldmappingdeleted'] = 'Сопоставлениее поля пользователя удалено';
