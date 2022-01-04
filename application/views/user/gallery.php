<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <?php $this->load->view('user/includes/header'); ?>
    <style type="text/css">
    body {
    background-image: linear-gradient(to top, #ecedee 0%, #eceeef 75%, #e7e8e9 100%);
    min-height: 100vh;
    font: normal 16px -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";;
}

.container.gallery-container {
    min-height: 90vh;
}

.div_box{
    background-color: #fff;
    color: #35373a;
    border-radius: 20px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.06);
    margin: 120px 0 60px;
    /*min-height: 100vh;*/
}
.gallery-container h1 {
    text-align: center;
    margin-top: 70px;
    padding-top: 50px;
    font-size: 40px;
}

.gallery-container p.page-description {
    text-align: center;
    max-width: 800px;
    margin: 25px auto;
    color: #888;
    font-size: 18px;
}

.tz-gallery {
    padding: 40px;
}

.tz-gallery .lightbox img {
    width: 100%;
    margin-bottom: 30px;
    transition: 0.2s ease-in-out;
    box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}


.tz-gallery .lightbox img:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
}

.tz-gallery img {
    border-radius: 4px;
}

.baguetteBox-button {
    background-color: transparent !important;
}


@media(max-width: 768px) {
    body {
        padding: 0;
    }

    .container.gallery-container {
        border-radius: 0;
    }
}
    </style>

</head>
<body>

<div class="container gallery-container">
<div class="div_box">

    <h1 class="text-primary">Gallery</h1>
    <hr width="200px">
    <div class="tz-gallery">

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_g_one.jpg">
                <img src="assets/images/bus_g_one.jpg" width="500px" height="230px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_g_two.jpg">
                    <img src="assets/images/bus_g_two.jpg" width="500px" height="230px">
                </a>
            </div>
              <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_g_three.jpg">
                    <img src="assets/images/bus_g_three.jpg" width="500px" height="230px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_g_four.jpg">
                    <img src="assets/images/bus_g_four.jpg" width="500px" height="230px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_one.png">
                    <img src="assets/images/bus_one.png" width="500px" height="230px">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="assets/images/bus_g_five.jpg">
                    <img src="assets/images/bus_g_five.jpg" width="500px" height="230px">
                </a>
            </div>
           
        </div>

    </div>
</div>
</div>
<?php $this->load->view('user/includes/footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>