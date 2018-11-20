import { initializeApp } from 'firebase';

const app = initializeApp ({
    apiKey: "",
    authDomain: "fir-vue-aaf90.firebaseapp.com",
    databaseURL: "https://fir-vue-aaf90.firebaseio.com",
    projectId: "fir-vue-aaf90",
    storageBucket: "fir-vue-aaf90.appspot.com",
    messagingSenderId: "74820468321"
  });

  export const db = app.database();

  export const dosenRef = db.ref('dosen');