<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beer Robot</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <h4 class="card-title">WELCOME TO OUR ROBOT BAR!</h4>
        <h5 class="card-subtitle mb-2 text-muted">Order your beer here</h5>

        <form id="orderForm" action="orderPlaced.php" method="POST">
<div class="row mt-4">
<div class="col text-center">
                <h5 class="card-text text-start">How many beers do you want?</h5>
                <div class="btn-group w-100" role="group" aria-label="Drink Quantity">
                        <input type="radio" class="btn-check" name="numOfBeers" id="opt1" value="1" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary" for="opt1">1 Beer</label>

                        <input type="radio" class="btn-check" name="numOfBeers" id="opt2" value="2" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="opt2">2 Beers</label>
                </div>
</div>
</div>
<div class="row mt-4">
<div class="col text-center">
                <h5 class="card-text text-start">Is the bottle open already?</h5>
                <div class="btn-group w-100" role="group" aria-label="Bottle Status">
                        <input type="radio" class="btn-check" name="openRequired" id="op1" value="0" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary" for="op1">Bottle is open</label>

                        <input type="radio" class="btn-check" name="openRequired" id="op2" value="1" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="op2">Bottle is closed</label>
                </div>

                <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Order now</button>
                </div>

</div>
</div>


        </form>
                                </div>
                        </div>

                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>