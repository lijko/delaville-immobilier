<div id="tso-wrap" class="wrap">

	<div id="header">
    <h1><a href="http://themeshift.com" target="_blank">ThemeShift</a></h1>
    <span class="theme"><?php _e('Themes &amp; News', TS_DOMAIN); ?></span>
    <?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
    <div class="version">
      <?php echo self::VERSION; ?>
    </div>
    <?php } ?>
	</div>
  
  <div id="content-wrap">
  
    <div class="ts-info-top ts-info-news">
    
    	<ul>
		    <li><a class="ts-options-themes" href="http://themeshift.com/themes/" target="_blank"><?php _e('All Themes', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-blog" href="http://themeshift.com/blog/" target="_blank"><?php _e('Blog', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-affiliates" href="http://themeshift.com/affiliates/" target="_blank"><?php _e('Affiliates', TS_DOMAIN); ?></a></li>
		</ul>
    
    </div>

    <div id="content">
      <div id="options_tabs" class="news">
      
        <ul class="options_tabs">
          <li><a href="#latest_themes" class="tab-ts_themes"><?php _e('Latest Themes', TS_DOMAIN); ?></a><span></span></li>
          <li><a href="#latest_news" class="tab-ts_news"><?php _e('Latest News', TS_DOMAIN); ?></a><span></span></li>
        </ul>
        
        <div id="latest_themes" class="block">

          <h3><?php _e('Latest ThemeShift Themes', TS_DOMAIN); ?></h3>
          
          <?php
            include_once(ABSPATH . WPINC . '/feed.php');
            $rss = fetch_feed('http://themeshift.com/?feed=themesfeed');
			if (!is_wp_error( $rss ) ) : 
			    $maxitems = $rss->get_item_quantity(10);
			    $rss_items = $rss->get_items(0, $maxitems); 
			endif;			
          ?>
          
          <?php $i=1; foreach ( $rss_items as $item ) : ?>
          
          <div class="ts-themes-item<?php if($i%2==0) echo ' ts-themes-item-alt'; ?>">
		  
		      <h4><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title();?></a></h4>
		      		
		      <p class="ts-themes-text"><?php echo $item->get_description();?></p>
		      		
		      <p><a href="<?php echo $item->get_permalink(); ?>" class="button" target="_blank"><?php _e('Theme Info', TS_DOMAIN); ?></a> <a href="<?php $ts_link = $item->get_permalink(); echo str_replace('http://','http://demo.',$ts_link);  ?>" class="button" target="_blank"><?php _e('Theme Demo', TS_DOMAIN); ?></a></p>
		      
		  </div>
		  
		  <?php $i++; endforeach; ?>
          
        </div>
        
		<div id="latest_news" class="block">

          <h3><?php _e('Latest ThemeShift News', TS_DOMAIN); ?></h3>
          
          <?php
            include_once(ABSPATH . WPINC . '/feed.php');
            $rss = fetch_feed('http://themeshift.com/feed');
			if (!is_wp_error( $rss ) ) : 
			    $maxitems = $rss->get_item_quantity(5);
			    $rss_items = $rss->get_items(0, $maxitems); 
			endif;			
          ?>
          
          <?php $i=1; foreach ( $rss_items as $item ) : ?>
          
          <div class="ts-news-item">
		  
		      <h4><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title();?></a></h4>
		      
		      <p class="ts-news-date">&rarr; <?php echo $item->get_date(get_option('date_format')); ?></p>
		      		
		      <p class="ts-news-text"><?php echo $item->get_description();?></p>
		      		
		      <p><a href="<?php echo $item->get_permalink(); ?>" class="button" target="_blank"><?php _e('Continue Reading', TS_DOMAIN); ?></a></p>
		      
		  </div>
		  
		  <?php $i++; endforeach; ?>
          
        </div>
        
        <br class="clear" />
      </div>
    </div>
    <div class="ts-info-bottom"></div>   
  </div>

</div>
<!-- [END] framework_wrap -->