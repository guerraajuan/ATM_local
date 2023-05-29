
<?php
    function rut_format( $rut ) {
        return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
    }

    $rut = '';
    $dv = '';
    $id_solicitud = '';

    $fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$n_operacion='';
	$n_cuenta='';
	$operacion='';
	$max_giro='';
	$disponible='';
	$saldo_total='';
    $co_cta='';
    $monto_op='';
    $giros_realizados='';
    $intereses='';
    $reajuste='';

	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
	if(isset($_REQUEST["max_giro"])) $max_giro = $_REQUEST["max_giro"];
    if(isset($_REQUEST["disponible"])) $disponible = $_REQUEST["disponible"];
    if(isset($_REQUEST["saldo_total"])) $saldo_total = $_REQUEST["saldo_total"];
    if(isset($_REQUEST["giros_realizados"])) $giros_realizados = $_REQUEST["giros_realizados"];
    if(isset($_REQUEST["intereses"])) $intereses = $_REQUEST["intereses"];
    if(isset($_REQUEST["reajuste"])) $reajuste = $_REQUEST["reajuste"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];

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
$pdf->Cell(0,10,rut_format($rut.$dv),0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'Numero Cuenta:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$n_cuenta,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(100,20,$operacion,0,1);

$pdf->SetFont('Times','B',14);
$pdf->Cell(10,10,'SALDOS',0,1);
//$pdf->Line(20, 138, 210-20, 138);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'MONTO:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$monto_op,0,1);


$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'MAXIMO DE GIRO:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$max_giro,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'DISPONIBLE:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$disponible,0,1);

$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,10,'SALDO TOTAL:',0,0);
$pdf->SetFont('Times','',12);
$pdf->SetX(90);
$pdf->Cell(0,10,$saldo_total,0,1);

if($co_cta == 'AD'){
    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(10,10,'GIROS REALIZADOS:',0,0);
    $pdf->SetFont('Times','',12);
    $pdf->SetX(90);
    $pdf->Cell(0,10,$giros_realizados,0,1);

    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(10,10,'INTERESES:',0,0);
    $pdf->SetFont('Times','',12);
    $pdf->SetX(90);
    $pdf->Cell(0,10,$intereses,0,1);

    
    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(10,10,'REAJUSTE:',0,0);
    $pdf->SetFont('Times','',12);
    $pdf->SetX(90);
    $pdf->Cell(0,10,$reajuste,0,1);
}


// $pdf->Cell(0,10,'Fecha Contable:',0,0);
// $pdf->Cell(0,10,$id_solicitud,0,1);

$pdf->Output('I','Comprobante_'.$n_operacion.'.pdf');

?>