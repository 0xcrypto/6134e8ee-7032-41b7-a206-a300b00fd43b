$('#customer_id').on('blur', (e) => { 
    $.ajax({
        type: 'GET',
        url: route('admin.users.fetchCustomerDetail', $('#customer_id').val()),
        success(result) { debugger;
            if(result.data.length == 0 && result.message == 'DETAIL_NOT_FOUND'){
                alert('Detail not found');
            }
            else{
                $('#customer_name').val(result.data.name), $('#customer_email').val(result.data.email);
            }
        },
        error(xhr) {
            alert('Detail not found');
        },
    });
});
