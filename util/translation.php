<?php include "csvtodict.php"; ?>
<?php include "enviroment.php"; ?>

<?php
class Translation {
	private $translation_dict;	
	private $current_language;
    private $TRANSLATION_FILE = "data/translationamayaweb.csv";
	
	public function Translation($url_data = null){

		$this->{"translation_dict"} = array();
		$this->{"translation_dict"} = csvToDict($url_data ? $url_data : $this->{"TRANSLATION_FILE"});

        $this->{"current_language"} = "en";
        if(isset($_GET['l'])) {
			 $this->{"current_language"} = $_POST['l'];
        } else {
            if(isDev()) {
                $system_language = $this->getSystemLanguage();   
                if(in_array($system_language, self::getAvailableIdioms())) {
                     $this->{"current_language"} = $system_language;
                }
            }

        }

	}
	
	public function setLanguage($idiom){
		$this->{"current_language"} = $idiom;
	}
	public function getLanguage(){
		return $this->{"current_language"};
	}

    private function getSystemLanguage() {
        if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
           $system_language = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        } else {
            $system_language = Locale::getDefault();
        }
        preg_match("/^([a-zA-Z]+)_[a-zA-Z]+$/" , $system_language, $matches);
        $system_language = $matches[1];
        return $system_language;
    }
	
	public function getTranslation($key, $idiom=null)
	{
		if($idiom==null)
			$idiom = $this->{"current_language"};
		if(!$this->{"translation_dict"}[$key] || count($this->{"translation_dict"}[$key])==0) {
            throw new ErrorException("Wrong key");
        }

		if(!$this->{"translation_dict"}[$key][$idiom])
			$idiom = "en";
		
		return $this->{"translation_dict"}[$key][$idiom];
	}

    private function getAvailableIdioms() {
        return array('en', 'es', 'de');
    }
}
?>
