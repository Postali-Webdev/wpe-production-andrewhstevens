<div class="widget  search-blog searchitem mb-md-0 mb-3" id="sidebar-search">
<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
   <label>
       <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
       <input type="search" class="search-field" autocomplete="off" placeholder="<?php echo esc_attr_x('Search', 'placeholder') ?>" value="" name="s" title="<?php echo esc_attr_x('Search:', 'label') ?>" required />
   </label>
   <input type="hidden" value="post" name="post_type" id="post_type" />
   <input type="submit" class="search-submit search-btn" value="<?php echo esc_attr_x('Search Blog', 'submit') ?>" />
</form>
</div>