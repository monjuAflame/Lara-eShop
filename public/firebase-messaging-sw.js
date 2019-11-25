importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-messaging.js');

firebase.initializeApp({
  'messagingSenderId': '74013370425'
});


const messaging = firebase.messaging();


messaging.getToken().then((currentToken) => {
  if (currentToken) {
    sendTokenToServer(currentToken);
    updateUIForPushEnabled(currentToken);
  } else {
    // Show permission request.
    console.log('No Instance ID token available. Request permission to generate one.');
    // Show permission UI.
    updateUIForPushPermissionRequired();
    setTokenSentToServer(false);
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  showToken('Error retrieving Instance ID token. ', err);
  setTokenSentToServer(false);
});
// importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js');


// const firebaseConfig = {
//   apiKey: "AIzaSyCTf6h0cEEuwsxNY7FlN-KSsOasSWYCsRY",
//   authDomain: "testing-send-message-6aea0.firebaseapp.com",
//   databaseURL: "https://testing-send-message-6aea0.firebaseio.com",
//   projectId: "testing-send-message-6aea0",
//   storageBucket: "testing-send-message-6aea0.appspot.com",
//   messagingSenderId: "451681883210",
//   appId: "1:451681883210:web:72eec9b862eecb71"
// };



// firebase.initializeApp(firebaseConfig);


// var messaging = firebase.messaging();


// messaging.setBackgroundMessageHandler(function(payload) {
//   console.log('[firebase-messaging-sw.js] Received background message ', payload);
  
//   var notificationTitle = 'Background Message Title';
//   var notificationOptions = {
//     body: 'Background Message body.',
//     icon: '/firebase-logo.png'
//   };

//   return self.registration.showNotification(notificationTitle,
//       notificationOptions);
// });