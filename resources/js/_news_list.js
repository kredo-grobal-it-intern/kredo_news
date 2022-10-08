$(function() {
    $('#target-table').DataTable({
        stateSave: true,
        scrollX: true,
        // scrollY: 600,
        columnDefs: [{
            targets: [ 1 ],
            orderable: false
        }]
    });
})