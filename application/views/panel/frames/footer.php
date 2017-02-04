
<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/chart.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/chart-data.js");?>"></script>
<script src="<?php echo base_url("assets/js/easypiechart.js");?>"></script>
<script src="<?php echo base_url("assets/js/easypiechart-data.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-datepicker.js");?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-table.js");?>"></script>

<!-- Include JS file. -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.0/js/froala_editor.min.js'></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    });

    $(".glyphicon.glyphicon-remove").parent().on("click",function(){
        $(".alert").hide();
    });

    (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+=' <a href="'+b.link+'" class="btn btn-success"><i class="fa fa-download fa-lg fa-fw"></i> Download</a><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

</script>
</body>

</html>
