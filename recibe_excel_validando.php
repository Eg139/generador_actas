<?php
    require('fpdf/fpdf.php');

    /*$tecnicaturas = array(
        array(
            "Tecnicatura Superior en Investigaciones con Especializacion en Analisis Delictual",
            "Introducción a la Psicología y Sociología",
            "Metodología de la Investigación",
            "Comunicación",
            "Derecho Penal y Legislación Complementaria",
            "Derecho Procesal Penal",
            "Régimen Legal de la Profesión Policial",
            "Derechos Humanos y Función Policial",
            "Antropología Social y Cultural",
            "Inteligencia Criminal",
            "Metodología de reunión y evaluación de la información I",
            "Medidas de seguridad",
            "Acción delictiva y Crimen organizado",
            "Inteligencia económica financiera I",
            "Investigaciones Tecnológicas",
            "Práctica Profesional I",
            "Criminología",
            "Inglés Técnico",
            "Informática",
            "Tecnología Audiovisual",
            utf8_decode("Ética Aplicada"),
            "Administración y Gestión ",
            "Metodología de reunión y evaluación de información",
            utf8_decode("Geopolítica"),
            "Inteligencia económica  financiera II",
            "Tecnología informática de evaluación de información",
            "Producción de  inteligencia criminal",
            "Medidas de seguridad II",
            "Práctica Profesional II",
            "Desarrollo de contenidos vinculados con el encuadre profesional"),
        array("Tecnicatura Superior en Criminalistica con Especializacion en Balistica Forense"),
        array("TECNICATURA SUPERIOR EN INVESTIGACIONES CON ESPECIALIZACION EN INVESTIGACION JUDICIAL"),
        array("TECNICATURA SUPERIOR EN INVESTIGACIONES CON ESPECIALIZACION EN NARCOCRIMINALIDAD"),
        array("TECNICATURA SUPERIOR EN SEGURIDAD PÚBLICA"),
        array("TECNICATURA SUPERIOR EN SEGURIDAD PÚBLICA CON ESPECIALIZACION EN TECNOLOGIA DE LAS COMUNICACIONES"),
        array("TECNICATURA SUPERIOR EN SEGURIDAD SINIESTRAL"),
        array("TECNICATURA SUPERIOR EN SEGURIDAD PÚBLICA CON ESPECIALIZACION EN TRANSITO Y TRANSPORTE"),
        array("TECNICATURA SUPERIOR EN SERVICIOS Y OPERACIONES AÉREAS EN LA SEGURIDAD PÚBLICA"),
        array("TECNICATURA SUPERIOR EN ANALISIS DE SISTEMAS"),
        array("TECNICATURA SUPERIOR EN TRABAJO SOCIAL"),
        array("TECNICATURA SUPERIOR EN TRADUCTORADO TECNICO – CIENTIFICO EN LENGUA INGLESA"),
        array("TECNICATURA SUPERIOR EN GESTION DE LA SEGURIDD PUBLICA"),
        array("TECNICATURA SUPERIOR EN SEGURIDAD PÚBLICA CON ORIENTACIÓN EN INTERVENCIÓN OPERATIVA"),
        array("TECNICATURA SUPERIOR EN CRIMINALÍSTICA CON ESPECIALIZACION EN QUIMICA PERICIAL"),
        array("Tecnicatura Superior en Criminalística con Especialización en Accidentología Vial"),
        array("Tecnicatura Superior en Criminalística con Especialización en Dibujo de Rostro"),
        array("Tecnicatura Superior en Criminalística con Especialización en Documentología"),
        array("Tecnicatura Superior en Criminalística Con Especialización en Papiloscopía y Rastros"),
        array("Tecnicatura Superior en Criminalística con Especialización en Planimetría Pericial")
        

    );*/
    $materiaFiltro = $_POST['materia'];
    $carrera = $_POST['carrera'];
    $i = 0;

    $tipo       = $_FILES['dataCliente']['type'];
    $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];
    $lineas     = file($archivotmp);


    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        global $carrera;
        global $materiaFiltro;
        // Logo
        $this->Image('logo.gif',10,8,20);
        $this->Ln(25);
        // Arial bold 15
        
        $this->SetFont('Arial','',9);
        $this->Cell(10);
        $this->Cell(45,5,'Superintendencia de Institutos de Formacion Policial',0,1,'C');
        $this->Cell(10);
        $this->Cell(45,5,'Centro de Altos Estudios en Especialidades Policiales',0,1,'C');
        $this->Ln(5);

        $this->SetFont('Times','IB',9);
        $this->Cell(45,5,'Centro de Altos Estudios ',0,0,'C');
        $this->Cell(80,5,'',0,0,'C');
        $this->Cell(45,5,'Libro           Folio',0,1,'C');
        $this->Cell(45,5,'en Especialidades Policiales ',0,1,'C');
        $this->SetFont('Arial','B',10);
        
        // Título
        $this->Cell(28);
        $this->Cell(45,5,'Carrera: '.utf8_decode($carrera),0,1,'C');
        $this->Cell(5);
        $this->Cell(45,5,'Asignatura: '.utf8_decode($materiaFiltro),0,0,'C');
        $this->Cell(70,5,' ',0,0,'C');
        $this->Cell(20,5,utf8_decode('Año: Nivel I'),0,0,'C');
        $this->Cell(25,5,'Fecha: ',0,0,'C');
        $this->Cell(25,5,'Hora: ',0,1,'C');
        $this->Ln(3);

    
        // Cabecera de la tabla
        $this->SetFont('Arial','',10);
        $this->Cell(10,5,utf8_decode("N°"),1,0,'C',0);
        $this->Cell(40,5,utf8_decode('N° de Documento'),1,0,'C',0);
        $this->Cell(50,5,utf8_decode('Apellido/s y Nombre/s'),1,0,'C',0);
        $this->Cell(30,5,'Examen escrito',1,0,'C',0);
        $this->Cell(30,5,'Examen Oral',1,0,'C',0);
        $this->Cell(30,5,'Calificacion',1,1,'C',0);
        $this->Cell(100,5,'',1,0,'C',0);
        $this->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
        $this->Cell(20,5,'Letras',1,0,'C',0);
        $this->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
        $this->Cell(20,5,'Letras',1,0,'C',0);
        $this->Cell(10,5,utf8_decode('N°'),1,0,'C',0);
        $this->Cell(20,5,'Letras',1,1,'C',0);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        //$this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',10);

        // Cabecera de la tabla
        $this->Cell(190,10,utf8_decode('Total de Alumnos: ____   Aprobados: ____   Desaprobados: ____   Ausentes: ____   Con equivalencia: ____'),1,1,'C',0);


        $this->Cell(45,10,'Observaciones: ',0,0,'C');
        $this->Ln(30);



        $this->SetFont('Arial','I',8);
        $this->Cell(60,5,'_________________________________',0,0,'C',0);
        $this->Cell(60,5,'_________________________________',0,0,'C',0);
        $this->Cell(60,5,'_________________________________',0,1,'C',0);
        $this->Cell(60,5,'Firma Presidente',0,0,'C',0);
        $this->Cell(60,5,'Firma Vocal',0,0,'C',0);
        $this->Cell(60,5,'Firma Vocal',0,1,'C',0);

        $this->Cell(60,5,'_________________________________',0,0,'C',0);
        $this->Cell(60,5,'_________________________________',0,0,'C',0);
        $this->Cell(60,5,'_________________________________',0,1,'C',0);
        $this->Cell(60,5,'Aclaracion Presidente',0,0,'C',0);
        $this->Cell(60,5,'Aclaracion Vocal',0,0,'C',0);
        $this->Cell(60,5,'Aclaracion Vocal',0,1,'C',0);


        // Número de página
        $this->Cell(0,10,utf8_decode('* Las clasificaciones deben ser con números enteros (sin fracciones ni decimales)'),0,0,'C');
    }
    }

    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);

    $contador = 1;


foreach ($lineas as $linea) {

    
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

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
if ($asignatura == $materiaFiltro) {

    
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

 $i++;
 
}
if ($contador < 36) {
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

$pdf->Output();
?>
