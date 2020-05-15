import tinyMCE from 'tinymce';

let isRTL = $('body').hasClass('rtl');

let direction = (isRTL) ? 'rtl' : 'ltr';

tinyMCE.baseURL = `${FleetCart.baseUrl}/modules/admin/js/wysiwyg`;

tinyMCE.init({
    selector: '.wysiwyg',
    theme: 'modern',
    mobile: { theme: 'mobile' },
    height: 300,
    menubar: false,
    branding: false,
    image_advtab: true,
    image_title: true,
    relative_urls: false,
    directionality: direction,
    cache_suffix: `?v=${FleetCart.version}`,
    plugins: 'lists, link, table, paste, autosave, autolink, wordcount, code',
    toolbar: 'styleselect bold italic underline | bullist numlist | alignleft aligncenter alignright | outdent indent | link table code',
});
