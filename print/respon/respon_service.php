<?php
$location_counter = "../data_service.txt";
			 $location_date = "../date.txt";
			 $itis = date ("d");
			 
			 // Hari baru?    
			$aday = join('', file($location_date));
			trim($aday);
		
			if("$aday"=="$itis"){
				//Cari hari ini
				$tcounter = join('', file($location_counter));
				trim($tcounter);
				//$tcounter++;
				
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
				//$tcounter++;
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
						include '../../config/database.php';
		$kode = 'B'.$antrian;
	    mysql_query("INSERT INTO total_antrian (id,nomor_antrian,status) VALUES ('','$kode','waiting')");
                        echo " <h1>No. B $antrian <br>Antrian Service</h1> ";
                        
		?>