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


// sisetu.js

// ページの読み込みが完了したら処理を実行
window.addEventListener('DOMContentLoaded', (event) => {
  // seat-activeクラスを持つ全ての要素を取得
  const seatActiveElements = document.querySelectorAll('.seat');

  // 取得した要素に対してクリックイベントを設定
  seatActiveElements.forEach((element) => {
    element.addEventListener('click', (event) => {
      // クリックされた要素の背景色とテキスト色を変更
      if (element.classList.contains('selected')) {
        // 選択済みの場合は色を戻す
        element.classList.remove('selected');
      } else {
        // 未選択の場合は色を変更
        element.classList.add('selected');
      }
    });
  });
});
