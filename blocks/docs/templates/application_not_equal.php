<?php
/**
 * Шаблон заявления для записи на программу при совпадающих данных заказчика и потребителя
 *
 * @author Bad Wolf
 * @date 24.09.2018 11:06
 */

$Application =  Core_Array::getValue( $params, "application", null );
$Program =      Core_Array::getValue( $params, "program", null );
$Period =       Core_Array::getValue( $params, "period", null );
$User =         Core_Array::getValue( $params, "user", null );

/**
 * ФИО пользователя в именительном и родительном падеже
 */
//$fullname[0][0] = $User->lastname . " " . $User->firstname;
//if( $User->patronimyc )    $fullname[0][0] .= " " . $User->patronimyc;

$fullname[0][0] = $Application->getSurname( 2 ) . " " . $Application->getName( 2 ) . " " . $Application->getPatronymic( 2 );
$fullname[0][1] = $Application->getSurname1( 2 ) . " " . $Application->getName1( 2 ) . " " . $Application->getPatronymic1( 2 );
$fullname[1][0] = $Application->getSurname( 1 ) . " " . $Application->getName( 1 ) . " " . $Application->getPatronymic( 1 );
$fullname[1][1] = $Application->getSurname1( 1 ) . " " . $Application->getName1( 1 ) . " " . $Application->getPatronymic1( 1 );


/**
 * Дата рождения и кол-во полных лет
 */
$birthday[0] = date( "m.d.Y", strtotime($Application->getBirthday( 1 )) );
$birthday[1] = date( "m.d.Y", strtotime($Application->getBirthday( 2 )) );

$current["year"] = intval( date( "Y" ) );
$current["month"] = intval( date( "m" ) );
$current["day"] = intval( date( "d" ) );

$today = new DateTime();
$birth[0] = new DateTime(  $Application->getBirthday( 1 ) );
$birth[1] = new DateTime(  $Application->getBirthday( 2 ) );

$fullYears[0] = $birth[0]->diff( $today );
$fullYears[1] = $birth[1]->diff( $today );

$fullYears[0] = $fullYears[0]->format( '%y' );
$fullYears[1] = $fullYears[1]->format( '%y' );

$addressFormat = "{country}, {region}, {city}, {address}";

//$user[0]["year"] = intval( date( "Y", strtotime($birthday[0]) ) );
//$user[0]["month"] = intval( date( "m", strtotime($birthday[0]) ) );
//$user[0]["day"] = intval( date( "d", strtotime($birthday[0]) ) );
//
//$user[1]["year"] = intval( date( "Y", strtotime($birthday[1]) ) );
//$user[1]["month"] = intval( date( "m", strtotime($birthday[1]) ) );
//$user[1]["day"] = intval( date( "d", strtotime($birthday[1]) ) );
//
//
//$fullYears[0] = $current["year"] - $user[0]["year"];
//$fullYears[1] = $current["year"] - $user[1]["year"];
//
//if( $current["month"] < $user[0]["month"] )    $fullYears[0]--;
//elseif( $current["month"] == $user[0]["month"] && $current["day"] < $user[0]["day"] ) $fullYears[0]--;
//
//if( $current["month"] < $user[1]["month"] )    $fullYears[1]--;
//elseif( $current["month"] == $user[1]["month"] && $current["day"] < $user[1]["day"] ) $fullYears[1]--;



/**
 * Сроки проведения программы
 */
$periodStart = explode( "-", $Period->getDateStart() );
$periodEnd = explode( "-", $Period->getDateEnd() );

$mounthes = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];

$periodStart["day"] = $periodStart[2];
$periodEnd["day"] = $periodEnd[2];

$periodStart["year"] = $periodStart[0];
$periodEnd["year"] = $periodEnd[0];

$periodStart["month"] = $mounthes[ intval( $periodStart[1] ) - 1 ];
$periodEnd["month"] = $mounthes[ intval( $periodEnd[1] ) - 1 ];

?>

<html>

<head>
    <meta http-equiv=Content-Type content="text/html">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <style>
        <!--
        /* Font Definitions */
        @font-face
        {font-family:"Cambria Math";
            panose-1:2 4 5 3 5 4 6 3 2 4;}
        @font-face
        {font-family:Calibri;
            panose-1:2 15 5 2 2 2 4 3 2 4;}
        @font-face
        {font-family:Consolas;
            panose-1:2 11 6 9 2 2 4 3 2 4;}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:8.0pt;
            margin-left:0cm;
            line-height:105%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        p.MsoPlainText, li.MsoPlainText, div.MsoPlainText
        {mso-style-link:"Текст Знак";
            margin:0cm;
            margin-bottom:.0001pt;
            font-size:10.5pt;
            font-family:Consolas;}
        p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:8.0pt;
            margin-left:35.4pt;
            line-height:105%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        p.msonormal0, li.msonormal0, div.msonormal0
        {mso-style-name:msonormal;
            margin-right:0cm;
            margin-left:0cm;
            font-size:12.0pt;
            font-family:"Times New Roman",serif;}
        span.a
        {mso-style-name:"Текст Знак";
            mso-style-link:Текст;
            font-family:Consolas;}
        .MsoChpDefault
        {font-size:10.0pt;}
        @page WordSection1
        {size:595.3pt 841.9pt;
            margin:2.0cm 66.75pt 2.0cm 66.7pt;}
        div.WordSection1
        {page:WordSection1;}
        -->
    </style>

