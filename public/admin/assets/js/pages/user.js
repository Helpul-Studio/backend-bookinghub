'use strict';
$(document).ready(function() {
    $('#date_of_birth').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });

    $("#phone_number").inputmask({
        mask: "9999-9999-9999"
    });
    // [ Zero-configuration ] start
    $('#zero-configuration').DataTable();

    // [ Columns-Reorder ] start
    $('#col-reorder').DataTable({
        colReorder: true
    });

    // [ Fixed-Columns ] start
    $('#fixed-columns-left').DataTable({
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true,
    });
    $('#fixed-columns-left-right').DataTable({
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 1
        }
    });
    $('#fixed-header').DataTable({
        fixedHeader: true
    });

    // [ Scrolling-table ] start
    $('#scrolling-table').DataTable({
        scrollY: 300,
        paging: false,
        keys: true
    });

    // [ Responsive-table ] start
    $('#responsive-table').DataTable({
    });

    $('#responsive-table-model').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});
