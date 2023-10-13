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
