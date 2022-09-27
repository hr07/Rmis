<header>
    <div class="d-flex justify-content-center my-3 form-title">
        <div class="form-icon mt-1">
            <img src="<?php echo Directories::getLocation("resources/assets/contact-form.png") ?>"
                class="img-fluid resized-sm">
        </div>
        <div class="form-title mx-2">
            <h3 class="heading">Registration Form</h3>
        </div>
    </div>
    <div class="form-header">
        <?php require_once Directories::getLocation("resources/html/includes/widgets/progressbar.php");?>
        <div class="d-flex justify-content-center my-4 form-step-heading">
            <strong>Step 1/3- Personal Information</strong>
        </div>
        <?php require_once Directories::getLocation("resources/html/includes/widgets/spinners.php")?>
        <?php require_once Directories::getLocation("resources/html/includes/widgets/alert.php");?>

        <div class="d-flex justify-content start">
            <p class="header-paragraph">*Ensure that you fill all the
                required
                fields</p>
        </div>
    </div>
</header>

<main>
    <?php require_once Directories::getLocation("resources/html/includes/components/forms/registration/property/personal-info.php")?>
    <div class="d-flex justify-content-md-end justify-content-center my-3">
        <p class="header-paragraph">Need any help? <strong><a href="javascript:void(0)" class="header-paragraph">Click
                    Here</a></strong> to contact
            us
        </p>
    </div>
</main>