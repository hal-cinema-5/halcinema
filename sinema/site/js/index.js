document.addEventListener('DOMContentLoaded', function() {
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebar = document.querySelector('.sidebar');

  sidebarToggle.addEventListener('click', function() {
    sidebar.classList.toggle('show-sidebar');
  });

  const sidebarCloseMenu = document.getElementById('sidebar-close-menu');
  sidebarCloseMenu.addEventListener('click', function() {
    sidebar.classList.remove('show-sidebar');
  });
});






document.addEventListener('DOMContentLoaded', function () {
  // メニューバーの表示・非表示切り替え
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebarCloseMenu = document.getElementById('sidebar-close-menu');
  const body = document.body;

  sidebarToggle.addEventListener('click', function () {
    body.classList.add('show-sidebar');
  });

  sidebarCloseMenu.addEventListener('click', function () {
    body.classList.remove('show-sidebar');
  });

  // スライダーの初期化
  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    prevArrow: '<button type="button" class="slick-prev">◀</button>',
    nextArrow: '<button type="button" class="slick-next">▶</button>'
  });
});
