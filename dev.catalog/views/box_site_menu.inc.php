<div class="navbar navbar-sticky custom-navbar">

  <div class="navbar-header custom-navbar-header">
    
    <!-- LEFT PART -->
    <div class="navbar-left">
      <!-- Mobile Menu Icon (Visible only on mobile) -->
      <button type="button" class="btn btn-default navbar-toggler hidden-md hidden-lg hidden-xl hidden-xxl" data-toggle="offcanvas" data-target="#offcanvas">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Logo -->
      <a class="logotype" href="<?php echo document::href_ilink(''); ?>">
        <img src="<?php echo document::href_link('images/logotype.png'); ?>" alt="<?php echo settings::get('store_name'); ?>" title="<?php echo settings::get('store_name'); ?>">
      </a>

      <!-- Desktop Links: Categories & Customer Service -->
      <div class="desktop-menu-links hidden-xs hidden-sm">
        <?php if ($categories) { ?>
        <div class="nav-item categories dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><?php echo language::translate('title_categories', 'Categories'); ?></a>
          <ul class="dropdown-menu">
            <?php foreach ($categories as $item) { ?>
            <li><a class="nav-link" href="<?php echo functions::escape_html($item['link']); ?>"><?php echo $item['title']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
        
        <div class="nav-item customer-service">
          <a class="nav-link" href="<?php echo document::href_ilink('customer_service'); ?>"><?php echo language::translate('title_customer_service', 'Customer Service'); ?></a>
        </div>
      </div>
    </div>

    <!-- MIDDLE PART: Desktop Search Box -->
    <div class="navbar-middle hidden-xs hidden-sm">
      <?php echo functions::form_draw_form_begin('search_form', 'get', document::ilink('search'), false, 'class="navbar-search"'); ?>
        <?php echo functions::form_draw_search_field('query', true, 'placeholder="'. language::translate('text_search_products', 'Search products') .' &hellip;"'); ?>
      <?php echo functions::form_draw_form_end(); ?>
    </div>

    <!-- RIGHT PART: Icons & Sign In -->
    <div class="navbar-right quick-access">

      <?php if (settings::get('accounts_enabled')) { ?>

      <!-- 3. Sign In Dropdown with Full Form (Last on the right) -->
      <ul class="navbar-nav desktop-sign-in" style="list-style: none; padding: 0; margin: 0;">
        <li class="nav-item account dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" style="padding: 0; display: flex; align-items: center;">
            <span class="hidden-xs"><?php echo !empty(customer::$data['id']) ? functions::escape_html(customer::$data['firstname']) : language::translate('title_sign_in', 'Sign In'); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php if (!empty(customer::$data['id'])) { ?>
              <li><a class="nav-link" href="<?php echo document::href_ilink('order_history'); ?>"><?php echo language::translate('title_order_history', 'Order History'); ?></a></li>
              <li><a class="nav-link" href="<?php echo document::href_ilink('edit_account'); ?>"><?php echo language::translate('title_edit_account', 'Edit Account'); ?></a></li>
              <li><a class="nav-link" href="<?php echo document::href_ilink('logout'); ?>"><?php echo language::translate('title_logout', 'Logout'); ?></a></li>
            <?php } else { ?>
              <li class="nav-item" style="padding: 10px; min-width: 250px;">
                <?php echo functions::form_draw_form_begin('login_form', 'post', document::ilink('login'), false, 'class="navbar-form"'); ?>
                  <?php echo functions::form_draw_hidden_field('redirect_url', document::link()); ?>

                  <div class="form-group">
                    <?php echo functions::form_draw_email_field('email', true, 'required placeholder="'. language::translate('title_email_address', 'Email Address') .'"'); ?>
                  </div>

                  <div class="form-group">
                    <?php echo functions::form_draw_password_field('password', '', 'placeholder="'. language::translate('title_password', 'Password') .'"'); ?>
                  </div>

                  <div class="form-group">
                    <div class="checkbox text-start">
                      <label><?php echo functions::form_draw_checkbox('remember_me', '1'); ?> <?php echo language::translate('title_remember_me', 'Remember Me'); ?></label>
                    </div>
                  </div>

                  <div class="btn-group btn-block" style="width: 100%;">
                    <?php echo functions::form_draw_button('login', language::translate('title_sign_in', 'Sign In')); ?>
                  </div>
                <?php echo functions::form_draw_form_end(); ?>
              </li>
              <li class="nav-item text-center">
                <a class="nav-link" href="<?php echo document::href_ilink('create_account'); ?>"><?php echo language::translate('text_new_customers_click_here', 'New customers click here'); ?></a>
              </li>

              <li class="nav-item text-center">
                <a class="nav-link" href="<?php echo document::href_ilink('reset_password'); ?>"><?php echo language::translate('text_lost_your_password', 'Lost your password?'); ?></a>
              </li>
            <?php } ?>
          </ul>
        </li>
      </ul>
      <?php } ?>
        
        <!-- 2. Profile Icon Link (Middle) -->
      <a class="account text-center" href="<?php echo document::href_ilink('edit_account'); ?>" style="color: inherit; text-decoration: none;">
        <div class="navbar-icon"><?php echo functions::draw_fonticon('fa-user-o'); ?></div>
      </a>
        
      <!-- 1. Cart Icon (First on the left) -->
      <?php include vmod::check(FS_DIR_APP . 'includes/boxes/box_cart.inc.php'); ?>

    </div>
    
  </div>

  <!-- MOBILE ONLY: Search box below the navbar -->
  <div class="mobile-search-row hidden-md hidden-lg hidden-xl hidden-xxl">
    <?php echo functions::form_draw_form_begin('search_form_mobile', 'get', document::ilink('search'), false, 'class="navbar-search"'); ?>
      <?php echo functions::form_draw_search_field('query', true, 'placeholder="'. language::translate('text_search_products', 'Search products') .' &hellip;"'); ?>
    <?php echo functions::form_draw_form_end(); ?>
  </div>

  <!-- Offcanvas for Mobile Only -->
  <div id="offcanvas" class="offcanvas">
    <div class="offcanvas-header">
      <div class="offcanvas-title"><?php echo settings::get('store_name'); ?></div>
      <button type="button" class="btn btn-default" data-toggle="dismiss"><?php echo functions::draw_fonticon('fa-times'); ?></button>
    </div>

    <div class="offcanvas-body">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo document::href_ilink(''); ?>"><?php echo functions::draw_fonticon('fa-home hidden-xs hidden-sm'); ?> <span class="hidden-md hidden-lg hidden-xl hidden-xxl"><?php echo language::translate('title_home', 'Home'); ?></span></a>
        </li>

        <?php if ($categories) { ?>
        <li class="nav-item categories dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo language::translate('title_categories', 'Categories'); ?></a>
          <ul class="dropdown-menu">
            <?php foreach ($categories as $item) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo functions::escape_html($item['link']); ?>"><?php echo $item['title']; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if ($manufacturers) { ?>
        <li class="nav-item manufacturers dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo language::translate('title_manufacturers', 'Manufacturers'); ?></a>
          <ul class="dropdown-menu">
            <?php foreach ($manufacturers as $item) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo functions::escape_html($item['link']); ?>"><?php echo $item['title']; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php foreach ($pages as $item) { ?>
        <li class="nav-item page">
          <a class="nav-link" href="<?php echo functions::escape_html($item['link']); ?>"><?php echo $item['title']; ?></a>
        </li>
        <?php } ?>
      </ul>

      <ul class="navbar-nav">
        <?php if ($information) { ?>
        <li class="nav-item information dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo language::translate('title_information', 'Information'); ?></a>
          <ul class="dropdown-menu">
            <?php foreach ($information as $item) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo functions::escape_html($item['link']); ?>"><?php echo $item['title']; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        <li class="nav-item customer-service">
          <a class="nav-link" href="<?php echo document::href_ilink('customer_service'); ?>"><?php echo language::translate('title_customer_service', 'Customer Service'); ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>