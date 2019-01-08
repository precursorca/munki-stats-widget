<div class="col-lg-4 col-md-6">
    <div class="panel panel-default" id="munki_stats-widget">
        <div id="munki_stats-widget" class="panel-heading" data-container="body" data-i18n="[title]managedinstalls.widget.munki_stats.title">
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

        //Gather the data from ManagedInstalls Module (thanks to John Eberle for providing custom getStats function)
        //One month = 720 hours
        var myObj,  x = "";
        myObj = $.getJSON( appUrl + '/module/managedinstalls/get_stats/'+720, function( data ) {

        if(data.error){
            //alert(data.error);
            return;
        }

        var panel = $('#munki_stats-widget div.panel-body'),
        baseUrl = appUrl + '/show/listing/munkireport/munki';
        panel.empty();
        

		//If install_succeeded_munki array is missing use null to provide numerical zero
		 if (data['install_succeeded_munki']==null) {
         var munkiInstalled =  0 ;
         } else {
         var munkiInstalled = Number(data['install_succeeded_munki'].total_items);
         }
		//If install_succeeded__applesus array is missing use null to provide numerical zero
         if (data['install_succeeded__applesus']==null) {
         var appleInstalled =  0  ;
         } else {
         var appleInstalled = Number(data['install_succeeded__applesus'].total_items);
         }
		//Get successful install total;
		 var totalInstalled = (munkiInstalled.valueOf() + appleInstalled.valueOf());


		//If pending_installs_munki array is missing use null to provide numerical zero
		 if (data['pending_install_munki']==null) {
         var munkiPending =  0 ;
         } else {
         var munkiPending = Number(data['pending_install_munki'].total_items);
         }
		//If pending_installs_applesus array is missing use null to provide numerical zero
         if (data['pending_install_applesus']==null) {
         var applePending =  0  ;
         } else {
         var applePending = Number(data['pending_install_applesus'].total_items);
         }
		//Get pending install total;
		 var totalPending = (munkiPending.valueOf() + applePending.valueOf());
		
		
        // Set blocks, disable if zero
        if(data['installed_munki'].clients!=null){
            panel.append(' <a href="'+baseUrl+'" class="btn btn-info"><span class="bigger-150">'+data['installed_munki'].clients+'</span><br>'+i18n.t('Computers')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-info disabled"><span class="bigger-150">'+data['installed_munki'].clients+'</span><br>'+i18n.t('Computers')+'</a>');
        }

        if(data['installed_munki'].total_items!=null){
            panel.append(' <a href="https://munkireport.precursor.ca/index.php?/module/managedinstalls/listing/#installed" class="btn btn-primary"><span class="bigger-150">'+data['installed_munki'].total_items+'</span><br>'+i18n.t('Software')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-primary disabled"><span class="bigger-150">'+data['installed_munki'].total_items+'</span><br>'+i18n.t('Software')+'</a>');
        }

        if(totalInstalled != "0"){
            panel.append(' <a href="https://munkireport.precursor.ca/index.php?/module/managedinstalls/listing/#install_succeeded" class="btn btn-success"><span class="bigger-150">'+totalInstalled+'</span><br>'+i18n.t('Installed')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-success disabled"><span class="bigger-150">'+"0"+'</span><br>'+i18n.t('Installed')+'</a>');
        }

       if(totalPending != "0"){
        	panel.append(' <a href="https://munkireport.precursor.ca/index.php?/module/managedinstalls/listing/#pending_install" class="btn btn-warning"><span class="bigger-150">'+totalPending+'</span><br>'+i18n.t('pending')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-warning disabled"><span class="bigger-150">'+"0"+'</span><br>'+i18n.t('pending')+'</a>');
         }
        
        if(data['install_failed_munki']!=null){
            panel.append(' <a href="https://munkireport.precursor.ca/index.php?/module/managedinstalls/listing/#install_failed" class="btn btn-danger"><span class="bigger-150">'+data['install_failed_munki'].total_items+'</span><br>'+i18n.t('failed')+'</a>');
        } else {
            panel.append(' <a href="'+baseUrl+'" class="btn btn-danger disabled"><span class="bigger-150">'+"0"+'</span><br>'+i18n.t('failed')+'</a>');
        }

    });
});

</script>