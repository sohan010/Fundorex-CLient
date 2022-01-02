// var firstTabEl = document.querySelector('#myTab li:last-child a')
// var firstTab = new bootstrap.Tab(firstTabEl)
//
// firstTab.show()

// ProgreeBar js
// var progressBar = $('.donation-progress');
//
// if (progressBar.length){
//     $.each(progressBar,function (value){
//         var el = $(this);
//         progressBarInit(el,el.data('percentage'));
//     })
// }
// function progressBarInit(selector,percentage){
//     selector.rProgressbar({
//         percentage: percentage,
//         fillBackgroundColor: '#f1ae44'
//     });
// }



// Slick slider js


$('.slick-slider-active').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
});