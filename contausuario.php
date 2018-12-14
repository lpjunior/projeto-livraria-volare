<?php
$app->get('/user', function ($request, $response, $args) {
?>
    <h2> Olá, </h2> <br>
    <div class="container-fluid row col-md-8 col-xs-12 centraliza">

        <div class="col-md-4 ">
        <!-- Nav pills -->
            <ul class="nav flex-column nav-pills" role="tablist">
                <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu01">Menu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
                </li>
            </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content col-md-4">
                <div id="home" class="tab-pane active"><br>
                <h3>HOME</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu01" class="tab-pane fade"><br>
                <h3>Menu 1</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu2" class="tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
            </div>
</div>
<?php }); ?>
