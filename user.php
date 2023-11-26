<?php

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <link rel="stylesheet" href="CSS/table.css">
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es'
  });
  calendar.render();
});

</script>
</head>
<body>


<header class="header">


    <h2 class="name">Crea eventos
    <label for="checkbox">
    <i id="navbar" class="fa fa-bars" aria-hidden="true"></i>   

</label>
</h2>
</header>

<div id='calendar'></div>
  
</body>
</html>