( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


function evitafrontpagesectionsscroll( section_id ){
    var scroll_section_id = "slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-course_category_setting':
        scroll_section_id = "category_one";
        break;
		
		case 'accordion-section-video_setting':
        scroll_section_id = "home1-video";
        break;
		
		case 'accordion-section-funfact_setting':
        scroll_section_id = "funfact-one";
        break;
		
		case 'accordion-section-blog_setting':
        scroll_section_id = "blogpost1";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-evita_frontpage_sections .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        evitafrontpagesectionsscroll( section_id );
});