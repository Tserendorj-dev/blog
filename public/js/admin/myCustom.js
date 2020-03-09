
function deleteConfirm(e){
    if(!window.confirm('削除してもよろしいですか？')){
       return false;
    }
    document.deleteform.submit();
 };