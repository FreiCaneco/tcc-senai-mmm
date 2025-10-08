<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./model/disciplina_model.php";

        $disciplinaModel = new DisciplinaModel();
        $disciplinas = $disciplinaModel->buscarTodas();

        echo "<pre>";
        print_r($disciplinas);
        echo "</pre>";
        echo $disciplinas[0]['nivel_necessario']
    ?>

</body>
</html>