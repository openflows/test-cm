<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

 
    // Ouptuts site breadcrumbs with current page title appended onto trail
    function cm_theme_breadcrumb($variables) {
      $breadcrumb = $variables['breadcrumb'];
      if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
        $crumbs = '<div class="breadcrumb">';
        $array_size = count($breadcrumb);
        $i = 0;
        while ( $i < $array_size) {
          $crumbs .= '<span class="breadcrumb-' . $i;
          if ($i == 0) {
            $crumbs .= ' first';
          }
          /* if ($i+1 == $array_size) {
            $crumbs .= ' last';
          } */
          $crumbs .=  '">' . $breadcrumb[$i] . '</span> &#187; ';
          $i++;
        }
        $crumbs .= '<span class="active">'. drupal_get_title() .'</span></div>';
        return $crumbs;
      }
    }

	
// Adds descriptive ID to blocks
function block_id(&$block) {
  $info = module_invoke($block->module, 'block', 'list');
  if ($info[$block->delta]['info']) {
    $block_id = 'block-' . $block->module . '-' . $info[$block->delta]['info'];
    $block_id = str_replace(array(' ', '_'), '-', strtolower($block_id));
    return preg_replace('/[^\-a-z0-9]/', '', $block_id);
  } else {
    return 'block-' . $block->module . '-' . $block->delta;
  }
}

function cm_theme_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/*
 * Implements template_process_page().
 */
function cm_theme_process_page(&$variables, $hook) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}


drupal_add_js('sites/all/themes/cm_theme/plugins/jquery.showhide.js'); 
?>