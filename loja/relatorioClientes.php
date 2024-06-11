<?php
session_start();

if( !isset($_SESSION["logado"]) || $_SESSION["logado"] == false ){
    header("Location: index.php");
}else{

	include_once ("dao/clsConexao.php");

	include_once ("model/clsCidade.php");
	include_once ("dao/clsCidadeDAO.php");
  
	include_once ("model/clsCliente.php");
	include_once ("dao/clsClienteDAO.php");

	require_once("fpdf/fpdf.php");

	define ('FPDF_FONTPATH','fpdf/font/');

	$pdf = new FPDF("P", "mm", "A4");
	$pdf->SetFont("arial","", 10 );
	$pdf->SetTextColor(0,0,0);
	$pdf->SetY("-1");
	$pdf->Cell(0,0,'',0,1,'L'); 

	$clientes = ClienteDAO::getClientes();

	if( count($clientes) == 0){

		$pdf->SetX(40);
		$pdf->SetY(100);
		$pdf->MultiCell(130, 10, utf8_decode("Nenhum Cliente Cadastrado!"), 2, "C",);

	}else{

		$pdf->SetFont('Arial','B',14);

		$pdf->SetY("30");
            	$pdf->SetX("10");
            	$pdf->Cell(20,10,utf8_decode('Código'), 1, 1, "C");

            	$pdf->SetY("30");
            	$pdf->SetX("30");
            	$pdf->Cell(70,10,'Nome do Cliente',1,1,'L'); 

				$pdf->SetY("30");
            	$pdf->SetX("100");
				$pdf->Cell(30,10,utf8_decode('Salário'), 1, 1, "S");

				$pdf->SetY("30");
            	$pdf->SetX("130");
				$pdf->Cell(30,10,utf8_decode('Nascimento'), 1, 1, "N");

				$pdf->SetY("30");
            	$pdf->SetX("160");
				$pdf->Cell(30,10,utf8_decode('Cidade'), 1, 1, "M");
				

		$pdf->SetFont('Arial','I',12);	
		$pdf->SetTextColor(0,0,255);
		$y = 40;

		foreach($clientes as $cli){
			$pdf->SetY($y);
			$pdf->SetX("10");
			$pdf->Cell(20,10, $cli->id, 1, 1, "C");

			$pdf->SetY($y);
			$pdf->SetX("30");
			$pdf->Cell(70,10,utf8_decode($cli->nome),1,1,'L'); 

			$pdf->SetY($y);
			$pdf->SetX("100");
			$salario = "R$ " . number_format($cli->salario,2,",",".");
			$pdf->Cell(30,10,utf8_decode($salario),1,1,'S');

			$pdf->SetY($y);
			$pdf->SetX("130");
			$pdf->Cell(30,10,utf8_decode($cli->nascimento),1,1,'N');

			$pdf->SetY($y);
			$pdf->SetX("160");
			$pdf->Cell(30,10,utf8_decode($cli->cidade->nome),1,1,'M');

			$y += 10;
		}
	}
	$pdf->Output("relatorioCliente.pdf", "I");
}
?>