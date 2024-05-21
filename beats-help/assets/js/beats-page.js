(function ($) {
    $(document).ready(function () {
        if (document.getElementById('dokan-beats-page-root')) {
            const { createElement } = wp.element;

            const BeatsPage = () => {
                return createElement(
                    'div',
                    { className: 'dokan-beats-page' },
                    createElement('h1', null, 'Beats Page'),
                    createElement('p', null, 'Welcome to the beats page. Here you can find useful information and resources about beats.'),
                    createElement(
                        'ul',
                        null,
                        createElement('li', null, createElement('a', { href: '#' }, 'Beat Topic 1')),
                        createElement('li', null, createElement('a', { href: '#' }, 'Beat Topic 2')),
                        createElement('li', null, createElement('a', { href: '#' }, 'Beat Topic 3'))
                    )
                );
            };

            wp.element.render(
                createElement(BeatsPage, null),
                document.getElementById('dokan-beats-page-root')
            );
        }
    });
})(jQuery);
