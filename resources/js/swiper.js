 // import Swiper JS
 import Swiper from 'swiper';
 import { Navigation, Pagination } from 'swiper/modules';

 // import Swiper and modules styles
 import 'swiper/css';
 import 'swiper/css/navigation';
 import 'swiper/css/pagination';
 
  // configure Swiper to use modules
 Swiper.use([Navigation, Pagination]);
 
  // init Swiper:
 const swiper = new Swiper('.swiper', {
 // Optional parameters
 // direction: 'vertical',
 loop: true,
 speed: 1000, // 少しゆっくり(デフォルトは300)
 autoplay: { // 自動再生 (参考：https://junpei-sugiyama.com/swiper-continue-autoplay/)
 delay: 1500, // 1.5秒後に次のスライド
 disableOnInteraction: false,
 },
 
  // If we need pagination
 pagination: {
 el: '.swiper-pagination',
 },
 
 // Navigation arrows
 navigation: {
 nextEl: '.swiper-button-next',
 prevEl: '.swiper-button-prev',
 },
 
 // And if we need scrollbar
 scrollbar: {
 el: '.swiper-scrollbar',
 },
 });