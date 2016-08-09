<?php

/**
 * Implements template_preprocess_html().
 * Adds path variables.
 */
function mnn_theme_preprocess_html(&$variables, $hook) {
  // Add variables and paths needed for HTML5 and responsive support.
  $variables['base_path'] = base_path();
  $variables['path_to_mnn_theme'] = drupal_get_path('theme', 'mnn_theme');
}

/**
 * Implements theme_links().
 * Enables sub-menu item display for main menu.
 */
function mnn_theme_links($variables) {
  if (array_key_exists('id', $variables['attributes']) && $variables['attributes']['id'] == 'nav') {
    $pid = variable_get('menu_main_links_source', 'nav');
    $tree = menu_tree($pid);
    return drupal_render($tree);
  }
  return theme_links($variables);
}

/**
 * Implements template_preprocess_page().
 */
function mnn_theme_preprocess_page(&$vars) {
 $vars['user_menu'] =  theme('links', array('links' => menu_navigation_links('user-menu'), 'attributes' => array('class '=> array('links', 'site-menu'))));
}

function mnn_theme_theme(&$existing, $type, $theme, $path) {
   $hooks['user_login_block'] = array(
     'template' => 'templates/user-login-block',
     'render element' => 'form',
   );
   return $hooks;
 }
function mnn_theme_preprocess_user_login_block(&$vars) {
  $vars['name'] = render($vars['form']['name']);
  $vars['pass'] = render($vars['form']['pass']);
  $vars['submit'] = render($vars['form']['actions']['submit']);
  $vars['rendered'] = drupal_render_children($vars['form']);
}

// function mnn_theme_form_alter(&$form, &$form_state, $form_id) {
//   debug($form_id);
// }

function mnn_theme_form_user_login_block_alter(&$form, &$form_state, $form_id) {
  // debug($form_id);
  // debug($form);
  $form['name']['#required'] = FALSE;
  $form['pass']['#required'] = FALSE;
}

/***********************
Let's load some CSS on specific targets - uncomment to use
************************/

// function mnn_theme_preprocess_node(&$vars) {
//   // Add JS & CSS by node type
//   if( $vars['type'] == 'page') {
//     //drupal_add_js(path_to_theme(). '/js/some_scripts.js');
//     //drupal_add_css(path_to_theme(). '/css/some_sheet.css');
//   }

//   // Add JS & CSS to the front page
//   if ($vars['is_front']) {
//     drupal_add_js(path_to_theme(). '/js/some_scripts.js');
//     //drupal_add_css(path_to_theme(). '/css/some_sheet.css');
//   }

//   // Add JS & CSS by node ID
//   if (drupal_get_path_alias("node/{$vars['#node']->nid}") == 'your-node-id') {
//     //drupal_add_js(path_to_theme(). '/js/some_scripts.js');
//     //drupal_add_css(path_to_theme(). '/css/some_sheet.css');
//   }
// }
// function mnn_theme_preprocess_page(&$vars) {
//   // Add JS & CSS by node type
//   if (isset($vars['node']) && $vars['node']->type == 'page') {
//     //drupal_add_js(path_to_theme(). '/js/some_scripts.js');
//     //drupal_add_css(path_to_theme(). '/css/some_sheet.css');
//   }
//   // Add JS & CSS by node ID
//   if (isset($vars['node']) && $vars['node']->nid == '1') {
//     //drupal_add_js(path_to_theme(). '/js/some_scripts.js');
//     //drupal_add_css(path_to_theme(). '/css/some_sheet.css');
//   }
// }
