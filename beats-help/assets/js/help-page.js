(function ($) {
    $(document).ready(function () {
        if (document.getElementById('dokan-help-page-root')) {
            const { createElement } = wp.element;

            const HelpPage = () => {
                return createElement(
                    'div',
                    { className: 'dokan-help-page' },
                    createElement('h1', null, 'Help Page'),
                    createElement('p', null, 'Welcome to the help page. Here you can find useful information and resources to assist you.'),
                    createElement(
                        'ul',
                        null,
                        createElement('li', null, createElement('a', { href: '#' }, 'Help Topic 1')),
                        createElement('li', null, createElement('a', { href: '#' }, 'Help Topic 2')),
                        createElement('li', null, createElement('a', { href: '#' }, 'Help Topic 3'))
                    )
                );
            };

            wp.element.render(
                createElement(HelpPage, null),
                document.getElementById('dokan-help-page-root')
            );
        }
    });
})(jQuery);
