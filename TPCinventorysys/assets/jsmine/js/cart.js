// // Navigation template 1
// $(document).ready(function() {
//     // load default page
//     loadPage('cart.php');
//
//     // handle nav link clicks
//     $('.nav-without-loading-page a').click(function(e) {
//         e.preventDefault();
//         var target = $(this).data('target');
//         loadPage(target);
//     });
// });
//
// function loadPage(page) {
//     $('#content').load(page);
// }