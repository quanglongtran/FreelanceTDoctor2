// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.2/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
// Your web app's Firebase configuration
  var firebaseConfig = {
      apiKey: "AIzaSyCCm2WsuEV3dSvFRu4SSARcTVAeh6Uk_ko",
      authDomain: "medix-link.firebaseapp.com",
      databaseURL: "https://medix-link.firebaseio.com",
      projectId: "medix-link",
      storageBucket: "medix-link.appspot.com",
      messagingSenderId: "917263872826",
      appId: "1:917263872826:web:2d36474ec51fccef34d603"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

self.addEventListener('notificationclick', function (event) {
  	console.debug('SW notification click event', event)

  	const url = event.notification.data.data.click_action;
  	event.waitUntil(
	    clients.matchAll({type: 'window'}).then( windowClients => {
	        // Check if there is already a window/tab open with the target URL
	        for (var i = 0; i < windowClients.length; i++) {
	            var client = windowClients[i];
	            // If so, just focus it.
	            if (client.url === url && 'focus' in client) {
	                return client.focus();
	            }
	        }
	        // If not, then open the target URL in a new window/tab.
	        if (clients.openWindow) {
	            return clients.openWindow(url);
	        }
	    })
	);
})

messaging.onBackgroundMessage((payload) => {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = payload.notification.title;
  let icon = 'https://tdoctor.vn/public/images/doctor/logo1.jpg';
  if(payload.data.icon){
    icon = payload.data.icon;
  }
  const notificationOptions = {
    body: payload.notification.body,
    icon: icon,
    data:  payload
  };
  self.registration.showNotification(notificationTitle,    notificationOptions);


  
});