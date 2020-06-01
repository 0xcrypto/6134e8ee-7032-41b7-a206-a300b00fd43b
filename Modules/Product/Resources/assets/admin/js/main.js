import ProductForm from './ProductForm';

new ProductForm();


$(document).ready(function(){
    $(".store-unit-quantity").on('keyup mouseup' ,function(){
        var totalQuantity = 0;
        $(".store-unit-quantity").each(function(){
            totalQuantity += parseInt($(this).val());
        });
        $('#qty').val(totalQuantity);
    });
});
