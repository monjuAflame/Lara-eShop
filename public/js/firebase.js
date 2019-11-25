
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCOazMAUs9io0xnEMpCjqBiCNCQwH9iZVQ",
    authDomain: "send-message-d6b0c.firebaseapp.com",
    databaseURL: "https://send-message-d6b0c.firebaseio.com",
    projectId: "send-message-d6b0c",
    storageBucket: "",
    messagingSenderId: "74013370425",
    appId: "1:74013370425:web:08a14f8c9e1cd75d3585e8",
    measurementId: "G-38ME1LXS4M"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
 

Notification.requestPermission().then((permission) => {
  if (permission === 'granted') {
    console.log('Notification permission granted.');
    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    // ...
  } else {
    console.log('Unable to get permission to notify.');
  }
});

messaging.onMessage((payload) => {
  console.log('Message received. ', payload);
  
});

// const messaging = firebase.messaging();
		
// 		messaging
// 			.requestPermission()
// 			.then(function () {

// 				console.log("Notification Permission Granted.");
// 				return messaging.getToken()

// 			}).then(function(token){

// 				console.log(token)

// 			}).
// 			catch(function (err){

// 				console.log("unable to get permission to notify.",err);	

// 			});

	// //-----------------
	// messaging.onMessage((payload) => {

	// 	console.log(payload);
	// })


