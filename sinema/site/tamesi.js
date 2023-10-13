// ボタンクリック関数
function butotnClick1(){
    // alert()で、アラートを出力
    alert('ボタンがクリックされました');
}

// document.getElementById()でHTMLの中でid属性がbtnの要素を取得し、変数buttonに代入する
let button1 = document.getElementById('btn');
// buttonのonclickプロパティに上記で宣言しているボタンクリック関数を代入
button1.onclick = butotnClick1;