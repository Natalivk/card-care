<div id="join-overlay" class="overlay">
    <div class="grid">
        <div class="column" style="background:#43266e;">
            <img src="https://www.annkv.com/wp-content/uploads/2021/01/Care.Card-Contest-logo-for-balloon.png" alt="">
        </div>
        <div class="column">
            <form id="join-now-form" class="contact-form">
                <div class="form-field">
                    <input id="email" class="input-text js-input" type="email" required name="email">
                    <label class="label" for="email">E-mail</label>
                </div>
                <div class="form-field">
                    <input id="message" class="input-text js-input" type="text" required name="massage">
                    <label class="label" for="message">Message</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="join-button"><span>Join</span></button>

            </form>
            <div id="success_message" class="alert alert-success" style="display: none"></div>
        </div>
    </div><!--End Grid-->

    <div class="close-icon">
        <div></div>
        <div></div>
    </div>
</div>
<script>


    (function ($) {

        $('#join-now-form').submit(function (e) {
            e.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php');?>';

            var form = $('#join-now-form').serialize();

            var formdata = new FormData;

            formdata.append('action', 'join');
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce');?>');
            formdata.append('join', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function (res) {
                    $('#join-now-form').hide().fadeOut(100);
                    $('#success_message').text('Thank for Join').show()
                },
                error: function (err) {

                }

            })

        });
    })(jQuery)

</script>
<style>

</style>
