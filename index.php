<?php
$doc = new DOMDocument(); // инициализация DOM
$doc->loadHTMLFile("index.html"); // загрузка в DOM HTML файла

// создание шакпи переменных для таблицы 2 и 3
$cell012 = $cell021 = true;
$cell013 = $cell031 = false;
$cell014 = $cell041 = 1;
$cell015 = $cell051 = 0;
$cell016 = $cell061 = -1;
$cell017 = $cell071 = "1";
$cell018 = $cell081 = null;
$cell019 = $cell091 = "php";

// присвоение переменным элементов DOM, таблица 1
// перебор всех столбцов в первой строке, потом в следующей и т.д.
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 6; $j++) {
        ${'cell1' . $i . $j} = $doc->getElementById('1-' . $i . '-' . $j);

        // заполнение таблицы результатами вычислений
        if ($i === 1) {
        } else if (${'cell11' . $j}->nodeValue === '!A') {
            ${'cell1' . $i . $j}->nodeValue = (int) !${'cell1' . $i . '1'}->nodeValue;
        } else if (${'cell11' . $j}->nodeValue === 'A || B') {
            ${'cell1' . $i . $j}->nodeValue = (int) ((${'cell1' . $i . '1'}->nodeValue) || (${'cell1' . $i . '2'}->nodeValue));
        } else if (${'cell11' . $j}->nodeValue === 'A && B') {
            ${'cell1' . $i . $j}->nodeValue = (int) ((${'cell1' . $i . '1'}->nodeValue) && (${'cell1' . $i . '2'}->nodeValue));
        } else if (${'cell11' . $j}->nodeValue === 'A xor B') {
            ${'cell1' . $i . $j}->nodeValue = (int) ((${'cell1' . $i . '1'}->nodeValue) xor (${'cell1' . $i . '2'}->nodeValue));
        }
        // ...
    }
}
// ...

// присвоение переменным элементов DOM, для таблиц 2 и 3
// перебор всех столбцов в первой строке, потом в следующей и т.д.
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        ${'cell2' . $i . $j} = $doc->getElementById('2-' . $i . '-' . $j);
        ${'cell3' . $i . $j} = $doc->getElementById('3-' . $i . '-' . $j);

        // заполнение таблиц 2 и 3 результатами вычислений
        if ($i === 1 || $j === 1) {
        } else {
            ${'cell2' . $i . $j}->nodeValue = (int)(${'cell0' . '1' . $j} == ${'cell0' . $i . '1'});
            ${'cell3' . $i . $j}->nodeValue = (int)(${'cell0' . '1' . $j} === ${'cell0' . $i . '1'});
        }
        // ...
    }
}
// ...

// отрисовка DOM в браузере
echo $doc->saveHTML();
