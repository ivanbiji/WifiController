<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>iMouse</title>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <meta name='viewport' content='width=device-width, initial-scale=0.5, maximum-scale=0.5, user-scalable=0'>
    <!-- load jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.mobile-1.4.5.min.js') }}"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        html,
body {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

#left {

    position: absolute;
    left: 0;
    top: 0;
    height: 88%;
    width: 100%;
    background: rgba(23, 56, 89, 0.2);
}

.leftb {
    top: 0%;
    height: 85%;
    position: relative;
    left: 2%;
    z-index: 20;
    color: white;
    width: 20%;
    border: 0px;
    font-size: 30px;
    border-radius: 10vh;
    background: #404040;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;

}

.leftb:hover {

    cursor: pointer;
    background: #202020;
}

.rangeb {
    top: 15%;
    height: 20%;
    position: relative;
    left: 13%;
    color: white;
    z-index: 20;
    width: 35%;
    border: 0px;
    font-size: 60px;
    border-radius: 10vh;
    background: #404040;
}

.rangeb:hover {

    cursor: pointer;
    background: #202020;

}

.rightb {
    top: 0%;
    height: 85%;
    position: relative;
    size: 600;
    left: 22%;
    color: white;
    z-index: 20;
    width: 20%;
    border: 0px;
    font-size: 30px;
    border-radius: 10vh;
    background: #404040;
}

* {
    outline: none;
}

.rightb:hover {

    cursor: pointer;
    background: #202020;
}

.container2 {
    top: 88%;
    height: 12%;
    width: 100%;
    position: absolute;
    background: rgba(23, 56, 89, 0.2);
}

.doubleb {
    position: absolute;
    left: 40%;
    top: 88%;
    height: 10%;
    z-index: 20;
    color: white;
    width: 20%;
    border: 0px;
    font-size: 30px;
    border-radius: 10%;
    background: #355e32;
}

input[type=range] {
  -webkit-appearance: none;
  margin: -3.1px 0;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  height: 51.2px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #1f262c;
  border-radius: 0px;
  border: 0px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1.8px 1.8px 5.9px rgba(255, 0, 0, 0.49), 0px 0px 1.8px rgba(255, 26, 26, 0.49);
  border: 2.9px solid #471e00;
  height: 40px;
  width: 54px;
  border-radius: 28px;
  background: rgba(255, 55, 56, 0.93);
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: 3.1px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #546777;
}
input[type=range]::-moz-range-track {
  height: 51.2px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #1f262c;
  border-radius: 0px;
  border: 0px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1.8px 1.8px 5.9px rgba(255, 0, 0, 0.49), 0px 0px 1.8px rgba(255, 26, 26, 0.49);
  border: 2.9px solid #471e00;
  height: 25px;
  border-radius: 28px;
  background: rgba(255, 55, 56, 0.93);
  cursor: pointer;
}
input[type=range]::-ms-track {
  height: 31.2px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #000000;
  border: 0px solid #010101;
  border-radius: 0px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #1f262c;
  border: 0px solid #010101;
  border-radius: 0px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1.8px 1.8px 5.9px rgba(255, 0, 0, 0.49), 0px 0px 1.8px rgba(255, 26, 26, 0.49);
  border: 2.9px solid #471e00;
  border-radius: 28px;
  background: rgba(255, 55, 56, 0.93);
  cursor: pointer;
  height: 25px;
}
input[type=range]:focus::-ms-fill-lower {
  background: #1f262c;
}
input[type=range]:focus::-ms-fill-upper {
  background: #546777;
}


    </style>


</head>

<body>
    <div id="left"></div>

    <div id="area" style="color: black;"></div>
    <div id="debug">

        <div class="position" style="margin-top:20px; display:none;">
            &nbsp;&nbsp;Position :
            <ul style="list-style: none;">
                <li class="x">&nbsp;&nbsp;X : <span class='data'></span></li>
                <li class="y">&nbsp;&nbsp;Y : <span class='data'></span></li>
            </ul>
        </div>

    </div>
    <div class="container2">
        <button onclick="left()" class="leftb">Left</button>
        <!--button onclick="double()" class="doubleb">Double</button-->
        <input type="range" id="slider" oninput="range(this.value)" onchange="range(this.value)" min="0" max="937" value="937" class="rangeb">
        <button onclick="right()" class="rightb">Right</button>
    </div>
    <script src="{{ asset('js/nipplejs.js') }}" charset="utf-8"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var xy = new Array;
        var key = 0;
        var br = 937;
        xy['x'] = 0;
        xy['y'] = 0;

        $

        function range(val) {
            br = val;
            post();
        }
        function left() {
            key = 3;
            post();
            key = 0;
        }

        function right() {
            key = 1;
            post();
            key = 0;
        }

        function double() {
            key = 4;
            post();
            key = 0;
        }

        var s = function (sel) {
            return document.querySelector(sel);
        };
        var sId = function (sel) {
            return document.getElementById(sel);
        };
        var joysticks = {
            static: {
                zone: s('.zone .static'),
                mode: 'static',
                position: {
                    left: '50%',
                    top: '50%'
                },
                color: 'red'
            }
        };
        var joystick;
        var cor = new Array;

        // Get debug elements and map them
        var elDebug = sId('debug');

        var xx = new Array;
        var els = {
            position: {
                x: elDebug.querySelector('.position .x .data'),
                y: elDebug.querySelector('.position .y .data')
            },
        };

        createNipple();

        function bindNipple() {
            joystick.on('start end move', function (evt, data) {
                debug(data);
            });
        }

        function createNipple() {
            joystick = nipplejs.create({
                zone: document.getElementById('left'),
                mode: 'static',
                position: {
                    left: '50%',
                    top: '50%',
                },
                color: 'black',
                size: 650,
            });

            joystick.on('start', function (evt, data) {
                xx['x'] = data['position']['x'];
                xx['y'] = data['position']['y'];

            });


            bindNipple();
        }

        // Print data into elements
        function debug(obj) {

            function parseObj(sub, el) {
                for (var i in sub) {
                    if (typeof sub[i] === 'object' && el) {
                        parseObj(sub[i], el[i]);
                    } else if (el && el[i])

                    {

                        cor[i] = sub[i] - xx[i];
                        cor[i] = parseInt(cor[i] / 30);
                        if (i == 'x') {
                            cor[i] = cor[i] * (-1);

                        }
                        el[i].innerHTML = cor[i];
                        xy[i] = cor[i];
                    }
                }
            }
            setTimeout(function () {
                parseObj(obj, els);
                key = 0;
                post();
            }, 0);


        }

        var nbEvents = 0;

        // Dump data
        function dump(evt) {
            setTimeout(function () {
                var newEvent = document.createElement('div');
                newEvent.innerHTML = '#' + nbEvents + ' : <span class="data">' +
                    evt + '</span>';
                elDump.appendChild(newEvent);
                nbEvents += 1;
            }, 0);
        }

        function post() {
            $.ajax({
                /* the route pointing to the post function */
                url: '/postajax',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: CSRF_TOKEN,
                    x: xy['x'],
                    y: xy['y'],
                    k: key,
                    b: br,
                },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    $(".writeinfo").append(data.msg);
                }
            });

            key = 0;

        }

    </script>
</body>

</html>
