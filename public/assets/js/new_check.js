$(document).ready(function() {
    $(function() {
        //button select all or cancel
        $("#select-all-event").click(function() {
            var all = $("input.select-all-event")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item-event").each(function(_index, item) {
                item.checked = checked;
            });
        });
        //column checkbox select all or cancel
        $("input.select-all-event").click(function() {
            var checked = this.checked;
            $("input.select-item-event").each(function(_index, item) {
                item.checked = checked;
            });

            return check_event();
        });
        //check selected items
        $("input.select-item-event").click(function() {
            var checked = this.checked;
            var all = $("input.select-all-event")[0];
            var total = $("input.select-item-event").length;
            var len = $("input.select-item-event:checked:checked").length;
            all.checked = len === total;
        });


    });


});

