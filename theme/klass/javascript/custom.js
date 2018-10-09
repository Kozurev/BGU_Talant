$(function(){


    $("#app_form").on("click", "#equal", function(){
        var fields = ["surname", "surname1", "name", "name1", "patronymic", "patronymic1", "birthday",
                        "phone", "passport_number", "passport_author", "passport_date", "address"];

        if(!$(this).is(":checked"))  return false;

        $.each(fields, function(i, field){
            $("#"+field+"2").val($("#"+field+"1").val());
        });
    });


    $(".block_programs")
        //Загрузка формы редактирования программы
        .on("click", ".edit_program", function (e) {
            e.preventDefault();
            var id = $(this).data("id");

            $.ajax({
                type: "GET",
                url: "/blocks/programs/edit.php",
                data: {
                    action: "program_edit",
                    id: id
                },
                success: function(responce){
                    $(".block_programs").find(".programs").css("display", "none");
                    $(".block_programs").find(".card-text").append(responce);
                }
            });
        })
        //Удалеие программы
        .on("click", ".delete", function(e){
            e.preventDefault();
            var model = $(this).data("model_name");
            var id = $(this).data("id");
            deleteItem(id, model, refreshBlock, "programs");
        })
        //Скрытие формы и возврат исходного содержимого блока
        .on("click", ".cancel", function(e){
            e.preventDefault();
            $(".program_edit").remove();
            $(".block_programs").find(".programs").css("display", "block");
        })
        //Отправка формы
        .on("click", ".submit", function(e){
            e.preventDefault();
            var Form = $(".program_edit");
            var formData = new FormData(Form.get(0));

            $.ajax({
                type: "POST",
                url: "/blocks/programs/edit.php",
                contentType: false, // важно - убираем форматирование данных по умолчанию
                processData: false, // важно - убираем преобразование строк по умолчанию
                data: formData,
                success: function(responce){
                    //var Block = $(".block_programs").find(".card-text");
                    refreshBlock("programs");
                }
            });
        })
        //Клонирование "множественного" значения (связь программы с курсом)
        .on("click", ".clone_program_assignment", function(e){
            e.preventDefault();
            var NewSelect = $(".course_assignment").find(".row");
            NewSelect = NewSelect[0];
            NewSelect = $(NewSelect).clone();
            $(".course_assignment").append(NewSelect);
        })
        //Клонирование множественного значения
        .on("click", ".clone_period", function(e){
            e.preventDefault();
            $(".program_periods").append("<div class=\"row\">\n" +
                "                            <input type=\"hidden\" name=\"period_id[]\" value=\"\" />\n" +
                "                            <div class=\"col-md-2\">\n" +
                "                                <span>Дата начала</span><br/>\n" +
                "                                <input type=\"date\" class=\"form-control\" name=\"date_start[]\"/>\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-2\">\n" +
                "                                <span>Дата окончания</span><br/>\n" +
                "                                <input type=\"date\" class=\"form-control\" name=\"date_end[]\"/>\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-2\">\n" +
                "                                <span>Начало видимости</span><br/>\n" +
                "                                <input type=\"date\" class=\"form-control\" name=\"visible_start[]\"/>\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-2\">\n" +
                "                                <span>Окон-ие видимости</span><br/>\n" +
                "                                <input type=\"date\" class=\"form-control\" name=\"visible_end[]\"/>\n" +
                "                            </div>\n" +
                "                            <div class=\"col-md-1\">\n" +
                "                                <br/><a class=\"btn btn-red remove_program_assignment\">-</a>\n" +
                "                            </div>\n" +
                "                        </div>");
        })
        //Удаление "множественного" значения
        .on("click", ".remove_program_assignment", function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        });


    $(".block_docs")
        //Одобрение&отклонение поданых документов
        .on("click", ".doc_confirm", function(e){
            e.preventDefault();

            var link = $(this).prop("href");

            $.ajax({
                type: "GET",
                url: link,
                success: function(responce){
                    //var Block = $(".block_docs").find("card-text");
                    refreshBlock("docs");
                }
            });
        });



});


/**
 * Перезагрузка контента блока
 *
 * @param blockName - название блока
 */
function refreshBlock(blockName) {
    $.ajax({
        type: "GET",
        url: "/blocks/programs/edit.php",
        data: {
            action: "refresh_block",
            block: blockName
        },
        success: function(responce) {
            var Block = $(".block_" + blockName).find(".card-text");

            if( responce == "" )
                Block.parent().remove();
            else
                Block.html(responce);
        }
    });
}


/**
 * Удаление записи в БД
 *
 * @param model_id
 * @param name
 * @param func
 * @param params
 * @returns {boolean}
 */
function deleteItem(model_id, name, func, params) {
    if(!confirm("Вы действительно хотите удалить объект"))  return false;

    $.ajax({
        type: "GET",
        url: "/blocks/programs/edit.php",
        data: {
            action: "delete",
            id: model_id,
            model_name: name
        },
        success: function(responce){
            if(responce != "")  alert("Ошибка: " + responce);
            if(func != undefined)   func(params);
        }
    });
}