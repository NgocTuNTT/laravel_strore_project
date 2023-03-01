if (message = '{{ session('message') }}') {
    var notification = document.createElement('div');
    notification.classList.add('toast', 'fade');
    notification.innerHTML = '<div class="toast-header" style="justify-content: space-between;"><img src="{{asset('frontend/assets/images/demos/demo-4/logo.png')}}" width="70px" alt="brand-logo" height="12" class="me-1"><small style="">11 giây trước</small></div><div class="toast-body">' + message + '</div>';
    document.getElementById('notification-container').appendChild(notification);
    showNotification();
  }

  if (message1 = '{{ session('message1') }}') {
    var notification1 = document.createElement('div');
    notification1.classList.add('toast', 'fade');
    notification1.innerHTML = '<div class="toast-header" style="justify-content: space-between;"><img src="{{asset('frontend/assets/images/demos/demo-4/logo.png')}}" width="70px" alt="brand-logo" height="12" class="me-1"><small style="">11 giây trước</small></div><div class="toast-body">' + message1 + '</div>';
    document.getElementById('notification-container').appendChild(notification1);
    showNotification();
  }
