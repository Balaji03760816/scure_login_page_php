const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", async function (event) {

    event.preventDefault();

    const username =
        document.getElementById("username").value.trim();

    const password =
        document.getElementById("password").value.trim();

    try {

        const response = await fetch("login.php", {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({

                username: username,
                password: password

            })

        });

        const result = await response.json();

        alert(result.message);

    } catch (error) {

        console.log(error);

        alert("Server Error");

    }

});