    <nav class="w-100 mb-3">
        <div class="container-fluid  bg-secondary py-2 text-center">
            <h1 class="mx-auto text-white"><?= $title ?></h1>
        </div>
        <div class="date-panel d-flex flex-row justify-content-around w-100 bg-light border-bottom">
            <div class="text-center my-auto">
                <p class="fs-3 my-auto"><?= getFullDate($days, $curDate) ?></p>
            </div>
            <div class="text-center d-flex justify-content-center align-items-center">
                <p class="fs-3 my-auto" id="time"> 00 : 00 : 00</p>
            </div>
        </div>
    </nav>