const storedData = localStorage.getItem("adminId");
console.log("ID:", storedData);

const logout = document.querySelector(".logout");

logout.addEventListener("click", async(e) => {
    localStorage.clear();
    window.location.href = "/html/admin/login.html";
})