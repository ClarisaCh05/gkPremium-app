// Import the functions you need from the SDKs you need
import { initFirebase } from "../config";
import { collection, getDocs, getFirestore, loadBundle } from "firebase/firestore";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

//get input
const email = document.querySelector(".email");
const password = document.querySelector(".password");
const form = document.querySelector(".login");

//check id
const storedData = localStorage.getItem("adminId");
console.log("ID:", storedData)

const storedData2 = localStorage.getItem("userId");
console.log("User ID:", storedData)

// Initialize Firebase
const app = initFirebase();

const db = getFirestore();

const admin_db = collection(db, 'admin')
const user_db = collection(db, 'user')

//data array
let admin = []
let user = []

//get docs
getDocs(admin_db)
    .then((snapshot) => {
        snapshot.docs.forEach((doc) => {
            admin.push({ ...doc.data(), id: doc.id })
        })
        console.log("array 1:", admin)
    })
    .catch(err => {
        console.log(err.message)
    })

getDocs(user_db)
    .then((snapshot) => {
        snapshot.docs.forEach((doc) => {
            user.push({ ...doc.data(), id: doc.id })
        })
        console.log("array 2:", user)
    })
    .catch(err => {
        console.log(err.message)
    })

// check login after admin array is populated
form.addEventListener("submit", async(e) => {
    e.preventDefault()
    if (email.value == admin[0].email) {
        console.log("email correct");
        if (password.value == admin[0].password) {
            console.log("password correct")
            localStorage.setItem("adminId", admin[0].id)
            window.location.href = "/html/admin/home.html";
        } else {
            console.log("wrong password")
        }
        
    } else {
        const userDoc = user.find((user) => user.email === email.value);
        if (userDoc && userDoc.password === password.value) {
            console.log("User login successful");
            // Handle user login logic here
            localStorage.setItem("userId", userDoc.id)
            const userid = localStorage.getItem("userId")
            console.log(userid)
            window.location.href = "/html/front/home_user.html";
        } else {
            console.log("Invalid email or password");
        }
    }
})
