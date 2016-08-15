/**
 * Created by lex on 15.08.2016.
 */
$(document).ready(function(){
    $('a.delete-link').click(function(e){
        e.preventDefault();
        if(!confirm('Вы уверены?')){
            return false;
        }
        $.ajax({
            url: $(this).attr('href'),
            type: 'delete',
            dataType:'json',
            success: function(data) {
                // do something ...
                window.location.reload();
            },
            error:function(){
                alert('При удалении данных произошла ошибка...');
            }
        });
    });
});
