<div class="wrap">
    <h1>FunTwnaGo Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('ftg_options_group');
        do_settings_sections('ftg_plugin');
        submit_button();
        ?>
    </form>
    <p>
        <!-- <button class="button button-primary" id="#post_test">POST 測試</button> -->
        <!-- <a href="#" id="post_test"> Ajax Click </a> -->
        <button onclick="postSiteData()" class="button button-primary">連線測試</button>
    </p>
    <p>
        <pre id="pre_response"></pre>
    </p>
</div>