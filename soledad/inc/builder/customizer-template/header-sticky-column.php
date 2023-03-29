<?php
$setting_align = "penci_hb_align_desktop_sticky_{$row}_{$column}";
$default_align = penci_get_builder_mod( $setting_align );

$setting_element = "penci_hb_element_desktop_sticky_{$row}_{$column}";
$default_element = penci_get_builder_mod( $setting_element );
$default_element = explode( ',', $default_element );
?>
<div class="header-builder-<?php echo esc_html( $column ); ?> header-builder-column <?php echo esc_html( $default_align ); ?>"
     data-column="<?php echo esc_html( $column ); ?>">
    <div class="header-builder-drop-zone">
		<?php
		$elements = \HeaderBuilder::desktop_header_element();
		if ( is_array( $default_element ) ) {
			foreach ( $default_element as $element ) {
				if ( ! empty( $element ) ) {
					$template->render( 'header-element', array(
						'key'   => $element,
						'value' => $elements[ $element ]
					), true );
				}
			}
		}
		?>
        <div class="header-setting"><i class="fa"></i></div>
    </div>
    <div class="header-column-option-tooltip">
        <div class="header-column-option-align">
            <h3><?php esc_html_e( 'Align', 'soledad' ); ?></h3>
            <ul>
                <li class="left <?php echo esc_attr( $default_align ) === 'left' ? 'active' : ''; ?>"
                    data-align="left"><?php esc_html_e( 'Left', 'soledad' ); ?></li>
                <li class="center <?php echo esc_attr( $default_align ) === 'center' ? 'active' : ''; ?>"
                    data-align="center"><?php esc_html_e( 'Center', 'soledad' ); ?></li>
                <li class="right <?php echo esc_attr( $default_align ) === 'right' ? 'active' : ''; ?>"
                    data-align="right"><?php esc_html_e( 'Right', 'soledad' ); ?></li>
            </ul>
        </div>
    </div>
</div>
