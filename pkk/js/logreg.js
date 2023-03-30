
function change() {
    const title = document.getElementById("title");
    const name = document.getElementById("name")
    const link = document.getElementById("link");
    const sub = document.getElementById("sub");
    if (title.innerHTML === "login") {
        title.innerHTML = "register";
        sub.innerHTML = "Create your account now.";
        name.style.display = "unset";
        link.innerHTML = "Have an account? <button onclick='change()'>Login</button>";
    } else {
        title.innerHTML = "login";
        name.style.display = "none";
        link.innerHTML = "Don’t have an account? <button onclick='change()'>Sign Up</button>";
    }
  }