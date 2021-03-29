<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Unsere Bibliothek</h1>
        <form>
            <h3>Neues Buch anlegen</h3>
            <div class="mb-3">
                <label for="buchTitel" class="form-label">Buchtitel</label>
                <input type="text" class="form-control" id="buchTitel">
            </div>
            <div class="mb-3">
                <label for="buchTitel" class="form-label">Kurzbeschreibung</label>
                <textarea class="form-control" placeholder="Gebe hier eine kurze Beschreibung des Buches ein (max. 150 Zeichen)." id="kurzb"></textarea>
            </div>
            <div class="mb-3">
                <label for="buchTitel" class="form-label">Verlag</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Verlag auswählen</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Die in diesem Formular eingegebene Daten werden wervendet, um ein neues Buch in unserer Datenbank anzulegen. Die Daten sind durch Absenden des Formular für die Öffentlichkeit einsehbar.</label>
            </div>
            <button type="submit" class="btn btn-primary">Neues Buch erstellen</button>
        </form>
    </div>
    <br>
    <br>

    <!-- Unten Cards -->
    <div class="container">
        <h2>Unsere Bücher</h2>

        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="card row" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>


    <!-- Footer Bereich -->
    <div class="container">
    </div>
</body>

</html>