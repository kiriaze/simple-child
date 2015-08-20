<?php
$googleAnalytics = of_get_option('google_analytics', 'no entry' );
if ( $googleAnalytics ) : ?>
    <script>
        <?php echo $googleAnalytics; ?>
    </script>
<?php endif; ?>
