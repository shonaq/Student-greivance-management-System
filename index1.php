<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JSSATE SGMS</title>
    <div class="mnu">
      <a href="index.php" style="text-decoration: none">Home</a>
      <a href="login.php" style="text-decoration: none">Login</a>
      <a href="mailto:counsellor@jssateb.ac.in" style="text-decoration: none"
        >Contact Us</a
      >
    </div>
    <style>
      body {
        background-image: url(/proj/penpaper.jpg);
        background-color: whitesmoke;
        background-repeat: no-repeat;
        background-position: right;
        color: rgb(29, 28, 28);
        background-size: 100%;
      }
      * {
        text-decoration: none;
        padding-top: 6px;
        padding-bottom: 8px;
        padding-left: 8px;
        padding-right: 8px;
        color: rgb(15, 4, 77);
        font-family: "Open Sans", sans-serif;
      }
      .mnu {
        text-align: right;
        font-weight: inherit;
      }

      .lgn {
        float: center;
        text-align: center;
        text-decoration: none;
        /* font-family: "Roboto", sans-serif; */
        font-size: 28px;
        /* font-weight: bold; */
        background: rgb(220, 220, 222);
        width: 260px;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        display: flex;
        height: auto;
      }
      a:hover {
        background-color: rgb(220, 220, 222);
        opacity: 100%;
        border-radius: 7px;
      }

      h1 {
        text-align: center;
        font-weight: bolder;
        font-size: 33px;
      }
      dt {
        text-align: left;
        font-weight: bold;
        font-size: 15px;
      }
      header {
        float: left;
        width: 50px;
        display: flex;
      }
      #tickets {
        background-color: rgb(5, 0, 71);
        float: left;
        border-radius: 5px;
        font-family: monospace;
      }
      button {
        padding: 14px 14px 14px 14px;
        background: red;
        -webkit-box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        border-color: red;
        color: #ffffff;
        border-radius: 4px;
      }
      button:hover {
        background-color: rgb(0, 0, 0, 0.1);
      }
    </style>
    <script>
      function ragging() {
        alert("you will be redirected to ragging news article page");
        window.location = "https://timesofindia.indiatimes.com/topic/ragging";
      }
      function drug_abuse() {
        alert("you will be redirected to Drug abuse news article page");
        window.location = "https://timesofindia.indiatimes.com/topic/drugabuse";
      }
      function discrimination() {
        alert("you will be redirected to Discrimination news article page");
        window.location =
          "https://timesofindia.indiatimes.com/topic/discrimination";
      }
      function harassment() {
        alert("you will be redirected to harassment news article page");
        window.location =
          "https://timesofindia.indiatimes.com/topic/harassment";
      }
    </script>
  </head>
  <body>
    <header>
      <img
        src="images_student/jssate.png"
        alt="jss logo"
        style="width: 200px"
      />
    </header>
    <main>
      <section>
        <div>
          <h1>Welcome to JSSATE Student Grievance Management System (SGMS)</h1>
        </div>
        <div>
          <dl>
            <dt style="font-size: large;">Hello students ,</dt>
            <dd>
              <p style="font-size: large;">
                "
                <strong
                  >JSSATEB Student Grievance Management System (SGMS)</strong
                >is a computerized solution to avoid the various type of abuse
                faced by student in college. SGMS helps students to register
                complaint online and mentored by the counsellor regarding the
                various problem faced by the student as soon as possible. Here
                counsellor takes required action against the complaint
                registered. "
              </p>
            </dd>
          </dl>
        </div>
      </section>
      <section class="olgn">
        <div class="lgn">
          <a href="login.php">click here to login.</a>
        </div>
      </section>
    </main>
    <footer>
      <div id="tickets">
        <p style="color: #ffffff">News articles</p>
        <button onclick="ragging()">Ragging</button>
        <button onclick="drug_abuse()">Drug abuse</button>
        <button onclick="harassment()">Harassment</button>
        <button onclick="discrimination()">Discrimination</button>
      </div>
      <div
        id="contact_us"
        style="
          text-align: right;
          padding-top: 50px;
          padding-bottom: 0%;
          font-weight: lighter;
        "
      >
        <p>
          <a
            href="mailto:counsellor@jssateb.ac.in"
            style="
              text-decoration: none;
              color: rgb(5, 34, 15);
              font-weight: bolder;
            "
            >You can contact us here. . ....</a
          >
        </p>
      </div>
    </footer>
  </body>
</html>