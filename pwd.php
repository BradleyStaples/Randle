<?php
class randomPassword {

    public function __construct() {
        $this->assignData();
    }

    public function __deconstruct() {
    }

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name,$value) {
        $this->$name = $value;
	}

	private $min = 8;
    private $max = 8;
    private $template = "<strong>*</strong><strong>*</strong><strong>*</strong><strong>*</strong><strong>*</strong><strong>*</strong><strong>*</strong><strong>*</strong>";
    private $upperCaseOn = true;
    private $lowerCaseOn = true;
    private $numbersOn = true;
    private $symbolsOn = true;
    private $method = "random";
    private $vars = array("min", "max", "template", "upperCaseOn", "lowerCaseOn", "numbersOn", "symbolsOn", "method");

	private function assignData() {
        $v = $this->vars;
        $n = count($v);
        for ($i=0; $i < $n; $i++) {
            if ($this->checkVal("get",$v[$i]) !== "") {
		        $this->$v[$i] = $_GET[$v[$i]];
		    }
        }
	}

    private function checkVal($method,$var) {
		$returnValue = "";
		switch(strtolower($method)) {
			case "get" :
				if (isset($_GET[$var]) && $_GET[$var] != "") {$returnValue = $_GET[$var];}
				break;
			case "post" :
				if (isset($_POST[$var]) && $_POST[$var] != "") {$returnValue = $_POST[$var];}
				break;
			case "session" :
				if (isset($_SESSION[$var]) && $_SESSION[$var] != "") {$returnValue = $_SESSION[$var];}
				break;
			case "cookie" :
				if (isset($_COOKIE[$var]) && $_COOKIE[$var] != "") {$returnValue = $_COOKIE[$var];}
				break;
		};
		return $returnValue;
	}

    private function countChoices() {
        $choices = array();
        if ($this->upperCaseOn == true) {
            $choices[] = "upper";
        }
        if ($this->lowerCaseOn == true) {
            $choices[] = "lower";
        }
        if ($this->numbersOn == true) {
            $choices[] = "number";
        }
        if ($this->symbolsOn == true) {
            $choices[] = "symbol";
        }
        return $choices;
    }

    private function createArray($password) {
        $v = $this->vars;
        $n = count($v);
        $data = array();
        for ($i=0; $i<$n; $i++) {
            $data[$v[$i]] = $this->$v[$i];
        }
       $data["password"] = $password;
       return $data;
    }

	public function generate() {
        if ($this->method == "length") {
            $len = rand($this->min,$this->max);
            $cypher = "";
            for ($i=0; $i< $len; $i++) {
                $cypher .= "<strong>*</strong>";
            }
        } else {
            $cypher = $this->template;
            $len = strlen($cypher);
        }
        $choices = $this->countChoices();
        if (count($choices) < 1) {
            $cypher = "Error: no characters enabled";
        } else {
            $replacers = array("<strong>a</strong>", "<strong>A</strong>", "<strong>#</strong>", "<strong>@</strong>", "<strong>*</strong>");
            for ($i=0; $i<=4; $i++) {
                $repLen = strlen($replacers[$i]);
                $pos = strpos($cypher,$replacers[$i]);
                while ($pos !== false) {
                    switch($i) {
                        case 0:
                            $rep = $this->letter(false);
                            break;
                        case 1:
                            $rep = $this->letter(true);
                            break;
                        case 2:
                            $rep = $this->number();
                            break;
                        case 3:
                            $rep = $this->symbol();
                            break;
                        case 4:
                            $rep = $this->random(1,$choices);
                            break;

                    }
                    $cypher = substr($cypher,0,$pos) . $rep . substr($cypher,$pos + $repLen);
                    $pos = strpos($cypher,$replacers[$i]);
                }
            }

        }
		return $this->createArray($cypher);
	}

	private function letter($uppercase) {
		// return letter of alphabet, ascii 65-90
		$ascii = rand(65, 90);
		if ($uppercase) {
			return strtoupper(chr($ascii));
		} else {
			return strtolower(chr($ascii));
		};
	}
	
	private function number() {
		// return number 0-9
		$num = rand(0,9);
		return $num;
	}

	private function random($len,$choices) {
		$str = "";
        $allowed = array(false,true,true,true);
        $randMax = count($choices) - 1;
        if ($randMax >= 0) {
            for ($i=0; $i < $len; $i++) {
                $n = rand(0,$randMax);
                switch($choices[$n]) {
                    case "upper":
                        $str .= $this->letter(true);
                        break;
                    case "lower":
                        $str .= $this->letter(false);
                        break;
                    case "number":
                        $str .= $this->number();
                        break;
                    case "symbol":
                        $str .= $this->symbol();
                        break;
                }
            }
        }
		return $str;
	}

	private function symbol() {
		// return one of the symbols listed
		$symbols = "~!@#$%^&*()-=+?";
        $symbolsArray = str_split($symbols);
		$numSymbols = count($symbolsArray);
		$index = rand(0,$numSymbols-1);
		return $symbolsArray[$index];
	}

}
?>