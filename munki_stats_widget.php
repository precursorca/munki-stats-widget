<div class="col-lg-4 col-md-6">
    <div class="panel panel-default" id="munki_stats-widget">
        <div id="munki_stats-widget" class="panel-heading" data-container="body" data-i18n="[title]munki_stats_widget.title">
            <h3 class="panel-title"><i class="fa fa-check-square-o"></i> 
                <span data-i18n="munki_stats_widget.title">Managed Software Stats</span>
                <list-link data-url="/show/listing/munkireport/munki"></list-link>
            </h3>
        </div>
        <div class="panel-body text-center"></div>
    </div><!-- /panel -->
</div><!-- /col -->

<script>
$(document).on('appUpdate', function(e, lang) {

		//Set the hours to one month
		var hours = 24 * 30;
		//Gather the data from ManagedInstalls Module
		var myObj,  x = "";
		myObj = $.getJSON( appUrl + '/module/managedinstalls/get_stats/'+hours, function( data ) {

        if(data.error){
        //alert(data.error);
        return;
        }

        var panel = $('#munki_stats-widget div.panel-body'),
        baseUrl = appUrl + '/show/listing/munkireport/munki';
        panel.empty();
        
        //pending total;
        var munkiPending = Number(data[6].total_items);
        var applePending = Number(data[5].total_items);
		var totalPending = (munkiPending + applePending);
                
        // Set blocks, disable if zero
        if(data[4].clients != "0"){
            panel.append(' <a href="'+baseUrl+'" class="btn btn-info"><span class="bigger-150">'+data[4].clients+'</span><br>'+i18n.t('Clients')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-info disabled"><span class="bigger-150">'+data[4].clients+'</span><br>'+i18n.t('Clients')+'</a>');
        }
        if(data[4].total_items != "0"){
            panel.append(' <a href="'+baseUrl+'" class="btn btn-success"><span class="bigger-150">'+data[4].total_items+'</span><br>'+i18n.t('Installs')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-success disabled"><span class="bigger-150">'+data[4].total_items+'</span><br>'+i18n.t('Installs')+'</a>');
        }


        if(data[6].total_items != "0"){
            panel.append(' <a href="'+baseUrl+'" class="btn btn-warning"><span class="bigger-150">'+totalPending+'</span><br>'+i18n.t('Pending')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-warning disabled"><span class="bigger-150">'+totalPending+'</span><br>'+i18n.t('Pending')+'</a>');
        }

        if(data[0].total_items != "0"){
            panel.append(' <a href="'+baseUrl+'" class="btn btn-danger"><span class="bigger-150">'+data[0].total_items+'</span><br>'+i18n.t('Failed')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-danger disabled"><span class="bigger-150">'+data[0].total_items+'</span><br>'+i18n.t('Failed')+'</a>');
        }

    });

});

</script>