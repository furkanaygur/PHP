<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1>BLOG</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Recent Topics</h4>

            <div class="card mb-3">
                <div class="card-header">
                    CSS, HTML, PHP
                    <div class="date">
                        10 March 2021, 02:02
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti rerum dolorem, quam voluptatibus quo ullam. Optio assumenda mollitia numquam modi rem voluptas, quaerat libero iusto.
                    </p>
                    <a href="#" class="btn btn-dark">Read</a>
                </div>
            </div>


            <div class="card mb-3">
                <div class="card-header">
                    Python, Tensorflow
                    <div class="date">
                        10 March 2021, 02:02
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti rerum dolorem, quam voluptatibus quo ullam. Optio assumenda mollitia numquam modi rem voluptas, quaerat libero iusto.
                    </p>
                    <a href="#" class="btn btn-dark">Read</a>
                </div>
            </div>

            <div class="pagination-container text-center mb-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Categories
            </h4>
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        PHP
                        <span class="badge badge-dark badge-pill">14</span>
                    </a>
                </li>
                <li class="list-group-item active">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        CSS
                        <span class="badge badge-dark badge-pill">2</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        Music
                        <span class="badge badge-dark badge-pill">1</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        Daily Life
                        <span class="badge badge-dark badge-pill">15</span>
                    </a>
                </li>
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Tags
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5</a>
            <a href="#" class="badge badge-light badge-pill">css</a>
            <a href="#" class="badge badge-light badge-pill">jquery</a>
            <a href="#" class="badge badge-light badge-pill">php</a>
            <a href="#" class="badge badge-light badge-pill">software</a>
            <a href="#" class="badge badge-light badge-pill">development</a>
        </div>
    </div>

    <?php require view('static/footer'); ?>