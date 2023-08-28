<?php
    error_reporting(0);
    session_start();
    if(!isset($_POST["month"], $_POST["year"]) || !filter_var($_POST["month"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 12))) || !filter_var($_POST["year"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 2023, "max_range" => date("Y", strtotime("+ 2 years"))))) || $_POST["year"] == date("Y", strtotime("+ 2 years")) && (int)$_POST["month"] > date("n", strtotime("+ 2 years")))
        exit("<div class='alert alert-danger mb-0 shadow'><b>Coś poszło nie tak. Spróbuj ponownie lub odśwież stronę.</b><br>Kod błędu: 3 (Nieprawidłowe dane wejściowe)<br><a class='btn btn-primary mt-2 customButton' id='reload' data-month='".date("n")."' data-year='".date("Y")."'>Załaduj ponownie</a></div>");
    $todayDate = new DateTime(date("Y-m-d"));
    $months = array("Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");
    $month = $_POST["month"];
    $year = $_POST["year"];
    echo "<div class='d-flex justify-content-center mb-2' style='height: 30px;'>";
    echo "<input id='previous' type='image' src='images/arrow_previous.svg'  alt='Poprzedni' class='border-0 rounded-1";
    if($month == 1 && $year == 2023)
        echo " opacity-25' disabled";
    else
        echo "' data-month='".(($month + 10) % 12 + 1)."' data-year='".($month > 1 ? $year : $year - 1)."' title='Poprzedni' data-bs-toggle='tooltip'";
    echo "><div class='dropdown'><h3 class='d-inline rounded-1 fs-4' data-bs-toggle='dropdown'><span class='px-2' data-bs-toggle='tooltip' title='Wybierz miesiąc'>".$months[$month - 1]." $year</span></h3><div class='dropdown-menu text-center'><select id='dropdownMonth'>";
    for($i = 1; $i <= count($months); $i++)
        echo "<option value='$i'".($month == $i ? " selected" : "").">".mb_strtolower($months[$i - 1])."</option>";
    echo "</select><select id='dropdownYear'>";
    for($i = 2023; $i <= date("Y") + 2; $i++)
        echo "<option value='$i'".($year == $i ? " selected" : "").">$i</option>";
    echo "</select><br><a class='btn btn-primary customButton mt-2' id='selectMonth'>Potwierdź</a></div></div>";
    echo "<input id='next' type='image' src='images/arrow_next.svg' alt='Następny' class='border-0 rounded-1";
    if($month == date("m", strtotime("+ 2 years")) && $year == date("Y", strtotime("+ 2 years")))
        echo " opacity-25' disabled";
    else
        echo "' data-month='".(1 + $month % 12)."' data-year='".($month < 12 ? $year : $year + 1)."' title='Następny' data-bs-toggle='tooltip'";
    echo "></div>";          
    try
    {
        $connect = new mysqli("localhost", "root", "", "hotel");
    }
    catch(mysqli_sql_exception $e)
    {
        exit("<div class='alert alert-danger mb-0 shadow'><b>Coś poszło nie tak. Spróbuj ponownie lub odśwież stronę.</b><br>Kod błędu: 2 (Nie udało się połączyć z bazą danych)<br><a class='btn btn-primary mt-2 customButton' id='reload' data-month='$month' data-year='$year'>Załaduj ponownie</a></div>");
    }
    $connect->set_charset('utf8mb4');
    echo "<div class='position-relative'>"; 
    echo "<div class='m-2 overflow-auto more' id='tableContainer'>";
    $days = array("<span style='color: red'>Ni</span>", "Po", "Wt", "Śr", "Cz", "Pi", "<span style='color: blue'>So</span>");
    echo "<table class='fw-bold'>";
    for($i = 0; $i < 7; $i++)
    {
        echo "<tr>";
        for($j = 0; $j < cal_days_in_month(CAL_GREGORIAN, $month, $year) + 1; $j++)
        {
            $d = date("Y-m-d", mktime(0, 0, 0, $month, $j, $year));
            $checkedDate = new DateTime($d);
            $today = ($todayDate == $checkedDate) ? true : false;
            $tooltipHeader = "<b>Pokój nr $i, ".date("d.m.Y", mktime(0, 0, 0, $month, $j, $year)).": </b><br>";
            if($today)
                $tooltipExtraInfo = "<span class=\"badge text-bg-primary\">Dzisiaj</span>";
            elseif($checkedDate < $todayDate)
                $tooltipExtraInfo = "<span class=\"badge text-bg-danger\">Termin niedostępny</span>";
            else
                $tooltipExtraInfo = "";
            if($i == 0 && $j == 0):
                echo "<th class='position-sticky z-1'>Data: </th>";
                continue;
            endif;                            
            if($i == 0):
                $date = date("w", mktime(0, 0, 0, $month, $j, $year));
                echo "<th".($today ? " class='today'" : "").">".$days[$date].", $j <br>".mb_strtolower(mb_substr($months[$month - 1], 0, 3))."</th>";
                continue;
            endif;
            if($j == 0):
                echo "<th class='position-sticky z-1'>Pokój nr $i</th>";
                continue;
            endif;     
            echo "<td";                       
            $query = $connect->prepare('SELECT * FROM reservation WHERE (? BETWEEN date_start AND date_end) AND room = ?');
            $query->bind_param('si', $d, $i);
            $query->execute();
            $result = $query->get_result();
            if($result->num_rows > 0)
            {
                $row = $result->fetch_object();
                echo " class='text-center fw-bold fs-3 red text-light".($today ? " today" : "")."' data-bs-toggle='tooltip' title='";
                if(isset($_SESSION["logged"]) && $_SESSION["logged"])
                {
                    echo $tooltipHeader."<h5 class=\"text-uppercase text-primary mt-1\">Rezerwacja #".$row->reservation_id."</h5>";
                    echo "<div class=\"info\"><u>Imię i nazwisko:</u> ".htmlspecialchars(htmlspecialchars("$row->name"))." ".htmlspecialchars(htmlspecialchars($row->surname));
                    echo "<br><u>Okres pobytu:</u> ".date("d.m.Y", strtotime($row->date_start))." - ".date("d.m.Y", strtotime($row->date_end));
                    echo "<br><u>Ilość osób:</u> ".$row->people;
                    echo "<br><u>Numer telefonu:</u> ".htmlspecialchars(htmlspecialchars($row->phone));
                    echo "<br><u>Wysokość przedpłaty:</u> ".number_format($row->prepayment, 2, ",", " ")." zł</div>";
                }
                else  
                    echo "<b>Łączna liczba osób: ".$row->people."</b><br><em>Musisz być zalogowany jako administrator, aby zobaczyć więcej danych.</em><br>";
                echo "$tooltipExtraInfo' data-bs-html='true'>".$row->people;
            }                           
            else
                echo " class='green".($today ? " today" : "")."' data-bs-toggle='tooltip' title='$tooltipHeader Hurra! Ten termin jest wolny! $tooltipExtraInfo' data-bs-html='true'>";
            echo "</td>";
            $result->free_result();
        }
        echo "</tr>";
    }
    echo "</table>";
    $connect->close();
    echo "</div></div>";
?>
