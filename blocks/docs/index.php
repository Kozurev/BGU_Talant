<?php

require_once "../../config.php";
require_once "../../lib/custom/autoload.php";

?>


<form name="form" enctype="multipart/form-data" action="/blocks/docs/files.php" method="POST">
    <input type="hidden" name="action" value="upload" />

    <input type="number" name="file_type_id" placeholder="id типа загружаемого документа" />
    <input type="number" name="public" value="1" /><br/>


    <input type="file" name="file" />
    <input type="submit" value="Загрузить" />
</form>