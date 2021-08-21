<?php
add_shortcode('synthwave', 'synthwave_func');
function synthwave_func()
{
?>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Orbitron:700);

        @font-face {
            font-family: 'Indelible';
            src: url(https://s3.code-smart.com/fonts/Indelible.woff);
        }

        .fullscreen {
            position: absolute;
            right: 0;
            width: 100%;
            height: 80%;
        }

        /*main-container-synth----------------------------------------*/
        .container-synth {
            background: #000 url(https://s3.code-smart.com/img/stars.png) repeat top center;
            background-size: cover;
            overflow: hidden;
        }

        .container-synth .twinkling {
            background: transparent url(https://s3.code-smart.com/img/twinkling.png) repeat top center;
            z-index: 1;
            animation: move-twink-back 200s linear infinite;
        }

        @keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        .container-synth .overlay {
            display: block;
            background: linear-gradient(to top, transparent 25%, #2f5894 25%, #848484);
            z-index: 3;
            height: 42rem;
            opacity: 0.35;
        }

        .container-synth .sun {
            animation: sunrise 5s ease-out;
            background: linear-gradient(to bottom, yellow 0%, #ff0046 50%);
            border-radius: 50%;
            box-shadow: 0 0 26px 20px #ff0046;
            position: absolute;
            z-index: 1;
            height: 40vh;
            width: 40vh;
            left: calc(50vw - 20vh);
            top: 16vh;
            animation-fill-mode: both;
        }

        .container-synth .sun:after {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            background: repeating-linear-gradient(transparent, transparent 2%, #000 2%, #000 4%);
            opacity: 0.1;
            border-radius: 50%;
        }

        @keyframes sunrise {
            from {
                transform: translateY(40vh);
            }

            to {
                transform: translateY(0);
            }
        }

        .container-synth .mountains {
            width: 100%;
            height: 20vw;
            background: transparent url(wp-content/themes/tk-theme/inc/synthwave/palmhorizon.png) repeat-x bottom center;
            background-size: contain;
            position: absolute;
            bottom: 25%;
            z-index: 3;
            max-height: 240px;
        }

        .container-synth .glow {
            height: 25%;
            width: 100%;
            position: absolute;
            bottom: 0;
            z-index: 4;
            box-shadow: 0 0 7vh -1vh #490073
        }

        .container-synth .ground {
            position: absolute;
            width: 100%;
            height: 25%;
            background: #1e1e1e;
            bottom: 0;
            z-index: 1;
        }

        .container-synth .moving-grid {
            position: absolute;
            z-index: 2;
            top: 75%;
            width: 100%;
            height: 100%;
            transform-origin: 50% 0%;
            transform: perspective(40vh) rotateX(77deg);
        }

        .container-synth .moving-grid:after {
            content: "";
            background: linear-gradient(to top, transparent 66%, rgba(75, 0, 173, 0.4) 90%);
            display: block;
            position: relative;
            height: 100%;
            width: 100%;
            z-index: 9;
        }

        .container-synth .moving-grid .grid-inner {
            animation: animatedGrid 15s linear infinite;
        }

        .container-synth .moving-grid .grid-inner .grid-x,
        .container-synth .moving-grid .grid-inner .grid-y {
            width: 100vmax;
            height: 100vmax;
            position: absolute;
            bottom: 0;
            left: 0;
            background: repeating-linear-gradient(to top, rgba(85, 172, 255, 0), rgba(85, 172, 255, 0), rgba(85, 172, 255, 0) 2vmax, rgb(97 0 80) 2vmax, rgb(197 0 247) 2.16vmax);
        }

        .container-synth .moving-grid .grid-inner-2 .grid-y {
            bottom: -3px;
            left: -4px;
            opacity: 0.4;
        }

        .container-synth .moving-grid .grid-inner .grid-y {
            transform: rotate(90deg);
        }

        @keyframes animatedGrid {
            from {
                transform: translateY(50vh);
            }

            to {
                transform: translateY(100vh);
            }
        }

        .logo {
            display: flex;
            justify-content: center;
        }

        .container-synth .logo {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 4%;
            z-index: 13;
        }

        .container-synth .logo h1 {
            color: white;
            font-family: 'Orbitron', sans-serif;
            font-size: 99px;
            font-style: italic;
            line-height: 1.2;
            position: absolute;
            text-transform: uppercase;
            z-index: 11;
            user-select: none;
        }

        .container-synth .logo h1 .chrome80s {
            background-image: -webkit-linear-gradient(#010012 25%, #4694c9 45%, #fdf9f7 60%, #010923 69%, #e65555 80%, #fff 90%, #0e0500 95%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 0.05rem;
            -webkit-text-stroke-color: rgba(0, 0, 0, 0.2);
            width: 110%;
        }

        .container-synth .logo h1 .chrome80s:before {
            content: attr(data-text);
            filter: url(#bevel);
            background: -webkit-linear-gradient(#55acff 30%, #0060bb 60%, #55acff 80%) 0% 0% repeat;
            -webkit-background-clip: text;
            position: absolute;
            z-index: -1;
            width: 110%;
        }

        .container-synth .logo h1 .chrome80s:after {
            content: attr(data-text);
            position: absolute;
            text-shadow: 0 0 15px #fff;
            transform: translate(-100%);
            z-index: -2;
        }

        .container-synth .logo h2 {
            color: white;
            display: block;
            width: 100%;
            position: absolute;
            text-align: center;
            z-index: 11;
            font-family: "Indelible", cursive;
            font-size: 84px;
            top: 108px;
            user-select: none;
        }

        .container-synth .logo .logo-triangle {
            fill: url(#grad1);
            filter: url(#dropshadow);
            left: calc(50% - 160px);
            position: relative;
            stroke-dasharray: 1200;
            stroke-dashoffset: 1200;
            top: 48px;
        }
    </style>
    <div style="height: 47rem">
    <div class="container-synth fullscreen">
        <div class="twinkling fullscreen"></div>
        <div class="overlay fullscreen"></div>
        <div class="sun"></div>
        <div class="mountains"></div>
        <div class="glow"></div>
        <div class="ground"></div>
        <div class="moving-grid">
            <div class="grid-inner">
                <div class="grid-x"></div>
                <div class="grid-y"></div>
            </div>
            <div class="grid-inner grid-inner-2">
                <div class="grid-y"></div>
            </div>
        </div>

        <div class="logo" style="
    display: flex;
    justify-content: center;
">
            <h1>
                <div class="centered" data-text="Tyler Kanz">Tyler Kanz</div>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <filter id="bevel">
                            <femorphology operator="dilate" radius="3" in="SourceGraphic" result="bevel"></femorphology>
                        </filter>
                    </defs>
                </svg>
            </h1>
            <h2>Web Developer</h2>

        </div>
    </div>
    </div>
<?php } ?>