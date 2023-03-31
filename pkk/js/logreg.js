function change() {
    const button = document.getElementById("butt");
    const title = document.getElementById("title");
    const email = document.getElementById("email")
    const link = document.getElementById("link");
    const sub = document.getElementById("sub");
    if (title.innerHTML == "login") {
        title.innerHTML = "register";
        sub.innerHTML = "Create your account now.";
        email.style.display = "unset";
        link.innerHTML = "Have an account? <button onclick='change()'>Login</button>";
        button.setAttribute("name", "signup")
        button.innerHTML = "Sign Up";
    } else {
        title.innerHTML = "login";
        email.style.display = "none";
        email.required = false;
        link.innerHTML = "Don’t have an account? <button onclick='change()'>Sign Up</button>";
        button.setAttribute("name", "login")
        button.innerHTML = "Login";
    }
  }