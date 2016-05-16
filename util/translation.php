<?php include "csvtodict.php"; ?>

<?php
class Translation {
	private $translation_dict;	
	private $current_idiom;
	
	public function Translation($idiom,$url_data){
		if($idiom)
			$this->{"current_idiom"} = $idiom;
		else {
			$this->{"current_idiom"} = "en";
		}
		$this->{"translation_dict"} = array();
		$this->{"translation_dict"} = csvToDict($url_data);
	}
	
	public function setIdiom($idiom){
		$current_idiom = $idiom;
	}
	public function getIdiom(){
		return $current_idiom;
	}
	
	public function getTranslation($key, $idiom=null)
	{
		if($idiom==null)
			$idiom = $this->{"current_idiom"};

		if(count($this->{"translation_dict"}[$key])==0)
			throw new ErrorException("Wrong key");

		if(!$this->{"translation_dict"}[$key][$idiom])
			$idiom = "en";
		
		return $this->{"translation_dict"}[$key][$idiom];
	}
}
?>
