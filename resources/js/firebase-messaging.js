function showToast(message) {
    const toastElement = $(`
        <div class="toast" style="position: absolute; top: 56px; right: 0;" data-autohide= false>
            <div class="toast-header">
                <i class="fa-solid fa-bell mr-2" style="color: #f9c23c;"></i>                        
                <strong class="mr-auto">Notificação</strong>
                <small>Agora</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `);

    toastElement.find('.close').click(function () {
        toastElement.remove();
    });

    $('#toast-place').append(toastElement);
    
    $('.toast').toast('show');
}

firebase.initializeApp({
    apiKey: "AIzaSyDZ4IGh27gymHPFLsz-UpWV8XtAWjqYoxs",
    authDomain: "manageruser-428ba.firebaseapp.com",
    projectId: "manageruser-428ba",
    storageBucket: "manageruser-428ba.appspot.com",
    messagingSenderId: "726034696536",
    appId: "1:726034696536:web:2a1d0f007cf33945317d2d",
    measurementId: "G-6Q4ZYX6XMH"
});

const messaging = firebase.messaging();

messaging.requestPermission()
    .then(function() {
        return messaging.getToken();
    })
    .then(function(token) {
        saveUserToken(token);
    })
    .catch(function(err) {
        console.log('notification disable');
    })

function saveUserToken(token) {
    fetch('/fcm/user/register', {
        method: 'POST',
        body: JSON.stringify({ token: token }),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json',
        }
    })
    .then(function (response) {
        if (response.ok) {
            console.log('Notificação ativa');
        } else {
            console.error('Erro ativar notificação');
        }
    })
    .catch(function (err) {
        console.error('Erro na comunicação com o servidor:', err);
    });
}
  
messaging.onMessage(function(payload) {
    showToast(payload.notification.body);
});