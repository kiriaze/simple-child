<?php
// Load scripts.php tied to head.js in header
function head_js_vars() {
    get_template_part('partials/js_vars');
}
add_action('wp_head', 'head_js_vars');
add_action('admin_enqueue_scripts', 'head_js_vars');
