<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" integrity="sha256-mDRlQYEnF3BuKJadRTD48MaEv4+tX8GVP9dEvjZRv3c=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <style>
            html,
            body {
              height: 100%;
              width: 100%;
            }
            
            .wrapper {
              display: flex;
              flex-direction: column;
              justify-content: space-around;
              align-items: center;
              min-height: 100%;
            }
            
            .main {
              text-align: center;
              padding: 30px 0;
            }
            
            .search-wrapper {
              margin: 0 12px;
            }
            
            .search-wrapper input {
              box-sizing: border-box;
              margin: 0;
              padding: 12px 48px 12px 12px;
            }
            
            .search-wrapper .icon {
              position: absolute;
              top: 12px;
              right: 12px;
            }
            
            #search-icon {
              cursor: pointer;
              color: #000;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
          <div class="main">
            <h2>GitHub Search</h2>
            <div class="search-wrapper card">
                <form method="POST" action="/search">
                    {{ csrf_field() }}
                    <input type="text" name="squery" id="search" placeholder="Search" autofocus/>
                    <i id="search-icon" type="submit" class="material-icons icon" disabled onclick="submit">
                        search
                    </i>
                </form>
            </div>
            <p><a href="#" class="random-link" onclick="return special();">Something Awesome</a></p>
            <form id="special-form" method="POST" action="/special">
              {{ csrf_field() }}
              <input type="hidden" id="city" name="city"/>
          </form>
          </div>
          <div class="results" id="results-container">
          </div>
        </div>
        <script>
          function special(){
              var reason = prompt("OctoCat asked your city ?");
              if(reason == "" || reason == null || reason == false)
                return false;
              document.getElementById("city").value = reason;
              document.getElementById("special-form").submit();
          }
        </script>
    </body>
</html>
