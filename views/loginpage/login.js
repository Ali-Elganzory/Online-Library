window.onload = function () {

    const form1 = document.forms[0];
    const form2 = document.forms[1];
    const login_btn = document.getElementById("signin-btn")
    const register_error = document.getElementById("registererror");
    const login_error = document.getElementById("loginerror");
    
    form1.addEventListener('submit', async (e) => {
        e.preventDefault();
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
                'Accept': 'application/json',
            },
            body: JSON.stringify({

                username: form1.username.value,
                password: form1.password.value
            })
        });

        if (res.status >= 200 && res.status <= 299) {
            const jwt = await res.json();
            Cookies.set('token', jwt.token, {expires:1});
            login_error.style.display = "none";
        } else {
            // Handle errors
            login_error.style.display = "block";
            console.log(res.status, res.statusText);
        }
    });

    form2.addEventListener('submit', async (g) => {
        g.preventDefault();
        const res = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
                'Accept': 'application/json',
            },
            body: JSON.stringify({

                username: form2.newusername.value,
                password: form2.newpassword.value
            })
        });

        if (res.status >= 200 && res.status <= 299) {
            const jwt = await res.json();
            Cookies.set('token', jwt.token, {expires:1});
            register_error.style.display = "none";
        } else {
            // Handle errors
            register_error.style.display = "block";
            console.log(res.status, res.statusText);
        }
    });
}