<?php
// Подключение библиотеки PHPExcel
require '/modules/PHPExcel/Classes/PHPExcel.php';

// Создание нового объекта PHPExcel
$objPHPExcel = new PHPExcel();

// Получение данных из HTML-таблицы
// Примерно так, как вы это делаете для вывода на странице

// Заполнение данных в Excel-файл
$row = 1;
foreach ($data as $rowData) {
    $col = 0;
    foreach ($rowData as $cellData) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $cellData);
        $col++;
    }
    $row++;
}

// Установка заголовков
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="filename.xlsx"');
header('Cache-Control: max-age=0');

// Создание объекта Writer
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Выход из скрипта
exit;
?>
