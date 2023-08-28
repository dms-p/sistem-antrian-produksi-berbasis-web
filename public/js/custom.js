$(document).ready(function () {
    $(document).on('submit','#delete',function(e)
    {
        let confirmation=window.confirm('are you sure to delete data?');
        if (confirmation) {
            return true;
        } else {
            return false;
        }
    })
    $("#printed_at,#finished_at,#date_inv").daterangepicker({
        singleDatePicker:true,
        locale:{
            format:'DD/MM/YYYY'
        }
    })
});