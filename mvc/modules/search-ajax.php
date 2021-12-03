<style>
    .result {
        width: 100%;
        position: absolute;
        top: 51px;
        z-index: 3;
        background-color: white;
    }

    .result p {
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #ccc;
        border-top: none;
        cursor: pointer;
    }

    .result p:hover {
        background: #f6a5b9;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.search-box input[type="text"]').on("keyup input", function() {
            /* Lấy giá trị đầu vào khi có thay đổi */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length) {
                $.get("./mvc/modules/backend-search.php", {
                    term: inputVal
                }).done(function(data) {
                    // Hiển thị dữ liệu trả về trong trình duyệt
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });
        // Thiết lập giá trị đầu vào khi click vào result
        $(document).on("click", ".result p", function() {
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>