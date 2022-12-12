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

function check_event() {

    var checkboxes = document.getElementsByName('select-item-event');
    var result = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result.push(checkboxes[i].value);

        }
    }
    if (result.length == 0) {
        document.getElementById("del_event").disabled = true;
        document.getElementById("check_event").disabled = true;
        document.getElementById("vip").disabled = true;
    } else {
        document.getElementById("check_event").disabled = false;
        document.getElementById("del_event").disabled = false;
        document.getElementById("vip_event").disabled = false;
        document.forms.check_event_form.check_val.value = result;
        document.forms.del_event_form.del_val.value = result;
        document.forms.vip_event_form.vip_val.value = result;
    }
}