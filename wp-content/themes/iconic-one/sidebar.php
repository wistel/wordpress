<?php
/**
 * The sidebar containing the main widget area.
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?>

	<?php if ( is_active_sidebar( 'themonic-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<style type="text/css">
				@import url(//www.google.com/cse/api/branding.css);
			</style>
			<div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
				<div class="cse-branding-form">
					<form action="http://www.google.com" id="cse-search-box">
						<div>
							<input type="hidden" name="cx" value="partner-pub-6477915256609367:8658141932" />
							<input type="hidden" name="ie" value="UTF-8" />
							<input type="text" name="q" size="18" />
							<input type="submit" name="sa" value="&#x641c;&#x7d22;" />
						</div>
					</form>
				</div>
				<div class="cse-branding-logo">
					<img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
				</div>
				<div class="cse-branding-text">
					自定义搜索
				</div>
			</div>
			<script type="text/javascript" src="http://www.google.com/cse/query_renderer.js"></script>
			<div id="queries"></div>
			<script src="http://www.google.com/cse/api/partner-pub-6477915256609367/cse/8658141932/queries/js?oe=UTF-8&amp;callback=(new+PopularQueryRenderer(document.getElementById(%22queries%22))).render"></script>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- witselzz -->
			<ins class="adsbygoogle"
				 style="display:block"
				 data-ad-client="ca-pub-6477915256609367"
				 data-ad-slot="9576471935"
				 data-ad-format="auto"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			<?php dynamic_sidebar( 'themonic-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php else : ?>	
	 		<div id="secondary" class="widget-area" role="complementary">
			<div class="widget widget_search">
				<?php get_search_form(); ?>
			</div>
			<div class="widget widget_recent_entries">
				<p class="widget-title"><?php _e( 'Recent Posts', 'themonic' ); ?></p>
				<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>
			<div class="widget widget_pages">
			<p class="widget-title"><?php _e( 'Pages', 'themonic' ); ?></p>
          <ul><?php wp_list_pages('title_li='); ?></ul>
      </div>
	  
	  <div class="widget widget_tag_cloud">
       <p class="widget-title"><?php _e( 'Tag Cloud', 'themonic' ); ?></p>
        <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>