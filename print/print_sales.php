<?php
session_start();

			 $location_counter = "data_sales.txt";
			 $location_date = "date.txt";
			 $itis = date ("d");
			 
			 // Hari baru?    
			$aday = join('', file($location_date));
			trim($aday);
		
			if("$aday"=="$itis"){
				//Cari hari ini
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
			}else{
				//hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, 0);
				fclose($fp);
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;
				//tulis hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);
				//tulis di date.txt
				$fp = fopen($location_date,"w");
				fputs($fp, $itis);
				fclose($fp);	
			}

			$panjang=strlen($tcounter);
			$antrian=$tcounter;
			
			for($i=0;$i<$panjang;$i++){
		?>
        		   		        
        <?php
			}
            $_SESSION['antrian'] = "<h1>No. A$antrian <br>Antrian Sales</h1> ";             
		?>




<?php 

include 'config/database.php';
include "config/fungsi_zona.php";

$var_magin_left = 0.1;
$printer = printer_open('EPSON TM-T88V Receipt');
printer_set_option($printer, PRINTER_MODE, "RAW");

//then the width
printer_set_option($printer,PRINTER_RESOLUTION_Y, 999);
printer_start_doc($printer);
printer_start_page($printer);

//perintah buat garis
$pen = printer_create_pen(PRINTER_PEN_SOLID, 8, "000000");
printer_select_pen($printer, $pen);

//gambar bmp epson
printer_draw_bmp(($printer), "C:\\xampp\htdocs\antrian-epson\print\Epson.bmp", 7, 11);

//garis 1
printer_draw_line($printer, $var_magin_left, 5, 700, 5);

//buat tulisan
$font = printer_create_font("Arial", 24, 10, PRINTER_FW_NORMAL, false, false, false, 0);
printer_select_font($printer, $font);
printer_draw_text($printer, "Sales Counter", 370, 19);

//garis 2
printer_draw_line($printer, $var_magin_left, 60, 700, 60);

//buat tulisan
$font = printer_create_font("Halvetica", 140, 60, 1000, false, false, false, 0);
printer_select_font($printer, $font);
printer_draw_text($printer, "A $antrian", 108, 70);

//buat tulisan waktu
$font = printer_create_font("Arial", 19, 10, PRINTER_FW_NORMAL, false, false, false, 0);
printer_select_font($printer, $font);
printer_draw_text($printer, $wib ,$var_magin_left, 250);

//garis 3
printer_draw_line($printer, $var_magin_left, 240, 700, 240);

//gambar bmp barcode
printer_draw_bmp(($printer), "C:\\xampp\htdocs\antrian-epson\print\SALES COUNTER.bmp", 55, 275);

//ukuran panjang kertas
$row +=400;
printer_draw_text($printer, ".", 0, $row);
                           
printer_delete_font($font);

printer_end_page($printer);
printer_end_doc($printer);

printer_start_doc($printer);
printer_start_page($printer);
printer_close($printer);


?>

