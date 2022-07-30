$(document).ready(function () {
    // alert('hello');
    $('.add-to-cart').click(function (){
        // - lấy id của sản phẩm đang được click thông qua thuộc tính data-id đã được set sẵn
        var product_id = $(this).attr('data-id');
        // alert(product_id);
        // - Gọi ajax lên PHP để nhờ PHP thêm vài giỏ hàng
        $.ajax({
            // URL mà ajax gọi tới
            url: 'index.php?controller=cart&action=add',
            // Phương thức gửi dữ liệu: get, post
            method: 'get',
            // Dữ liệu gửi lên:
            data: {product_id: product_id},
            // Nơi nhận dữ liệu trả về từ PHP
            success: function (data) {
                console.log(data);
                // - Hiển thị thông báo tới user
                $('.ajax-message')
                    .html('thêm sp vào giỏ thành công')
                    .addClass('ajax-message-active');
                // - Chỉ hiển thị sau 3s sau đó thông báo tự mất
                setTimeout(function (){
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000)
                // Cập nhật số lượng giỏ hàng lên 1:
                var cart_total = $('.cart-amount').html();
                cart_total++;
                $('.cart-amount').html(cart_total);
            }
        });
    });
})
