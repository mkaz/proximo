
( function( blocks, editor, element ) {
    var el = element.createElement;
	var Fragment = element.Fragment;
	var RichText = editor.RichText;
	var icon = el( 'i', { className: 'tip' }, '💡' );

    blocks.registerBlockType( 'proximo/tips', {
        title: 'Tip',
        icon: 'lightbulb',
        category: 'layout',

		attributes: {
			content: {
				type: 'string',
				source: 'html',
				selector: 'span',
			},
		},

        transforms: {
            from: [{
                type: 'block',
                blocks: [ 'core/paragraph', 'proximo/sidenote' ],
                transform: function ( attributes ) {
                    return blocks.createBlock( 'proximo/tips', {
                        content: attributes.content,
                    } );
                }
            }],
            to: [{
                type: 'block',
                blocks: [ 'core/paragraph' ],
                transform: function ( attributes ) {
                    return blocks.createBlock( 'core/paragraph', {
                        content: attributes.content,
                    } );
                }
            }]
        },

        edit: function( props ) {
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}

            return el( 'p', { className: props.className },
				icon,
				el( RichText,
					{
						tagName: 'span',
						onChange: onChangeContent,
						value: content,
					}
				)
            );
        },

        save: function( props ) {
			// prepend content with icon

            return el( 'p', { className: props.className },
				icon,
				el( RichText.Content,
					{
						tagName: 'span',
						value: props.attributes.content,
					}
				)
            );
        },
    } );
}(
    window.wp.blocks,
	window.wp.editor,
    window.wp.element,
) );

