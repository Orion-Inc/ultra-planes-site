<form class="form-email" action="config/actions/send-mail.php" data-success="Thanks for your message, we'll be in touch shortly." data-error="Please make sure all required fields have been filled.">
    <div class="row">
        <div class="col-md-6">
            <span>Your Full Name</span>
            <input type="text" name="name" class="validate-required" placeholder="Please Enter Your Full Name">
        </div>
        <div class="col-md-6">
            <span>Your Email Address</span>
            <input type="email" name="email" class="validate-required validate-email" placeholder="Please Enter Your Email Address">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <span>Message</span>
            <textarea rows="5" name="description" class="validate-required" placeholder="Message"></textarea>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn--primary type--uppercase">Submit</button>
        </div>
    </div>
</form>