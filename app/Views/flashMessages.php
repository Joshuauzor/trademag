<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->
 <!-- success message -->
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success success-message" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif ?>
    <!-- success message ends -->

    <!-- error message -->
    <?php if (session()->get('error')) : ?>
        <div class="alert alert-danger error-message" role="alert">
            <?= session()->get('error') ?>
        </div>
    <?php endif ?>

    <!-- validation errors -->
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger error-message" role="alert">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif ?>

    <!-- styling php errors class -->

    <style>
            .errors li{
            list-style-type: none;
            width: 100%;
            /* text-align: center; */
        }
        .errors ul{
            padding-bottom: 0;
            margin-bottom: 0;
        }
    </style>

    <!-- <script>
        $(document).ready(function(){
            setTimeout(() => {
                $('.error-message').hide();
                $('.success-message').hide();
            }, 9000);
        })
    </script> -->