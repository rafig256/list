let cookie = $('#firstCookie').val();
// window.Echo.private('message-'+'hP2aHCYoew').listen(
window.Echo.channel('message-'+cookie).listen(
    'Message',
    (e) =>
        {
            // console.log(e);
            $('.chat').prepend(`<div class="message-box messageLeft">${e.message}<br><p style='font-size: 10px'>Now</p></div>`);
        }
);
