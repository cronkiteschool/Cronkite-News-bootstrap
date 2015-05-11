<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>



<?php if(get_search_query() ==  '') : ?>
    <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Type to search' ); ?>" />
        <button type="submit"  class="btn btn-default btn-submit icon-right-open" id="searchsubmit"></button>
    </form>
<?php else : ?>
    <form method="get" class="navbar-form search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Stories' ); ?>" />
        <button type="submit"  class="btn btn-default btn-submit icon-right-open" id="searchsubmit"></button>
    </form>
<?php endif; ?>

