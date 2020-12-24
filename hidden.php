<?php
include("Conexion.php");
$consulta = mysqli_query($Conexion, "SELECT * FROM REGALOS WHERE GANADOR = 0") OR die("Error Contando regalos Index.php");
$NumeroDeRegalos = mysqli_num_rows($consulta);
?>
<html>
    <head>
        <title>Tombola</title>
        <link href="Styles.css" rel="stylesheet" type="text/css">
        <script src="jquery.min.js"></script>
    </head>
    <body>
        <audio id="SonidoRuleta" class="audio" controls>
            <source type="audio/mp3" src="ruleta.mp3">
        </audio>
        <audio id="SonidoGanador" class="audio" controls>
            <source type="audio/mp3" src="ganador.mp3">
        </audio>
        <audio id="Gesto" class="audio" controls>
            <source type="audio/mp3" src="grito.mp3">
        </audio>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <center><font size="7"><strong><p id="Ganador">NOMBRE DEL GANADOR USDED GANO PREMIO</p></strong></font></center>
            </div>

        </div>
        <div class="d" style="margin-top:100px">
            <div class="wrapper">
                <div class="tombola">
                    <div class="panel p1">B</div>
                    <div class="panel p2">B</div>
                    <div class="panel p3">B</div>
                    <div class="panel p4">B</div>
                    <div class="panel p5">O</div>
                    <div class="panel p6">B</div>
                    <div class="panel p7">B</div>
                    <div class="panel p8">B</div>
                </div>
            </div>
            <div class="wrapper">
                <div class="tombola1">
                    <div class="panel p1">I</div>
                    <div class="panel p2">I</div>
                    <div class="panel p3">N</div>
                    <div class="panel p4">I</div>
                    <div class="panel p5">O</div>
                    <div class="panel p6">I</div>
                    <div class="panel p7">I</div>
                    <div class="panel p8">I</div>
                </div>
            </div>
            <div class="wrapper" >
                <div class="tombola2">
                    <div class="panel p1">N</div>
                    <div class="panel p2">I</div>
                    <div class="panel p3">N</div>
                    <div class="panel p4">G</div>
                    <div class="panel p5">N</div>
                    <div class="panel p6">N</div>
                    <div class="panel p7">N</div>
                    <div class="panel p8">N</div>
                </div>
            </div>
            <div class="wrapper" >
                <div class="tombola3">
                    <div class="panel p1">G</div>
                    <div class="panel p2">G</div>
                    <div class="panel p3">G</div>
                    <div class="panel p4">G</div>
                    <div class="panel p5">O</div>
                    <div class="panel p6">G</div>
                    <div class="panel p7">G</div>
                    <div class="panel p8">G</div>
                </div>
            </div>
            <div class="wrapper" >
                <div class="tombola4">
                    <div class="panel p1">O</div>
                    <div class="panel p2">O</div>
                    <div class="panel p3">N</div>
                    <div class="panel p4">O</div>
                    <div class="panel p5">O</div>
                    <div class="panel p6">B</div>
                    <div class="panel p7">O</div>
                    <div class="panel p8">O </div>
                </div>
            </div>
        </div>
        <div style="width:100%; position:absoulte; float:button">
            <center>
                <button id="button-start" onclick="rotar();" class="button-start">START</button>
            </center>
            <div>
                </body>
                <script>
                    var audioRuleta = document.getElementById("SonidoRuleta");
                    var audioGanador = document.getElementById("SonidoGanador");
                    var audioGesto = document.getElementById("Gesto");

                    var NumeroDePremios = <?= $NumeroDeRegalos ?>;
					console.log(NumeroDePremios);
                    var Ganadores = 0;
                    function rotar() {
                        document.getElementById("button-start").style = "display:none";
                        var Gano = 0;
                       // audioRuleta.play();
                        var rotation = [1440, 1485, 1530, 1575, 1620, 1665, 1710, 1755];
                        var pick = Math.floor(Math.random() * 8);
                        var pick1 = pick;
                        var spin = rotation[pick];

                        $('.tombola').css({'transform': 'rotateX(' + spin + 'deg) translateZ(-480px)'});
                        var rotation = [1440, 1485, 1530, 1575, 1620, 1665, 1710, 1755];
                        var pick = Math.floor(Math.random() * 8);
                        var pick2 = pick;
                        var spin = rotation[pick];
                        $('.tombola1').css({'transform': 'rotateX(' + spin + 'deg) translateZ(-480px)'});
                        var rotation = [1440, 1485, 1530, 1575, 1620, 1665, 1710, 1755];
                        var pick = Math.floor(Math.random() * 8);
                        var pick3 = pick;
                        var spin = rotation[pick];
                        $('.tombola2').css({'transform': 'rotateX(' + spin + 'deg) translateZ(-480px)'});
                        var rotation = [1440, 1485, 1530, 1575, 1620, 1665, 1710, 1755];
                        var pick = Math.floor(Math.random() * 8);
                        var pick4 = pick;
                        var spin = rotation[pick];
                        $('.tombola3').css({'transform': 'rotateX(' + spin + 'deg) translateZ(-480px)'});
                        var rotation = [1440, 1485, 1530, 1575, 1620, 1665, 1710, 1755];
                        var pick = Math.floor(Math.random() * 8);
                        var pick5 = pick;
                        var spin = rotation[pick];
                        $('.tombola4').css({'transform': 'rotateX(' + spin + 'deg) translateZ(-480px)'});
                        if (pick1 != 4) {
                            if (pick2 != 2 && pick2 != 4) {
                                if (pick3 != 1 && pick3 != 3) {
                                    if (pick4 != 4) {
                                        if (pick5 != 2 && pick5 != 5) {
                                            Ganadores++;
                                            Get_Ganador();
                                            EsperarResultado(3000);
                                            Gano = 1;
                                        } else {
                                            Gano = 0;
                                            stopConfetti();
                                        }
                                    } else {
                                        Gano = 0;
                                        stopConfetti();
                                    }
                                } else {
                                    Gano = 0;
                                    stopConfetti();
                                }
                            } else {
                                Gano = 0;
                                stopConfetti();
                            }

                        } else {
                            Gano = 0;
                            stopConfetti();
                        }

                        if (Ganadores <= NumeroDePremios) {
                            if (Gano == 0) {
                                otrarapido(4000);
                            } else {
                                otra(15000);
                            }
                        } else {
                            OcultarGanador();
                            document.getElementById('Ganador').innerHTML = "MUCHAS FELICIDADES EL SORTEO HA FINALIZADO.";
                            MostrarGanador();
                        }

                    }

                    var confetti = {
                        maxCount: 150, //set max confetti count
                        speed: 2, //set the particle animation speed
                        frameInterval: 15, //the confetti animation frame interval in milliseconds
                        alpha: 1.0, //the alpha opacity of the confetti (between 0 and 1, where 1 is opaque and 0 is invisible)
                        gradient: false, //whether to use gradients for the confetti particles
                        start: null, //call to start confetti animation (with optional timeout in milliseconds, and optional min and max random confetti count)
                        stop: null, //call to stop adding confetti
                        toggle: null, //call to start or stop the confetti animation depending on whether it's already running
                        pause: null, //call to freeze confetti animation
                        resume: null, //call to unfreeze confetti animation
                        togglePause: null, //call to toggle whether the confetti animation is paused
                        remove: null, //call to stop the confetti animation and remove all confetti immediately
                        isPaused: null, //call and returns true or false depending on whether the confetti animation is paused
                        isRunning: null		//call and returns true or false depending on whether the animation is running
                    };

                    confetti.start = startConfetti;
                    confetti.stop = stopConfetti;
                    confetti.toggle = toggleConfetti;
                    confetti.pause = pauseConfetti;
                    confetti.resume = resumeConfetti;
                    confetti.togglePause = toggleConfettiPause;
                    confetti.isPaused = isConfettiPaused;
                    confetti.remove = removeConfetti;
                    confetti.isRunning = isConfettiRunning;
                    var supportsAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame;
                    var colors = ["rgba(30,144,255,", "rgba(107,142,35,", "rgba(255,215,0,", "rgba(255,192,203,", "rgba(106,90,205,", "rgba(173,216,230,", "rgba(238,130,238,", "rgba(152,251,152,", "rgba(70,130,180,", "rgba(244,164,96,", "rgba(210,105,30,", "rgba(220,20,60,"];
                    var streamingConfetti = false;
                    var animationTimer = null;
                    var pause = false;
                    var lastFrameTime = Date.now();
                    var particles = [];
                    var waveAngle = 0;
                    var context = null;

                    function resetParticle(particle, width, height) {
                        particle.color = colors[(Math.random() * colors.length) | 0] + (confetti.alpha + ")");
                        particle.color2 = colors[(Math.random() * colors.length) | 0] + (confetti.alpha + ")");
                        particle.x = Math.random() * width;
                        particle.y = Math.random() * height - height;
                        particle.diameter = Math.random() * 10 + 5;
                        particle.tilt = Math.random() * 10 - 10;
                        particle.tiltAngleIncrement = Math.random() * 0.07 + 0.05;
                        particle.tiltAngle = Math.random() * Math.PI;
                        return particle;
                    }

                    function toggleConfettiPause() {
                        if (pause)
                            resumeConfetti();
                        else
                            pauseConfetti();
                    }

                    function isConfettiPaused() {
                        return pause;
                    }

                    function pauseConfetti() {
                        pause = true;
                    }

                    function resumeConfetti() {
                        pause = false;
                        runAnimation();
                    }

                    function runAnimation() {
                        if (pause)
                            return;
                        else if (particles.length === 0) {
                            context.clearRect(0, 0, window.innerWidth, window.innerHeight);
                            animationTimer = null;
                        } else {
                            var now = Date.now();
                            var delta = now - lastFrameTime;
                            if (!supportsAnimationFrame || delta > confetti.frameInterval) {
                                context.clearRect(0, 0, window.innerWidth, window.innerHeight);
                                updateParticles();
                                drawParticles(context);
                                lastFrameTime = now - (delta % confetti.frameInterval);
                            }
                            animationTimer = requestAnimationFrame(runAnimation);
                        }
                    }

                    function startConfetti(timeout, min, max) {
                        var width = window.innerWidth;
                        var height = window.innerHeight;
                        window.requestAnimationFrame = (function () {
                            return window.requestAnimationFrame ||
                                    window.webkitRequestAnimationFrame ||
                                    window.mozRequestAnimationFrame ||
                                    window.oRequestAnimationFrame ||
                                    window.msRequestAnimationFrame ||
                                    function (callback) {
                                        return window.setTimeout(callback, confetti.frameInterval);
                                    };
                        })();
                        var canvas = document.getElementById("confetti-canvas");
                        if (canvas === null) {
                            canvas = document.createElement("canvas");
                            canvas.setAttribute("id", "confetti-canvas");
                            canvas.setAttribute("style", "display:block;z-index:999999;pointer-events:none;position:fixed;top:0");
                            document.body.prepend(canvas);
                            canvas.width = width;
                            canvas.height = height;
                            window.addEventListener("resize", function () {
                                canvas.width = window.innerWidth;
                                canvas.height = window.innerHeight;
                            }, true);
                            context = canvas.getContext("2d");
                        } else if (context === null)
                            context = canvas.getContext("2d");
                        var count = confetti.maxCount;
                        if (min) {
                            if (max) {
                                if (min == max)
                                    count = particles.length + max;
                                else {
                                    if (min > max) {
                                        var temp = min;
                                        min = max;
                                        max = temp;
                                    }
                                    count = particles.length + ((Math.random() * (max - min) + min) | 0);
                                }
                            } else
                                count = particles.length + min;
                        } else if (max)
                            count = particles.length + max;
                        while (particles.length < count)
                            particles.push(resetParticle({}, width, height));
                        streamingConfetti = true;
                        pause = false;
                        runAnimation();
                        if (timeout) {
                            window.setTimeout(stopConfetti, timeout);
                        }
                    }

                    function stopConfetti() {
                        streamingConfetti = false;
                    }

                    function removeConfetti() {
                        stop();
                        pause = false;
                        particles = [];
                    }

                    function toggleConfetti() {
                        if (streamingConfetti)
                            stopConfetti();
                        else
                            startConfetti();
                    }

                    function isConfettiRunning() {
                        return streamingConfetti;
                    }

                    function drawParticles(context) {
                        var particle;
                        var x, y, x2, y2;
                        for (var i = 0; i < particles.length; i++) {
                            particle = particles[i];
                            context.beginPath();
                            context.lineWidth = particle.diameter;
                            x2 = particle.x + particle.tilt;
                            x = x2 + particle.diameter / 2;
                            y2 = particle.y + particle.tilt + particle.diameter / 2;
                            if (confetti.gradient) {
                                var gradient = context.createLinearGradient(x, particle.y, x2, y2);
                                gradient.addColorStop("0", particle.color);
                                gradient.addColorStop("1.0", particle.color2);
                                context.strokeStyle = gradient;
                            } else
                                context.strokeStyle = particle.color;
                            context.moveTo(x, particle.y);
                            context.lineTo(x2, y2);
                            context.stroke();
                        }
                    }

                    function updateParticles() {
                        var width = window.innerWidth;
                        var height = window.innerHeight;
                        var particle;
                        waveAngle += 0.01;
                        for (var i = 0; i < particles.length; i++) {
                            particle = particles[i];
                            if (!streamingConfetti && particle.y < -15)
                                particle.y = height + 100;
                            else {
                                particle.tiltAngle += particle.tiltAngleIncrement;
                                particle.x += Math.sin(waveAngle) - 0.5;
                                particle.y += (Math.cos(waveAngle) + particle.diameter + confetti.speed) * 0.5;
                                particle.tilt = Math.sin(particle.tiltAngle) * 15;
                            }
                            if (particle.x > width + 20 || particle.x < -20 || particle.y > height) {
                                if (streamingConfetti && particles.length <= confetti.maxCount)
                                    resetParticle(particle, width, height);
                                else {
                                    particles.splice(i, 1);
                                    i--;
                                }
                            }
                        }
                    }

                </script>

                <script>


                    function Get_Ganador() {

                        var data = {
                            Id: "Nada"
                        };
                        //console.log(data);
                        $.ajax({
                            method: "GET",
                            url: "Backend.php",
                            data: {
                                datos: JSON.stringify(data)
                            },
                            dataType: "json",
                            contentType: "application/json",
                            success: function (resp) {
                                if (resp.Success === 1) {
                                    console.log(resp);
                                    document.getElementById('Ganador').innerHTML = "&#161;" + resp.Concursante + " Gano " + resp.Gano + " !";

                                }
                            }
                        });
                    }
                    function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    async function otra(time) {

                        await sleep(time);
                        OcultarGanador();
                        rotar();

                    }
                    async function otrarapido(time) {

                        await sleep(time);
                        rotar();

                    }
                    async function EsperarResultado(time) {
                        await sleep(time);
                        audioGanador.play();
                        startConfetti();
                        MostrarGanador();
                        audioGesto.play();
                    }
                </script>

                <script>
// Get the modal
                    var modal = document.getElementById("myModal");


// Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
                    function  MostrarGanador() {
                        modal.style.display = "block";
                    }

// When the user clicks on <span> (x), close the modal
                    function OcultarGanador() {
                        modal.style.display = "none";
                    }

// When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                </html>