/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


(function ($) {
 $( window ).resize( function(){
  $('.views_slideshow_cycle_main').each(function () {
    var img_height;
    $(this).find('.views-slideshow-cycle-main-frame-row').each(function () {
    var tmp_img_height = $(this).height();
    if (tmp_img_height !== 0 ) {
      img_height = tmp_img_height;
    }
    return;
    });
    if (img_height !== 0) {
      $(this).height(img_height).children('.views-slideshow-cycle-main-frame').height(img_height);
    }
    return;
    });
  });
});

(function ($) {
  Drupal.behaviors.cmScripts = {
    attach: function (context, settings) {

      if ($('#navigation #block-system-main-menu .block-wrapper').length) {
        $('#navigation #block-system-main-menu .block-wrapper').prepend('<input type="checkbox" id="button"><label for="button" class="resp-button" onclick></label>');
      }
      if ($('#navigation #block-system-main-menu .menu-block-wrapper').length) {
        $('#navigation #block-system-main-menu .menu-block-wrapper').prepend('<input type="checkbox" id="button"><label for="button" onclick>Menu</label>');
      }

    }
  }
}(jQuery));

(function ($) {
  Drupal.behaviors.cmResponsiveScripts = {
    attach: function (context, settings) {

      $('.cm-row, .column').selectorQuery({
        'widthStops': [340, 680],
        'classPrefix': 'max-'
      });

      $('.view-content-listing .view-content .cm-row').each(function(){
        if ($(this).find('.media .inside').is(':empty')) {
          $(this).find('.wrapper').css('width', '100%');
        }
      });

    }
  }
}(jQuery));

$(document).ready(function() { $('#content select.form-select').select2(); });


// Replace text input labels with html5 placeholders
Drupal.behaviors.html5placeholders = {
  attach: function (context, settings) {
    $('#block-user-login').html5placeholders();
  }
};


})(jQuery, Drupal, this, this.document);
