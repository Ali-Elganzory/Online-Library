<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>

    <link rel="stylesheet" href="/public/css/loginpage.css">

    <script src="/public/js/login.js"></script>
    <script type="application/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="application/javascript"
            src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

</head>
<body>

<script>
    let active = "";

    function openForm(id) {
        document.getElementById(id).style.display = "block";
        const reflow1 = document.getElementById(id).offsetHeight;
        document.getElementById(id).style.height = "600px";
        document.getElementById("dimbg").style.display = "block";
        const reflow2 = document.getElementById("dimbg").offsetHeight;
        document.getElementById("dimbg").style.opacity = "1";
        active = id;
    }

    function closeForm(id) {
        document.getElementById(id).style.display = "none";
        document.getElementById(id).style.height = "500px";
        document.getElementById("dimbg").style.display = "none";
        document.getElementById("dimbg").style.opacity = "0";
        document.getElementsByName(id)[0].reset();
        return false;
    }
</script>
<svg style="position: fixed; z-index: -1; bottom: 0;" xmlns="http://www.w3.org/2000/svg" width="1590.777"
     height="854.676" viewBox="0 0 1590.777 854.676">
    <defs>
        <style>.a {
                fill: #3f3d56;
            }

            .b {
                fill: #ccc;
            }

            .c {
                fill: #6c63ff;
            }

            .d {
                fill: #2f2e41;
            }

            .e {
                fill: #ffb8b8;
            }

            .f {
                fill: #f2f2f2;
            }</style>
    </defs>
    <g transform="translate(0 -225)">
        <g transform="translate(202.5 225)">
            <path class="a"
                  d="M499.593,603.574a24.3,24.3,0,0,1,9.743-30.085c1.647-1,.141-3.6-1.514-2.59A27.008,27.008,0,0,0,497,605.088c.757,1.77,3.342.243,2.59-1.514Z"
                  transform="translate(-231.167 -153)"/>
            <path class="a"
                  d="M500.452,607.609c-4.046-7.168-3.094-15.747-1.639-23.5,1.519-8.092,3.511-16.309,1.788-24.539a22.527,22.527,0,0,0-5.353-10.734c-1.311-1.423-3.428.7-2.121,2.121,5.089,5.527,5.679,13.545,4.853,20.665-.974,8.4-3.733,16.583-3.39,25.117a27.2,27.2,0,0,0,3.272,12.382,1.5,1.5,0,0,0,2.59-1.514Z"
                  transform="translate(-231.167 -153)"/>
            <path class="b"
                  d="M522.167,630.5h-51a4.505,4.505,0,0,1-4.5-4.5V611.02a14.536,14.536,0,0,1,14.52-14.52h7.48a1.5,1.5,0,0,0,1.5-1.5v-7a2.5,2.5,0,0,1,2.5-2.5h8a2.5,2.5,0,0,1,2.5,2.5v7a1.5,1.5,0,0,0,1.5,1.5h7.48a14.536,14.536,0,0,1,14.52,14.52V626A4.505,4.505,0,0,1,522.167,630.5Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M497.451,540.54c1.074,5.7-.256,10.733-2.969,11.244s-5.784-3.694-6.858-9.393,2.229-15.175,2.229-15.175S496.377,534.841,497.451,540.54Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M518.045,567.052c-3.4,4.7-7.97,7.193-10.207,5.573s-1.294-6.74,2.107-11.437,12.553-8.814,12.553-8.814S521.445,562.355,518.045,567.052Z"
                  transform="translate(-231.167 -153)"/>
            <path class="a"
                  d="M405.593,243.574a24.3,24.3,0,0,1,9.743-30.085c1.647-1,.142-3.6-1.514-2.59A27.008,27.008,0,0,0,403,245.088c.757,1.77,3.342.243,2.59-1.514Z"
                  transform="translate(-231.167 -153)"/>
            <path class="a"
                  d="M406.452,247.609c-4.046-7.168-3.094-15.747-1.639-23.5,1.519-8.092,3.511-16.309,1.788-24.539a22.527,22.527,0,0,0-5.353-10.734c-1.311-1.423-3.428.7-2.121,2.121,5.089,5.527,5.679,13.545,4.853,20.665-.974,8.4-3.733,16.583-3.39,25.117a27.2,27.2,0,0,0,3.272,12.382,1.5,1.5,0,0,0,2.591-1.514Z"
                  transform="translate(-231.167 -153)"/>
            <path class="b"
                  d="M428.167,270.5h-51a4.5,4.5,0,0,1-4.5-4.5V251.02a14.536,14.536,0,0,1,14.52-14.52h7.48a1.5,1.5,0,0,0,1.5-1.5v-7a2.5,2.5,0,0,1,2.5-2.5h8a2.5,2.5,0,0,1,2.5,2.5v7a1.5,1.5,0,0,0,1.5,1.5h7.48a14.536,14.536,0,0,1,14.52,14.52V266a4.5,4.5,0,0,1-4.5,4.5Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M403.451,180.54c1.074,5.7-.256,10.733-2.969,11.244s-5.784-3.694-6.858-9.393,2.229-15.175,2.229-15.175S402.377,174.841,403.451,180.54Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M424.045,207.052c-3.4,4.7-7.97,7.193-10.207,5.573s-1.294-6.74,2.107-11.437,12.553-8.814,12.553-8.814S427.445,202.355,424.045,207.052Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="translate(32 272)"/>
            <rect class="c" width="41" height="15" transform="translate(32 321)"/>
            <path class="a"
                  d="M554.167,746h-306a17.019,17.019,0,0,1-17-17V170a17.019,17.019,0,0,1,17-17h306a17.019,17.019,0,0,1,17,17V729A17.019,17.019,0,0,1,554.167,746Zm-306-591a15.017,15.017,0,0,0-15,15V729a15.017,15.017,0,0,0,15,15h306a15.017,15.017,0,0,0,15-15V170a15.017,15.017,0,0,0-15-15Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="a" width="338" height="2" transform="translate(1 115.453)"/>
            <rect class="a" width="338" height="2" transform="translate(1 235.484)"/>
            <rect class="a" width="338" height="2" transform="translate(1 355.516)"/>
            <rect class="a" width="338" height="2" transform="translate(1 475.547)"/>
            <path class="a"
                  d="M301.167,511h-34a5.006,5.006,0,0,1-5-5V409a5.006,5.006,0,0,1,5-5h34a5.006,5.006,0,0,1,5,5v97A5.006,5.006,0,0,1,301.167,511Zm-34-105a3,3,0,0,0-3,3v97a3,3,0,0,0,3,3h34a3,3,0,0,0,3-3V409a3,3,0,0,0-3-3Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="translate(95 272)"/>
            <rect class="c" width="41" height="15" transform="translate(95 321)"/>
            <path class="a"
                  d="M364.167,511h-34a5.006,5.006,0,0,1-5-5V409a5.006,5.006,0,0,1,5-5h34a5.006,5.006,0,0,1,5,5v97a5.006,5.006,0,0,1-5,5Zm-34-105a3,3,0,0,0-3,3v97a3,3,0,0,0,3,3h34a3,3,0,0,0,3-3V409a3,3,0,0,0-3-3Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="translate(195 151)"/>
            <rect class="c" width="41" height="15" transform="translate(195 200)"/>
            <path class="a"
                  d="M464.167,390h-34a5.006,5.006,0,0,1-5-5V288a5.006,5.006,0,0,1,5-5h34a5.006,5.006,0,0,1,5,5v97a5.006,5.006,0,0,1-5,5Zm-34-105a3,3,0,0,0-3,3v97a3,3,0,0,0,3,3h34a3,3,0,0,0,3-3V288a3,3,0,0,0-3-3Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="translate(258 151)"/>
            <rect class="c" width="41" height="15" transform="translate(258 200)"/>
            <path class="a"
                  d="M527.167,390h-34a5.006,5.006,0,0,1-5-5V288a5.006,5.006,0,0,1,5-5h34a5.006,5.006,0,0,1,5,5v97A5.006,5.006,0,0,1,527.167,390Zm-34-105a3,3,0,0,0-3,3v97a3,3,0,0,0,3,3h34a3,3,0,0,0,3-3V288a3,3,0,0,0-3-3Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="matrix(0.936, -0.352, 0.352, 0.936, 147.907, 277.465)"/>
            <rect class="c" width="41" height="15" transform="matrix(0.936, -0.352, 0.352, 0.936, 165.143, 323.333)"/>
            <path class="a"
                  d="M411.311,509.883a5.009,5.009,0,0,1-4.678-3.244l-34.12-90.8a5.006,5.006,0,0,1,2.922-6.439l31.827-11.959a5,5,0,0,1,6.439,2.922l34.12,90.8A5.006,5.006,0,0,1,444.9,497.6h0l-31.827,11.96A5,5,0,0,1,411.311,509.883Zm-2.289-110.765a3,3,0,0,0-1.057.193l-31.827,11.96a3,3,0,0,0-1.753,3.864l34.12,90.8a3,3,0,0,0,3.864,1.753L444.2,495.729a3,3,0,0,0,1.753-3.864l-34.12-90.8a3.006,3.006,0,0,0-2.807-1.946Z"
                  transform="translate(-231.167 -153)"/>
            <rect class="c" width="41" height="15" transform="matrix(0.936, -0.352, 0.352, 0.936, 9.908, 158.465)"/>
            <rect class="c" width="41" height="15" transform="matrix(0.936, -0.352, 0.352, 0.936, 27.144, 204.333)"/>
            <path class="a"
                  d="M273.311,390.883a5.009,5.009,0,0,1-4.678-3.244l-34.12-90.8a5.006,5.006,0,0,1,2.922-6.439l31.827-11.96a5,5,0,0,1,6.439,2.922l34.12,90.8A5.006,5.006,0,0,1,306.9,378.6h0l-31.827,11.96a5,5,0,0,1-1.761.322Zm-2.289-110.765a3.005,3.005,0,0,0-1.057.193l-31.827,11.96a3,3,0,0,0-1.753,3.864l34.12,90.8a3,3,0,0,0,3.864,1.753L306.2,376.729a3,3,0,0,0,1.753-3.864l-34.12-90.8a3.006,3.006,0,0,0-2.807-1.946Z"
                  transform="translate(-231.167 -153)"/>
            <circle class="d" cx="31" cy="31" r="31" transform="translate(596 188)"/>
            <path class="e"
                  d="M720.448,513.471a10.743,10.743,0,0,0,14.424-7.956l85.237-53.779L804.595,434.27,725.651,492.66a10.8,10.8,0,0,0-5.2,20.811Z"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M802.313,466.034a4.5,4.5,0,0,1-3.793-2.063l-9.871-15.339a4.5,4.5,0,0,1,1.148-6.082l33.03-23.873a14.789,14.789,0,1,1,16.63,24.445l-34.729,22.205A4.467,4.467,0,0,1,802.313,466.034Z"
                  transform="translate(-231.167 -153)"/>
            <path class="e" d="M585.894,580.85H573.635L567.8,533.561H585.9Z"/>
            <path class="d" d="M564.877,577.346h23.644v14.887h-38.53A14.887,14.887,0,0,1,564.877,577.346Z"/>
            <path class="e" d="M643.128,571.684,631.324,575l-18.4-43.951,17.421-4.891Z"/>
            <path class="d" d="M854.962,725.531h23.644v14.887h-38.53A14.887,14.887,0,0,1,854.962,725.531Z"
                  transform="translate(-397.288 106.533) rotate(-15.68)"/>
            <path class="c" d="M907.327,652.113l-47.6-56.171L888.612,560.9a4.5,4.5,0,0,1,6.961.021l43.7,53.634Z"
                  transform="translate(-231.167 -153)"/>
            <path class="f"
                  d="M861.651,596.36h0a15.945,15.945,0,0,1,2.586-3.453L891.8,564.959a6.133,6.133,0,0,1,4.076-1.83c3.15-.149,8.316.17,9.756,3.625l-37.218,30.451Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M908.981,664a11.431,11.431,0,0,1-5.958-1.887l-.132-.136L859.3,595.308l7.233-.7L905.3,564.37a4.5,4.5,0,0,1,6.522,1.067L954.2,629.575a4.513,4.513,0,0,1-1.238,6.211l-41.006,27.65a7.948,7.948,0,0,1-2.974.562Z"
                  transform="translate(-231.167 -153)"/>
            <path class="a"
                  d="M893.564,618.394a2.5,2.5,0,0,1-2.077-1.1l-5.008-7.438a2.5,2.5,0,0,1,.678-3.471l25.691-17.3a2.5,2.5,0,0,1,3.47.678l5.008,7.438a2.5,2.5,0,0,1-.678,3.471l-25.691,17.3a2.491,2.491,0,0,1-1.393.425Z"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M797.029,726.7a5.479,5.479,0,0,1-5.439-5c-2.182-24.785-13.127-149.7-14.328-174.927-1.334-28.029,21.993-72.371,22.229-72.815l.161-.3,11.53,1.44v1.341l10.974,1.291,21.238,2.056,6.08,74.318,2.688,50.4,25.26,102.943a4.476,4.476,0,0,1-3.186,5.414l-21.983,6a4.519,4.519,0,0,1-5.512-3.109l-20.7-72.707a1.5,1.5,0,0,0-2.942.457l2.189,70.9a5.344,5.344,0,0,1-1.617,3.912c-5.039,4.732-18.353,7.259-25.841,8.344a5.561,5.561,0,0,1-.8.058Z"
                  transform="translate(-231.167 -153)"/>
            <path class="c"
                  d="M863.086,414.392c-3.488-3.636-26.473,1.361-31.576,6.718l-34.936,57.106,57.778,10.749,12.765-72.558Z"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M847.942,559.479a11.248,11.248,0,0,1-3.657-.609c-3.357-1.151-7.471-2.356-12.227-3.579-20.834-5.357-28.189-22.51-21.862-50.98l.16-.723a210.735,210.735,0,0,1,32.956-75.262l2.45-3.52a26.4,26.4,0,0,1,27.045-10.756c9.374,1.934,14.407,4.735,14.96,8.328,1.085,7.05-19.854,92.27-28.907,128.582a11.235,11.235,0,0,1-10.918,8.52Z"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M776.171,548.539a5.28,5.28,0,0,1-1.6-.25l-6.753-2.16a5.269,5.269,0,0,1-3.241-7.082l35.831-84.1a78.693,78.693,0,0,1,34.123-37.827h0a1.842,1.842,0,0,1,1.461-.137,1.657,1.657,0,0,1,1,.892c4.214,9.271-18.722,53.144-37.152,88.4-9.437,18.051-17.587,33.641-18.515,38.086a5.263,5.263,0,0,1-5.156,4.187Z"
                  transform="translate(-231.167 -153)"/>
            <path class="e"
                  d="M887.026,567.7a10.743,10.743,0,0,0,.921-16.447l-.285-100.784-23.04,3.866,7.536,97.9A10.8,10.8,0,0,0,887.026,567.7Z"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M868.266,475.477a4.5,4.5,0,0,1-4.488-4.2l-2.68-40.667a14.789,14.789,0,1,1,29.546-1.1l.364,41.22a4.509,4.509,0,0,1-4.447,4.54l-18.239.214Z"
                  transform="translate(-231.167 -153)"/>
            <circle class="e" cx="24.561" cy="24.561" r="24.561" transform="translate(596.053 202.455)"/>
            <path class="d"
                  d="M872.2,397.2c1.832-5.83,3.514-12.7-.112-17.622-2.612-3.545-7.3-4.917-11.7-5.113s-8.81.549-13.2.2-9.028-2.081-11.258-5.878c-2.891-4.923-.442-11.7,4.206-15.02s10.788-3.778,16.445-3.006a35.477,35.477,0,0,1,19.292,8.63c5.258,4.853,8.685,11.848,8.533,19s-4.165,14.278-10.559,17.49"
                  transform="translate(-231.167 -153)"/>
            <path class="d"
                  d="M866.079,343.534c-5.88-1.811-8.592-9.585-5.962-15.147s9.351-8.475,15.454-7.7,11.481,4.69,15.191,9.6,5.947,10.759,7.812,16.622,3.416,11.853,5.963,17.453a54.168,54.168,0,0,0,44.45,30.943c4.129.3,8.414.085,12.177-1.641s6.919-5.205,7.34-9.324c2.142,14.629-6.369,30.176-19.846,36.255s-30.765,2.168-40.313-9.12c-9.331-11.031-10.776-26.605-10.552-41.052.062-3.962.208-8-.887-11.806s-3.685-7.429-7.458-8.638c-3.044-.976-6.341-.272-9.462.419s-6.435,1.358-9.457.315-5.455-4.479-4.237-7.435"
                  transform="translate(-231.167 -153)"/>
            <path class="b" d="M963.25,747h-264a1,1,0,0,1,0-2h264a1,1,0,0,1,0,2Z" transform="translate(-231.167 -153)"/>
        </g>
        <path class="c"
              d="M0,507c82.1,71.842,143.683,174.472,174.472,287.366s248.366,96.473,451.575,108.789,338.682,104.683,449.523,114.946,381.786-14.368,515.206,61.578c-45.157-2.053-1590.777,0-1590.777,0Z"/>
    </g>
