$(document).ready(function() {
    $(function() {
        //button select all or cancel
        $("#select-all").click(function() {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function(_index, item) {
                item.checked = checked;
            });
        });
        //column checkbox select all or cancel
        $("input.select-all").click(function() {
            var checked = this.checked;
            $("input.select-item").each(function(_index, item) {
                item.checked = checked;
            });

            return check();
        });
        //check selected items
        $("input.select-item").click(function() {
            var checked = this.checked;
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            all.checked = len === total;
        });


    });


});

function check() {

    var checkboxes = document.getElementsByName('select-item');
    var result = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result.push(checkboxes[i].value);

        }
    }
    if (result.length == 0) {
        document.getElementById("msgbtn").disabled = true;
    } else {
        document.getElementById("msgbtn").disabled = false;
        document.forms.delmsg.msgdel.value = result;
    }
}