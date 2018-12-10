$(function(){

    var root = $("#wwwroot").val();

    $("#app_form").on("click", "#equal", function(){
        var fields = ["surname", "surname1", "name", "name1", "patronymic", "patronymic1", "birthday",
                        "phone", "passport_number", "passport_author", "passport_date", "address"];

        if(!$(this).is(":checked"))  return;

        $.each(fields, function(i, field){
            $("#"+field+"2").val($("#"+field+"1").val());
        });

        var country1 = $("select[name=country_id1]");
        var country2 = $("select[name=country_id2]");
        var region1 = $("select[name=region_id1]");
        var region2 = $("select[name=region_id2]");
        var city1 = $("select[name=city_id1]");
        var city2 = $("select[name=city_id2]");

        region2.empty();
        var regions = region1.find("option");
        $.each(regions, function(index, option){
            region2.append($(option).clone());
        });

        city2.empty();
        var cities = city1.find("option");
        $.each(cities, function(index, option){
            city2.append($(option).clone());
        });

        country2.val( country1.val() );
        region2.val( region1.val() );
        city2.val( city1.val() );

    });


    $(".block_programs")
        //Загрузка формы редактирования программы
        .on("click", ".edit_program", function (e) {
            e.preventDefault();
            var id = $(this).data("id");

            $.ajax({
                type: "GET",
                url: root + "/blocks/programs/edit.php",
                data: {
                    action: "program_edit",
                    id: id
                },
                success: function(responce){
                    $(".block_programs").find(".programs").css("display", "none");
                    $(".block_programs").find(".levels").css("display", "none");
                    $(".block_programs").find(".card-text").append(responce);
                }
            });
        })
        .on("click", ".edit_level", function(e) {
            e.preventDefault();

            var id = $(this).data("id");

            $.ajax({
                type: "GET",
                url: root + "/blocks/programs/edit.php",
                data: {
                    action: "level_edit",
                    id: id
                },
                success: function(responce){
                    $(".block_programs").find(".programs").css("display", "none");
                    $(".block_programs").find(".levels").css("display", "none");
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
        .on("click", ".program_cancel", function(e){
            e.preventDefault();
            $(".program_edit").remove();
            $(".block_programs").find(".programs").css("display", "block");
            $(".block_programs").find(".levels").css("display", "block");
        })
        .on("click", ".level_cancel", function(e){
            e.preventDefault();
            $(".level_edit").remove();
            $(".block_programs").find(".programs").css("display", "block");
            $(".block_programs").find(".levels").css("display", "block");
        })
        //Отправка формы
        .on("click", ".program_submit", function(e){
            e.preventDefault();
            var Form = $(".program_edit");
            var formData = new FormData(Form.get(0));
            var root = $("#wwwroot").val();

            $.ajax({
                type: "POST",
                url: root + "/blocks/programs/edit.php",
                contentType: false, // важно - убираем форматирование данных по умолчанию
                processData: false, // важно - убираем преобразование строк по умолчанию
                data: formData,
                success: function(responce){
                    //var Block = $(".block_programs").find(".card-text");
                    refreshBlock("programs");
                }
            });
        })
        .on("click", ".level_submit", function(e){
            e.preventDefault();
            var Form = $(".level_edit");
            var formData = new FormData(Form.get(0));
            var root = $("#wwwroot").val();

            $.ajax({
                type: "POST",
                url: root + "/blocks/programs/edit.php",
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


        /**
         * Подгрузка регионов и городов по клику для формы заявки на олимпиаду
         */
        $("#olympiad_form")
            //Подгрузка регионов для страны
            .on("change", "#country_id", function(e){
                var country_id = $(this).val();
                var region = $("#region_id");
                var city = $("#city_id");

                if( country_id == "0" )
                {
                    region.empty();
                    region.append('<option value="0">Выберите из списка</option>');

                    city.empty();
                    city.append('<option value="0">Выберите из списка</option>');

                    return false;
                }


                var otherparams = {
                    region: region,
                    city: city
                };

                getRegions(country_id, function(regions, params){
                    params.region.empty();
                    params.region.append('<option value="0">Выберите из списка</option>');

                    params.city.empty();
                    params.city.append('<option value="0">Выберите из списка</option>');

                    $.each(regions, function(index, value){
                        var option = "<option value='"+value.id+"'>"+value.name+"</option>";
                        params.region.append( option );
                    });
                }, otherparams);
            })
            //Подгрузка городов для региона
            .on("change", "#region_id", function(e){
                var region_id = $(this).val();
                var city = $("#city_id");

                if( region_id == "0" )
                {
                    city.empty();
                    city.append('<option value="0">Выберите из списка</option>');
                    return false;
                }


                var otherparams = {
                    city: city
                };

                getCities(region_id, function(cities, params){
                    params.city.empty();
                    params.city.append('<option value="0">Выберите из списка</option>');

                    $.each(cities, function(index, value){
                        var option = "<option value='"+value.id+"'>"+value.name+"</option>";
                        params.city.append( option );
                    });
                }, otherparams);
            });


        /**
         * Подгрузка регионов и городов по клику для формы заявки на программу
         */
        $("#app_form")
            //Подгрузка регионов для страны
            .on("change", "#country_id", function(e){
                var country_id = $(this).val();
                var selector = $(this).data("selector");

                var region = $("select[name=region_id" + selector + "]");
                var city = $("select[name=city_id" + selector + "]");

                if( country_id == "0" )
                {
                    region.empty();
                    region.append('<option value="0">Выберите из списка</option>');

                    city.empty();
                    city.append('<option value="0">Выберите из списка</option>');

                    return false;
                }


                var otherparams = {
                    region: region,
                    city: city
                };

                getRegions(country_id, function(regions, params){
                    params.city.empty();
                    params.city.append('<option value="0">Выберите из списка</option>');

                    params.region.empty();
                    params.region.append('<option value="0">Выберите из списка</option>');

                    $.each(regions, function(index, value){
                        var option = "<option value='"+value.id+"'>"+value.name+"</option>";
                        params.region.append( option );
                    });
                }, otherparams);
            })
            //Подгрузка городов для региона
            .on("change", "#region_id", function(e){
                var region_id = $(this).val();
                var selector = $(this).data("selector");

                var city = $("input[name=city_id" + selector + "]");

                if( region_id == "0" )
                {
                    city.empty();
                    city.append('<option value="0">Выберите из списка</option>');
                    return false;
                }

                var otherparams = {
                    selector: selector
                };

                getCities(region_id, function(cities, params){
                    var citySelector = "select[name=city_id" + params.selector + "]";
                    var city = $(citySelector);

                    city.empty();
                    city.append('<option value="0">Выберите из списка</option>');

                    $.each(cities, function(index, value){
                        var option = "<option value='"+value.id+"'>"+value.name+"</option>";
                        city.append( option );
                    });
                }, otherparams);
            });

});


/**
 * Перезагрузка контента блока
 *
 * @param blockName - название блока
 */
function refreshBlock(blockName) {
    var root = $("#wwwroot").val();

    $.ajax({
        type: "GET",
        url: root + "/blocks/programs/edit.php",
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




/**
 * Получение списка стран
 *
 * @param func - исполняемая функция после выполнения запроса, принимающая в качестве аргумента полученные данные
 */
function getCountries( func ) {
    var root = $("#wwwroot").val();

    $.ajax({
        url: root + "/blocks/olympiads/app_form.php",
        type: "GET",
        data: { action: "get_countries_list" },
        dataType: "json",
        async: false,
        success: function(response){
            func(response);
        }
    });
}


/**
 * Получение списка регионов
 *
 * @param country_id - id тсраны, для которой подгружаются регионы; при значении равным нулю подгружаются абсолютно все записи
 * @param func - исполняемая функция после выполнения запроса, принимающая в качестве аргумента полученные данные
 * @param otherparams - дополнительные параметры, передаваемые в анонимную функцию
 */
function getRegions( country_id, func, otherparams ) {
    var root = $("#wwwroot").val();

    $.ajax({
        url: root + "/blocks/olympiads/app_form.php",
        type: "GET",
        data: { action: "get_regions_list", country_id: country_id },
        dataType: "json",
        async: false,
        success: function(response){
            func(response, otherparams);
        }
    });
}


/**
 * Получение списка городов
 *
 * @param region_id - id региона, для которого выбираются города; при значении 0 будут выбраны все 17 287 городов
 * @param func - исполняемая функция после выполнения запроса, принимающая в качестве аргумента полученные данные
 * @param otherparams - дополнительные параметры, передаваемые в анонимную функцию
 */
function getCities( region_id, func, otherparams ) {
    var root = $("#wwwroot").val();

    $.ajax({
        url: root + "/blocks/olympiads/app_form.php",
        type: "GET",
        data: { action: "get_cities_list", region_id: region_id },
        dataType: "json",
        async: false,
        success: function(response){
            func(response, otherparams);
        }
    });
}