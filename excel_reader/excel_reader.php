<?php
// Test CVS
require_once(EXCEL_READER_PATH . 'reader.php');

class ExcelReader {
	protected $reader;
	public $data;
	
	public function __construct() {
		$this->reader = new Spreadsheet_Excel_Reader();
		$this->reader->setOutputEncoding('CP1251'); // Set output Encoding
	}
	
	public function read($filepath) {
		$this->reader->read($filepath);
		error_reporting(E_ALL ^ E_NOTICE);
		$this->data = array(array());
		for ($i = 1; $i <= $this->reader->sheets[0]['numRows']; $i++) {
			for ($j = 1; $j <= $this->reader->sheets[0]['numCols']; $j++) {
				$this->data[$i-1][$j-1] = $this->reader->sheets[0]['cells'][$i][$j];
			}
		}
	}
	
	public function getData() {
		return $this->data;
			}

}
?>