</svg>
<div id="dimbg" onclick="closeForm(active)"></div>
<div id="controls">
    <p style="color: black;">Books in new</p>
    <p style="color: #6C63FF">colors</p>
    <input type="button" value="New Account" onclick="openForm('signup')"
           style="background-color: black; margin-top: 40px;">
    <input type="button" value="Log in" onclick="openForm('signin')"
           style="background-color: #6C63FF; margin-top: 20px;">
</div>
<form id="signin" name="signin">
    <fieldset>
        <div class="form-title">Log In</div>
        <div style="position: absolute; alignment: center; width: 100%">
            <div style="margin-top: 50px; margin-bottom: 50px">
                <label for="uname">Username:</label>
                <input class="forminput" type="text" id="uname" name="username" placeholder="Username">
            </div>
            <div style="margin-top: 15px;">
                <label for="pass">Password:</label>
                <input class="forminput" type="password" id="pass" name="password" placeholder="Password">
            </div>
            <div id="loginerror" class="errormessage">wrong username or password</div>
        </div>
        <br>
        <input id="signin-btn" name="signin" type="submit" value="LOGIN">
        <br style="line-height: 0.1">
    </fieldset>
</form>
<form id="signup" name="signup">
    <fieldset>
        <div class="form-title">Create An Account</div>
        <div style="position: absolute; alignment: center; width: 100%">
            <div style="margin-top: 50px; margin-bottom: 50px">
                <label for="nuname">Username:</label>
                <input class="forminput" type="text" id="nuname" name="newusername" placeholder="Username">
                <div id="registererror" class="errormessage">username already used</div>
            </div>
            <div style="margin-top: 15px;">
                <label for="npass">Password:</label>
                <input class="forminput" type="password" id="npass" name="newpassword" placeholder="Password">
            </div>
        </div>
        <input name="register" type="submit" value="Register">

    </fieldset>

</form>
</body>
</html>