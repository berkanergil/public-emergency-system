// // Give the service worker access to Firebase Messaging.
// // Note that you can only use Firebase Messaging here. Other Firebase libraries
// // are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
// /*
// Initialize the Firebase app in the service worker by passing in the messagingSenderId.
// */
// // Import the functions you need from the SDKs you need

// // TODO: Add SDKs for Firebase products that you want to use
// // https://firebase.google.com/docs/web/setup#available-libraries

// // Your web app's Firebase configuration
// // For Firebase JS SDK v7.20.0 and later, measurementId is optional
// const firebaseConfig = {
//     apiKey: "AIzaSyAcn-lnWsUHf2TwU1EeCV9SbRrDYcI7Suc",
//     authDomain: "emergencyp.firebaseapp.com",
//     projectId: "emergencyp",
//     storageBucket: "emergencyp.appspot.com",
//     messagingSenderId: "906523791830",
//     appId: "1:906523791830:web:b9ce02dec9bbfe87b39477",
//     measurementId: "G-026R2F3HN3"
// };

// // Initialize Firebase
// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);

// // Retrieve an instance of Firebase Messaging so that it can handle background
// // messages.
// const messaging = firebase.messaging();
// messaging.setBackgroundMessageHandler(function(payload) {
//     console.log("Message received.", payload);
//     const title = "Hello world is awesome";
//     const options = {
//         body: "Your notificaiton message .",
//         icon: "/firebase-logo.png",
//     };
//     return self.registration.showNotification(
//         title,
//         options,
//     );
// });