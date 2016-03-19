<?php
/**
 * @file
 * Adaptivetheme implementation to display a node.
 *
 * Adaptivetheme variables:
 * AT Core sets special time and date variables for use in templates:
 * - $submitted: Submission information created from $name and $date during
 *   adaptivetheme_preprocess_node(), uses the $publication_date variable.
 * - $datetime: datetime stamp formatted correctly to ISO8601.
 * - $publication_date: publication date, formatted with time element and
 *   pubdate attribute.
 * - $datetime_updated: datetime stamp formatted correctly to ISO8601.
 * - $last_update: last updated date/time, formatted with time element and
 *   pubdate attribute.
 * - $custom_date_and_time: date time string used in $last_update.
 * - $header_attributes: attributes such as classes to apply to the header element.
 * - $footer_attributes: attributes such as classes to apply to the footer element.
 * - $links_attributes: attributes such as classes to apply to the nav element.
 * - $is_mobile: Mixed, requires the Mobile Detect or Browscap module to return
 *   TRUE for mobile.  Note that tablets are also considered mobile devices.
 *   Returns NULL if the feature could not be detected.
 * - $is_tablet: Mixed, requires the Mobile Detect to return TRUE for tablets.
 *   Returns NULL if the feature could not be detected.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 * @see adaptivetheme_preprocess_node()
 * @see adaptivetheme_process_node()
 */

/**
 * Hide Content and Print it Separately
 *
 * Use the hide() function to hide fields and other content, you can render it
 * later using the render() function. Install the Devel module and use
 * <?php dsm($content); ?> to find variable names to hide() or render().
 */
hide($content['comments']);
hide($content['links']);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>

  <?php if ($title && !$page): ?>
    <header<?php print $header_attributes; ?>>
      <?php if ($title): ?>
        <h1<?php print $title_attributes; ?>>
          <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        </h1>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php if(!empty($user_picture) || $display_submitted): ?>
    <footer<?php print $footer_attributes; ?>>
      <?php print $user_picture; ?>
      <p class="author-datetime"><?php print $submitted; ?></p>
    </footer>
  <?php endif; ?>
  
  <div<?php print $content_attributes; ?>>
  <div class="not-map">
	<div class="boxed-contents">
    <div class="buildingimage">
		<?php print render($content['field_building_image']); ?>
    </div>
	<div class="boxed-text">
	    <div class="title-location">
	    <span class="span-title"><?php print $title; ?> By&nbsp;</span><?php print render($content['field_builders']); ?><span class="span-in">&nbsp;In&nbsp;</span><?php print render($content['field_location']); ?>
        </div>
		<div class="boxed-price boxed-propdata">
		<span class="span-price span-proptitle">Price Starts</span>
	    <?php print render($content['field_price_starts']); ?>
        </div>
		<div class="boxed-area boxed-propdata">
		<span class="span-area span-proptitle">Built Area Sqft</span>
	    <?php print render($content['field_built_area']); ?>
		</div>
		<div class="boxed-ready boxed-propdata">
		<span class="span-ready span-proptitle">Ready By</span>
	    <?php print render($content['field_ready_by']); ?>
        </div>
		<div class="boxed-builders boxed-propdata">
		<span class="span-builder span-proptitle">Build By</span>
	    <?php print render($content['field_builders']); ?>
        </div>
		<div class="boxed-review boxed-link">
	    Quick Review
        </div>
		<div class="boxed-gallery boxed-link">
	    Gallery
        </div>
		<div class="boxed-mplan boxed-link">
	    Master Plan
        </div>
		<div class="boxed-fplan boxed-link">
	    Floor Plan
        </div>
		<div class="boxed-location boxed-link">
	    Location
        </div>
		<div class="boxed-contact boxed-link">
	    Contact
        </div>
    </div>
	</div>
	<div class="grey-prop">
		<div class="grey-propdata">
		<?php print render($content['field_carpet_area']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_facing']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_furnishing']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_flooring']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_no_of_bathrooms']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_balconies']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_project_name']); ?>
		</div>
		<div class="grey-propdata">
		<?php print render($content['field_listed_by']); ?>
		</div>
	</div>
	<div class="gallery">
		<h2>Gallery</h2>
		<div class="gallery-pics">
		<?php print render($content['field_gallery']); ?>
		</div>
	</div>
	<div class="mfplan">
		<div class="mplan">
		<h2>Master Plan</h2>
		<div class="mplan-pics">
		<?php print render($content['field_master_plan']); ?>
		</div>
		</div>
		<div class="fplan">
		<h2>Floor Plan</h2>
		<div class="fplan-pics">
		<?php print render($content['field_floor_plan']); ?>
		</div>
		</div>
	</div>
	</div>
	  
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      
	    <script>
  jQuery(function() {
    jQuery( "#tabs" ).tabs();
  });
  </script>
	<div class="map">
	<h2>Location</h2>
	<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Commute</a></li>
    <li><a href="#tabs-2">Basic Amenities</a></li>
    <li><a href="#tabs-3">Health Care</a></li>
  </ul>
  <div id="tabs-1">
    <?php print render($content['field_commute']); ?>
  </div>
  <div id="tabs-2">
    <?php print render($content['field_basic_amenities']); ?>
  </div>
  <div id="tabs-3">
    <?php print render($content['field_health_care']); ?>
  </div>
</div>
	</div>
  </div>

  <?php if ($links = render($content['links'])): ?>
    <nav<?php print $links_attributes; ?>><?php print $links; ?></nav>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  <?php print render($title_suffix); ?>
</article>
