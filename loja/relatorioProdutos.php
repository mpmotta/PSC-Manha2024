<?php
session_start();

if( !isset($_SESSION["logado"]) || $_SESSION["logado"] == false ){
    header("Location: index.php");
}else{

	include_once ("dao/clsConexao.php");
  
	include_once ("model/clsProduto.php");
	include_once ("dao/clsProdutoDAO.php");

	require_once("fpdf/fpdf.php");

	define ('FPDF_FONTPATH','fpdf/font/');

	$pdf = new FPDF("P", "mm", "A4");
	$pdf->SetFont("arial","", 10 );
	$pdf->SetTextColor(0,0,0);
	$pdf->SetY("-1");
	$pdf->Cell(0,0,'',0,1,'L'); 

	$Produtos = ProdutoDAO::getProdutos();

	if( count($Produtos) == 0){

		$pdf->SetX(40);
		$pdf->SetY(100);
		$pdf->MultiCell(130, 10, utf8_decode("Nenhum Produto Cadastrado!"), 2, "C",);

	}else{

		$pdf->SetFont('Arial','B',14);

		$pdf->SetY("30");
            	$pdf->SetX("10");
            	$pdf->Cell(20,10,utf8_decode('Código'), 1, 1, "C");

            	$pdf->SetY("30");
            	$pdf->SetX("30");
            	$pdf->Cell(130,10,'Nome do Produto',1,1,'N'); 

				$pdf->SetY("30");
            	$pdf->SetX("160");
				$pdf->Cell(30,10,utf8_decode('Valor'), 1, 1, "V");
				

		$pdf->SetFont('Arial','I',12);	
		$pdf->SetTextColor(0,128,0);
		$y = 40;

		foreach($Produtos as $prod){
			$pdf->SetY($y);
			$pdf->SetX("10");
			$pdf->Cell(20,10, $prod->id, 1, 1, "C");

			$pdf->SetY($y);
			$pdf->SetX("30");
			$pdf->Cell(130,10,utf8_decode($prod->nome),1,1,'N'); 

			$pdf->SetY($y);
			$pdf->SetX("160");
			$valor = "R$ " . number_format($prod->valor,2,",",".");
			$pdf->Cell(30,10,utf8_decode($valor),1,1,'M');

			$y += 10;
		}
	}
	$pdf->Output("relatorioProduto.pdf", "I");
}
?>