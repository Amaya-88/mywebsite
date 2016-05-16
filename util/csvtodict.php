<?php
	function csvToDict($file){
		$csv_array = array();
		$file_handle = fopen($file, "r");
			if(!feof($file_handle)){
				$headers = array();
				$headers = array_slice(fgetcsv($file_handle, 0, ";"),1);
				while (($line = fgetcsv($file_handle, 0, ";")) !== FALSE) {
					
					$csv_array[$line[0]] = getDictElem(array_slice($line, 1),$headers);
					
				}
			}else{
				throw new Error("empty file");
			}
			
		fclose($file_handle);

		return $csv_array;
	}
	
	
	function getDictElem($e_array, $headers){
		$i;
		$array_dict = array();

		for ($i=0;$i<count($headers);$i++){
			$array_dict[$headers[$i]] = $e_array[$i];
		}
		return $array_dict;
	}

?>