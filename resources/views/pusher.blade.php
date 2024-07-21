<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pusher Browser Notifications</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <h1>Pusher Browser Notifications Example</h1>

    <script>
        $(document).ready(function() {
            // Enable Pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('391e0b29360b9f418920', {
                cluster: 'mt1',
                forceTLS: true
            });

            var channel = pusher.subscribe('mqtt-event');

            channel.bind('mqtt-event', function(data) {
                console.log('Received event data:', data); // Log received data to the console

                // Show Toastr notification
                toastr.success(data.message, 'Notification');

                // Check if the browser supports notifications
                if (!('Notification' in window)) {
                    alert('This browser does not support desktop notifications');
                    return;
                }

                // Check the current Notification permission
                if (Notification.permission === 'granted') {
                    console.log('Notification permission granted'); // Log permission status
                    sendNotification(data);
                } else if (Notification.permission !== 'denied') {
                    console.log('Requesting notification permission'); // Log permission request status
                    Notification.requestPermission().then(function(permission) {
                        if (permission === 'granted') {
                            console.log('Notification permission granted after request'); // Log permission granted after request
                            sendNotification(data);
                        } else {
                            console.log('Notification permission denied after request'); // Log permission denied after request
                        }
                    });
                } else {
                    console.log('Notification permission denied'); // Log permission denied status
                }
            });

            function sendNotification(data) {
                var options = {
                    body: data.message,
                    icon: 'https://fastly.picsum.photos/id/1/200/300.jpg?hmac=jH5bDkLr6Tgy3oAg5khKCHeunZMHq0ehBZr6vGifPLY' // Optional icon
                };
                var notification = new Notification('Notification', options);

                notification.onclick = function(event) {
                    event.preventDefault(); // Prevent the browser from focusing the Notification's tab
                    window.open('https://example.com', '_blank'); // Open a URL when the notification is clicked
                };
            }

            // Toastr configuration (optional)
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        });
    </script>
</body>
</html>
