const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, PanelRow, TextControl, Button, Spinner } = wp.components;
const { apiFetch } = wp;


function getAllImages(){
    return apiFetch({
        path: "/wp/v2/media?per_page=100"
    })
        .then(images => images)
        .catch(error => error);
}

export default class Edit extends Component {

    state = {
        images: [],
        isLoading: true,
    }

    async componentDidMount(){
        const images = await getAllImages();
        console.log('componentDidMount', images);
        this.setState({
            images,
            isLoading: false
        });
    }

    render(){
        const { className } = this.props;
        // const { images } = this.props.state;

        console.log(this.props);
        
        if(this.state.isLoading) {
            return (
                <p>
                    <Spinner />
                    { __("Loading", "media-library-image-gallery") }
                </p>
                );
            }

        return (
            <Fragment>
                <InspectorControls>
                    
                </InspectorControls>


                <div className={className}>
                    {images.length > 0 ? images.map( image => {
                        return <p key=""></p>
                    }) : (
                        <p>
                         no images found
                        </p>
                    )}
                </div>
            </Fragment>
        )

    }

}
