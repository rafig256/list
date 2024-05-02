let cookie = $('#firstCookie').val();
console.log('cookie is: '+cookie);

// window.Echo.private('message-'+'hP2aHCYoew').listen(
window.Echo.channel('message-'+cookie).listen(
    'Message',
    (e) =>
        {
            console.log(e);
        }
);
