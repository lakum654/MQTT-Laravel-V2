<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <button id="trigger-event-btn">Send Notification</button>


    <script>
         // Handle button click to trigger the event
      $('#trigger-event-btn').on('click', function () {
        $.ajax({
          url: "{{route('test')}}",
          method: 'GET',
          success: function (response) {
            console.log(response.status);
          }
        });
      });
    </script>
</body>
</html>