</head>

<body lang=RU>

<div class=WordSection1>

<!--    <p class=MsoPlainText style='margin-left:304.8pt;text-align:justify'><span-->
<!--            style='font-size:11.0pt;font-family:"Times New Roman",serif'>К Положению о-->
<!--предоставлении образовательных услуг в сфере дополнительного образования-->
<!--(реализации дополнительных общеобразовательных программ)</span></p>-->

    <p class=MsoPlainText style='margin-left:304.8pt'><span style='font-size:11.0pt;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>Ректору НИУ
«БелГУ»</span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>проф. О.Н. Полухину</span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>от <?=$Application->getSurname1( 2 ) . "<br/>" . $Application->getName1( 2 ) . " " . $Application->getPatronymic1( 2 );?></span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='text-align:center'><b><span
                style='font-size:11.0pt;font-family:"Times New Roman",serif'>Заявление</span></b></p>

    <p class=MsoPlainText align=center style='text-align:center'><b><span
                style='font-size:11.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></b></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify;
text-indent:35.4pt'><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Прошу
зачислить мою (моего) дочь (сына), <?=$fullname[1][1]?> на обучение по
дополнительной общеобразовательной (общеразвивающей) программе «<?=$Program->getTitle()?>» в ФГАО ВПО
«Белгородский государственный национальный исследовательский университет» в
срок с «<?=$periodStart["day"]?>» <?=$periodStart["month"]?> <?=$periodStart["year"]?> г. по «<?=$periodEnd["day"]?>» <?=$periodEnd["month"]?> <?=$periodEnd["year"]?> г. </span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt'><span style='font-size:11.0pt;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt'><b><span style='font-size:
11.0pt;font-family:"Times New Roman",serif'>Сообщаю о сыне (дочери) следующие
сведения:</span></b></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>1.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Дата
рождения:<b> </b><?=$birthday[0]?> г., полных лет <?=$fullYears[0]?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>2.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Адрес
проживания: <?=$Application->getFullAddress($addressFormat, 1)?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>3.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Контактные
телефоны: <?=$Application->getPhone(1)?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>4.<span
                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>Электронная почта
(</span><span lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'>e</span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>-</span><span
            lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'>mail</span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>): </span><span
            lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'><?=$User->email?></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt'><span style='font-size:11.0pt;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <!--p class=MsoPlainText style='margin-right:-5.95pt'><b><span style='font-size:
11.0pt;font-family:"Times New Roman",serif'>О себе сообщаю: </span></b></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>1.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Дата
рождения <?=$birthday[1]?> г., полных лет <?=$fullYears[1]?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>2.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Место
работы ____________________________________________________________________</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt'><sup><span style='font-size:
11.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
(официальное название организации)</span></sup></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>3.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Должность
_______________________________________________________________________</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt'><span style='font-size:11.0pt;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>4.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Адрес
проживания: <?=$Application->getFullAddress($addressFormat, 2)?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>5.</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:11.0pt;font-family:"Times New Roman",serif'>Контактные
телефоны: <?=$Application->getPhone(2)?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-indent:-18.0pt'><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>4.<span
                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>Электронная почта
(</span><span lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'>e</span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>-</span><span
            lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'>mail</span><span
            style='font-size:11.0pt;font-family:"Times New Roman",serif'>): </span><span
            lang=EN-US style='font-size:11.0pt;font-family:"Times New Roman",serif'>________________________________________________________</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p-->

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>Я, <?=$fullname[0][0]?>, в соответствии с требованиями статьи 9 ФЗ от 27.07.2006 №152-ФЗ «О
персональных данных» даю согласие НИУ «БелГУ» на обработку, в том числе
автоматизированную, с целью учета договоров на оказание платных образовательных
услуг и учета субъектов договорных отношений, содержащихся в настоящем
заявлении и договоре моих персональных данных, включая сбор, систематизацию,
накопление, хранение, уточнение (обновление, изменение), использование,
обезличивание, блокирование, уничтожение. Действия согласия начинается со дня
его подписания и соответствует сроку хранения персональных данных; согласие
может быть отозвано путем подачи соответствующего заявления в НИУ «БелГУ».</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><b><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'>Приложение к
заявлению: </span></b></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:24.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt'><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>-</span><span
            style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>копия паспорта обучающегося или иного документа, удостоверяющего лич-ность,</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:24.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt'><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>-</span><span
                style='font-size:7.0pt;font-family:"Times New Roman",serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>копия паспорта гражданина или иного документа, удостоверяющего личность.</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:24.0pt;margin-bottom:.0001pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
<br/>
<!--    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span-->
<!--            style='font-size:12.0pt;font-family:"Times New Roman",serif'>--><?//=date("d.m.Y")?><!--</span></p>-->
    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=date("d.m.Y")?>    
                                                                     ______________________</span></p>



</div>

</body>

</html>