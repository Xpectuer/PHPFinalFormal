

$(document).ready(function(){

    // Full featured editor


    $('#editor1').each( function(index, element)

{

    $(element).wysiwyg({

        classes: 'some-more-classes',

        position: 'top-selection',

        buttons: {

            // Dummy-HTML-Plugin

            dummybutton1: false,

            // Smiley-Plugin

            smilies:false,

            insertimage: {

                title: 'Insert image',

                image: '\uf030', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            insertlink: {

                title: 'Insert link',

                image: '\uf08e' // <img src="path/to/image.png" width="16" height="16" alt="" />

            },

            // Fontanme + Fontsize Plugin

            fontname:  false,
            fontsize: false ,

            bold: {

                title: 'Bold (Ctrl+B)',

                image: '\uf032', // <img src="path/to/image.png" width="16" height="16" alt="" />

                hotkey: 'b'

            },

            italic: {

                title: 'Italic (Ctrl+I)',

                image: '\uf033', // <img src="path/to/image.png" width="16" height="16" alt="" />

                hotkey: 'i'

            },

            underline: {

                title: 'Underline (Ctrl+U)',

                image: '\uf0cd', // <img src="path/to/image.png" width="16" height="16" alt="" />

                hotkey: 'u'

            },

            strikethrough: {

                title: 'Strikethrough (Ctrl+S)',

                image: '\uf0cc', // <img src="path/to/image.png" width="16" height="16" alt="" />

                hotkey: 's'

            },

            forecolor: {

                title: 'Text color',

                image: '\uf1fc' // <img src="path/to/image.png" width="16" height="16" alt="" />

            },

            highlight: {

                title: 'Background color',

                image: '\uf043' // <img src="path/to/image.png" width="16" height="16" alt="" />

            },

            alignleft: index != 0 ? false : {

                title: 'Left',

                image: '\uf036', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            aligncenter: {

                title: 'Center',

                image: '\uf037', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            alignright:  {

                title: 'Right',

                image: '\uf038', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            alignjustify: {

                title: 'Justify',

                image: '\uf039', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            subscript: false,

            superscript: false,

            indent: {

                title: 'Indent',

                image: '\uf03c', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            outdent: {

                title: 'Outdent',

                image: '\uf03b', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            orderedList: {

                title: 'Ordered list',

                image: '\uf0cb', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            unorderedList:  {

                title: 'Unordered list',

                image: '\uf0ca', // <img src="path/to/image.png" width="16" height="16" alt="" />

                //showstatic: true,    // wanted on the toolbar

                showselection: false    // wanted on selection

            },

            removeformat: {

                title: 'Remove format',

                image: '\uf12d' // <img src="path/to/image.png" width="16" height="16" alt="" />

            }

        },

        // Submit-Button

        submit: {

            title: 'Submit',

            image: '\uf00c' // <img src="path/to/image.png" width="16" height="16" alt="" />

        },

        // Other properties

        dropfileclick: 'Drop image or click',

        placeholderUrl: 'www.example.com',

        maxImageSize: [600,200]

        /*

        onImageUpload: function( insert_image ) {

                        // Used to insert an image without XMLHttpRequest 2

                        // A bit tricky, because we can't easily upload a file

                        // via '$.ajax()' on a legacy browser.

                        // You have to submit the form into to a '<iframe/>' element.

                        // Call 'insert_image(url)' as soon as the file is online

                        // and the URL is available.

                        // Best way to do: http://malsup.com/jquery/form/

                        // For example:

                        //$(this).parents('form')

                        //       .attr('action','/path/to/file')

                        //       .attr('method','POST')

                        //       .attr('enctype','multipart/form-data')

                        //       .ajaxSubmit({

                        //          success: function(xhrdata,textStatus,jqXHR){

                        //            var image_url = xhrdata;

                        //            console.log( 'URL: ' + image_url );

                        //            insert_image( image_url );

                        //          }

                        //        });

                    },

        onKeyEnter: function() {

                        return false; // swallow enter

                    }

        */

    })

        .change(function(){

            if( typeof console != 'undefined' )

                console.log( 'change' );

        })

        .focus(function(){

            if( typeof console != 'undefined' )

                console.log( 'focus' );

        })

        .blur(function(){

            if( typeof console != 'undefined' )

                console.log( 'blur' );

        });

});



// Demo-Buttons




// Raw editor


//  var wysiwygeditor = wysiwyg( option );

//wysiwygeditor.setHTML( '<html>' );

});
