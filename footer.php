        <footer class="d-flex px-md-5 px-3 py-5 w-100 position-absolute bottom-0">
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
                    <div class="form-check form-switch mb-0">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="dark-mode-switch"
                            <?php if (isset($_COOKIE['site-theme']) && $_COOKIE['site-theme'] === "dark") echo "checked"; ?>
                            onchange="toggleDarkMode();"
                        >
                        <label class="form-check-label" for="dark-mode-switch"><p>Dark Mode</p></label>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>