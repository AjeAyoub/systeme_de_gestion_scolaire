<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Découvrir les Événements</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/fr.js"></script>
</head>
<body>
<div class="container">
  <h1 class="mx-center">Découvrir les événements</h1>
  <div class="panel panel-primary">
    <div class="panel-body">
      <div id="calendar"></div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      navLinks: true,
      editable: true,
      events: "getevent",
      displayEventTime: true, // Set to true to display event time
      eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      selectable: true,
      selectHelper: true,
      select: function (start, end, allDay) {
        var title = prompt('Titre de l\'événement :');
        if (title) {
          var start_date = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
          var end_date = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
          var start_time = moment(start).format('HH:mm:ss');
          var end_time = moment(end).format('HH:mm:ss');
          $.ajax({
            url: "{{ URL::to('createevent') }}",
            data: {
              title: title,
              start_date: start_date,
              end_date: end_date,
              start_time: start_time,
              end_time: end_time,
              _token: "{{ csrf_token() }}"
            },
            type: "post",
            success: function (data) {
              alert("Ajouté avec succès");
              $('#calendar').fullCalendar('refetchEvents');
            }
          });
        }
      }
    });
  });
</script>

</body>
</html>
