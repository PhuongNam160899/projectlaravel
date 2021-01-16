$(document).ready(function() 
{
    $('.number').text(function(i,num)
    {
        num = addPeriod(num);
        $('.number').eq(i).text(num+' VND')
    });
    $('button').click(function(){
        var id = $(this).attr('stt');
        var margin = -950*(id-1);
        $('.wap').css('margin-left',margin+'px');
        // alert(margin);

    });
    var count = $('button').length;
    $("#next").click(function () {
        var mg = parseInt($('.wap').css('margin-left'));
        var new_marginleft = mg + 950;
        if(new_marginleft>0)
        {
            $('.wap').css('margin-left',-950*(count-1)+'px');
        }
        else
        {
            $('.wap').css('margin-left',new_marginleft+'px');
        }
        // alert(mg);
    });
    setInterval(function () {
        $("#next").click();
    }, 3000);
});
function addPeriod(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
    {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}
$(".search").keyup(function(event)
{
    if(event.keyCode == 13){
    $(".search_submit").click();
}});