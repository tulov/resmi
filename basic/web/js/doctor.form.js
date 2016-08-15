/**
 * Created by lex on 15.08.2016.
 */
'use strict';
$(document).ready(function(){
    function form2Json(str) {
        var obj,i,pt,keys,j,ev;
        if (typeof form2Json.br !== 'function')
        {
            form2Json.br = function(repl)
            {
                if (repl.indexOf(']') !== -1)
                {
                    return repl.replace(/\](.+?)(,|$)/g,function($1,$2,$3)
                    {
                        return form2Json.br($2+'}'+$3);
                    });
                }
                return repl;
            };
        }
        str = '{"'+(str.indexOf('%') !== -1 ? decodeURI(str) : str)+'"}';
        obj = str.replace(/\=/g,'":"').replace(/&/g,'","').replace(/\[/g,'":{"');
        obj = JSON.parse(obj.replace(/\](.+?)(,|$)/g,function($1,$2,$3){ return form2Json.br($2+'}'+$3);}));
        pt = ('&'+str).replace(/(\[|\]|\=)/g,'"$1"').replace(/\]"+/g,']').replace(/&([^\[\=]+?)(\[|\=)/g,'"&["$1]$2');
        pt = (pt + '"').replace(/^"&/,'').split('&');
        for (i=0;i<pt.length;i++)
        {
            ev = obj;
            keys = pt[i].match(/(?!:(\["))([^"]+?)(?=("\]))/g);
            for (j=0;j<keys.length;j++)
            {
                if (!ev.hasOwnProperty(keys[j]))
                {
                    if (keys.length > (j + 1))
                    {
                        ev[keys[j]] = {};
                    }
                    else
                    {
                        ev[keys[j]] = pt[i].split('=')[1].replace(/"/g,'');
                        break;
                    }
                }
                ev = ev[keys[j]];
            }
        }
        return obj;
    }
    $('#submitBtn').click(function(e){
        var target = $(e.target);
        var isEdit = target.hasClass('btn-edit');
        var form = target.parents('form');
        if(form.find('.has-error').length) {
            alert('Сначала исправте ошибки');
            return false;
        }

        $.ajax({
            url: form.attr('action'),
            type: isEdit ? 'put' : 'post',
            data: JSON.stringify(form2Json(form.serialize()).Doctor),
            dataType:'json',
            contentType:'application/json',
            success: function(data) {
                // do something ...
                console.log(data);
                if(!isEdit){
                    form[0].reset();
                }
                alert('Доктор успешно сохранен...');
            },
            error:function(){
                alert('При сохранении данных произошла ошибка...');
            }
        });

        return false;
    });
});

