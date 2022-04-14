window.onload = function () {
    const store = {};
    const loginBtn = document.getElementById('signin-btn');
    const form = document.forms[0];


    console.log(loginBtn);

//////////// Cookie set and get functions ////////////////
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

//////////////////////////////////////////////////////////


    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
                'Accept': 'application/json',
            },
            body: JSON.stringify({

                username: form.username.value,
                password: form.password.value
            })
        });

        if (res.status >= 200 && res.status <= 299) {
            const jwt = await res.json();
            console.log(jwt);
            setCookie('token', jwt.token, 1);
        } else {
            // Handle errors
            console.log(res.status, res.statusText);
        }
    });
}