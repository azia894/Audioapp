var firebaseConfig = {
    apiKey: "AIzaSyBIJvdVBLPx7eSBLs3Y_tAu7wvsTTO39Ds",
    authDomain: "dilkiawaz-6854d.firebaseapp.com",
    databaseURL: "https://dilkiawaz-6854d-default-rtdb.firebaseio.com",
    projectId: "dilkiawaz-6854d",
    storageBucket: "dilkiawaz-6854d.appspot.com",
    messagingSenderId: "800531980880",
    appId: "1:800531980880:web:ec42f97c62f95d91baa755",
    measurementId: "G-MRQJ04PQZM"
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);
console.log('success');
firebase.analytics();
//   firebase.storage();
var storage = firebase.storage();

var storageRef = storage.ref();
