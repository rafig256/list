$(document).ready(function() {
    $('#location_parent_slug').change(function() {
        var parentSlug = $(this).val();
        $.ajax({
            url: '/ajax/get-child-locations',
            method: 'POST',
            data: {
                parent_slug: parentSlug ,
                _token: window.token.csrfToken,
            },
            success: function(response) {
                $('#location_slug').empty(); // پاک کردن گزینه‌های قبلی
                if (response.length === 0) {
                    // اگر زیرمجموعه‌ای وجود نداشت، گزینه "NO DATA" را اضافه کنید
                    $('#location_slug').append($('<option>', {
                        value: '',
                        text: 'NO DATA',
                        disabled: true
                    }));
                }else {
                    $.each(response, function(index, location) {
                        $('#location_slug').append($('<option>', {
                            value: location.slug,
                            text: location.name
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
