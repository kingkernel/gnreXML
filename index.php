<?php

$housesfile = "teste.csv";

$houses = fopen($housesfile, 'r');
$patterns = ["#", '(', ')', '"'];
while ($linha = fgets($houses))
{
    $nodes = explode(";", $linha);
    //print_r(count($nodes));
    $xml = '<TDadosGNRE versao="2.00">';
    $xml .= '<ufFavorecida>'.$nodes[0].'</ufFavorecida>';
    $xml .= '<tipoGnre>'.$nodes[1].'</tipoGnre>';
    $xml .= '<contribuinteEmitente>';
    $xml .= '<identificacao>';
    $xml .= '<CNPJ>'.str_replace(" ", "", $nodes[2]).'</CNPJ>';
    //<IE>...</IE>
    $xml .= '</identificacao>';
    $xml .= '<razaoSocial>'.$nodes[3].'</razaoSocial>';
    $xml .= '<endereco>'.$nodes[4].'</endereco>';
    $xml .= '<municipio>'.$nodes[5].'</municipio>';
    $xml .= '<uf>'.$nodes[6].'</uf>';
    $xml .= '<cep>'.$nodes[7].'</cep>';
    $xml .= '<telefone>'.str_replace(" ", "", $nodes[8]).'</telefone>';
    $xml .= '</contribuinteEmitente>';
    $xml .= '<itensGNRE>';
    $xml .= '<item>';
    $xml .= '<receita>'.$nodes[9].'</receita>';
    $xml .= '<documentoOrigem tipo="18" >'.str_replace(" ", "", $nodes[10]).'</documentoOrigem>';
    $xml .= '<produto>'.str_replace($patterns, "", $nodes[11]).'</produto>';
    $xml .= '<referencia>';
    //'<referencia>';
    //'<periodo>...</periodo>';
    $xml .= '<mes>'.date("m").'</mes>';
    $xml .= '<ano>'.date("Y").'</ano>';


    echo $xml . "\n<br/>";
}

/*
    <detalhamentoReceita>...</detalhamentoReceita>
     
     <parcela>...</parcela>
    </referencia>
    <dataVencimento>...</dataVencimento>
    <valor tipo="..." >...</valor>
    <convenio>...</convenio>
    <contribuinteDestinatario>
     <identificacao>
      <CPF>...</CPF>
      <CNPJ>...</CNPJ>
      <IE>...</IE>
     </identificacao>
     <razaoSocial>...</razaoSocial>
     <municipio>...</municipio>
    </contribuinteDestinatario>
    <camposExtras>
     <campoExtra>
      <codigo>
      <valor>
     </campoExtra>
     <campoExtra>
      <codigo>
      <valor>
     </campoExtra>
     <campoExtra>
      <codigo>
      <valor>
     </campoExtra>
    </camposExtras>
   </item>
  </itensGNRE>
   <valorGNRE>...</valorGNRE>
   <dataPagamento>...</dataPagamento>
</TDadosGNRE>
*/