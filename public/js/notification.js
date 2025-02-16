var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

var channel = pusher.subscribe('task-notification');
channel.bind('App\\Events\\TaskUpdated', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<a href="`+data.user_id+`"><div class="media-body"> <p class="notification-text font-small-3 text-muted text-right">` + data.message + `</p><small style="direction: ltr;"> </small></div></div></a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});