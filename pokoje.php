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
    <title>MHotel | Nasze pokoje</title>
</head>
<body id="p1">
    <?php
    include "header.php";
    ?>
    <div class="fullscreen">
        <button id="close" type="button" title="Zamknij" data-bs-toggle="tooltip" data-bs-trigger="hover">&#x0078;</button>
        <button id="back" type="button" title="Wstecz" data-bs-toggle="tooltip" data-bs-trigger="hover">&lt;</button>
        <div id="imageInfo"></div>
           <img src="images/p11.jpg" alt="Zdjęcie pokoju">                
        <button id="forward" type="button" title="Dalej" data-bs-toggle="tooltip" data-bs-trigger="hover">&gt;</button>
    </div>
    <main class="container-md">
        <div class="row start text-center">
            <div>
                <h1>Pokoje</h1>
                <h2>&#11088; Poznaj nasz wygląd &#11088;</h2>
            </div>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb" class="d-flex flex-wrap">
                <b>Jesteś tutaj: &nbsp;</b>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Strona główna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pokoje</li>
                </ol>
            </nav>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 1</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p11.jpg" alt="Zdjęcie pokoju nr 1" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Wnętrze pokoju</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p12.jpg" alt="Część kuchenna" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Część kuchenna</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p13.jpg" alt="Zdjęcie łazienki" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Łazienka</figcaption>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 2</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p21.jpg" alt="Zdjęcie pokoju nr 2" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Wnętrze pokoju</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p22.jpg" alt="Przytulny kącik" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">"Przytulny kącik"</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p23.jpg" alt="Zdjęcie łazienki" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Łazienka</figcaption>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 3</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p31.jpg" alt="Zdjęcie pokoju nr 3" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Ogólny wygląd</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p32.jpg" alt="Zdjęcie łazienki" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Łazienka</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p33.jpg" alt="Pokój z drugiej strony" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Widok pokoju z drugiej strony</figcaption>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 4</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p41.jpg" alt="Wygląd pokoju nr 4" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Wygląd pokoju</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p42.jpg" alt="Sypialnia" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Sypialnia</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p43.jpg" alt="Zdjęcie łazienki (widok od wejścia)" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Łazienka (widok od wejścia)</figcaption>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 5</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p51.jpg" alt="Widok ogólny pokoju nr 5" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Widok ogólny</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p52.jpg" alt="Przytulne łóżka" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Przytulne łóżka</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p53.jpg" alt="Wejście do pokoju" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Wejście do pokoju</figcaption>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h3 class="p-2">Pokój nr 6</h3>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p61.jpg" alt="Wygodne łózko w pokoju nr 6" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Wygodne łóżko</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p62.jpg" alt="Kącik z biurkiem" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Kącik z biurkiem</figcaption>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="p-3 mx-1 my-3">
                    <div class="imgContainer">
                        <img src="images/p63.jpg" alt="Łazienka" class="img-fluid img-thumbnail" height="255">
                    </div>
                    <figcaption class="pt-2">Łazienka</figcaption>
                </div>
            </div>
        </div>
    </main>
    <script>
        const imageParameters = {
            "data-bs-toggle": "tooltip",
            "title": "Przeglądaj w galerii"
        };
        document.querySelectorAll(".imgContainer > img").forEach(el => Object.keys(imageParameters).forEach(key => el.setAttribute(key, imageParameters[key])));
    </script>
    <?php
        include_once "footer.php";
    ?>
    <script>       
        function CloseAnimation()
        {
            const element = images.at(currentImage);
            fullscreenImage.style.animation = "none";
            fullscreenImage.style.transformOrigin = "0 0";
            const calculateX = element.getBoundingClientRect().left - fullscreenImage.getBoundingClientRect().left;
            const calculateY = element.getBoundingClientRect().top - fullscreenImage.getBoundingClientRect().top;
            const scaleX = element.getBoundingClientRect().width / fullscreenImage.getBoundingClientRect().width;
            const scaleY = element.getBoundingClientRect().height / fullscreenImage.getBoundingClientRect().height;
            fullscreenImage.style.transform = `translate(${calculateX}px, ${calculateY}px) scale(${scaleX}, ${scaleY})`;
            fullscreenImage.style.opacity = 0;
            document.querySelectorAll("#back, #forward, #close, #imageInfo").forEach(el => el.style.display = "none");
            fullscreen.addEventListener("transitionend", () => {
                fullscreenImage.style.opacity = 1;
                fullscreen.style.display = "none";
                fullscreenImage.style.transformOrigin = "initial";
                fullscreenImage.style.transform = "initial";
                document.querySelectorAll("#back, #forward, #close, #imageInfo").forEach(el => el.style.display = "initial");
            }, {
                once: true
            });
            fullscreen.classList.remove("fullscreen-active");
            document.body.style.overflow = "initial";
        }
        const fullscreen = document.querySelector(".fullscreen");
        const fullscreenImage = document.querySelector(".fullscreen img");
        const imageInfo = document.querySelector("#imageInfo");      
        const images = Array.from(document.querySelectorAll(".imgContainer"));     
        let currentImage = -1;
        images.forEach((element, index) => {
            element.addEventListener("click", () => {
                currentImage = index;
                fullscreenImage.setAttribute("src", element.firstElementChild.getAttribute("src"));
                fullscreenImage.setAttribute("alt", element.firstElementChild.getAttribute("alt"));
                fullscreen.style.display = "flex";
                setTimeout(() => {
                  fullscreen.classList.add("fullscreen-active");  
                }, 0);               
                imageInfo.innerHTML = `<h4>${element.parentElement.parentElement.parentElement.firstElementChild.textContent}</h4><h5>${element.parentElement.children[1].textContent}</h5><h5>${currentImage + 1}/${images.length}</h5>`;
                document.body.style.overflow = "hidden";
                fullscreenImage.style.animation = "imageIn .5s ease-in-out forwards";
            });
        });
        fullscreen.addEventListener("click", event => {
            if (event.currentTarget === event.target)
                CloseAnimation();
        });
        document.querySelector("#close").addEventListener("click", CloseAnimation);
        document.querySelector("#forward").addEventListener("click", () => {
            if (currentImage < images.length - 1) {
                fullscreenImage.setAttribute("src", images.at(currentImage + 1).firstElementChild.getAttribute("src"));
                fullscreenImage.setAttribute("alt", images.at(currentImage + 1).firstElementChild.getAttribute("alt"));
                imageInfo.innerHTML = `<h4>${images.at(currentImage + 1).parentElement.parentElement.parentElement.firstElementChild.textContent}</h4><h5>${images.at(currentImage + 1).parentElement.children[1].textContent}</h5><h5>${currentImage + 2}/${images.length}</h5>`;
            } else {
                fullscreenImage.setAttribute("src", images.at(0).firstElementChild.getAttribute("src"));
                fullscreenImage.setAttribute("alt", images.at(0).firstElementChild.getAttribute("alt"));
                imageInfo.innerHTML = `<h4>${images.at(0).parentElement.parentElement.parentElement.firstElementChild.textContent}</h4><h5>${images.at(0).parentElement.children[1].textContent}</h5><h5>1/${images.length}</h5>`;
            }
            currentImage = ++currentImage % images.length;
        });
        document.querySelector("#back").addEventListener("click", () => {
            if (currentImage > 0) {
                fullscreenImage.setAttribute("src", images.at(currentImage - 1).firstElementChild.getAttribute("src"));
                fullscreenImage.setAttribute("alt", images.at(currentImage - 1).firstElementChild.getAttribute("alt"));
                imageInfo.innerHTML = `<h4>${images.at(currentImage - 1).parentElement.parentElement.parentElement.firstElementChild.textContent}</h4><h5>${images.at(currentImage - 1).parentElement.children[1].textContent}</h5><h5>${currentImage}/${images.length}</h5>`;
                currentImage--;
            } else {
                fullscreenImage.setAttribute("src", images.at(-1).firstElementChild.getAttribute("src"));
                fullscreenImage.setAttribute("alt", images.at(-1).firstElementChild.getAttribute("alt"));
                imageInfo.innerHTML = `<h4>${images.at(-1).parentElement.parentElement.parentElement.firstElementChild.textContent}</h4><h5>${images.at(-1).parentElement.children[1].textContent}</h5><h5>${images.length}/${images.length}</h5>`;
                currentImage = images.length - 1;
            }
        });
        images.forEach(element => {
            element.addEventListener("mouseover", () => element.firstElementChild.style.filter = "brightness(35%)");
            element.addEventListener("mouseout", () => element.firstElementChild.style.filter = "none");
        });
    </script>
</body>
</html>