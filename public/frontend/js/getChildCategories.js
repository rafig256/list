    $(document).ready(function() {
    $('#category_parent_slug').change(function() {

        var parentSlug = $(this).val();
        $.ajax({
            url: '/ajax/get-child-categories',
            method: 'POST',
            data: {
                parent_slug: parentSlug,
                _token: window.token.csrfToken,
            },
            success: function(response) {
                $('#category_slug').empty(); // پاک کردن گزینه‌های قبلی
                if (response.length === 0) {
                    // اگر زیرمجموعه‌ای وجود نداشت، گزینه "NO DATA" را اضافه کنید
                    $('#category_slug').append($('<option>', {
                        value: '',
                        text: 'NO DATA',
                        disabled: true
                    }));
                } else {
                    // پر کردن گزینه‌های مجموعه‌های فرزند با داده‌های دریافتی
                    $.each(response, function(index, category) {
                        $('#category_slug').append($('<option>', {
                            value: category.slug,
                            text: category.name
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
