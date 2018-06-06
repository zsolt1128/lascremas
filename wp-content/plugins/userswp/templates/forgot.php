<?php do_action('uwp_template_before', 'forgot'); ?>
<div class="uwp-content-wrap">
    <div class="uwp-login">
        <div class="uwp-lf-icon"><i class="fa fa-user fa-fw"></i></div>
        <?php do_action('uwp_template_form_title_before', 'forgot'); ?>
        <h2><?php echo apply_filters('uwp_template_form_title', get_the_title(), 'forgot'); ?></h2>
        <?php do_action('uwp_template_display_notices', 'forgot'); ?>
        <form class="uwp-login-form uwp_form" method="post">
            <?php do_action('uwp_template_fields', 'forgot'); ?>
            <input type="hidden" name="uwp_forgot_nonce" value="<?php echo wp_create_nonce( 'uwp-forgot-nonce' ); ?>" />
            <input name="uwp_forgot_submit" value="<?php echo __( 'Submit', 'userswp' ); ?>" type="submit"><br>
        </form>
        <div class="uwp-forgotpsw"><a href="<?php echo uwp_get_page_link('login'); ?>"><?php echo __( 'Login?', 'userswp' ); ?></a></div>
        <div class="clfx"></div>
        <div class="uwp-register-now"><?php echo __( 'Not a Member?', 'userswp' ); ?> <a rel="nofollow" href="<?php echo uwp_get_page_link('register'); ?>"><?php echo __( 'Create Account', 'userswp' ); ?></a></div>
    </div>
</div>
<?php do_action('uwp_template_after', 'forgot'); ?>