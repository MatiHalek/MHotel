<!DOCTYPE html>
<html lang="pl">
<head>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MHotel to hotel Twoich marzeń! Gwarantujemy przyjemny oraz spokojny wypoczynek w przytulnych pokojach z mnóstwem zachwycających widoków i ze smacznym jedzeniem. Zarezerwuj już teraz w atrakcyjnej cenie pokój, który najbardziej Ci odpowiada - bezpiecznie, online! Zapraszamy!">
    <link rel="shortcut icon" href="images/hotelIcon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <base href="/hotel/">
    <link rel="stylesheet" href="style.css">
    <title>MHotel | Kontakt</title>
</head>
<body id="p2">
    <?php
        include "header.php";
    ?>
    <main class="container-md">
        <div class="row start text-center">
            <div>
                <h1>Kontakt</h1>
                <h2>&#11088; Skontaktuj się z nami &#11088;</h2>
            </div>          
        </div>
        <div class="row">
            <nav aria-label="breadcrumb" class="d-flex flex-wrap">
                <b>Jesteś tutaj:  &nbsp;</b>
                <ol class="breadcrumb">                    
                    <li class="breadcrumb-item"><a href="./">Strona główna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontakt</li>
                </ol>
            </nav>
            <hr>
            <h3 class="text-center">Najczęściej zadawane pytania (FAQ):</h3>
            <div class="accordion accordion-flush" id="accordions">
                <div class="accordion-item">
                    <h4 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        W jakich godzinach są serwowane posiłki?
                    </button>
                    </h4>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordions">
                    <div class="accordion-body"><ul><li>Śniadania - 7:00</li><li>Obiady - 14:00</li><li>Kolacje - 19:00</li></ul>Dodatkowe posiłki można kupić w naszej restauracji czynnej w godzinach 6:00-23:00.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Czy można przyjść do hotelu ze zwierzętami?
                    </button>
                    </h4>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordions">
                    <div class="accordion-body">Zdajemy sobie sprawę, że wielu z Was nie może podróżować bez ulubionych zwierzaków, z tego powodu też akceptujemy popularne rasy psów i kotów.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Czy w hotelu można zrealizować bon turystyczny?
                    </button>
                    </h4>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordions">
                    <div class="accordion-body">Niestety, obecnie nie jest to możliwe. Okres ważności bonu turystycznego upłynął z dniem 31 marca 2023 r.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Czy można anulować wcześniejszą rezerwację?
                    </button>
                    </h4>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFourF" data-bs-parent="#accordions">
                    <div class="accordion-body">Tak, można to zrobić zgodnie z naszym <a href="./">regulaminem</a>. Aby otrzymać więcej informacji, skontaktuj się z nami poprzez "Wiadomość do zarządzającego".</div>
                    </div>
                </div>
            </div><br><br>
            <hr class="mt-2">
            <h3 class="text-center">Nasza lokalizacja: </h3>
            <iframe title="ZSTiO w Limanowej" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2580.6343348443274!2d20.4199898!3d49.6988585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47161cd0d7dfe0e5%3A0x8b8e90f28d06c112!2zWmVzcMOzxYIgU3prw7PFgiBUZWNobmljem55Y2ggaSBPZ8OzbG5va3N6dGHFgmNhY3ljaCBpbS4gSmFuYSBQYXfFgmEgSUk!5e0!3m2!1spl!2spl!4v1653955199605!5m2!1spl!2spl" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row" id="contactForm">
            <form action="./" class="text-center col-md-8 mx-auto">
                <h3>Formularz kontaktowy</h3>
                <p>Wyślij wiadomość do zarządzającego hotelem</p>
                    <div class="row g-2 mb-0" id="formRow">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="formName" placeholder="Imię" maxlength="30" required autocomplete="given-name">
                                <label for="formName">Imię</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="formSurname" placeholder="Nazwisko" maxlength="50" required autocomplete="family-name">
                                <label for="formSurname">Nazwisko</label>
                            </div> 
                        </div>
                    </div>                 
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="formEmail" placeholder="adres@domena.pl" maxlength="254" required autocomplete="email">
                        <label for="formEmail">Adres e-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="formTitle" placeholder="Tytuł wiadomości" maxlength="100" required>
                        <label for="formTitle">Tytuł wiadomości</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="formDescription" placeholder="O co chcesz nas zapytać?" minlength="10" maxlength="1000" required></textarea>
                        <label for="formDescription">Opis</label>
                    </div>
                    <label class="pt-2 fw-bold"><input type="checkbox" required> Oświadczam, że zapoznałem/am się z regulaminem MHotel i akceptuję go.</label>
                    <p class="fw-bold fst-italic">(<a href="./">przeczytaj regulamin</a>)</p>
                    <input type="submit" value="Wyślij!" class="btn btn-primary mb-4 customButton">
            </form>
        </div>
    </main>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>