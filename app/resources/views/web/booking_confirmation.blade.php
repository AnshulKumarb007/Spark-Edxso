<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #555;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-box {
            width: 100%;
            max-width: 450px;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-top {
            background-color: #3c78ff;
            padding: 13px 0;
            display: flex;
            justify-content: center;
        }

        .card-top .checkmark {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .checkmark i {
            font-size: 36px;
            color: white;
        }

        .card-body {
            text-align: center;
            padding: 30px 20px;
        }

        .logo-text {
            font-size: 28px;
            font-weight: bold;
            color: #004aad;
            letter-spacing: 1px;
        }

        .logo-text span {
            color: #ff4b00;
        }

        .btn-primary {
            background-color: #0056d2;
        }

        .btn-primary:hover {
            background-color: #0044a3;
        }
        @media print {
            #printPage {
                display: none;
            }
            body {
                font-size: 12pt;
            }
            .no-print {
                display: none;
            }
        }
        .font-size-em{
            font-size: .7em;
            color:red;
        }
        strong{
            font-size: 29px;
            color: #28a745;
        }
    </style>
    <div class="card-box text-center">
        <div class="card-top">
            <div class="checkmark">
                <i class="bi bi-check-lg"></i>
            </div>
        </div>
        <div class="card-body">
            <canvas id="fireworksCanvas" style="position:fixed; top:0; left:0; width:100%; height:100%; pointer-events:none; z-index:9999;"></canvas>
            <div class="logo-text">
                <img src="{{ asset('web/assets/img/logo.svg') }}" class="img-fluid" alt="logo" />
            </div>
            <div id="congratsMessage" style="display:none;">
                <strong>Congratulations!</strong>
            </div>
            <p class="mt-3 mb-1 mb-3">Your registration has been confirmed successfully.</p>
            @if($student)
                <div class="mt-4" style="text-align:left">
                    <p><strong style="font-size: 14px">Order ID:</strong> {{ $student->razorpay_order_id }}</p>
                    <p><strong style="font-size: 14px">Transaction ID:</strong> {{ $student->razorpay_payment_id }}</p>
                    <p><strong style="font-size: 14px">Status:</strong> {{ ucfirst($student->status) }}</p>
                </div>
            @endif
            <a href="/" class="btn btn-outline-primary px-4">Back To Website</a>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        function launchFireworks() {
            const canvas = document.getElementById('fireworksCanvas');
            const ctx = canvas.getContext('2d');

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const particles = [];

            function random(min, max) {
                return Math.random() * (max - min) + min;
            }

            function createFirework() {
                const x = random(100, canvas.width - 100);
                const y = random(100, canvas.height / 2);
                const colors = ['#ff0043', '#14fc56', '#1e90ff', '#f7ff00', '#ff7f50'];

                for (let i = 0; i < 100; i++) {
                    particles.push({
                        x: x,
                        y: y,
                        radius: 2,
                        color: colors[Math.floor(Math.random() * colors.length)],
                        angle: Math.random() * 2 * Math.PI,
                        speed: random(2, 8),
                        alpha: 1,
                        decay: random(0.01, 0.03)
                    });
                }
            }

            function updateParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                for (let i = particles.length - 1; i >= 0; i--) {
                    const p = particles[i];
                    p.x += Math.cos(p.angle) * p.speed;
                    p.y += Math.sin(p.angle) * p.speed + 1;
                    p.alpha -= p.decay;

                    if (p.alpha <= 0) {
                        particles.splice(i, 1);
                        continue;
                    }

                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI);
                    ctx.fillStyle = `rgba(${hexToRgb(p.color)}, ${p.alpha})`;
                    ctx.fill();
                }

                requestAnimationFrame(updateParticles);
            }

            function hexToRgb(hex) {
                const bigint = parseInt(hex.replace('#', ''), 16);
                const r = (bigint >> 16) & 255;
                const g = (bigint >> 8) & 255;
                const b = bigint & 255;
                return `${r},${g},${b}`;
            }
            document.getElementById('congratsMessage').style.display = 'block';
            createFirework();
            updateParticles();
            const interval = setInterval(createFirework, 1500);
            setTimeout(() => {
                clearInterval(interval);
                setTimeout(() => {
                    canvas.remove();
                    window.location.href = "/";
                    document.getElementById('congratsMessage').style.display = 'none';
                }, 1000);
            }, 15000);
        }
        launchFireworks();
        </script>
    </body>
</html>

