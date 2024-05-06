Echo.join('online')
    .here((users) => {
        console.log('here');
        console.log(users);
    })
    .joining((user) => {
        console.log('joining');
        console.log(user);
    })
    .leaving((user) => {
        console.log('leaving');
        console.log(user);
    });
