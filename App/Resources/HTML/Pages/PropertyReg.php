<?php require_once Directories::getLocation("Resources/html/includes/global/navbar.php");?>
<?php require Directories::getLocation("Resources/html/Includes/global/header.php");?>
<?php require Directories::getLocation("Resources/html/includes/global/footer.php");?>




<script>
$(document).ready(function() {
    $(window).bind('beforeunload', function(e) {
        return "Are you sure you want to exit"
    });
})
</script>

<script src="<?php echo Directories::getLocation("Resources/js/pages/script.js"); ?>"></script>