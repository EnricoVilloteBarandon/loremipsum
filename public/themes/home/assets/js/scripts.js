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
            'url' : BASEURL + '/first/json',
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
    j('#btnTest').on('click',function(e){
        j.ajax({
            url : 'ajax/' + 1,
            type : 'post',
            data : {
                '_token' : j('#token').val()
//                ,type : '1'
            },
            success : function(response){
                alert(response);
            },
            error : function(err){
                alert('error');
            }
        });
    });
    j('p').on('click',function(){
        j(this).changeColor();
    });
    var obj = {
        'Strength' : [
            {'name' : 'Malphite','age' : 200},
            {'name' : 'Alistar','age' : 100}
        ],
        'Agility' : [
            {'name' : 'Shaco','age':30},
            {'name' : 'Tesla','age':23}
        ]
    }
    var data = {items: [
        {id: "1", name: "Snatch", type: "crime"},
        {id: "2", name: "Witches of Eastwick", type: "comedy"},
        {id: "7", name: "Douglas Adams", type: "comedy"},     // <== The new item
        {id: "3", name: "X-Men", type: "action"},
        {id: "4", name: "Ordinary People", type: "drama"},
        {id: "5", name: "Billy Elliot", type: "drama"},
        {id: "6", name: "Toy Story", type: "children"}
    ]};
    var ppr = {"cases":[
            {"case_id":2,"case_name":"Naturalization","locations_with_approval":[{'test':'test'}],"location_without_approval":[3,4,5,6,7,8,9,10]},
            {"case_id":3,"case_name":"Unaccompanied Child","locations_with_approval":[1,2,4,5,6,7,8,9,10],"location_without_approval":[]}],
        "location_with_approval":[12,2],
        "location_without_approval":[3,4],
        "modules":["events_create"]}
    obj.Strength.push(
        {'test':'test'}
    );
    data.items.push({
        'id':7,name:'Lorem Ipsum',type:'foo'
    });
    console.log(ppr);
});
j.fn.changeColor = function(e){
    j(this).css('color','red');
}
