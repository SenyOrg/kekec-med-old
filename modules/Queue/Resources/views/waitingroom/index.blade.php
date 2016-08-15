@extends('theme::hero')

@section('content')
    <div class="clock">
        <div id="Date" style="display:inline"></div>
        &nbsp;&nbsp;&nbsp;
        <ul style="display:inline">
            <li id="hours"></li>
            <li id="point">:</li>
            <li id="min"></li>
            <li id="point">:</li>
            <li id="sec"></li>
        </ul>
    </div>

    <style type="text/css">
        /* If you want you can use font-face */
        @font-face {
            font-family: 'BebasNeueRegular';
            src: url('BebasNeue-webfont.eot');
            src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
            url('BebasNeue-webfont.woff') format('woff'),
            url('BebasNeue-webfont.ttf') format('truetype'),
            url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .clock {
            margin: 0 auto;
            padding: 30px;
            color: #fff;
            float: right;
        }

        #Date {
            font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
            font-size: 36px;
            text-align: center;
            text-shadow: 0 0 5px #00c6ff;
        }

        ul {
            width: 800px;
            margin: 0 auto;
            padding: 0px;
            list-style: none;
            text-align: center;
        }

        ul li {
            display: inline;
            font-size: 5em;
            text-align: center;
            font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
            text-shadow: 0 0 5px #00c6ff;
        }

        #point {
            position: relative;
            -moz-animation: mymove 1s ease infinite;
            -webkit-animation: mymove 1s ease infinite;
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Simple Animation */
        @-webkit-keyframes mymove {
            0% {
                opacity: 1.0;
                text-shadow: 0 0 20px #00c6ff;
            }

            50% {
                opacity: 0;
                text-shadow: none;
            }

            100% {
                opacity: 1.0;
                text-shadow: 0 0 20px #00c6ff;
            }
        }

        @-moz-keyframes mymove {
            0% {
                opacity: 1.0;
                text-shadow: 0 0 20px #00c6ff;
            }

            50% {
                opacity: 0;
                text-shadow: none;
            }

            100% {
                opacity: 1.0;
                text-shadow: 0 0 20px #00c6ff;
            }

        ;
        }

    </style>
@endsection

@section('end-content')

    <script type="text/javascript">
        kekecmed.websocket._config.host = '192.168.10.10';
        kekecmed.websocket._config.realm = 'kekecmed';
        kekecmed.developmentMode(true);

        kekecmed.websocket.subscribe('kekecmed.queue.item.moved', function (payload) {
            var box = bootbox.dialog({
                /**
                 * @required String|Element
                 */
                message: '<h1>' + payload.patient.firstname + ' ' + payload.patient.lastname + '</h1> <br> in Raum <br/> <h1>' + payload.queue.title + '</h1>',

                /**
                 * @optional String|Element
                 * adds a header to the dialog and places this text in an h4
                 */
                title: "Aufruf",

                /**
                 * @optional Function
                 * allows the user to dismisss the dialog by hitting ESC, which
                 * will invoke this function
                 */
                onEscape: function () {
                },

                /**
                 * @optional Boolean
                 * @default: true
                 * whether the dialog should be shown immediately
                 */
                show: true,

                /**
                 * @optional Boolean
                 * @default: true
                 * whether the dialog should be have a backdrop or not
                 */
                backdrop: true,

                /**
                 * @optional Boolean
                 * @default: true
                 * show a close button
                 */
                closeButton: false,

                /**
                 * @optional Boolean
                 * @default: true
                 * animate the dialog in and out (not supported in < IE 10)
                 */
                animate: true,

                /**
                 * @optional String
                 * @default: null
                 * an additional class to apply to the dialog wrapper
                 */
                className: "modal-info"
            });

            setTimeout(function () {
                box.modal('hide');
            }, 5000);
        });

        $(document).ready(function () {
// Create two variable with the names of the months and days in an array
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

// Create a newDate() object
            var newDate = new Date();
// Extract the current date from Date object
            newDate.setDate(newDate.getDate());
// Output the day, date, month and year
            $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

            setInterval(function () {
                // Create a newDate() object and extract the seconds of the current time on the visitor's
                var seconds = new Date().getSeconds();
                // Add a leading zero to seconds value
                $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
            }, 1000);

            setInterval(function () {
                // Create a newDate() object and extract the minutes of the current time on the visitor's
                var minutes = new Date().getMinutes();
                // Add a leading zero to the minutes value
                $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            }, 1000);

            setInterval(function () {
                // Create a newDate() object and extract the hours of the current time on the visitor's
                var hours = new Date().getHours();
                // Add a leading zero to the hours value
                $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);
        });
    </script>
@endsection