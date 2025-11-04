<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Formulário de Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>

</head>
<body>
    <?php include "../view/navbar.php"; ?>

    <div id="container">
        <div id="parteDaEsquerda">
            <button type="button" class="btn btn-light bt-curso">Curso</button>
            <button type="button" class="btn btn-light bt-curso">Turno</button>
            <button type="button" class="btn btn-light bt-curso mt-auto">Gerar</button>
        </div>

        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                firstDay: 1,
                headerToolbar: {
                    left: 'prev',
                    center: 'title today',
                    right: 'next'
                },
                buttonText: {
                    today: 'Hoje'
                },
                dayMaxEvents: true,

                dayCellDidMount: function(info) {
                    const day = info.date.getDate();

                    // Alterna cores dos dias
                    info.el.style.backgroundColor = (day % 2 === 0) ? '#f5f5f5' : '#ffffff';

                    // Destaca o dia de hoje
                    const today = new Date();
                    if (info.date.toDateString() === today.toDateString()) {
                        info.el.style.backgroundColor = '#dbe9ff';
                        info.el.style.border = '2px solid #0059df';
                        info.el.style.borderRadius = '8px';
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
