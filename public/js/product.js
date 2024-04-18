$(function () {
    $(".add-to-cart").on("click", function (event) {
        event.preventDefault();
        let urlCart = $(this).data("url");

        $.ajax({
            type: "GET",
            url: urlCart,
            dataType: "json",
            success: function (data) {
                if (data.code === 200) {
                    alert("Add Product Success");
                } 
            },
            error: function (xhr, status, error) {
                if (xhr.status === 404) {
                    alert("Product does not exist");
                } 
                if (xhr.status === 409) {
                    alert("Product already exists in the cart");
                }
                if (xhr.status === 400) {
                    alert("You need to log in");
                }
            },
        });
    });
});
