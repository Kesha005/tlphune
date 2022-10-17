$(document).ready(function() {
    $(function() {
        //button select all or cancel
        $("#select-all-shop").click(function() {
            var all = $("input.select-all-shop")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item-shop").each(function(_index, item) {
                item.checked = checked;
            });
        });
        //column checkbox select all or cancel
        $("input.select-all-shop").click(function() {
            var checked = this.checked;
            $("input.select-item-shop").each(function(_index, item) {
                item.checked = checked;
            });

            return check_shop();
        });
        //check selected items
        $("input.select-item-shop").click(function() {
            var checked = this.checked;
            var all = $("input.select-all-shop")[0];
            var total = $("input.select-item-shop").length;
            var len = $("input.select-item-shop:checked:checked").length;
            all.checked = len === total;
        });


    });


});

function check_shop() {

    var checkboxes = document.getElementsByName('select-item-shop');
    var result = [];

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result.push(checkboxes[i].value);

        }
    }
    if (result.length == 0) {
        document.getElementById("delete_shop_btn").disabled = true;
        document.getElementById("confirm_shop_btn").disabled = true;
    } else {
        document.getElementById("delete_shop_btn").disabled = false;
        document.getElementById("confirm_shop_btn").disabled = false;
        document.forms.confirm_shop_form.confirm_shop.value = result;
        document.forms.delete_shop_form.delete_shop.value = result;
    }
}