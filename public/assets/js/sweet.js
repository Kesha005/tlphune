$('#delete_confirm').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    var form = $(this).closest("form");
    swal.fire({
        title: 'Maglumaty aýyrmak isleýäňizmi ?',
        text: "Aýyrylan maglumatlary yzyna alyp bolmaýar !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hawa',
        cancelButtonText: 'Ýok',
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
});