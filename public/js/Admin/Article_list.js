//お知らせ削除
function deleteAlert(event) {
   if (!window.confirm('削除しますか？')) {
        event.preventDefault();//削除処理をキャンセル
   }
};


//お知らせ変更アラート
function articleeditAlert(article_edit_message) {
   window.alert(article_edit_message);
}

//プロフィール変更アラート
function profileeditAlert(article_edit_message) {
   window.alert(article_edit_message);
}
