<div class="wrap">
    <h1>FunTwnaGo Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields( 'ftg_options_group' );
            do_settings_sections( 'ftg_plugin' );
            submit_button();
        ?>
    </form>
</div>