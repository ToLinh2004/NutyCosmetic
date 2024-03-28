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
            error: function () {
                alert("Error occurred");
            },
        });
    });
});
