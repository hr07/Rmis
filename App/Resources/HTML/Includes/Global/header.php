<header>
    <div class="container-fluid p-0">
        <?php require_once Directories::getLocation("resources/html/includes/widgets/breadcrumbs.php")?>
        <main>
            <div class="card bg-dark text-white border-0">
                <img class="card-img header-img-resized"
                    src="<?php echo Directories::getLocation("resources/assets/FrontendImage.jpg") ?>" alt="Title">
                <div class="card-img-overlay">
                    <div class="container-fluid text-center">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <?php require_once Directories::getLocation("resources/html/includes/widgets/welcometext.php")?>
                                <div class="d-flex justify-content-md-center">
                                    <?php require_once Directories::getLocation("resources/html/includes/widgets/cards.php")?>
                                </div>
                            </div>
                            <div class="col-lg-5 more-margin px-lg-3">
                                <div class="d-flex justify-content-lg-end justify-content-md-center">
                                    <div class="d-block">
                                        <section class="text-dark bg-translucent p-md-5">
                                            <?php require_once Directories::getLocation("resources/html/Includes/Components/header/PropertyReg.php");?>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</header>