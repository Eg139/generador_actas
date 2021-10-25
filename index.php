<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg"/>
  <title>Generador de actas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>
<body>

<div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>


<div class="container">



<h3 class="text-center">
    Generar Actas
</h3>
<hr>
<br><br>

<form class="row" target="_blank" action="excelprueba.php" method="POST" enctype="multipart/form-data">

<div class="col-lg-4 col-md-12 mb-3">
  <input class="form-control" type="file" name="dataCliente" id="file-input" class="file-input__input">
</div>

<!--
<div class="col-lg-4 col-md-12 mb-3">
  <select class="form-select" aria-label="Default select example" name="carrera">
  <option selected>Open this select menu</option>
  <option value="Tecnicatura Superior en Papiloscopía y Rastros">Tecnicatura Superior en Papiloscopía y Rastros</option>
  <option value="Tecnicatura Superior en Programacion">Tecnicatura Superior en Programacion</option>
</select>
</div>

<div class="col-lg-4 col-md-12 mb-3">
  <select class="form-select" aria-label="Default select example" name="materia">
  <option selected>Open this select menu</option>
  <option value="EDI ll  2 A">EDI ll  2 A</option>
  <option value="CRIMINALISTICA E INVESTIGACION CRIMINAL II 2 A">CRIMINALISTICA E INVESTIGACION CRIMINAL II 2 A</option>
  <option value="MEDICINA LEGAL 2 A">MEDICINA LEGAL 2 A</option>
  <option value="ADMINISTRACION Y GESTION 2 A">ADMINISTRACION Y GESTION 2 A</option>
  <option value="TECNOLOGIA AUDIOVISUAL 2 A">TECNOLOGIA AUDIOVISUAL 2 A</option>
  <option value="INFORMATICA 2 A">INFORMATICA 2 A</option>
  <option value="INGLES 2 A">INGLES 2 A</option>
  <option value="ETICA APLICADA 2 A">ETICA APLICADA 2 A</option>
</select>
</div>-->
<div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-outline-danger" name="subir">Subir Csv</button>
</div>
  
</form>

</div>





<script src="js/jquery.min.js"></script>
<script src="'js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });      
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>