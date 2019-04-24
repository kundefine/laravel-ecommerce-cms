$(document).ready(function(){
    $('#add-cart-item').on('input', 'input.quantityChange', function(e){
        let updatedQuantity = e.target.value;
        let currentProduct = e.target.getAttribute("quantitychange");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            type: 'POST',
            url: '/update_cart',
            data: {updatedQuantity: updatedQuantity, currentProduct: currentProduct },
            success: function (data){
                updateCartUI(currentProduct, data.updatedProductPrice);
            },
            error: function(e) {
                console.log("some error occur");
            }
        });
    });


    $('#add-cart-item').on('change', 'select.colorChange', function(e){
        let color = e.target.value;
        let currentProduct = e.target.getAttribute("colorchange");

        console.log(currentProduct, color);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            type: 'POST',
            url: '/update_attributes',
            data: {color: color, currentProduct: currentProduct },
            success: function (data){
                console.log(data);
                // updateCartUI(currentProduct, data.updatedProductPrice);
            },
            error: function(e) {
                console.log("some error occur");
            }
        });
    });

    $('#add-cart-item').on('change','select.sizeChange', function(e){
        let size = e.target.value;
        let currentProduct = e.target.getAttribute("sizechange");

        console.log(currentProduct, size);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            type: 'POST',
            url: '/update_attributes',
            data: {size: size, currentProduct: currentProduct },
            success: function (data){
                console.log(data);
                updateCartUI(currentProduct, data.updatedProductPrice);
            },
            error: function(e) {
                console.log("some error occur");
            }
        });
    });




    function updateCartUI(id, data) {
        $(`#single-cart-item-${id} td.totalPrice`).html(data)
    }
});