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
$fullname1 = $Application->getSurname1( 1 ) . " " . $Application->getName1( 1 ) . " " . $Application->getPatronymic1( 1 );
$fullname2 = $Application->getSurname( 1 ) . " " . $Application->getName( 1 ) . " " . $Application->getPatronymic( 1 );

/**
 * Дата рождения и кол-во полных лет
 */
//$birthday = date( "m.d.Y", $User->birthday );

$current["year"] = intval( date( "Y" ) );
$current["month"] = intval( date( "m" ) );
$current["day"] = intval( date( "d" ) );

$addressFormat = "{country}, {region}, {city}, {address}";

$birth = new DateTime( date( "Y-m-d", $User->birthday ) );
$today = new DateTime();
$fullYears = $birth->diff( $today );
$fullYears = $fullYears->format( '%y' );

$birthday = date( "d.m.Y", $User->birthday );

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
    <meta http-equiv=Content-Type content="text/html;">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <style>
        <!--
        /* Font Definitions */
        @font-face
        {font-family:Wingdings;
            panose-1:5 0 0 0 0 0 0 0 0 0;}
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
            line-height:107%;
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
            line-height:107%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        span.a
        {mso-style-name:"Текст Знак";
            mso-style-link:Текст;
            font-family:Consolas;}
        @page WordSection1
        {size:595.3pt 841.9pt;
            margin:2.0cm 66.75pt 2.0cm 66.7pt;}
        div.WordSection1
        {page:WordSection1;}
        /* List Definitions */
        ol
        {margin-bottom:0cm;}
        ul
        {margin-bottom:0cm;}
        -->
    </style>

</head>

<body lang=RU>

<div class=WordSection1>

<!--    <p class=MsoPlainText style='margin-left:262.25pt;text-align:justify'><span-->
<!--            style='font-size:12.0pt;font-family:"Times New Roman",serif'>К Положению о-->
<!--предоставлении образовательных услуг в сфере дополнительного образования-->
<!--(реализации дополнительных общеобразовательных программ)</span></p>-->

    <p class=MsoPlainText style='margin-left:304.8pt'><span style='font-size:12.0pt;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='margin-left:9.0cm;text-align:center'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>Ректору НИУ
«БелГУ»</span></p>

    <p class=MsoPlainText align=center style='margin-left:9.0cm;text-align:center'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>Полухину О.Н.</span></p>

    <p class=MsoPlainText align=center style='margin-left:9.0cm;text-align:center'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>от <?=$Application->getSurname1( 1 ) . "<br/>" . $Application->getName1( 1 ) . " " . $Application->getPatronymic1( 1 );?></span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='margin-left:304.8pt;text-align:center'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText align=center style='text-align:center'><b><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'>Заявление</span></b></p>

    <p class=MsoPlainText align=center style='text-align:center'><b><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></b></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify;
text-indent:35.4pt;line-height:115%'><span style='font-size:12.0pt;line-height:
115%;font-family:"Times New Roman",serif'>Прошу зачислить меня, <?=$fullname1?> на обучение по дополнительной общеобразовательной (общеразвивающей) программе «<?=$Program->getTitle()?>»
            в ФГАОУ ВО «Белгородский государственный национальный
исследовательский университет» в срок с «<?=$periodStart["day"]?>» <?=$periodStart["month"]?> <?=$periodStart["year"]?> г.
            по «<?=$periodEnd["day"]?>» <?=$periodEnd["month"]?> <?=$periodEnd["year"]?> г.</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify;
line-height:115%'><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify;
line-height:115%'><b><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>О себе сообщаю</span></b><b><span lang=EN-US
                                                           style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>:
</span></b></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><span lang=EN-US style='font-size:12.0pt;line-height:
115%;font-family:"Times New Roman",serif'>1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Дата
рождения <?=$birthday?> г., полных лет <?=$fullYears?></span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><span lang=EN-US style='font-size:12.0pt;line-height:
115%;font-family:"Times New Roman",serif'>2.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Место
работы _____________________________________________________________</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:212.4pt;margin-bottom:.0001pt;text-align:justify;line-height:
115%'><sup><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>(официальное
наименование организации)</span></sup></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><span style='font-size:12.0pt;line-height:115%;
font-family:"Times New Roman",serif'>3.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Должность
________________________________________________________________</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><span style='font-size:12.0pt;line-height:115%;
font-family:"Times New Roman",serif'>4.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Адрес проживания</span><span lang=EN-US style='font-size:12.0pt;line-height:115%;
font-family:"Times New Roman",serif'>: <?=$Application->getFullAddress($addressFormat, 1)?>.</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><span lang=EN-US style='font-size:12.0pt;line-height:
115%;font-family:"Times New Roman",serif'>5.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Контактные
телефоны</span><span lang=EN-US style='font-size:12.0pt;line-height:115%;
font-family:"Times New Roman",serif'>: <?=$Application->getPhone(1)?></span></p>

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

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:18.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:115%'><o:p>&nbsp;</o:p></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify;
line-height:115%'><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>Я, <?=$fullname2?>, в соответствии с требованиями
статьи 9 ФЗ от 27.07.2006 №152-ФЗ «О персональных данных» даю согласие НИУ «<span
                    class=SpellE>БелГУ</span>» на обработку, в том числе автоматизированную, с
целью учета договоров на оказание платных образовательных услуг и учета
субъектов договорных отношений, содержащихся в настоящем заявлении и договоре
моих персональных данных, включая сбор, систематизацию, накопление, хранение,
уточнение (обновление, изменение), использование, обезличивание, блокирование,
уничтожение. Действия согласия начинается со дня его подписания и соответствует
сроку хранения персональных данных; согласие может быть отозвано путем подачи
соответствующего заявления в НИУ «<span class=SpellE>БелГУ</span>».</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;<o:p></o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'><o:p>&nbsp;</o:p></span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><o:p>&nbsp;</o:p></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>

    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><b><span
                style='font-size:12.0pt;font-family:"Times New Roman",serif'>Приложение к
заявлению</span></b><b><span lang=EN-US style='font-size:12.0pt;font-family:
"Times New Roman",serif'>: </span></b></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:24.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt'><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>-<span
                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>копия
паспорта гражданина или иного документа, удовлетворяющего личность;</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:24.0pt;margin-bottom:.0001pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
<br/>
    <p class=MsoPlainText style='margin-right:-5.95pt;text-align:justify'><span
            style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=date("d.m.Y")?>    
                                                           ______________________</span></p>

    <p class=MsoPlainText style='margin-top:0cm;margin-right:-5.95pt;margin-bottom:
0cm;margin-left:35.4pt;margin-bottom:.0001pt;text-align:justify;line-height:
115%'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>     
<!--sup>(дата)                                                                                                                                             (подпись)</sup--></span></p>

</div>

</body>

</html>
