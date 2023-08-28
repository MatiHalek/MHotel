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
    <title>MHotel - wypocznij, zasmakuj, podziwiaj | Strona główna</title>
</head>
<body id="p0">
    <?php
        include "header.php";
    ?>
    <main class="container-md">
        <div class="row start text-center">
            <div>
                <h1>Witamy</h1>
                <h2>&#9196; Kliknij, aby dowiedzieć się więcej o naszym hotelu &#9196;</h2>                              
            </div>                     
        </div>
        <div class="row text-center">
            <h3>Wolne terminy</h3>
            <h4 class="fst-italic fs-5">Mamy dla Ciebie wiele przystępnych terminów! Kliknij, aby zobaczyć, który z nich najbardziej Ci odpowiada!</h4>
            <a class="btn btn-primary m-2 mx-auto customButton" href="terminy/">Więcej</a><hr>
            <h3>Kontakt</h3>
            <h4 class="fst-italic fs-5">Chcesz nam zadać pytanie? Tutaj możesz znaleźć odpowiedzi na te najpopularniejsze, a także rozwiać swoje własne wątpliwości!</h4>
            <a class="btn btn-primary m-2 mx-auto customButton" href="kontakt/">Więcej</a><hr>
            <h3>Pokoje</h3>
            <h4 class="fst-italic fs-5">Oferujemy wiele przytulnych i eleganckich pokoi. Wybierz coś dla siebie!</h4>
            <a class="btn btn-primary m-2 mx-auto customButton" href="pokoje/">Więcej</a>
        </div>
        <div class="row mt-4 p-0 position-relative">
            <video src="images/video.mp4" autoplay muted loop class="m-0 p-0">
                Niestety, Twoja przeglądarka nie obsługuje elementu wideo HTML5.
            </video>
            <div class="form-check form-switch position-absolute bottom-0 left-0 mb-4">
                <input class="form-check-input ms-0" type="checkbox" role="switch" id="switch" aria-label="Wstrzymaj/Wznów odtwarzanie wideo"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Odtwarzanie wideo jest włączone" data-bs-placement="right" checked>             
            </div>
        </div>        
    </main>
    <?php
        include_once "footer.php";
    ?>   
    <script>
        const video = document.querySelector("video");
        document.querySelector("#switch").addEventListener("change", () => {
            const tooltip = bootstrap.Tooltip.getInstance('#switch');
            if(video.paused)
            {
                video.play();
                tooltip.setContent({'.tooltip-inner' : "Odtwarzanie wideo jest włączone"});
            }               
            else
            {
                video.pause();
                tooltip.setContent({'.tooltip-inner' : "Odtwarzanie wideo jest wyłączone"});
            }                          
        });
    </script>
</body>
</html>