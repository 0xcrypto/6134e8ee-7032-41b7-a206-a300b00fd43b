window.admin.removeSubmitButtonOffsetOn(['#permissions']);

$('.btn-index-all, .btn-create-all, .btn-edit-all, .btn-destroy-all').on('click', (e) => {
    let action = '.'+e.currentTarget.className.split(/-/)[1];
    var checked = $(e.currentTarget).prop('checked');
    $(action + '-col > input[type=checkbox]').prop('checked', checked);
    $(action + '-col > input[type=checkbox]').next('input[type=hidden]').val(+checked);
});

$('.delete-api-key').on('click', (e) => {
    $('#confirmation-form').attr('action', e.currentTarget.dataset.action);
});

$('.checkbox').click(function(){
    $(this).is(':checked') ? $(this).next('input[type=hidden]').val(1) : $(this).next('input[type=hidden]').val(0);
});
