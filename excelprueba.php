<?php

require "fpdf/fpdf.php";

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);
$j = 0;
$contador = 1;


$materias = array(
    "INGLES TECNICO 2 A",
    "E.D.I. PROCEDIMIENTO ADMINISTRATIVO 2 A",
    "CRIMINOLOGIA 2 A",
    "TECNOLOGIA AUDIOVISUAL 2 A",
    "INFORMATICA 2 A",
    "MEDICINA LEGAL 2 A",
    "CRIMINALISTICA E INVESTIGACION CRIMINAL  2 A",
    "ADMINISTRACION Y GESTION 2 A"

);
$carreras = "Tecnicatura Superior en Papiloscopía y Rastros";
     
    $var = count($materias);

     
    $pdf=new FPDF();
     
    for($i=0; $i<$var; $i++){


    
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);

/////////////////////////////////////// HEADER ///////////////////////////////////////////////////////
    $pdf->Image('logo.gif',10,8,15);
    $pdf->Ln(20);
    // Arial bold 15
    
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(10);
    $pdf->Cell(45,5,'Superintendencia de Institutos de Formacion Policial',0,1,'C');
    $pdf->Cell(10);
    $pdf->Cell(45,5,'Centro de Altos Estudios en Especialidades Policiales',0,1,'C');
    $pdf->Ln(5);

    $pdf->SetFont('Times','IB',9);
    $pdf->Cell(45,5,'Centro de Altos Estudios ',0,0,'C');
    $pdf->Cell(80,5,'',0,0,'C');
    $pdf->Cell(45,5,'Libro           Folio',0,1,'C');
    $pdf->Cell(45,5,'en Especialidades Policiales ',0,1,'C');
    $pdf->SetFont('Arial','B',10);
    
    // Título
    $pdf->Cell(28);
    $pdf->Cell(45,5,'Carrera: '.utf8_decode($carreras),0,1,'C');
    $pdf->Cell(10);


    $pdf->Cell(70,5,'Asignatura: '.utf8_decode($materias[$i]),0,0,'C');
    $pdf->Cell(20,5,' ',0,0,'C');
    $pdf->Cell(20,5,utf8_decode('Año: '),0,0,'C');
    $pdf->Cell(25,5,'Fecha: ',0,0,'C');
    $pdf->Cell(25,5,'Hora: ',0,1,'C');
    $pdf->Ln(3);


    // Cabecera de la tabla
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(10,5,utf8_decode("N°"),1,0,'C',0);
    $pdf->Cell(40,5,utf8_decode('N° de Documento'),1,0,'C',0);
    $pdf->Cell(50,5,utf8_decode('Apellido/s y Nombre/s'),1,0,'C',0);
    $pdf->Cell(30,5,'Examen escrito',1,0,'C',0);
    $pdf->Cell(30,5,'Examen Oral',1,0,'C',0);
    $pdf->Cell(30,5,'Calificacion',1,1,'C',0);
    $pdf->Cell(100,5,'',1,0,'C',0);
    $pdf->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
    $pdf->Cell(20,5,'Letras',1,0,'C',0);
    $pdf->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
    $pdf->Cell(20,5,'Letras',1,0,'C',0);
    $pdf->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
    $pdf->Cell(20,5,'Letras',1,1,'C',0);

/////////////////////////////////////// HEADER ///////////////////////////////////////////////////////



/////////////////////////////////////// BODY ///////////////////////////////////////////////////////

    foreach ($lineas as $linea) {
        $cantidad_registros = count($lineas);
        $cantidad_regist_agregados =  ($cantidad_registros - 1);

        if ($i >= 0) {

            $datos = explode(",", $linea);
        
            $registro                = !empty($datos[0])  ? ($datos[0]) : '';
            $correo                = !empty($datos[1])  ? ($datos[1]) : '';
            $nombreCompleto               = !empty($datos[2])  ? ($datos[2]) : '';
            $telefono                = !empty($datos[3])  ? ($datos[3]) : '';
            $legajoAlumno                = !empty($datos[4])  ? ($datos[4]) : '';
            $dni                = !empty($datos[5])  ? ($datos[5]) : '';
            $sede               = !empty($datos[6])  ? ($datos[6]) : '';
            $tecnicaturaN                = !empty($datos[7])  ? ($datos[7]) : '';
            $anioCursada                = !empty($datos[8])  ? ($datos[8]) : '';
            $asignatura                = !empty($datos[9])  ? ($datos[9]) : '';



    //No existe Registros Duplicados
    if ($asignatura == $materias[$i] ) {

        
            $pdf->Cell(10,5,$contador,1,0,'C',0);
            $pdf->Cell(40,5,$dni,1,0,'C',0);
            $pdf->Cell(50,5,utf8_decode($nombreCompleto),1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,1,'C',0);
        
            $contador++;
    }
    
    }

    $j++;
    }
    if ($contador < 26) {
        for ($j=$contador; $j <= 26; $j++) { 
            $pdf->Cell(10,5,$contador,1,0,'C',0);
            $pdf->Cell(40,5,"",1,0,'C',0);
            $pdf->Cell(50,5,"",1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,0,'C',0);
            $pdf->Cell(10,5,"",1,0,'C',0);
            $pdf->Cell(20,5,"",1,1,'C',0);
        
            $contador++;
        }
    }

/////////////////////////////////////// BODY ///////////////////////////////////////////////////////

/////////////////////////////////////// Footer ///////////////////////////////////////////////////////
    $pdf->SetFont('Arial','I',10);

    // Cabecera de la tabla
    $pdf->Cell(190,10,utf8_decode('Total de Alumnos: ____   Aprobados: ____   Desaprobados: ____   Ausentes: ____   Con equivalencia: ____'),1,1,'C',0);


    $pdf->Cell(45,10,'Observaciones: ',0,0,'C');
    $pdf->Ln(25);

    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(60,5,'_________________________________',0,0,'C',0);
    $pdf->Cell(60,5,'_________________________________',0,0,'C',0);
    $pdf->Cell(60,5,'_________________________________',0,1,'C',0);
    $pdf->Cell(60,5,'Firma Presidente',0,0,'C',0);
    $pdf->Cell(60,5,'Firma Vocal',0,0,'C',0);
    $pdf->Cell(60,5,'Firma Vocal',0,1,'C',0);

    $pdf->Cell(60,5,'_________________________________',0,0,'C',0);
    $pdf->Cell(60,5,'_________________________________',0,0,'C',0);
    $pdf->Cell(60,5,'_________________________________',0,1,'C',0);
    $pdf->Cell(60,5,'Aclaracion Presidente',0,0,'C',0);
    $pdf->Cell(60,5,'Aclaracion Vocal',0,0,'C',0);
    $pdf->Cell(60,5,'Aclaracion Vocal',0,1,'C',0);

    $pdf->Ln(5);
    $pdf->Cell(0,5,utf8_decode('* Las clasificaciones deben ser con números enteros (sin fracciones ni decimales)'),0,0,'C');
/////////////////////////////////////// Footer ///////////////////////////////////////////////////////





$contador = 1;
    }
    $pdf->Output();

    ?>
