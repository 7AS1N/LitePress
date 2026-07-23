<a id="cart" class="text-center" href="<?php echo functions::escape_html($link); ?>">
  <div class="navbar-icon"><?php echo functions::draw_fonticon('fa-shopping-basket'); ?></div>
  <div class="badge quantity"><?php echo $num_items ? $num_items : ''; ?></div>
</a>