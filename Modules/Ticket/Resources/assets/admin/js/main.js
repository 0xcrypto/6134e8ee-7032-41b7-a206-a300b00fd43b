$('#customer_id').on('keup', (e) => {
    $.ajax({
        type: 'GET',
        url: route('admin.users.fetchDetail'),
        data: { 'id': $(this).val()},
        success(result) {
            debugger;
        },
        error(xhr) {
            if (xhr.status === 406) {
                error(xhr.responseJSON.message);
            } else {
                error(xhr.statusText);
            }
        },
    });
});
