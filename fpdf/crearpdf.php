<?php
require 'fpdf.php';
class automate_pdf extends FPDF{
    
    function generate($name, $img=""){
        if(isset($name)){
            $nombrePDF = $name.'.pdf';
            $this->AddPage();
            //$this->Image("./".$img,5,5,200);
            //$this->Image("../images/1627320160.png",5,5,200);
            //$this->Image('../images/copyright.png',0,0,220);
            $this->Output("../fpdf/pdf/".$nombrePDF,"F");
            
        }
    }

}
/*    require '../fpdf/fpdf.php';
class automate_pdf extends FPDF{
    
    function generate($name, $img=""){
        if(isset($name)){
            $nombrePDF = $name.'.pdf';
            $this->AddPage();
            $this->Image("../images/".$img,5,5,200);
            //$this->Image("../images/1627320160.png",5,5,200);
            $this->Image('../images/copyright.png',0,0,220);
            $this->Output("../fpdf/pdf/".$nombrePDF,"F");
            
        }
    }

}


include '../fpdf/crear_pdf.php';
$productos_venta_query= $conexion->query("SELECT * FROM productos_venta WHERE id_venta='".$resultado['id']."'") or die($conexion->error);
        
while ($productos_venta= mysqli_fetch_array($productos_venta_query)){
    $pdf = new automate_pdf('L', 'mm', array(210,110));
    $producto_query = $conexion->query("SELECT * FROM productos WHERE id='".$productos_venta['id_producto']."'")or die($conexion->error);
    $producto= mysqli_fetch_array($producto_query);
            
    $date = new DateTime("now", new DateTimeZone('America/Buenos_Aires'));
    $fecha = $date->format('Y-m-d H:i:sA');

    $nombre= $producto['nombre'];
    $imagen= $producto['imagen'];
    $pdf->generate($nombre,$imagen);
            
    
}*/
?>