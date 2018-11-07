<?php
/**
 * Шаблон квитанции об оплате
 *
 * @author: Bad Wolf
 * @date: 07.11.2018 9:53
 */

global $CFG;

define( "TICKET_IMG", 23 );

$Application =  Core_Array::getValue( $params, "application", null );
$Program =      Core_Array::getValue( $params, "program", null );
$Period =       Core_Array::getValue( $params, "period", null );
$User =         Core_Array::getValue( $params, "user", null );

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
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:8.0pt;
            margin-left:0cm;
            line-height:107%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;
            color:black;}
        .MsoChpDefault
        {font-family:"Calibri",sans-serif;}
        .MsoPapDefault
        {margin-bottom:8.0pt;
            line-height:107%;}
        @page WordSection1
        {size:841.9pt 595.3pt;
            margin:36.0pt 36.0pt 36.0pt 36.0pt;}
        div.WordSection1
        {page:WordSection1;}
        -->
    </style>

</head>

<body lang=RU>

<div class=WordSection1>

    <table class=TableGrid border=0 cellspacing=0 cellpadding=0 align=left
           width=725 style='width:543.6pt;border-collapse:collapse;margin-left:6.75pt;
 margin-right:6.75pt'>
        <tr style='height:77.6pt'>
            <td width=170 rowspan=7 valign=top style='width:127.6pt;border:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:77.6pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.15pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Извещение</span></b></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:14.4pt;
  margin-left:9.5pt;line-height:normal'><img width=137 height=137
                                             id="Picture 179" src="<?=$CFG->wwwroot?>/blocks/docs/templates/ticket/qr.jpg"></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.45pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Кассир</span></b></p>
            </td>
            <td width=555 colspan=3 valign=top style='width:416.0pt;border:solid black 1.0pt;
  border-left:none;padding:.8pt 5.75pt 0cm 1.75pt;height:77.6pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.75pt;margin-left:9.95pt;text-align:center;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>НИУ «БелГУ»</span></b></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.35pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>ИНН 3123035312;
  КПП 312301001; ОКТМО 14701000001;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.75pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>р/с №
  40503810207004000002  в Белгородском отделении №8592 ПАО Сбербанк;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.5pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>БИК 041403633;
  кор/счет  30101810100000000633;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:1.0pt;margin-left:9.2pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>КБК
  07430201010010000130 за обучение</span></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:.85pt;
  margin-left:7.1pt;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Times New Roman",serif'>ФИО обучающегося (-ейся)</span></b></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:7.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>по договору 
  №    </span></b></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=11 rowspan=6 valign=top style='width:7.9pt;border:none;border-bottom:
  solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
            </td>
            <td width=337 valign=top style='width:252.55pt;border:solid black 1.0pt;
  border-top:none;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.55pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Назначение
  платежа</span></p>
            </td>
            <td width=207 valign=top style='width:155.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.6pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Сумма</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=337 valign=top style='width:252.55pt;border:solid black 1.0pt;
  border-top:none;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:1.9pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>за
  обучение на под.курсах 2018/2019 уч. год</span></b></p>
            </td>
            <td width=207 valign=top style='width:155.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=EN-US>10000</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>ФИО плательщика:
  </span></b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Козырев
  Егор Алексеевич</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Адрес
  плательщика: </span></b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Украина,
  луганская обл., г. Северодонецк ул. Ломоносова д. 15 кв. 45</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
            </td>
        </tr>
        <tr style='height:22.15pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:22.15pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Подпись
  плательщика                                                                    Дата</span></p>
            </td>
        </tr>
        <tr style='height:77.6pt'>
            <td width=170 rowspan=7 valign=top style='width:127.6pt;border:solid black 1.0pt;
  border-top:none;padding:.8pt 5.75pt 0cm 1.75pt;height:77.6pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:120.75pt;margin-left:3.0pt;text-align:center;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Квитанция</span></b></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.45pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Кассир</span></b></p>
            </td>
            <td width=555 colspan=3 valign=top style='width:416.0pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:77.6pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.75pt;margin-left:9.95pt;text-align:center;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>НИУ «БелГУ»</span></b></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.35pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>ИНН 3123035312;
  КПП 312301001; ОКТМО 14701000001;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.75pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>р/с №
  40503810207004000002  в Белгородском отделении №8592 ПАО Сбербанк;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:.85pt;margin-left:8.5pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>БИК 041403633;
  кор/счет  30101810100000000633;</span></p>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:1.0pt;margin-left:9.2pt;text-align:center;line-height:normal'><span
                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>КБК
  07430201010010000130 за обучение</span></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:.85pt;
  margin-left:7.1pt;line-height:normal'><b><span style='font-size:10.0pt;
  font-family:"Times New Roman",serif'>ФИО обучающегося (-ейся)</span></b></p>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:7.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>по договору 
  №    </span></b></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=11 rowspan=6 valign=top style='width:7.9pt;border:none;border-bottom:
  solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
            </td>
            <td width=337 valign=top style='width:252.55pt;border:solid black 1.0pt;
  border-top:none;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.55pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Назначение
  платежа</span></p>
            </td>
            <td width=207 valign=top style='width:155.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:3.6pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Сумма</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=337 valign=top style='width:252.55pt;border:solid black 1.0pt;
  border-top:none;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-top:0cm;margin-right:0cm;
  margin-bottom:0cm;margin-left:1.9pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>за
  обучение на под.курсах 2018/2019 уч. год</span></b></p>
            </td>
            <td width=207 valign=top style='width:155.55pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=EN-US>10000</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>ФИО плательщика:
  </span></b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Козырев
  Егор Алексеевич</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
  margin-left:.1pt;margin-bottom:.0001pt;line-height:normal'><b><span
                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Адрес
  плательщика: </span></b><span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Украина,
  луганская обл., г. Северодонецк ул. Ломоносова д. 15 кв. 45</span></p>
            </td>
        </tr>
        <tr style='height:11.05pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border:none;
  border-right:solid black 1.0pt;padding:.8pt 5.75pt 0cm 1.75pt;height:11.05pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>&nbsp;</p>
            </td>
        </tr>
        <tr style='height:21.35pt'>
            <td width=544 colspan=2 valign=top style='width:408.1pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:.8pt 5.75pt 0cm 1.75pt;height:21.35pt'>
                <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'> <span style='font-size:10.0pt;font-family:"Times New Roman",serif'>Подпись
  плательщика                                                                    Дата</span></p>
            </td>
        </tr>
    </table>

    <p class=MsoNormal style='margin-top:0cm;margin-right:523.3pt;margin-bottom:
0cm;margin-left:0cm;margin-bottom:.0001pt'>&nbsp;</p>

    <p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>