<?php

//pdf.php

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf\DOMPDF();
$dompdf->stream("attachment.pdf", array("Attachment" => 0));
use Dompdf\Dompdf;

class Pdf extends Dompdf{
	public function __construct(){
		parent::__construct();
	}
}







?>