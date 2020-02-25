<script src="/assets/admin/js/skins.js"></script>
<!--Basic Scripts-->
<script src="/assets/admin/js/jquery.min.js"></script>
<script src="/assets/admin/js/bootstrap.min.js"></script>
<script src="/assets/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/assets/admin/js/beyond.js"></script>
<script src="/assets/admin/lib/layer/layer.js"></script>
<script>
$(window).bind("load", function() {

    /*Sets Themed Colors Based on Themes*/
    themeprimary = getThemeColorFromCss('themeprimary');
    themesecondary = getThemeColorFromCss('themesecondary');
    themethirdcolor = getThemeColorFromCss('themethirdcolor');
    themefourthcolor = getThemeColorFromCss('themefourthcolor');
    themefifthcolor = getThemeColorFromCss('themefifthcolor');

});

$(function() {
    $('#login_out').click(function() {
        var url = '{{url("admin/login_out")}}';
        $.ajax({
            url: url,
            type: 'post',
            success: function(data) {
                if (data.code == 1) {
                    layer.alert(data.msg, {
                        icon: 6
                    }, function(index) {
                        layer.close(index);
                        location.href = data.url
                    })
                } else {
                    layer.alert(data.msg, {
                        icon: 5,
                        anim: 6
                    }, function(index) {
                        layer.close(index);
                    })
                }
            }
        });
        return false;
    });
});
</script>