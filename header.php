<?php
    error_reporting(0);
    if(session_status() === PHP_SESSION_NONE)
        session_start();
?>
<header class="sticky-top">
    <nav class="navbar navbar-dark bg-dark" id="mainNavigation">
        <div class="container-fluid position-relative">
            <a class="navbar-brand lh-1 px-1 rounded" id="mainLogo" href="./" data-bs-toggle="tooltip" data-bs-custom-class="moveTooltip" title="Strona główna MHotel"><img src="images/hotelIcon.png" alt="ikona" width="34" height="34"> MHotel</a>
            <div data-bs-toggle="tooltip" title="Rozwiń menu">
                <button class="navbar-toggler position-relative" aria-label="Rozwiń menu" type="button" data-bs-toggle="offcanvas"  data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>  
                </button>
            </div>
            <?php
                if(isset($_SESSION["logged"]) && $_SESSION["logged"])
                    echo "<img src='./images/verified.png' alt='Konto administratora' id='verified' width='20' height='20' class='position-absolute top-0 start-100' data-bs-toggle='tooltip' data-bs-custom-class='coloredTooltip' title='Zalogowano jako administrator'>";
            ?>
            <div class="<?php if(isset($_SESSION["error"])){echo 'show ';} ?>offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold" id="offcanvasDarkNavbarLabel">MHotel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-toggle="tooltip" title="Zamknij menu"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="./">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pokoje/">Pokoje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt/">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="terminy/">Wolne terminy</a>
                </li>
                </ul>
                <hr>
                <?php                  
                if(isset($_SESSION["logged"]) && $_SESSION["logged"])
                {
                    echo "<div class='btn-group'><button type='button' class='btn btn-primary ml-2 dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    echo $_SESSION["username"];
                    echo "</button><ul class='dropdown-menu'><li><a class='dropdown-item' href='logout/'>Wyloguj się</a></li></ul></div>";
                }
                else
                {
                    echo "<h5 class='text-light mt-3'>Zaloguj się (administrator)</h5>";
                    if(isset($_SESSION["error"]))
                    {
                        echo $_SESSION["error"];
                        unset($_SESSION["error"]);
                    }                    
                    echo<<<form
                    <form class="mt-3" action="login.php" method="post">
                    <input class="form-control me-2" type="text" placeholder="Login" aria-label="Login" value="admin" name="username">
                    <input class="form-control me-2" type="password" placeholder="Hasło" aria-label="Password" value="qwerty" name="password">
                    <button class="btn btn-success customButton mt-2" type="submit">Zaloguj się</button>
                    </form>
                    form;
                }
                ?>
            </div>
            </div>
        </div>
        <button id="scrolltoTop" type="button" class="customButton">Do góry</button>
    </nav>
</header>
<script>
    const elements = document.getElementsByClassName("nav-link");
    elements[document.body.id[1]].classList.add("active");
    elements[document.body.id[1]].setAttribute("aria-current", "page");
    document.querySelector("#scrolltoTop").addEventListener("click", () => window.scrollTo(0, 0));
    window.addEventListener("scroll", () => {
        if(document.documentElement.scrollTop > 200)
        {
            document.querySelector("#scrolltoTop").style.opacity = "1";
            document.querySelector("#scrolltoTop").style.visibility = "visible";
        }  
        else
        {
            document.querySelector("#scrolltoTop").style.opacity = "0";
            document.querySelector("#scrolltoTop").style.visibility = "hidden";
        }           
    });
    if(<?php echo date("n")?> < 3 || <?php echo date("n")?> > 10)
        document.body.classList.add("winter");
</script>