let cookie = $('#firstCookie').val();
window.Echo.channel('message-'+cookie).listen(
    'Message',
    (e) =>
        {
            console.log(e);
            if (e.sender == 'admin'){
                $('.chat').prepend(`<div class="message-box messageLeft">${e.message}<br><p style='font-size: 10px'>Now</p></div>`);
            }
        }
);
