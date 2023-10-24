<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/assets/img/logo-smk.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/tiny-slider.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/aos.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/glightbox.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/modif.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/user/css/flatpickr.min.css">


    <title>SMK NEGERI 1 BADAU</title>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap');

* {
    font-family: 'Roboto Condensed', sans-serif;
}

html,
body {
    height: 100%;
    margin: 0;
}

.step {
    display: none;
}

.step.active {
    display: block;
}

.error {
    color: red;
}

.map-container {
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    height: 0;
}

.map-container iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
}
</style>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- NAVBAR -->
    <?= $this->include('users/templates/navbar') ?>
    <!-- END NAVBAR -->

    <!-- CONTENT -->
    <?= $this->renderSection('user-content'); ?>
    <!-- END CONTENT -->

    <!-- FOOTER -->
    <?= $this->include('users/templates/footer'); ?>
    <!-- END FOOTER -->

    <!-- Preloader -->
    <!-- <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> -->


    <script src="<?= base_url(); ?>/assets/user/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/user/js/tiny-slider.js"></script>

    <script src="<?= base_url(); ?>/assets/user/js/flatpickr.min.js"></script>


    <script src="<?= base_url(); ?>/assets/user/js/aos.js"></script>
    <script src="<?= base_url(); ?>/assets/user/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/assets/user/js/navbar.js"></script>
    <script src="<?= base_url(); ?>/assets/user/js/counter.js"></script>
    <script src="<?= base_url(); ?>/assets/user/js/custom.js"></script>

    <script>
    var currentStep = 0;
    var steps = document.getElementsByClassName('step');

    function showStep(stepIndex) {
        for (var i = 0; i < steps.length; i++) {
            steps[i].classList.remove('active');
        }
        steps[stepIndex].classList.add('active');
    }

    function nextStep() {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        currentStep--;
        showStep(currentStep);
    }

    function validateStep(stepIndex) {
        var inputs = steps[stepIndex].querySelectorAll('input[required]');
        var isValid = true;
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
                inputs[i].classList.add('error');
                inputs[i].nextElementSibling.style.display = 'block';
                isValid = false;
            } else {
                inputs[i].classList.remove('error');
                inputs[i].nextElementSibling.style.display = 'none';
            }
        }
        return isValid;
    }
    </script>

</body>

</html>