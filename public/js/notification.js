// $(function () {
//     $('#mark-as-read').click(function () {
//         alert('clicked')
//     })
// })

// function markAsRead() {
//     alert('clicked')
// }

function markNotificationAsRead(notificationCount) {
    if(notificationCount !== 0){
        $.get('/markAsRead');
    }

}
