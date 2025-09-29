<?php

/**
 * The template for displaying comments
 *
 * @package Your_Theme_Name
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area container my-5">

    <?php if (have_comments()) : ?>
    <h3 class="comments-title mb-4 fw-bold text-primary">
        <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(_x('One Comment', 'comments title', 'your-textdomain'));
            } else {
                printf(
                    _nx(
                        '%1$s Comment',
                        '%1$s Comments',
                        $comments_number,
                        'comments title',
                        'your-textdomain'
                    ),
                    number_format_i18n($comments_number)
                );
            }
            ?>
    </h3>

    <ol class="list-unstyled">
        <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
                'callback'    => 'custom_bootstrap_comment',
                'reply_text'  => '<button class="btn btn-sm btn-outline-primary">Reply</button>',
            ));
            ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav class="comment-navigation d-flex justify-content-between my-4" role="navigation">
        <div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
        <div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
    </nav>
    <?php endif; ?>

    <?php else : ?>
    <p class="text-muted fst-italic">No comments yet. Be the first to comment!</p>
    <?php endif; ?>

    <?php if (! comments_open() && get_comments_number()) : ?>
    <p class="alert alert-warning">Comments are closed.</p>
    <?php endif; ?>

    <?php
    // Custom comment form with Bootstrap styling
    comment_form(array(
        'class_form' => 'needs-validation',
        'title_reply' => '<h4 class="mb-3">Leave a Reply</h4>',
        'comment_notes_before' => '<p class="text-muted small mb-3">Your email address will not be published.</p>',
        'label_submit' => 'Post Comment',
        'class_submit' => 'btn btn-primary',
        'logged_in_as' => '',
        'fields' => array(
            'author' =>
            '<div class="mb-3"><label for="author" class="form-label">Name <span class="text-danger">*</span></label>' .
                '<input id="author" name="author" type="text" class="form-control" required></div>',
            'email' =>
            '<div class="mb-3"><label for="email" class="form-label">Email <span class="text-danger">*</span></label>' .
                '<input id="email" name="email" type="email" class="form-control" required></div>',
            'url' =>
            '<div class="mb-3"><label for="url" class="form-label">Website</label>' .
                '<input id="url" name="url" type="url" class="form-control"></div>',
        ),
        'comment_field' => '<div class="mb-3"><label for="comment" class="form-label">Comment <span class="text-danger">*</span></label><textarea id="comment" name="comment" class="form-control" rows="5" required></textarea></div>',
    ));
    ?>

</div><!-- #comments -->

<?php
// Custom callback for comment layout using Bootstrap cards
function custom_bootstrap_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class('mb-3'); ?> id="comment-<?php comment_ID(); ?>">
    <div class="card shadow-sm">
        <div class="card-body d-flex">
            <div class="me-3">
                <?php echo get_avatar($comment, 64, '', '', ['class' => 'rounded-circle']); ?>
            </div>
            <div>
                <h5 class="card-title mb-1">
                    <?php printf('<b>%s</b>', get_comment_author_link()); ?>
                </h5>
                <div class="card-subtitle mb-2 text-muted small">
                    <?php printf('%s', get_comment_date() . ' at ' . get_comment_time()); ?>
                </div>
                <div class="card-text mb-3">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array(
                            'add_below' => 'comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '',
                            'after'     => '',
                            'reply_text' => '<button class="btn btn-sm btn-outline-primary">Reply</button>',
                        ))); ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php
}
?>