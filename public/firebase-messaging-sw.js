importScripts('https://www.gstatic.com/firebasejs/3.5.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.5.0/firebase-messaging.js');

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
