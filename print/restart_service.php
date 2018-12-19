<?php
session_start();

			 $location_counter = "data_service.txt";
			 $location_counter1 = "data_pengambilan.txt";
			 $location_counter2 = "data_sales.txt";
			 $location_date = "date.txt";
			 $itis = date ("d");
			 
			 // Hari baru?    
			$aday = join('', file($location_date));
			trim($aday);
		
			if("$aday"=="$itis"){
				//Cari hari ini
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter=0;

				$tcounter1 = join('', file($location_counter1));
				trim($tcounter);
				$tcounter1=0;

				$tcounter2 = join('', file($location_counter2));
				trim($tcounter);
				$tcounter2=0;
				
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);

				$fp1 = fopen($location_counter1,"w");
				fputs($fp1, $tcounter1);
				fclose($fp1);

				$fp2 = fopen($location_counter2,"w");
				fputs($fp2, $tcounter2);
				fclose($fp2);


			}else{
				//hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, 0);
				fclose($fp);
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				$tcounter++;

				$fp1 = fopen($location_counter1,"w");
				fputs($fp1, 0);
				fclose($fp1);
				$tcounter1 = join('', file($location_counter1));
				trim($tcounter1);
				$tcounter1++;

				$fp2 = fopen($location_counter2,"w");
				fputs($fp2, 0);
				fclose($fp2);
				$tcounter2 = join('', file($location_counter2));
				trim($tcounter2);
				$tcounter2++;

				//tulis hari baru
				$fp = fopen($location_counter,"w");
				fputs($fp, $tcounter);
				fclose($fp);

				$fp1 = fopen($location_counter1,"w");
				fputs($fp1, $tcounter1);
				fclose($fp1);

				$fp2 = fopen($location_counter2,"w");
				fputs($fp2, $tcounter2);
				fclose($fp2);

				//tulis di date.txt
				$fp = fopen($location_date,"w");
				fputs($fp, $itis);
				fclose($fp);	

				$fp1 = fopen($location_date1,"w");
				fputs($fp1, $itis);
				fclose($fp1);

				$fp2 = fopen($location_date2,"w");
				fputs($fp2, $itis);
				fclose($fp2);
			}

			$panjang=strlen($tcounter);
			$antrian=$tcounter;


header("location:../system.php?link=menu-antrian-sales");

?>
