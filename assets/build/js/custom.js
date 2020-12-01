/*
 * Application  : My CI
 * File         : custom.js
 * Develop By   : Lou Galban
 * Developer    : Lou Galban
 * Version      : 1.0
 */

(function () {

    var scApp = {

        base_url: '',
        report_data: '',
        globalSearch: 'global-search',

        init: function () {

            this.setBaseURL();

            // onload
            this.sampleModule();

            // onpage load
			var page = jQuery('#pageID');
            if (page.length) {
                this.userRolesModule();
			}
            
            // this.userRolesModule();
            // this.manageUsersModule();
            // this.reportModule();
			
        },

        setBaseURL: function () {
            this.base_url = jQuery('.site_title').attr('href');
        },

        /*========  START sample module functions  ========*/

        sampleModule: function () {
            console.log('BASE URL: '+this.base_url);
        },


        getLabelColor: function (action) {
            var value = 'defualt';
            switch(action) {
                case 'pending':
                    value = 'primary';
                    break;
                case 'approved':
                    value = 'success';
                    break;
                case 'denied':
                    value = 'danger';
                    break;
            }
            return value;

        },



        manageUsersModule: function () {
            //delete user

            $('#deleteUser').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                $('#deleteUser input#del_userId').val(id);
            });
        },

        dataTables: function(){

            // DataTable search box for recipients archived
            $table_archvd = jQuery('#recipients-table-archived');
            if ($table_archvd.length > 0) {
                var table_arc =  jQuery('#recipients-table-archived').DataTable({
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "ordering": false
                });

                // Apply the search
                table_arc.columns().eq( 0 ).each( function ( colIdx ) {
                    $( 'input', table_arc.column( colIdx ).header() ).on( 'keyup change', function () {
                        table_arc
                            .column( colIdx )
                            .search( this.value )
                            .draw();
                    } );
                } );
            }

            // DataTable search box for recipients approval
            $table_approval = jQuery('#recipients-table-approval');
            if ($table_approval.length > 0) {
                var table_apprv =  jQuery('#recipients-table-approval').DataTable({
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "ordering": false
                });

                // Apply the search
                table_apprv.columns().eq( 0 ).each( function ( colIdx ) {
                    $( 'input', table_apprv.column( colIdx ).header() ).on( 'keyup change', function () {
                        table_apprv
                            .column( colIdx )
                            .search( this.value )
                            .draw();
                    } );
                } );
            }
        },

        importData: function(){
            jQuery('#form-import').on('submit', function(){
                jQuery('[name="importSubmit"]').html('Uploading...');
                jQuery('#loader-gif').html('<img src="'+scApp.base_url+'/assets/images/loader.gif">');
			});
			
			jQuery('#form-import').on('submit', function(){
                jQuery('[name="importSubmit"]').html('Uploading...');
                jQuery('#loader-gif').html('<img src="'+scApp.base_url+'/assets/images/loader.gif">');
			});
        },



        reportModule: function () {
        
            function printDiv(divName) {
                 var printContents = document.getElementById(divName).innerHTML;

                 var originalContents = document.body.innerHTML;

                 document.body.innerHTML = printContents;

                 window.print();

                 document.body.innerHTML = originalContents;
            }

            function downloadPDF() {
                console.log('downloadPDF function');
                var columns = ["#","Recipient name", "Barangay", "Courier", "Birthday", "Status", "Remarks", "Timestamp"];
                var rows = [];
                var counter = 1;
                $.each( report_data, function( key, item ) {
                    var courier_name = item.firstname+' '+item.middlename+' '+item.lastname;
                    var sc_birthday = new Date(item.sc_birthday);
                    sc_birthday = (sc_birthday.getMonth() + 1) + '/' + sc_birthday.getDate() + '/' +  sc_birthday.getFullYear();
                    var received_timestamp = '-';
                    var remarks_info = '-';
                    if(typeof(item.gift_log) != "undefined" && item.gift_log !== null) {
                        received_timestamp_json = jQuery.parseJSON('['+item.gift_log+']');
                        $.each(received_timestamp_json.reverse(), function(idx, obj) {
                            // if(obj.remarks == 'received') {
                            // }
                            if(obj.remarks != 'added') {
                                received_timestamp = obj.date;
                                remarks_info = obj.remarks_info;
                                return false;
                            }
                        });
                    }
                    new_rows = [counter, item.sc_full_name, item.barangay_name, courier_name, sc_birthday, item.sc_remarks, remarks_info, received_timestamp];
                    rows.push(new_rows);
                    counter++;
                });

                var doc = new jsPDF('l', 'mm', [297, 210]);
                doc.autoTable(columns, rows);
                doc.save('recipients.pdf');
            }

            function downloadCSV($table, filename) {
                var $rows = $table.find('tr:has(td),tr:has(th)'),
                tmpColDelim = String.fromCharCode(11), 
                tmpRowDelim = String.fromCharCode(0),

                colDelim = '","',
                rowDelim = '"\r\n"',

                csv = '"' + $rows.map(function (i, row) {
                    var $row = $(row), $cols = $row.find('td,th');

                    return $cols.map(function (j, col) {
                        var $col = $(col), text = $col.text();

                        return text.replace(/"/g, '""'); 

                    }).get().join(tmpColDelim);

                }).get().join(tmpRowDelim)
                    .split(tmpRowDelim).join(rowDelim)
                    .split(tmpColDelim).join(colDelim) + '"',

                csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                if (window.navigator.msSaveBlob) {
                    window.navigator.msSaveOrOpenBlob(new Blob([csv], {type: "text/plain;charset=utf-8;"}), "csvname.csv")
                } 
                else {
                    $('#downloadCSV').attr({ 'download': filename, 'href': csvData, 'target': '_blank' }); 
                }
            }
        },

		userRolesModule: function() {
            $("#selectall").click(function(){
				$('input:checkbox').not(this).prop('checked', this.checked);
				console.log('select all');
			});
        },

    }

    jQuery(document).ready(function () {

        scApp.init();

        jQuery(window).load(function () {

        });
    });

})();
