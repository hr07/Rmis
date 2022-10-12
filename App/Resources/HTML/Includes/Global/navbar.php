<nav class="navbar navbar-expand-lg overlay-background shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img
                src="<?php echo Directories::getLocation("resources/assets/logo.png"); ?>" class="img-fluid resized">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link">Pricing</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link">Blogs</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex mx-2">
                    <a class="nav-link">Login</a> <span class="mt-1">|</span>
                    <a class="nav-link">Register</a>
                </li>
            </ul>
            <?php require_once Directories::getLocation("Resources/html/includes/components/forms/search/search.php");?>
        </div>
    </div>
</nav>