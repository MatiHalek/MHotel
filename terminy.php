<?php
    error_reporting(0);
    session_start();  
    if(isset($_SESSION["logged"], $_POST["dateFrom"], $_POST["dateTo"], $_POST["people"], $_POST["room"], $_POST["name"], $_POST["surname"], $_POST["phone"], $_POST["prepayment"]) && $_SESSION["logged"])
    {
        $connect = new mysqli("localhost", "root", "", "hotel");
        $connect->set_charset('utf8mb4');
        $dateFrom = $_POST["dateFrom"];
        $dateTo = $_POST["dateTo"];
        $people = $_POST["people"];
        $room = $_POST["room"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $phone = $_POST["phone"];
        $prepayment = $_POST["prepayment"];
        function ValidateDate($date)
        {
            $d = DateTime::createFromFormat("Y-m-d", $date);
            return $d && $d->format("Y-m-d") == $date;
        }
        $errors = "";
        if(!ValidateDate($dateFrom))
            $errors.="<li>Data początkowa pobytu jest nieprawidłowa (akceptowany format: RRRR-MM-DD).</li>";
        if(!ValidateDate($dateTo))
            $errors.="<li>Data końcowa pobytu jest nieprawidłowa (akceptowany format: RRRR-MM-DD).</li>";
        if(ValidateDate($dateFrom) && ValidateDate($dateTo))
        {
            $dateFrom1 = new DateTime($dateFrom);
            $dateTo1 = new DateTime($dateTo);
            $dateStart = new DateTime(date("Y-m-d"));
            $dateEnd = new DateTime(date("Y-m-t", strtotime("+ 2 years")));
            if($dateFrom1 < $dateStart)
                $errors.="<li>Data początkowa pobytu nie może być wcześniejsza niż ".date("d.m.Y").".</li>";
            elseif($dateTo1 > $dateEnd)
                $errors.="<li>Data końcowa pobytu nie może być późniejsza niż ".date("t.m.Y", strtotime("+ 2 years")).".</li>";
            elseif($dateFrom1 > $dateTo1)
                $errors.="<li>Data początkowa pobytu nie może być późniejsza niż data końcowa.</li>";
            else
            {
                $today = date("Y-m-d");
                $query = $connect->prepare("SELECT date_start, date_end FROM reservation WHERE date_end >= ? AND room = ?");
                $query->bind_param("si", $today, $room);
                $query->execute();
                $result = $query->get_result();
                while($row = $result->fetch_assoc())
                {
                    if($dateFrom1 <= new DateTime($row["date_end"]) && $dateTo1 >= new DateTime($row["date_start"]))
                    {
                        $errors.="<li>Przynajmniej jeden dzień w tym pokoju z podanego terminu jest już zajęty.</li>";
                        break;
                    }
                }
            }
        }
        if(!filter_var($people, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 5))))
            $errors.="<li>Liczba osób musi być liczbą całkowitą od 1 do 5.</li>";
        if(!filter_var($room, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 6))))
            $errors.="<li>Obecnie dostępne numery pokoi to: 1, 2, 3, 4, 5, 6.</li>";
        if(mb_strlen($name) == 0 || mb_strlen($name) > 30 || ctype_space($name))
            $errors.="<li>Imię musi być prawidłową wartością liczącą maksymalnie 30 znaków.</li>";
        if(mb_strlen($surname) == 0 || mb_strlen($surname) > 50 || ctype_space($surname))
            $errors.="<li>Nazwisko musi być prawidłową wartością liczącą maksymalnie 50 znaków.</li>";
        if(mb_strlen($phone) == 0 || mb_strlen($phone) > 30 || ctype_space($phone))
            $errors.="<li>Numer telefonu musi być prawidłową wartością liczącą maksymalnie 30 znaków.</li>";
        if((!filter_var($prepayment, FILTER_VALIDATE_FLOAT, array("options" => array("min_range" => 0.00, "max_range" => 999999.99))) || !filter_var((float)$prepayment * 100, FILTER_VALIDATE_INT)) && $prepayment != 0)
            $errors.="<li>Wysokość przedpłaty musi być poprawną ceną wyrażoną w PLN od 0 do 999 999,99.</li>";
        if(empty($errors))
        {
            unset($_SESSION["remember_values"]);
            $query = $connect->prepare('INSERT INTO reservation (date_start, date_end, people, room, name, surname, phone, prepayment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $query->bind_param("ssiisssi", $dateFrom, $dateTo, $people, $room, $name, $surname, $phone, $prepayment);
            $query->execute();
        }
        else
        {
            $errors = "<b class='d-flex align-items-center'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='me-2' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
            </svg>Niestety, nie udało się dodać nowej rezerwacji. Wykryte błędy:</b><ul>$errors</ul>";
            $_SESSION["remember_values"] = array("dateFrom" => $dateFrom, "dateTo" => $dateTo, "people" => $people, "room" => $room, "name" => $name, "surname" => $surname, "phone" => $phone, "prepayment" => $prepayment);
        }        
        $_SESSION["result"] = $errors;
        $connect->close();
        header("Location: terminy/");
        exit();
    }   
