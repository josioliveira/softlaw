<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\CourtHearing;

    // // Validação do POST
    if(isset($_POST['num'],$_POST['date'],$_POST['time'],$_POST['lawyer'],$_POST['forum'],$_POST['endress'])) {

        $obCourtHearing = new CourtHearing;

        $obCourtHearing->num     = $_POST['num'];
        $obCourtHearing->date    = $_POST['date'];
        $obCourtHearing->time    = $_POST['time'];
        $obCourtHearing->lawyer  = $_POST['lawyer'];
        $obCourtHearing->forum   = $_POST['forum'];
        $obCourtHearing->endress = $_POST['endress'];
        
        $obCourtHearing->register();

        header('location: index.php?status=seccess');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/navbar.php';
    include __DIR__.'/includes/form.php';
    include __DIR__.'/includes/footer.php';

?>