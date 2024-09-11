
$filename1 = "../numOfBeers.txt";
$filename2 = "../openRequired.txt";

$prepTime = 0;

if (isset($_POST['numOfBeers']) && isset($_POST['openRequired'])) {
    $numOfBeers = $_POST['numOfBeers'];
    $openRequired = $_POST['openRequired'];

    if (file_put_contents($filename1, $numOfBeers) === false) {
        echo "Error writing to $filename1";
        exit();
    }

    if (file_put_contents($filename2, $openRequired) === false) {
        echo "Error writing to $filename2";
        exit();
    }

    if ($numOfBeers == 1) {
        $prepTime = $openRequired == 0 ? 114 : 140;
    } elseif ($numOfBeers == 2) {
        $prepTime = $openRequired == 0 ? 170 : 196;
    }

}

echo  <<<HTML
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beer Robot</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
                .countdown {
                        font-size:3rem;
                        font-weight:bold;
                }
        </style>
</head>
<body>

        <nav class="navbar" style="background: #0e203e">
                <div class="container-fluid justify-content-start text-start">
                <img src="https://www.tum.de/typo3conf/ext/in2template/Resources/Public/Images/Backend/tum-logo.svg" alt="Logo" class="d-inline-block">
                <h6 class="mb-0 mx-2 d-inline-block align-text-top" style="color: #ffffff">ROBOT<BR>BAR</h6>
                </div>
        </nav>
<div class="container">
        <div class="row mt-3">
                <div class="col mx-3">
                        <div class="card">
                                <div class="card-body">
        <h4 class="card-title">THANK YOU FOR ORDERING!</h4>
        <h5 class="card-subtitle mb-2 text-muted" id="subtitle">The robot is preparing your order</h5>

        <div class="countdown text-center">
        <span id="minutes">--</span>:<span id="seconds">--</span>
        </div>
        

        <div class="progress mb-2">
                 <div class="progress-bar" id="progress-bar"  style="background: #0e203e; width:0%"></div>
        </div>
        <h6 class="text-center text-muted mt-2" id="message">Your drinks are almost ready</h5>
                        </div>
                        </div>

                </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    let totalTime = $prepTime;

    const minutesSpan = document.getElementById('minutes');
    const secondsSpan = document.getElementById('seconds');
    const messageSpan = document.getElementById('message');
    const progressBar = document.getElementById("progress-bar");

    function startCountdown(time) {

        const endTime = Date.now() + time * 1000;
        const interval = setInterval(function() {

            const now = Date.now();
            const remainingTime = Math.floor((endTime - now) / 1000);
            const percentage = Math.floor(((totalTime - remainingTime) / totalTime)*100 );

            if (remainingTime < 0) {
                clearInterval(interval);
                progressBar.style.width = 100+"%";
                messageSpan.textContent = "Enjoy your drink!";
                alert('Your order is ready!');
                minutesSpan.textContent = "00";
                secondsSpan.textContent = "00";

                return;
            }


        if (percentage < 60) {
            messageSpan.textContent = "Good things take time - relax and enjoy the show";
        } else if (percentage >60){
            messageSpan.textContent = "Your drinks are almost ready!";
        } else if (percentage >= 90) {
            messageSpan.textContent = "Please come to the bar to pick up your drinks!!";
        }

            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;


            minutesSpan.textContent = String(minutes).padStart(2, '0');
            secondsSpan.textContent = String(seconds).padStart(2, '0');
            progressBar.style.width = percentage + "%";

        }, 1000);
    }


    startCountdown(totalTime);
</script>


</div>
</body>
</html>
HTML;
?>

