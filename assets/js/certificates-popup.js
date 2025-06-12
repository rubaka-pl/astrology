jQuery(document).ready(function ($) {
    $('.certificates-gallery').magnificPopup({
        delegate: 'a.certificate-item',  // указываем: внутри .certificates-gallery ищем ссылки с этим классом
        type: 'image',
        gallery: {
            enabled: true // включаем режим галереи (переключение между картинками)
        },
        zoom: {
            enabled: true,  // включаем zoom при открытии
            duration: 300   // скорость анимации
        }
    });
});