?>
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
    <title>MHotel | Wolne terminy</title>
</head>
<body id="p3" class="pe-0">
    <?php
        include "header.php";
    ?>
    <main class="container-md">
        <?php
            if(isset($_SESSION["logged"]) && $_SESSION["logged"])
            {
                $connect = new mysqli("localhost", "root", "", "hotel");
                $connect->set_charset('utf8mb4');
                $today = date("Y-m-d");
                $query = $connect->prepare("SELECT date_start, date_end, room FROM reservation WHERE date_end >= ?");
                $query->bind_param("s", $today);
                $query->execute();
                $result = $query->get_result();
                echo "<script src='./components/Term.js'></script><script>";
                while($row = $result->fetch_assoc())
                    echo "terms.push(new Term(".(new DateTime($row["date_start"]))->getTimestamp().", ".(new DateTime($row["date_end"]))->getTimestamp().", ".$row["room"]."));\n";
                $connect->close();
                echo<<<modal
                </script>
                <div class="modal fade" tabindex="-1" id="invalidDateModal">
                    <div class="modal-dialog modal-dialog-centered" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Nieprawidłowy termin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Przepraszamy, ale w tym terminie wybrany pokój jest już zajęty.<br>Sprawdź kalendarz, aby wybrać wolny termin.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary customButton" data-bs-dismiss="modal">Rozumiem</button>
                            </div>
                        </div>
                    </div>  
                </div>  
                modal;            
                if(isset($_SESSION["result"]))
                {
                    echo "<div role='alert' id='validationMessage' class='d-flex align-items-center shadow position-fixed alert fade show alert-";
                    if(empty($_SESSION["result"]))
                        echo "success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='me-2' viewBox='0 0 16 16'>
                        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                      </svg><b>Pomyślnie dodano nową rezerwację!</b>";
                    else
                        echo "danger alert-dismissible'><div>".$_SESSION["result"]."</div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                    echo "</div>";
                    unset($_SESSION["result"]);
                }
            }              
        ?>
        <div class="row start text-center">
            <div>
                <h1>Wolne terminy</h1>
                <h2>&#11088; Sprawdź, kiedy możesz nas odwiedzić &#11088;</h2>
            </div>          
        </div>
        <div class="row text-center">
            <nav aria-label="breadcrumb" class="d-flex flex-wrap">
                <b>Jesteś tutaj:  &nbsp;</b>
                <ol class="breadcrumb">                    
                    <li class="breadcrumb-item"><a href="./">Strona główna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wolne terminy</li>
                </ol>
            </nav>
            <?php
                if(isset($_SESSION["logged"]) && $_SESSION["logged"])
                {
                    echo "<hr><h2 id='formHeader' class='fw-bold'>Wprowadź nowy termin:</h2>";                   
                    echo "<form action='terminy.php' method='post' id='newTermForm' class='mx-auto w-auto position-relative'><div class='text-start d-grid align-items-center'>";
                    echo "<input type='date' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["dateFrom"];
                    else
                        echo date('Y-m-d');
                    echo "' min='".date('Y-m-d')."' max='".date('Y-m-t', strtotime("+ 2 years"))."' name='dateFrom' id='dateFrom' required><label for='dateFrom'>Data początkowa pobytu: </label>";
                    echo "<input type='date' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["dateTo"];
                    else
                        echo date('Y-m-d', strtotime("+ 2 days"));
                    echo "' min='".date('Y-m-d')."' max='".date('Y-m-t', strtotime("+ 2 years"))."' name='dateTo' id='dateTo' required><label for='dateTo'>Data końcowa pobytu: </label>";
                    echo "<input type='range' class='d-inline-block' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["people"];
                    else
                        echo 3;
                    echo "' min='1' max='5' name='people' id='people' required><label for='people'>Ilość osób: <output for='people' class='position-absolute d-inline-flex justify-content-end fw-bold'>3</output></label>";
                    echo "<select name='room' id='rooms' required>";
                    for($i = 1; $i <= 6; $i++)
                    {
                        echo "<option value='$i'";
                        if(isset($_SESSION["remember_values"]) && $_SESSION["remember_values"]["room"] == $i || !isset($_SESSION["remember_values"]) && $i == 2)
                            echo " selected";
                        echo ">$i</option>";
                    }
                    echo "</select><label for='rooms'>Numer pokoju: </label>";
                    echo "<input type='text' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["name"];
                    else
                        echo "Jan";
                    echo "' name='name' id='firstName' pattern='.*\S.*' maxlength='30' required><label for='firstName'>Imię: </label>";
                    echo "<input type='text' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["surname"];
                    else
                        echo "Kowalski";
                    echo "' name='surname' id='surname' pattern='.*\S.*' maxlength='50' required><label for='surname'>Nazwisko: </label>";
                    echo "<input type='tel' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["phone"];
                    else
                        echo "+48123456789";
                    echo "' name='phone' id='phone' pattern='.*\S.*' maxlength='30' required><label for='phone'>Numer telefonu: </label>";
                    echo "<input type='number' value='";
                    if(isset($_SESSION["remember_values"]))
                        echo $_SESSION["remember_values"]["prepayment"];
                    else
                        echo "500.00";
                    echo "' min='0' max='999999.99' step='0.01' name='prepayment' id='cash' required><label for='cash'>Wysokość przedpłaty [zł]: </label>";
                    echo "</div><button type='submit' class='btn btn-primary m-2 customButton'>Dodaj</button>";
                    echo "</form>";
                    if($_SESSION["remember_values"])
                        unset($_SESSION["remember_values"]);
                }                
            ?>
        </div>
        <div class="row p-2 text-center user-select-none align-content-center" id="month">  
            <noscript>
                <div class='alert alert-danger mb-0 shadow'><b>Coś poszło nie tak. Spróbuj ponownie lub odśwież stronę.</b><br>Kod błędu: 4 (JavaScript jest wyłączony na tej stronie)<br><form action="terminy/" method="POST"><button type="submit" class='btn btn-primary customButton mt-2' id='reload' data-month='<?php echo date("n")?>' data-year='<?php echo date("Y")?>'>Załaduj ponownie</button></form></div>
            </noscript>         
        </div>
    </main>
    <?php
        include_once "footer.php";
    ?>
    <script>
        const calendarContainer = document.querySelector("#month");
        const loadingAnimation = "<div class='d-flex justify-content-center align-items-center'><div class='spinner-border text-primary' style='scale: 2;' role='status'><span class='visually-hidden'>Loading...</span></div></div>";
        async function DisplayCalendar(url = "", data = null)
        {
            function AddFeatures()
            {
                document.querySelectorAll("#previous, #next, #reload").forEach(el => {
                    if(!el.hasAttribute("data-month") || !el.hasAttribute("data-year"))
                        return;
                    el.addEventListener("click", () => {
                        const data = new FormData();
                        data.append("month", el.getAttribute("data-month"));
                        data.append("year", el.getAttribute("data-year"));
                        DisplayCalendar("calendar.php", data);
                    });               
                });
                document.querySelector("#dropdownYear")?.addEventListener("input", event => {
                    if(event.target.value == <?php echo date("Y") + 2?>)
                    {
                        const currentMonth = <?php echo date("n")?>;
                        const dropdownMonth = document.querySelector("#dropdownMonth");
                        Array.from(dropdownMonth.options).slice(currentMonth).forEach(option => option.setAttribute("disabled", ""));
                        if(dropdownMonth.selectedIndex >= currentMonth)
                            dropdownMonth.selectedIndex = currentMonth - 1;
                    }                       
                    else
                        document.querySelectorAll("#dropdownMonth > option:disabled").forEach(disabledOption => disabledOption.removeAttribute("disabled"));
                });
                document.querySelector("#dropdownYear")?.dispatchEvent(new Event("input"));
                document.querySelector("#selectMonth")?.addEventListener("click", () => {
                    const data = new FormData();
                    data.append("month", document.querySelector("#dropdownMonth").value);
                    data.append("year", document.querySelector("#dropdownYear").value);
                    DisplayCalendar("calendar.php", data);
                });
                const observer = new IntersectionObserver(observerCallback,
                    { threshold : [1] }
                );
                function observerCallback(entries, observer)
                {
                    entries.forEach(entry => {
                        entry.target.classList.toggle("pinned", entry.intersectionRatio < 1);
                        if(entry.target.classList.contains("pinned"))
                            entry.target.animate(
                                [
                                    {left : "-61px"},
                                    {left : "-1px"},
                                ],
                                {
                                    duration : 500,
                                    fill : "forwards",
                                }
                            );
                    });
                }
                if(!CSS.supports("selector(:has(.alert))"))
                {
                    const observer = new MutationObserver((records, observer) => {
                        for (const record of records) {
                            for (const addedNode of record.addedNodes) {
                                if(addedNode.matches(".alert"))
                                    calendarContainer.style.setProperty("--calendar-container-height", "auto");
                            }
                            for (const removedNode of record.removedNodes) {
                                if(removedNode.matches(".alert"))
                                    calendarContainer.style.setProperty("--calendar-container-height", "revert");
                            }
                        }
                    });
                    observer.observe(calendarContainer, {
                        childList: true
                    });
                }
                document.querySelectorAll("table th:first-child").forEach(el => observer.observe(el));   
                const tableContainer =  document.querySelector("#tableContainer");
                const autoScroll = setTimeout(() => {
                    tableContainer?.scroll({left: <?php echo date("d") - 1?> * 60, behavior : "smooth"}) ;
                }, 1000);
                if(data.get("month") != <?php echo date("n")?> || data.get("year") != <?php echo date("Y")?>)
                    clearTimeout(autoScroll);
                tableContainer?.addEventListener("scroll", function(){
                    clearTimeout(autoScroll);
                    if(this.offsetWidth + this.scrollLeft >= this.scrollWidth)
                        this.classList.remove("more");
                    else
                        this.classList.add("more");
                });
                tooltipList.forEach(tooltip => tooltip.dispose());
                tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            } 
            tooltipList.forEach(tooltip => tooltip.dispose());
            try
            {
                calendarContainer.innerHTML = loadingAnimation;
                tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
                const response = await fetch(url, {
                    method: "POST",
                    body: data
                });
                calendarContainer.innerHTML = await response.text();          
            }
            catch
            {
                calendarContainer.innerHTML = "<div class='alert alert-danger mb-0 shadow'><b>Coś poszło nie tak. Spróbuj ponownie lub odśwież stronę.</b><br>Kod błędu: 1 (Nie udało połączyć się z serwerem)<br><a class='btn btn-primary customButton mt-2' id='reload' data-month='<?php echo date("n")?>' data-year='<?php echo date("Y")?>'>Załaduj ponownie</a></div>";
            }
            AddFeatures();           
        }      
        const defaultData = new FormData();
        defaultData.append("month", <?php echo date("n")?>);  
        defaultData.append("year", <?php echo date("Y")?>);
        DisplayCalendar("calendar.php", defaultData); 
    </script>
    <?php
        if(isset($_SESSION["logged"]) && $_SESSION["logged"])
            echo "<script src='./components/validate.js'></script>";
    ?>
</body>
</html>