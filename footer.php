        <footer class="d-flex px-md-5 px-3 py-3 w-100 position-absolute bottom-0">
            <a class="footerlogo" href="<?php echo get_home_url() . '/login' ?>">
                <?php echo get_logo("",false)?>
            </a>
            <div class="d-flex ml-auto">
                <div class="d-none d-md-inline">
                    <p class="pop-outin"><a>Terms of use</a></p>
                    <p><a>About Us</a></p>
                </div>
                <div class="spacer d-none d-md-inline"></div>
                <div>
                    <p><a href="https://www.instagram.com/autosavemedia/" target="_blank">Instagram</a></p>
                    <p><a href="mailto:mail.autosave@gmail.com" target="_blank">Contact Us</a></p>
                </div>
                <div class="spacer d-none d-md-inline"></div>
                <div class="mx-3 mx-md-0">
                    <p>©2022 Autosave</p>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>