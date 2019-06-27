const { __ } = wp.i18n;

const { Fragment } = wp.element;
const { registerBlockType } = wp.blocks;
const { BlockControls, InspectorControls, MediaUpload, MediaPlaceholder } = wp.editor;
const { IconButton, Toolbar, PanelBody, PanelRow, RadioControl, ToggleControl } = wp.components;
const { dispatch, select } = wp.data;

import Edit from './edit';

export default registerBlockType("derweili/media-library-image-gallery", {
    title: __("Media Library Image Gallery", "media-library-image-gallery"),
    description: __("Show all Images from you media library in one gallery", "media-library-image-gallery"),
    category: 'widgets',
    icon: 'edit',
    keywords: [
        __("Library", "media-library-image-gallery"),
        __("Gallery", "media-library-image-gallery"),
    ],
    supports: ["full", "wide"],
    attributes: {
        orderby: { 
            type: "string",
        }
    },
    edit: props => {
        return <Edit {...props} />;
    },
    save: props => {
        return false;
    }
})