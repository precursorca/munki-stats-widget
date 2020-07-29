<div class="col-lg-4 col-md-6">
    <div class="panel panel-default" id="munki_stats-widget">
        <div id="munki_stats-widget" class="panel-heading" data-container="body" data-i18n="[title]munki_stats_widget.title">
            <h3 class="panel-title"><i class="fa fa-check-square-o"></i> 
                <span data-i18n="munki_stats_widget.title">Managed Software Stats</span>
                <list-link data-url="/show/listing/munkireport/munki"></list-link>
            </h3>
        </div>
        <div class="panel-body text-center">
          <a href="/show/listing/munkireport/munki" tag="clients" class="btn btn-primary disabled">
            <span class="bigger-150"> 0 </span><br>
             <!-- <span data-i18n="client.clients"></span> -->
            <span>Computers</span>
          </a>
          
          <a href="/module/managedinstalls/listing/#installed" tag="installs" class="btn btn-success disabled">
            <span class="bigger-150"> 0 </span><br>
            <!-- <span data-i18n="managedinstalls.title"></span> -->
            <!-- <span>Managed Apps</span> -->
            <span data-i18n="munkireport.managedsoftware"></span>
          </a>

         <a href="/module/managedinstalls/listing/#pending_install" tag="pending" class="btn btn-warning disabled">
            <span class="bigger-150"> 0 </span><br>
            <span data-i18n="pending"></span>
          </a>

          <a href="/module/managedinstalls/listing/#install_failed" tag="failed" class="btn btn-danger disabled">
            <span class="bigger-150"> 0 </span><br>
            <span data-i18n="failed"></span>
          </a>

        </div>
    </div><!-- /panel -->
</div><!-- /col -->

<script>

// Set the url on init
//$('#munki_stats-widget .panel-body a')
 //   .attr("href", appUrl + '/show/listing/munkireport/munki')
    
$(document).on('appUpdate', function(e, lang) {

		//Set the hours to one month
		var hours = 24 * 30;
		//Gather the data from ManagedInstalls Module
		$.getJSON( appUrl + '/module/managedinstalls/get_stats/'+hours, function( data ) {

        if(data.error){
        //alert(data.error);
        return;
        }
        
        // data = [{"status":"install_failed","type":"applesus","clients":"1","total_items":"1"},{"status":"install_failed","type":"munki","clients":"324","total_items":"564"},{"status":"install_succeeded","type":"munki","clients":"628","total_items":"980"},{"status":"installed","type":"munki","clients":"5356","total_items":"88918"},{"status":"pending_install","type":"applesus","clients":"15","total_items":"30"},{"status":"pending_install","type":"munki","clients":"605","total_items":"1297"},{"status":"pending_removal","type":"munki","clients":"20","total_items":"51"},{"status":"removed","type":"munki","clients":"5355","total_items":"10763"},{"status":"uninstall_failed","type":"munki","clients":"3","total_items":"3"},{"status":"uninstalled","type":"munki","clients":"1","total_items":"1"}];
        
        var clients = {
          install_failed: 0,
          install_succeeded: 0,
          installed: 0,
          pending_install: 0,
          pending_removal: 0,
          removed: 0,
          uninstall_failed: 0,
          uninstalled: 0
        }
        
        var total_items = {
          install_failed: 0,
          install_succeeded: 0,
          installed: 0,
          pending_install: 0,
          pending_removal: 0,
          removed: 0,
          uninstall_failed: 0,
          uninstalled: 0
        }

        // Populate the stats object with data
        $.each(data, function(index, obj){
            clients[obj.status] = clients[obj.status] + parseInt(obj.clients);
            total_items[obj.status] = total_items[obj.status] + parseInt(obj.total_items);
        })
        
        // Use the data from the stats object to render the buttons
        $('#munki_stats-widget a[tag=clients]')
            .toggleClass('disabled', ! clients['installed'])
            .find('span.bigger-150')
                .text(clients['installed'])
                
		$('#munki_stats-widget a[tag=installs]')
          .toggleClass('disabled', ! total_items['installed'])
          .find('span.bigger-150')
              .text(total_items['installed'])
                               
        $('#munki_stats-widget a[tag=pending]')
           .toggleClass('disabled', ! total_items['pending_install'])
           .find('span.bigger-150')
               .text(total_items['pending_install'])

        $('#munki_stats-widget a[tag=failed]')
          .toggleClass('disabled', ! clients['install_failed'])
          .find('span.bigger-150')
              .text(clients['install_failed'])
    });
});

</script>
