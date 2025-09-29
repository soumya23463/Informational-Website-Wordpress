<?php

/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf(__('Theme without %s'), basename(__FILE__)),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf(__('Please include a %s template in your theme.'), basename(__FILE__))
);
?>

<hr />
<div id="footer" role="contentinfo" style="text-align: center;">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
</div>


</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

<?php wp_footer(); ?>
</body>

</html>