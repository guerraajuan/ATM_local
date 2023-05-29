
<?php
    $rut_op = '';
    $id_solicitud = '';
	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$operacion='';
	$n_operacion ='';
	$n_tarjeta ='';
	$monto_op ='';
    $cuotas_op ='';
    $nombre_op ='';

	if(isset($_REQUEST["rut_op"])) $rut_op = $_REQUEST["rut_op"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_tarjeta"])) $n_tarjeta = $_REQUEST["n_tarjeta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
    if(isset($_REQUEST["cuotas_op"])) $cuotas_op = $_REQUEST["cuotas_op"];
    if(isset($_REQUEST["nombre_op"])) $nombre_op = $_REQUEST["nombre_op"];


    ob_end_clean();
    header("Content-Encoding: None", true);
    require ('./util/libreria_pdf/fpdf/fpdf.php');
    class PDF extends FPDF
    {
    // Cabecera de página
    function Header(){
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,15,'COMPROBANTE DE TRANSACCION',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

        // // Pie de página
        // function Footer()
        // {
        //     // Posición: a 1,5 cm del final
        //     $this->SetY(-15);
        //     // Arial italic 8
        //     $this->SetFont('Arial','I',8);
        //     // Número de página
        //     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        // }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Transaccion:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$id_solicitud,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Fecha:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$fecha,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Fecha Contable:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$fecha_cont,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Hora:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$hora,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Cajero:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,trim($cajero),0,1);


$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Numero Operacion:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$n_operacion,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Rut Cliente:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$rut_op,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Nombre Cliente:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$nombre_op,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Numero Tarjeta:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$n_tarjeta,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(100,20,$operacion,0,1);


$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'MONTO:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$monto_op,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'CUOTAS:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$cuotas_op,0,1);



$pdf->Output('I','Comprobante_'.$n_operacion.'.pdf');

?>