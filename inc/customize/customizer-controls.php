<?php
/**
 * Evita Theme Customizer Controls.
 *
 * @package     Evita
 * @since       Evita 1.0
 */

$evita_control_dir =  EVITA_PARENT_INC_DIR . '/customize/custom-controls';

require $evita_control_dir . '/controls/evita-customize-base-control.php';
// require $evita_control_dir . '/controls/evita-range-value-control.php';
require $evita_control_dir . '/controls/evita-control-sortable.php';
require $evita_control_dir . '/controls/evita-radio-image.php';
require $evita_control_dir . '/controls/evita-header-control.php';
require $evita_control_dir . '/controls/font-selector/functions.php';
require $evita_control_dir . '/controls/evita-icon-picker-control.php';
require $evita_control_dir . '/controls/category/evita-category-dropdown-control.php';
require $evita_control_dir . '/controls/category/evita-faq-category-dropdown-control.php';
require $evita_control_dir . '/controls/editor/class/class-evita-page-editor.php';