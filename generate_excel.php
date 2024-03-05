<?php
// Include the PHPExcel library
require 'modules/PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Table Data")
                             ->setSubject("Table Data")
                             ->setDescription("Table Data");

// Add data to the worksheet
$worksheet = $objPHPExcel->getActiveSheet();
$worksheet->setCellValue('A1', 'Артикул');
$worksheet->setCellValue('B1', 'Название');
$worksheet->setCellValue('C1', 'Цена основная');
$worksheet->setCellValue('D1', 'Цена внутряняя');
$worksheet->setCellValue('E1', 'Цена внешняя');

$row = 2; // Start from row 2
while ($row_data = $sth->fetch(PDO::FETCH_ASSOC)) {
    $worksheet->setCellValue('A' . $row, $row_data['ANUMB']);
    $worksheet->setCellValue('B' . $row, $row_data['ANAME']);
    $worksheet->setCellValue('C' . $row, $row_data['CLPRV']);
    $worksheet->setCellValue('D' . $row, $row_data['CLPR1']);
    $worksheet->setCellValue('E' . $row, $row_data['CLPR2']);
    $row++;
}

// Set header for Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="table_data.xlsx"');
header('Cache-Control: max-age=0');

// Save Excel file to output
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Exit PHP script
exit;

?>
