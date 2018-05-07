importScripts('https://www.gstatic.com/firebasejs/4.1.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.1.1/firebase-messaging.js');

var config = {
	apiKey: "AIzaSyAmjPbTrTc_ghBV4BZqn0jKGRi_oVDIHJI",
	authDomain: "tauret-computadores.firebaseapp.com",
	databaseURL: "https://tauret-computadores.firebaseio.com",
	projectId: "tauret-computadores",
	storageBucket: "tauret-computadores.appspot.com",
	messagingSenderId: "172872949320"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();