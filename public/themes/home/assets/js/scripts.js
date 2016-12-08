var j = jQuery.noConflict();
j('document').ready(function(){
    var BASEURL = j('#baseurl').val();
    j('#btnregister').on('click',function(){
        window.location = 'register';
    });
    j('#btnlogout').on('click',function(){
        window.location = 'logout';
    });
    j('#submitjson').on('click',function(){
        j.ajax({
            'url' : BASEURL + '/json',
            type : 'post',
            data : {
                '_token' : j('#token').val(),
                data : j('#frminsertjson').serializeArray()
            },
            success : function(response){
                response == '0' ? alert('Success') : alert('Error');
                var form = j('#frminsertjson');
                form[0].reset();
            },
            error: function(){
                alert('Error');
            }
        });
    });
    j('#search').on('keyup',function(e){
        var keyword = j(this).val();
        if(keyword == ''){
            j('#demo').html('');
        }else{
            j.ajax({
                'url' : BASEURL + '/first/search',
                type : 'post',
                data : {
                    '_token' : j('#token').val(),
                    keyword : keyword
                },
                success : function(data){
                    j('#demo').html('');
                    j('#demo').html(data);
                }
            });
        }
    });
});
