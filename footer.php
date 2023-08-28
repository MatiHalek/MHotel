<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<footer class="bg-dark position-relative d-flex justify-content-center align-items-center fw-bold text-center">
    <?php
        $info = array("VersionNumber" => "v2.0.0",  "VersionRelease" => "Data wydania: 28 sierpnia 2023");
        echo "© ".date("Y")." MH Corporation. Wszelkie prawa zastrzeżone.";
        echo "<div class='position-absolute start-0 bottom-0 m-1' data-bs-toggle='tooltip' title='".$info["VersionRelease"]."'>".$info["VersionNumber"]."</div>"
    ?>    
</footer>
<script>
    let tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    let tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>