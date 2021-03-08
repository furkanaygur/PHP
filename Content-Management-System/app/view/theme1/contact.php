<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1>Contact</h1>
    </div>
</section>

<div class="container">
    <form action="" id="contact-form" onsubmit="return false;">
        <div class="alert alert-danger" style="display: none" id="contact-error-msg" role="alert"></div>
        <div class="alert alert-success" style="display: none" id="contact-success-msg" role="alert"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Firs Name - Last Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Firs Name - Last Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail Adress</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Adress">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject">Message Subejct</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Message Subejct">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="message">Message Content</label>
                    <textarea name="content" id="message" cols="30" rows="5" class="form-control" placeholder="Message Content"></textarea>
                </div>
                <button type="submit" onclick="contact('#contact-form')" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
</div>

<?php require view('static/footer'); ?>